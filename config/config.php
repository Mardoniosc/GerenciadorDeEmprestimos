<?php

define('BASE_URL', 'http://localhost/GerenciadorDeEmprestimos/public/');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'DB_CONTROLE_EMPRESTIMOS');
define('DB_USER', 'root');
define('DB_PASS', 'docker');

try {
  $pdo = new PDO("mysql:dbname=" . DB_NAME . ";HOST=" . DB_HOST, DB_USER, DB_PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Erro: " . $e->getMessage();
  exit;
}