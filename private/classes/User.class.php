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

  // function to validate user input
  protected function validate()
  {

    $this->errors = [];

    if (is_blank($this->username)) {
      $this->errors[] = "Username can't be blank";
    } elseif(!has_length($this->username, array('min' => 6))) {
      $this->errors[] = "Username must be at least 6 characters";
    } elseif(!has_unique_entries('username', $this->username, $this->id ?? 0)) {
      $this->errors[] = 'Username is already in use, please choose another';
    }

    if ($this->password_required) {

      if (is_blank($this->password)) {
        $this->errors[] = "Please enter a password";
      } elseif(!has_length($this->password, array('min' => 8))) {
        $this->errors[] = "Password must be at lease 8 characters";
      } elseif (!preg_match('/[A-Z]', $this->password)) {
        $this->errors[] = "Password must contain at least 1 uppercase letter";
      } elseif (!preg_match('/[a-z]/', $this->password)) {
        $this->errors[] = "Password must contain at least one lowercase letter";;
      } elseif (!preg_match('/[0-9]/', $this->password)) {
        $this->errors[] = "Password must contain at least one number";
      }
    }

    if (is_blank($this->confirm_password)) {
      $this->errors[] = "Confirm password can't be blank";
    } elseif ($this->confirm_password !== $this->password) {
      $this->errors[] = "Confirm password and password must be the same";
    }
  } // end validate()

} // End User