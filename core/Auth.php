<?php

class Auth {
  public static function isLogged() {
    return isset($_SESSION['user']);
  }

  public static function login($user) {
    $_SESSION['user'] = $user;
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['user_email'] = $user['email'];
  }

  public static function logout () {
    unset($_SESSION['user']);
  }

  public static function getUser() {
    return $_SESSION['user'] ?? null;
  }

}