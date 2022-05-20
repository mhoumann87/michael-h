<?php
require_once '../../private/initialize.php';

require_login();

$page_title = ' - Home';

include SHARED_PATH . '/admin_header.php';
?>

<main class="container">

  <h2>Admin Area</h2>

  <section class="grid content-grid">

    <aside>

      <?php include './navigation.php';?>

    </aside>

    <section>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto mollitia quaerat tempore illo debitis facilis facere, voluptates adipisci odit dolore.</p>
  </section>

  </section>

</main>

<?php include SHARED_PATH . '/footer.php';?>
