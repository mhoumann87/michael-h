<?php

require_once '../../../private/initialize.php';

$page_title = ' - Create User';

$user = new User;


?>

<?php include SHARED_PATH.'/admin_header.php'; ?>


<h2>Create User</h2>

<aside>
  <?php include './navigation.php'; ?>
</aside>

<main>

<form action="<?php echo url_for('/admin/users/new.php'); ?>" method="post">

  <?php include './form_fields.php'; ?>

  <input class="btn" type="submit" value="Create User" />
</form>
</main>


<?php include SHARED_PATH.'/footer.php'; ?>