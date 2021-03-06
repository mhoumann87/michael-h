<?php require_once '../../../private/initialize.php';?>

<?php

//require_login();

$page_title = '- Show User';

// Get the id for the user that sent the request
$id = $_GET['id'] ?? '';
$logged_in_user = $_SESSION['user_id'];

// If we don't get an id, return user to users front page
if (!$id) {
    redirect_to(url_for('/admin/index.php'));
} elseif ($id != $logged_in_user && !is_admin()) {
    // If it is not an admin, we only want the user to see own page
    redirect_to(url_for('/admin/users/show.php?id=' . $logged_in_user));
    echo 'We would now be redirecting';
}

// Find the user in the database and assign it to the user variable
$user = User::find_by_id($id);

// IF we can't find a user, we redirect to the front page
if (!$user) {
    redirect_to(url_for('/admin/users/index.php'));
}

?>

<?php include SHARED_PATH . '/admin_header.php';?>

<main>

  <h2>Show User</h2>

  <section class="grid content-grid">

    <aside>
      <?php include '../navigation.php';?>
    </aside>

    <section class="content">

      <h3>Username: <?php echo h($user->username); ?></h3>
      <p>ID: <?php echo h($user->user_id); ?></p>
      <p>Email: <?php echo h($user->email) ?></p>
      <p>Role: <?php echo ($user->is_admin) ? 'Admin' : 'User'; ?></p>

    <?php if (is_admin()) {?>
      <a href="<?php echo url_for('/admin/users/index.php'); ?>">Back to list</a>
    <?php }?>

      <a href="<?php echo url_for('/admin/users/edit.php?id=' . $id); ?>">
        Edit <?php echo h($user->username); ?>
      </a>

      <a href="<?php echo url_for('/admin/users/delete.php?id=' . $id); ?>">
        Delete <?php echo h($user->username); ?>
      </a>

    </section>

  </section>

</main>

<?php include SHARED_PATH . '/footer.php';?>