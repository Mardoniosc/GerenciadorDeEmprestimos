<?php

class EmprestimoController extends Controller
{
  public function __construct($pdo)
  {
    parent::__construct($pdo);
  }

  public function index()
  {
    $emprestimosModel = new Emprestimo($this->pdo);
    $emprestimos = $emprestimosModel->getAll();

    $this->loadView('emprestimos/index', [
      'emprestimos' => $emprestimos
    ]);
  }

  public function create()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = $_POST;
      $emprestimosModel = new Emprestimo($this->pdo);
      $result = $emprestimosModel->create($data);

      if ($result) {
        header('Location: /emprestimos/listar');
        exit;
      } else {
        $error = 'Erro ao criar empréstimo.';
      }
    }

    $this->loadView('emprestimos/form', [
      'error' => isset($error) ? $error : null
    ]);
  }

  public function visualizar($id)
  {
    $emprestimosModel = new Emprestimo($this->pdo);
    $emprestimo = $emprestimosModel->getById($id);
    if (!$emprestimo) {
      header('Location: /emprestimos/listar');
      exit;
    }
    $this->loadView('emprestimos/visualizar', [
      'emprestimo' => $emprestimo
    ]);
  }

  public function editar($id)
  {
    $emprestimosModel = new Emprestimo($this->pdo);
    $emprestimo = $emprestimosModel->getById($id);

    if (!$emprestimo) {
      header('Location: /emprestimos/listar');
      exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = $_POST;
      $result = $emprestimosModel->update($id, $data);

      if ($result) {
        header('Location: /emprestimos/visualizar/' . $id);
        exit;
      } else {
        $error = 'Erro ao atualizar empréstimo.';
      }
    }

    $this->loadView('emprestimos/editar', [
      'emprestimo' => $emprestimo,
      'error' => isset($error) ? $error : null
    ]);
  }

  public function excluir($id)
  {
    $emprestimosModel = new Emprestimo($this->pdo);
    $result = $emprestimosModel->delete($id);

    if ($result) {
      header('Location: /emprestimos/listar');
      exit;
    } else {
      $error = 'Erro ao excluir empréstimo.';
      $this->loadView('emprestimos/listar', [
        'error' => $error
      ]);
    }
  }

  public function returnLoan($id)
  {
    $emprestimosModel = new Emprestimo($this->pdo);
    $emprestimo = $emprestimosModel->getById($id);

    if (!$emprestimo) {
      header('Location: /emprestimos/listar');
      exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = $_POST;
      $data['data_devolucao'] = date('Y-m-d H:i:s');
      $result = $emprestimosModel->update($id, $data);

      if ($result) {
        header('Location: /emprestimos/visualizar/' . $id);
        exit;
      } else {
        $error = 'Erro ao registrar devolução.';
      }
    }

    $this->loadView('emprestimos/returnLoan', [
      'emprestimo' => $emprestimo,
      'error' => isset($error) ? $error : null
    ]);
  }

  public function getOverdue($dias = 30)
  {
    $emprestimosModel = new Emprestimo($this->pdo);
    $dias = (int)($_GET['dias'] ?? $dias);
    $overdueLoans = $emprestimosModel->getOverdue($dias);

    $this->loadView('emprestimos/overdue', [
      'overdueLoans' => $overdueLoans,
      'dias' => $dias
    ]);
  }
}
