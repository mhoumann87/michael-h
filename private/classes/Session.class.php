<?php

class Session
{

  public $user_id;
  public $username;
  private $last_login;

  public const MAX_LOGIN_AGE = 60 * 60 * 24 * 7; // One week
  
  public function __construct()
  {
    session_start(); // turn on session when a new session is instantiated
    $this->check_stored_login();
  }

  //* Login user
  public function login($user)
  {
    if ($user) {
      session_regenerate_id(); // Prevent session fixation attacks
      $this->user_id = $_SESSION['user_id'] = $user->user_id;
      $this->username = $_SESSION['username'] = $user->username;
      $this->last_login = $_SESSION['last_login'] = time();
    }
    return true;
  }

  //* Check to see if the user is logged in, and the login is recent
  public function is_logged_in()
  {
    // check to see if there is a user_in and a recent login in session
    return isset($this->user_id) && $this->last_login_is_recent();
  }

  //* Function to log user out
  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['last_login']);
    unset($this->user_id);
    unset($this->username);
    unset($this->last_login);
  
    return true;
  }

  //* See which user is logged in
  private function check_stored_login()
  {
    if (isset($_SESSION['user_id'])) {
      $this->user_id = $_SESSION['user_id'];
      $this->username = $_SESSION['username'];
      $this->last_login = $_SESSION['last_login'];
    }

  }

  public function message($msg = '')
  {
    if (!empty($msg)) {
      // This is a set message
      $_SESSION['message'] = $msg;
      return true;
    } else {
      // this is a get message
      return $_SESSION['message'] ?? '';
    }
  }

  //* Check to see if the login isn't to old
  private function last_login_is_recent()
  {
    if (!isset($this->last_login)) {
      return false;
    } elseif ($this->last_login + self::MAX_LOGIN_AGE < time()) {
      return false;
    } else {
      return true;
    }
  }

  //* Clear the session message
  public function clear_message()
  {
    unset($_SESSION['message']);
  }

} // Session