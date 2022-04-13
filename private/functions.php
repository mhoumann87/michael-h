<?php

//* Set URL for the root of the server
function url_for($script_path)
{
  //* add the leading '/' if it is not present
  if ($script_path[0] != '/') {
    $script_path = '/'.$script_path;
  }
  return WWW_ROOT.$script_path;
}

//* Redirect to another page
function redirect_to($location)
{
  header('Location: '.$location);
  exit();
}

//* Encode string for use with URLs as a query string
function u($string = '')
{
  return urlencode($string);
}

function raw_u($string = '')
{
  return rawurldecode($string);
}

//* Sanitize the special characters by replacing them with HTML code
function h($string = '')
{
  return htmlspecialchars($string);
}