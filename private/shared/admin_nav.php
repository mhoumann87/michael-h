<nav>

<?php 
  if (logged_in()) {
    echo $_SESSION['username'];
  }
?>

<ul>
  <?php if (!logged_in()) { ?>
    <li>
      <a href="<?php echo url_for('/admin/login.php');?>">Login</a>
    </li>

  <?php } else { ?>
    <li>
      <a href="<?php echo url_for('/admin/logout.php'); ?>">Logout</a>
    </li>
  <?php } ?>

    <li>
      <a href="<?php echo url_for('/admin/users/create.php'); ?>">Sign Up</a>
    </li>
  </ul>
</nav>

<?php
echo $session->is_admin() ? 'True' : 'False';
echo '<br>';
  echo user_admin() ? 'True' : 'False';
  ?>