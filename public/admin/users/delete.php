<?php require_once '../../../private/initialize.php' ?>

<?php 

require_login();

$id = $_GET['id'];
$logged_in_user = $_SESSION['user_id'];

// If we don't get an id with the URL, redirect the user
if (!$id) {
  $session->message('Can\'t find user');
  if (is_admin()) {
    redirect_to(url_for('/admin/users/index.php'));
  } else {
    redirect_to(url_for('/admin/users/show.php?id='.$logged_in_user));
  }
}

// Only the user itself or an admin can be able to see this page
if ($id != $logged_in_user && !is_admin()) {
  $session->message("You don't have privileges to see this page");
  redirect_to(url_for('/admin/index.php'));
}

$user = User::find_by_id($id);

// If we can't find the post in the database, send message and redirect user
if (!$user) {
  $session->message("Can't find user in database");

  if (is_admin()) {
    redirect_to(url_for('/admin/users/index.php'));
  } else {
    redirect_to(url_for('/admin/users/show.php?id='.$logged_in_user));
  }
}

// Set the page title using username
$page_title = " - Delete {$user->username}";

// If the form is submitted delete the user
if (is_post_request()) {

  $user->delete();

  // Send the admin back to the list or logout() the user and goto login.php
  if (is_admin()) {
    $session->message("User {$user->username} was successfully deleted");
    redirect_to(url_for('/admin/users/index.php'));
  } else {
    $session->logout();
    redirect_to(url_for('/admin/login.php'));
  }
}


?>


<?php include SHARED_PATH.'/admin_header.php'; ?>

<main>

  <h2>Delete User <?php echo h($user->username); ?></h2>

  <section class="grid content-grid">

    <aside>
      <?php include 'navigation.php'; ?>
    </aside>

    <section class="content">

      <p>User Id: <?php echo h($user->user_id); ?></p>
      <p>Username: <?php echo h($user->username); ?></p>
      <p>Email: <?php echo h($user->email); ?></p>

      <p>Are you sure you wan't to delete this user account?</p>

      <form 
        action="<?php url_for('/admin/users/delete.php?id='.h($user->user_id)); ?>" method="post">

        <input type="submit" value="Delete User">

          <?php if (is_admin()) { ?>
            <a href="<?php echo url_for('/admin/users/index.php');?>">Back to list</a>
          <?php } else { ?>
            <a href="<?php echo url_for('/admin/users/show.php?id='.h($user->user_id)); ?>">Back To User</a>
          <?php } ?>

      </form>

    </section>

  </section>

</main>

<?php include SHARED_PATH.'/footer.php'; ?>