<?php require '../../../private/initialize.php';?>

<?php

$page_title = ' - Create New Post';

require_login();

if (is_post_request()) {

    /** The post is saved and we try to collect all data and save in the database */

    // * Add all user input to an array
    $args = $_POST['post'];
    // * Create an instance of Post and add data to it
    $post = new Post($args);
} else {
    $post = new Post;
}

?>

<?php include SHARED_PATH . '/admin_header.php';?>

<main class="container">

  <h2>Create New Blog Post</h2>

  <?php echo display_errors($post->errors); ?>

  <section class="grid content-grid">

    <aside>
      <?php include '../navigation.php';?>
    </aside>

    <form
      action="<?php echo url_for('/admin/posts/new.php'); ?>"
      method="post">

      <?php include './form_fields.php';?>

      <input type="submit" value="Save Post" />

    </form>


  </section><!-- grid content-grid -->

</main>

<?php include SHARED_PATH . '/footer.php';?>