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
    // $this->check_stored_login();
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

  public function clear_message()
  {
    unset($_SESSION['message']);
  }

} // Session