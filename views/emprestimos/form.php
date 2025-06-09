<?php
$isEdit = isset($emp);
$action = $isEdit 
  ? BASE_URL . "emprestimo/update/{$emp['id']}" 
  : BASE_URL . "emprestimo/store";
?>
<h1><?= $isEdit ? 'Editar' : 'Novo' ?> Empréstimo</h1>
<form action="<?= $action ?>" method="post">
  <label>Pessoa:
    <select name="pessoa_id" required>
      <?php foreach($pessoas as $p): ?>
        <option value="<?= $p['id'] ?>"
          <?= $isEdit && $emp['pessoa_id']==$p['id'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($p['nome']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </label>

  <label>Objeto:
    <select name="objeto_id" required>
      <?php foreach($objetos as $o): ?>
        <option value="<?= $o['id'] ?>"
          <?= $isEdit && $emp['objeto_id']==$o['id'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($o['nome']) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </label>

  <label>Data Empréstimo:
    <input type="date" name="data_emprestimo"
           value="<?= $emp['data_emprestimo'] ?? date('Y-m-d') ?>" required>
  </label>

  <label>Última Cobrança:
    <input type="date" name="data_ultima_cobranca"
           value="<?= $emp['data_ultima_cobranca'] ?? '' ?>">
  </label>

  <?php if ($isEdit): ?>
    <label>Data Devolução:
      <input type="date" name="data_devolucao"
             value="<?= $emp['data_devolucao'] ?? '' ?>">
    </label>
  <?php endif; ?>

  <button type="submit"><?= $isEdit ? 'Salvar' : 'Cadastrar' ?></button>
</form>
