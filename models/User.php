<?php

class User extends Model
{
  public function getByEmail($email)
  {
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(":email", $email);
    $stmt->execute();

    return $stmt->fetch();
  }

  public function validateLogin($email, $password)
  {
    $user = $this->getByEmail($email);
    if ($user && password_verify($password, $user['password'])) {
      return $user;
    }
    
    return false;
  }
}
