<?php require_once '../../../private/initialize.php';?>

<?php

$title = is_admin() ? 'All Posts' : 'My Posts';

require_login();

$page_title = ' - ' . $title;

?>

<?php include SHARED_PATH . '/admin_header.php';?>

<main class="container">

  <h2>Hastily made news page</h2>

  <section class="grid content-grid">

    <aside>

      <?php include '../navigation.php';?>

    </aside>

    <section class="content">
      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate perferendis magnam non. Sed dolorem neque laboriosam doloremque ut nisi dolorum quaerat commodi quae fugiat, sit laborum tenetur rem quis consequuntur error ipsam, velit excepturi iure quo, eveniet numquam. Blanditiis repudiandae quae accusamus enim rem hic itaque porro debitis aliquid animi!
    </section>

  </section><!-- grid content-grid -->

</main>

<?php include SHARED_PATH . '/footer.php';?>
