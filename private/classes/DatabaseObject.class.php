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

  //* Create
  protected function create()
  {

    // Validate input
    $this->validate();
    if (!empty($this->errors)) {
      return false;
    }

    $attributes = $this->sanitized_attributes();
    $sql  = "INSERT INTO ".static::$table_name." (";
    $sql .= join(', ', array_keys($attributes));
    $sql .= ") VALUES ('";
    $sql .= join("', '", array_values($attributes));
    $sql .= "')";
    //echo $sql;

    $result = self::$db->query($sql);

    // Get the id from the database and add it to the object
    if ($result) {
      $this->id = self::$db->insert_id;
    }
    return $result;
  } // create()

  //* Read

  //* Find all posts in the database
  static public function find_all()
  {
    $sql  = "SELECT * FROM ".static::$table_name;

    return static::find_by_sql($sql);
  }// find_all()


  //* Find single post by the id
  static public function find_by_id($id)
  {
    $sql  = "SELECT * FROM ".static::$table_name." ";
    $sql .= "WHERE user_id = '".self::$db->escape_string($id)."'";

    $obj_array = static::find_by_sql($sql);

    if (!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }// find_by_id()

  //* Find post by SQL, utility function for every SQL call
  static protected function find_by_sql($sql)
  {
    $result = self::$db->query($sql);

    if (!$result) {
      exit('Database query failed');
    }

    $obj_array = [];
    // Convert the result into an object
    while ($record = $result->fetch_assoc()) {
      $obj_array[] = static::instantiate($record);
    }

    // Clear the query
    $result->free();

    // Return the array
    return $obj_array;
  }// find_by_sql()

  // Update
  protected function update()
  {
    // Validate user input
    if (!empty($this->errors)) {
      var_dump($this->errors);
      return false;
    }

    // Clear the input
    $attributes = $this->sanitized_attributes();

    // Make an array for the input
    $attribute_pairs = [];
    foreach ($attributes as $key => $value) {
      $attribute_pairs[] = "{$key}='{$value}'";
    }

    // Upload to the database
    $sql  = "UPDATE ".static::$table_name." SET ";
    $sql .= join(', ', $attribute_pairs);
    $sql .= " WHERE user_id='".self::$db->escape_string($this->user_id)."' ";
    $sql .= "LIMIT 1";

    echo $sql;

    $result = self::$db->query($sql);
    return $result;
  }// update();
  

  // Delete
  public function delete()
  {
    $sql  = "DELETE FROM ".static::$table_name." ";
    $sql .= "WHERE user_id='".self::$db->escape_string($this->user_id)."' ";
    $sql .= "LIMIT 1";

    $result = self::$db->query($sql);

    return $result;
  }// delete();


  //* "Service" functions to the CRUD functions

  // save() looks at the input and "decide" if it is an update or a new create
  public function save()
  {
    // A new record will not have an user_id yet
    if (isset($this->user_id)) {
      return $this->update();
      //return 'update';
    } else {
      return $this->create();
      //return 'create';
    }
  }

  // instantiate() connects the values to the columns in the database
  static protected function instantiate($record)
  {
    $object = new static;

    foreach ($record as $property => $value) {
      if (property_exists($object, $property)) {
        $object->$property = $value;
      }
    }
    return $object;
  }

protected function validate()
{
  $this->errors = [];

  // Here we add all the validation we need in the different classes

  return $this->errors;
}

// Make an array of values from input that are in the db columns
  public function attributes()
  {
    $attributes = [];
    foreach (static::$db_columns as $column) {
      // "Weed" out the columns you don't want here
      if ($column == 'user_id') {
        continue;
      }
      $attributes[$column] = $this->$column;
    }
    return $attributes;
  }

//* Takes the attribute array and makes as new array where the
//* values are sanitized
protected function sanitized_attributes()
{
  $sanitized = [];

  foreach ($this->attributes() as $key => $value) {
    $sanitized[$key] = self::$db->escape_string($value);
  }
  return $sanitized;
}

//* Function to put in new values from the user on the update page
public function merge_attributes($args) 
{
  foreach ($args as $key => $value) {
    if (property_exists($this, $key) && !is_null($value)) {
      $this->$key = $value;
    }
  }
  //var_dump($args);
}

} // end DatabaseObject