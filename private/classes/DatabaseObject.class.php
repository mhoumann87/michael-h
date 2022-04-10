<?php

class DatabaseObject
{

  static protected $db;
  static protected $table_name = '';
  static protected $columns = [];
  public $errors = [];

  static public function set_database($db)
  {
    self::$db = $db;
  }

  // CRUD operations

  // Create

  // Read

  // Update

  // Delete

} // end DatabaseObject