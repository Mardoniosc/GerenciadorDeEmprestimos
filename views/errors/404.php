<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Erro 404</title>
  <!-- Link para o Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .custom-bg {
      background: linear-gradient(to right, #e2e8f0, #e5e7eb);
    }

    .custom-btn:hover {
      background-color: #f3e8ff !important;
      transition: background-color 0.3s ease-in-out;
    }

    @media (prefers-color-scheme: dark) {
      .custom-bg {
        background: linear-gradient(to right, #1f2937, #111827);
        color: white !important;
      }

      .custom-btn {
        background-color: #374151 !important;
        color: white !important;
      }

      .custom-btn:hover {
        background-color: #4b5563 !important;
      }
    }
  </style>
</head>

<body>
  <div class="custom-bg text-dark">
    <div class="d-flex align-items-center justify-content-center min-vh-100 px-2">
      <div class="text-center">
        <h1 class="display-1 fw-bold">404</h1>
        <p class="fs-2 fw-medium mt-4">Oops! Página não encontrada!</p>
        <p class="mt-4 mb-5">A página que você está procurando não existe ou foi movida.</p>
        <a href="<?= BASE_URL ?>" class="btn btn-light fw-semibold rounded-pill px-4 py-2 custom-btn">
          Ir Para Página Inicial
        </a>
      </div>
    </div>
  </div>

  <!-- Script do Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>