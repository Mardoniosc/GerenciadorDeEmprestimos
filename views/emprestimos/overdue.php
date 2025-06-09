<h1>Empréstimos atrasados &gt; <?= $dias ?> dias</h1>
<form method="get" action="<?= BASE_URL ?>emprestimo/getOverdue">
  <label>Qtd. Dias:
    <input type="number" name="dias" value="<?= $dias ?>" min="1">
  </label>
  <button>Filtrar</button>
</form>
<table>
  <thead>
    <tr>
      <th>ID</th><th>Pessoa</th><th>Objeto</th><th>Dias Atraso</th>
      <th>Empréstimo</th><th>Cobrança</th><th>Ações</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($overdueLoans as $e): ?>
    <tr>
      <td><?= $e['id'] ?></td>
      <td><?= htmlspecialchars($e['pessoa']) ?></td>
      <td><?= htmlspecialchars($e['objeto']) ?></td>
      <td><?= $e['dias_atraso'] ?></td>
      <td><?= $e['data_emprestimo'] ?></td>
      <td><?= $e['data_ultima_cobranca'] ?></td>
      <td>
        <a href="<?= BASE_URL ?>emprestimo/returnLoan/<?= $e['id'] ?>">🏠 Devolver</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
