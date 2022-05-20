<?php require_once '../../../private/initialize.php';?>

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
    redirect_to(url_for('/admin/users/show.php?id=' . $logged_in_user));
}

//* Find the user we want to edit
$user = User::find_by_id(h($id));
//var_dump($user);

//* If it is a post request, we update the user
if (is_post_request()) {

    // We get the info from the form
    $args = $_POST['user'];
    $user->merge_attributes($args);

    //var_dump($user);
    // Update the database
    $result = $user->save();

    if ($result === true) {
        $session->message("User {$user->username} was updated successfully");
        redirect_to(url_for('/admin/users/show.php?id=' . $id));
    }

}

//* If it is a get request, we just show the form
?>

<?php include SHARED_PATH . '/admin_header.php';?>

<main>

  <h2>Edit <?php echo h($user->username); ?></h2>

  <section class="grid content-grid">

    <aside>
      <?php include '../navigation.php';?>
    </aside>

    <section class="content">

      <?php echo display_errors($user->errors); ?>

      <form
        action="<?php echo url_for('/admin/users/edit.php?id=' . $user->user_id); ?>" method="post">

          <?php include 'form_fields.php';?>

          <input type="submit" value="Update <?php echo h($user->username); ?>">

      </form>

      <?php if (is_admin()) {?>

        <a href="<?php echo url_for('/admin/users/index.php'); ?>">Back to List</a>

      <?php }?>

      <a
        href="<?php echo url_for('/admin/users/show.php?id=' . $id); ?>">
        Back to <?php echo h($user->username) ?>
      </a>

      <a
        href="<?php echo url_for('/admin/users/delete.php?id=' . $id); ?>">
        Delete <?php echo h($user->username) ?>
      </a>

    </section>

  </section>

</main>

<?php include SHARED_PATH . '/footer.php';