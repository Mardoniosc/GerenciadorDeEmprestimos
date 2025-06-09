<?php

class Model
{
  protected $pdo;
  protected int $userId;

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
    if (!isset($_SESSION['user_id'])) {
      throw new Exception("Usuário não autenticado.");
    }
    $this->userId = (int) $_SESSION['user_id'];
  }
}
