<?php

//* Set URL for the root of the server
function url_for($script_path)
{
    //* add the leading '/' if it is not present
    if ($script_path[0] != '/') {
        $script_path = '/' . $script_path;
    }
    return WWW_ROOT . $script_path;
}

//* Redirect to another page
function redirect_to($location)
{
    header('Location: ' . $location);
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

//* Check the request type
function is_post_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

//* Redirect to user to the login page, if user isn't logged in
function require_login()
{
    global $session;

    if (!$session->is_logged_in()) {
        redirect_to(url_for('/admin/login.php'));
    }
}

//* Check to see if the user is logged in , same function as require_login()
//* but don't redirect the user
function logged_in()
{
    global $session;

    return $session->is_logged_in();
}

//* Check to see if the user have administrator privileges.
//* Should be checked in Session.class, but is can't get to work
function is_admin()
{
    return logged_in() && $_SESSION['is_admin'];
}

// The function money_format is removed in PHP 8.0.0
// This function replaces that
function as_money($value, $unit = '$')
{
    return $unit . number_format($value, 2);
}

// calculate the value in bytes from value in MB
function calculate_bytes_from_mb($mb)
{
    return pow((2), 20) * $mb;
}

// calculate the value in MB from bytes
function calculate_mb_from_bytes($bytes)
{
    return $bytes / 1048576;
}
