<h1>Empréstimos</h1>
<a href="<?= BASE_URL ?>emprestimo/create">Novo Empréstimo</a>
<a href="<?= BASE_URL ?>emprestimo/getOverdue">Atrasados > 30 dias</a>
<table>
  <thead>
    <tr>
      <th>ID</th><th>Pessoa</th><th>Objeto</th><th>Empréstimo</th>
      <th>Cobrança</th><th>Devolução</th><th>Ações</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($emprestimos as $e): ?>
    <tr>
      <td><?= $e['id'] ?></td>
      <td><?= htmlspecialchars($e['pessoa']) ?></td>
      <td><?= htmlspecialchars($e['objeto']) ?></td>
      <td><?= $e['data_emprestimo'] ?></td>
      <td><?= $e['data_ultima_cobranca'] ?></td>
      <td><?= $e['data_devolucao'] ?: '-' ?></td>
      <td>
        <a href="<?= BASE_URL ?>emprestimo/edit/<?= $e['id'] ?>">✏️</a>
        <a href="<?= BASE_URL ?>emprestimo/delete/<?= $e['id'] ?>"
           onclick="return confirm('Excluir?')">🗑️</a>
        <?php if (!$e['data_devolucao']): ?>
          <a href="<?= BASE_URL ?>emprestimo/returnLoan/<?= $e['id'] ?>">🏠</a>
        <?php endif; ?>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
