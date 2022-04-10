<?php

class User extends DatabaseObject
{

  static protected $table_name = 'users';
  static protected $db_columns = [
    'user_id',
    'username',
    'hashed_password'
  ];

  public $user_id;
  public $username;
  protected $hashed_password;
  public $password;
  public $confirm_password;
  protected $reset_hash;
  protected $password_required = true;

  public function __construct($args = [])
  {
    $this->username = $args['username'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';
    $this->hashed_password = $args['hashed_password'] ?? '';
  }
} // End User