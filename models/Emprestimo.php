<?php

class Emprestimo extends Model
{
public function create(array $data)
    {
        $sql = "INSERT INTO emprestimos 
                (pessoa_id, objeto_id, data_emprestimo, data_ultima_cobranca)
                VALUES (:p, :o, :de, :dc)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":p", $data['pessoa_id']);
        $stmt->bindValue(":o", $data['objeto_id']);
        $stmt->bindValue(":de", $data['data_emprestimo']);
        $stmt->bindValue(":dc", $data['data_ultima_cobranca'] ?: null);


        if ($stmt->execute()) {
            return $this->pdo->lastInsertId();
        }

        return false;
    }

    public function getById(int $id) {
        $sql = "SELECT * FROM emprestimos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getAll() {
        $sql = "SELECT e.*, p.nome AS pessoa, o.nome AS objeto
                FROM emprestimos e
                JOIN pessoas p ON e.pessoa_id = p.id
                JOIN objetos o ON e.objeto_id = o.id
                ORDER BY e.data_emprestimo DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function update(int $id, array $data) {
        $sql = "UPDATE emprestimos
                SET pessoa_id = :p, objeto_id = :o,
                    data_emprestimo = :de,
                    data_ultima_cobranca = :dc,
                    data_devolucao = :dd
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":p", $data['pessoa_id']);
        $stmt->bindValue(":o", $data['objeto_id']);
        $stmt->bindValue(":de", $data['data_emprestimo']);
        $stmt->bindValue(":dc", $data['data_ultima_cobranca'] ?: null);
        $stmt->bindValue(":dd", $data['data_devolucao'] ?: null);
        return $stmt->execute();
    }

    public function delete(int $id) {
        $sql = "DELETE FROM emprestimos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }

    public function markReturned(int $id) {
        $sql = "UPDATE emprestimos SET CURDATE() WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }

    public function getOverdue(int $dias) {
        $sql = "SELECT e.*, p.nome AS pessoa, o.nome AS objeto,
                       DATEDIFF(CURDATE(), e.data_emprestimo) AS dias_atraso
                FROM emprestimos e
                JOIN pessoas p ON e.pessoa_id = p.id
                JOIN objetos o ON e.objeto_id = o.id
                WHERE e.data_devolucao IS NULL
                  AND DATEDIFF(CURDATE(), e.data_emprestimo) > :dias
                ORDER BY dias_atraso DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":dias", $dias);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
