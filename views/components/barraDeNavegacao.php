<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="<?= BASE_URL ?>">GE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" href="<?= BASE_URL ?>emprestimo/index">Emprestimos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?= BASE_URL ?>user/listar">Objetos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?= BASE_URL ?>user/atualizarSenha">Pessoas</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Relatórios
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= BASE_URL ?>relatorio/processos">Processos</a></li>
            <li><a class="dropdown-item" href="<?= BASE_URL ?>relatorio/processos">Gestor</a></li>
            <li><a class="dropdown-item" href="<?= BASE_URL ?>relatorio/processos">Clientes</a></li>
            <li><a class="dropdown-item" href="<?= BASE_URL ?>relatorio/processos">Audiência</a></li>
          </ul>
        </li>
      </ul>
      <a class="btn btn-outline-light btn-sm" style="width: 60px;" href="<?= BASE_URL ?>auth/logout">Sair</a>

    </div>
  </div>
</nav>
