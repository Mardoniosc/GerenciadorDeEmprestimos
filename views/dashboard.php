<?php
$user = Auth::getUser();

if (!Auth::isLogged()) {
    header("Location: " . BASE_URL . "auth/login");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <!-- Link para o Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
        }

        .card {
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- Barra de navegação -->
    <?php require_once(__DIR__ . '../components/barraDeNavegacao.php'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Bem-vindo, <?= $user['name'] ?>!</h3>
                    </div>
                    <div class="card-body">
                        <p>Você logou com sucesso. Utilize o menu acima para navegar no sistema.</p>
                        <a href="<?= BASE_URL ?>auth/logout" class="btn btn-danger">Sair</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>