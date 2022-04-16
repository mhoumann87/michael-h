<?php require_once '../../../private/initialize.php'; ?>

<?php

$page_title = '- Show User';

// Get the id for the user that sent the request
$id = $_GET['id'] ?? '';


// If we don't get an id, return user to users front page
if (!$id) {
  redirect_to(url_for('/admin/users/index.php'));
} 

?>

<?php include SHARED_PATH.'/admin_header.php'; ?>

<h2>Show User</h2>

<aside>
  <?php include 'navigation.php'; ?>
</aside>

<main>

  <p>Show user <?php echo $id; ?></p>

</main>

<?php include SHARED_PATH.'/footer.php'; ?>