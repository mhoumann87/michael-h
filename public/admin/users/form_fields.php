<?php

// Prevent this code from being loaded ub the browser
// without first setting the necessary object
if (!isset($user)) {
  redirect_to(url_for('/admin/users/index.php'));
}

?>

<label for="username">Username: </label>
<input type="text" name="user[username]" value="<?php echo h($user->username); ?>" />

<label for="email">Email: </label>
<input type="text" name="user[email]" value="<?php echo h($user->email); ?>" />

<label for="password">Password: </label>
<input type="password" name="user[password]" />

<label for="confirm_password">Confirm Password: </label>
<input type="password" name="user[confirm_password]" />