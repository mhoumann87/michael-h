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

    <li>
      <a href="<?php echo url_for('/admin/users/create.php'); ?>">Sign Up</a>
    </li>

  <?php } else { ?>

    <li>
      <a href="<?php echo url_for('/admin/index.php'); ?>">Home</a>
    </li>

    <li>
      <a href="<?php echo url_for('/admin/news/index.php'); ?>">News</a>
    </li>

    <li>
      <a href="<?php echo url_for('/admin/users/index.php'); ?>">Users</a>
    </li>

    <li>
      <a href="<?php echo url_for('/admin/logout.php'); ?>">Logout</a>
    </li>
  <?php } ?>

  </ul>
</nav>

