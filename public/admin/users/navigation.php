<nav class="sidebar-nav" role="secondary navigation">
    <ul role="list">

      <li><a href="<?php echo url_for('/admin/index.php'); ?>">Home</a></li>
      
      <li><a href="<?php echo url_for('/admin/users/new.php'); ?>">Create User</a></li>

    <?php if (is_admin()) { ?>
      <li><a href="<?php echo url_for('/admin/users/index.php'); ?>">All Users</a></li>
    <?php } ?>
    </ul>
</nav>