<?php require_once '../../../private/initialize.php'; ?>

<?php

require_login();

$page_title = '- Show User';

// Get the id for the user that sent the request
$id = $_GET['id'] ?? '';


// If we don't get an id, return user to users front page
if (!$id) {
  redirect_to(url_for('/admin/users/index.php'));
} 

// Find the user in the database and assign it to the user variable
$user = User::find_by_id($id);

// IF we can't find a user, we redirect to the front page
if (!$user) {
  redirect_to(url_for('/admin/users/index.php'));
}

?>

<?php include SHARED_PATH.'/admin_header.php'; ?>

<h2>Show User</h2>

<aside>
  <?php include 'navigation.php'; ?>
</aside>

<main>

  <h3>Username: <?php echo h($user->username); ?></h3>
  <p>ID: <?php echo h($user->user_id); ?></p>
  <p>Email: <?php echo h($user->email) ?></p>
  <p>Role: <?php echo ($user->is_admin) ? 'Admin' : 'User'; ?></p>

</main>

<?php include SHARED_PATH.'/footer.php'; ?>