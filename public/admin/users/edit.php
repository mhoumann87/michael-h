<?php require_once '../../../private/initialize.php'; ?>

<?php

//* You have to be logged in to see this page
require_login();

$id = $_GET['id'] ?? '';
$logged_in_user = $_SESSION['user_id'];

//* If we don't have an id in the URL, we just redirect back to frontpage
if (!$id) {
  redirect_to(url_for('/admin/index.php'));
}

//* We only want the user itself or an administrator to access this page
 if ($id != $logged_in_user && !is_admin()) {
  redirect_to(url_for('/admin/users/show.php?id='.$logged_in_user));
} 

//* Find the user we want to edit
$user = User::find_by_id($id);
//var_dump($user);

//* If it is a post request, we update the user
if (is_post_request()) {

  // We get the info from the form
  $args = $_POST['user'];
  $user->merge_attributes();

  // Update the database
  $user->save();
}


//* If it is a get request, we just show the form
?>

<?php include SHARED_PATH.'/admin_header.php'; ?>

<h2>Edit <?php echo h($user->username); ?></h2>

<aside>
  <?php include 'navigation.php'; ?>
</aside>

<main>

<?php echo display_errors(); ?>

  <form action="<?php echo url_for('/admin/users/edit.php?id='.$user->user_id); ?>" method="post">

<?php include 'form_fields.php'; ?>

<input type="submit" value="Edit <?php echo h($user->username);?>">

</form>

</main>

<?php include SHARED_PATH.'/footer.php';