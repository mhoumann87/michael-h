<?php

ob_start(); //* Turn on output buffering

/*
 * My PHP setup isn't showing errors, so we add this to show
 * the errors
 TODO REMEMBER TO DELETE THIS BEFORE UPLOADING TO PRODUCTION 
*/
ini_set('display_errors', 1);
ini_set('display_startuo_errors', 1);
error_reporting(E_ALL);
// TODO DELETE THIS

/*
 * Create PHP constants for the file paths
 * __FILE__ returns the current path to this file
 * dirname() returns the path to the parent directory 
*/
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH.'/public');
define("SHARED_PATH", PRIVATE_PATH.'/shared');

/*S
 * Assign the root URL to a PHP constant
 * - Do not need to include the domain
 * - Use same document root as webserver
*/
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public');
$public_end = $public_end + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

/*
 * Import all the files we need for out project 
*/
require_once 'db_credentials.php';
require_once 'db_functions.php';
require_once 'functions.php';
require_once 'validation_functions.php';
require_once 'status_error_functions.php';

// Auto load all classes
function my_autoload($class) 
{
  if (preg_match('/\A\w+\Z/', $class)) {
    include 'classes/'.$class.'.class.php';
  }
}
spl_autoload_register('my_autoload');


// Connect to the database
$db = db_connect();

// Create a database object
DatabaseObject::set_database($db);

// Create a new session
$session = new Session;