<?php
require_once '../../private/initialize.php';

require_login();

$page_title = ' - Home';

include_once SHARED_PATH.'/admin_header.php';
?>

<h2>Admin Area</h2>

<main class="grid">

<aside>
  <nav class="sidebar-nav" role="secondary-navigation">
    <ul role="list">
    <li><a href="#">My Posts</a></li>
    <li><a href="#">Create Post</a></li>
    <li><a href="<?php echo url_for('/admin/users/show.php'); ?> ">My Profile</a></li>
    </ul>
  </nav>
</aside>

<section>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto mollitia quaerat tempore illo debitis facilis facere, voluptates adipisci odit dolore.</p>
</section>

</main>

<?php include_once SHARED_PATH.'/footer.php'; ?>
