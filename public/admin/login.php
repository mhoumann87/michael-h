<?php require_once '../../private/initialize.php';

$page_title = '- Login';

$errors = [];
$username = '';
$password = '';

if (is_post_request()) {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Verify Input, just check to see if there are input
  if (is_blank($username)) {
    $errors[] = 'Username can\'t be blank';
  }

  if (is_blank($password)) {
    $errors[] = 'Password can\'t be blank';
  }
  
  // If there are no errors, we try to log user in
  if (empty($errors)) {
    $user = User::find_by_column('username', $username);

    // Check to see if we find a user
    if ($user != false && $user->verify_password($password)) {
      // Mark user as logged in
      $session->login($user);
      redirect_to(url_for('/admin/index.php'));
    } else {
      $errors[] = 'Login was unsuccessful!';
    }
  }
}

// IF the form wasn't posted, we just show the form

?>

<?php include SHARED_PATH.'/admin_header.php'; ?>

<h2>Login</h2>

<main>

<?php echo display_errors($errors); ?>

<form action="<?php echo url_for('/admin/login.php'); ?>" method="post">

  <label for="username">Username:</label>
  <input type="text" name="username" value="<?php echo h($username); ?>" autofocus />

  <label for="password">Password:</label>
  <input type="password" name="password" value="" />

  <input type="submit" value="Log In">

</form>

</main>

<?php include SHARED_PATH.'/footer.php'; ?>