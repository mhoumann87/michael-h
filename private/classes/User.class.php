<?php

class User extends DatabaseObject
{

  static protected $table_name = 'users';
  static protected $db_columns = [
    'user_id',
    'username',
    'email',
    'hashed_password',
    'is_admin'
  ];

  public $user_id;
  public $username;
  public $email;
  public $is_admin;
  protected $hashed_password;
  public $password;
  public $confirm_password;
  protected $reset_hash;
  protected $password_required = true;

  public function __construct($args = [])
  {
    $this->username = $args['username'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->is_admin = $args['is_admin'] ?? 0;
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

    if (is_blank($this->email)) {
      $this->errors[] = "Email can't be blank";
    } elseif (!has_valid_email_format($this->email)) {
      $this->errors[] = "Please enter a valid email address";
    } elseif (!has_unique_entries('email', $this->email, $this->id ?? 0)) {
      $this->errors[] = "Email is already in the database";
    }

    if ($this->password_required) {

      if (is_blank($this->password)) {
        $this->errors[] = "Please enter a password";
      } elseif(!has_length($this->password, array('min' => 8))) {
        $this->errors[] = "Password must be at lease 8 characters";
      } elseif (!preg_match('/[A-Z]/', $this->password)) {
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

  //* Function to hash the password before inserting it in the database
  protected function set_hashed_password()
  {
    $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
  }

  //* Check password is correct on login
  public function verify_password($password)
  {
    return password_verify($password, $this->hashed_password);
  }

  //* Update info with the hashed password
  protected function create()
  {
    $this->set_hashed_password();
    return parent::create();
  }

  //* Function to use for validation of uniqueness
  //* Should maybe be in validation functions
  //TODO check to see if this function should be in validation_functions.php
  static public function find_by_column($column, $value)
  {
    $sql  = "SELECT * FROM ".static::$table_name." ";
    $sql .= "WHERE ".$column."= '".self::$db->escape_string($value)."'";

    $obj_array = static::find_by_sql($sql);

    if (!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  } 

} // End User