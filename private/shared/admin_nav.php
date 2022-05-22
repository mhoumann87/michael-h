<nav role="primary-nav" class="flex admin-nav">

<ul class="flex nav-list">

  <?php if (!logged_in()) {?>

    <li>
      <a href="<?php echo url_for('/admin/login.php'); ?>">Login</a>
    </li>

    <li>
      <a href="<?php echo url_for('/admin/users/new.php'); ?>">Sign Up</a>
    </li>

  <?php } else {?>

    <li>
      <a href="<?php echo url_for('/admin/index.php'); ?>">Home</a>
    </li>

    <li>
      <a href="<?php echo url_for('/admin/posts/index.php'); ?>">Blog</a>
    </li>

    <li>
      <a href="<?php echo url_for('/admin/users/index.php'); ?>">Users</a>
    </li>

    <li>
      <a href="<?php echo url_for('/admin/logout.php'); ?>">Logout</a>
    </li>

  <?php }?>

  </ul>

  <?php if (logged_in()) {?>

    <span><?php echo $_SESSION['username']; ?></span>

  <?php }?>

</nav>

