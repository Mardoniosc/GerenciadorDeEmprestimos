<?php 

class AuthController extends Controller {
  public function login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = $_POST['email'] ?? '';
      $password = $_POST['password'] ?? '';

      $userModel = new User($this->pdo);
      $user = $userModel->validateLogin($email, $password);

      if ($user) {
        Auth::login($user);
        header("Location: " . BASE_URL . "dashboard/home");
        exit;
      } else {
        $data['error'] = "Usuário ou senha inválidos.";
      }
    }

    $this->loadView('login', $data ?? []);
  }

  public function logout() {
    Auth::logout();
    header("Location: " . BASE_URL);
    exit;
  }
}