<?php
require_once '../../private/initialize.php';

require_login();

$page_title = ' - Home';

include_once SHARED_PATH.'/admin_header.php';
?>

<main>

  <h2>Admin Area</h2>

  <section class="grid content-grid">

    <aside>
      <nav class="sidebar-nav" role="secondary-navigation">
        
        <ul role="list">
        
          <li><a href="#">My Posts</a></li>
        
          <li><a href="#">Create Post</a></li>
        
        <?php if (is_admin()) { ?>
          <li><a href="<?php echo url_for('/admin/news/index.php'); ?>">
            All Posts
          </a></li>  
        <?php } ?>
        
          <li>
            <a href="<?php echo url_for('/admin/users/show.php'); ?> ">
            My Profile
            </a>
          </li>

        <?php if(is_admin()) { ?>
        
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
        <?php } ?>

        </ul>
      
      </nav>
    
    </aside>

    <section>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto mollitia quaerat tempore illo debitis facilis facere, voluptates adipisci odit dolore.</p>
  </section>

  </section>

  <main>

<?php include_once SHARED_PATH.'/footer.php'; ?>
