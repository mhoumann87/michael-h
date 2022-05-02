<?php

// Prevent this code from being loaded ub the browser
// without first setting the necessary object
if (!isset($user)) {
  redirect_to(url_for('/admin/users/index.php'));
}

?>

<label for="username">Username: </label>
<input 
  type="text" 
  name="user[username]" 
  value="<?php echo h($user->username); ?>" 
  id="username" />

<label for="email">Email: </label>
<input 
  type="text" 
  name="user[email]" 
  value="<?php echo h($user->email); ?>" 
  id="email" />

<label for="password">Password: </label>
<input type="password" name="user[password]" id="password" />

<label for="confirm_password">Confirm Password: </label>
<input type="password" name="user[confirm_password]" id="confirm_password" />

<?php if (is_admin()) { ?>
  <label for="role">Users Role</label>
  
  <input 
    type="radio" 
    name="user[is_admin]" 
    value="0" 
    <?php echo ($user->is_admin == 0) ? 'checked="checked"' : ''; ?> 
    id="role" />
    User &nbsp;

  <input 
    type="radio" 
    name="user[is_admin]" 
    value="1"
    <?php echo ($user->is_admin > 0) ? 'checked="checked"' : ''; ?> 
    id="role" />Administrator &nbsp;
    
<?php } ?>