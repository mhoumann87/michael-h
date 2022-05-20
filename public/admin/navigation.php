<nav class="sidebar-nav" role="secondary-navigation">

        <ul role="list">

          <li>
            <a href="<?php echo url_for('/admin/posts/index.php'); ?>">
            <?php echo is_admin() ? 'Posts' : 'My Posts'; ?>
          </a>
          </li>

          <li><a href="#">Create Post</a></li>

        <?php if (is_admin()) {?>
          <li><a href="<?php echo url_for('/admin/news/index.php'); ?>">
            All Posts
          </a></li>
        <?php }?>

          <li>
            <a href="<?php echo url_for('/admin/users/show.php'); ?> ">
            My Profile
            </a>
          </li>

        <?php if (is_admin()) {?>

          <li>
            <a href="<?php echo url_for('/admin/users/new.php'); ?>">
            Create User
            </a>
          </li>


          <li>
            <a href="<?php echo url_for('/admin/users/index.php'); ?>">
            All Users
            </a>
          </li>
        <?php }?>

        </ul>

      </nav>