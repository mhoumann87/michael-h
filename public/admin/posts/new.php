<?php require '../../../private/initialize.php';?>

<?php

$page_title = ' - Create New Post';

require_login();

if (is_post_request()) {

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
      action="<?php echo url_for('/admin/posts/new'); ?>"
      method="post">

      <label for="headline">Headline:</label>
      <input
        type="text"
        name="post[headline]"
        value="<?php echo h($post->headline); ?>"
        id="headline">

        <label for="content">Content:</label>
        <textarea
          name="post[content]"
        id="content"
        >
        <?php echo h($post->content); ?>
        </textarea>

    </form>


  </section><!-- grid content-grid -->

</main>

<?php include SHARED_PATH . '/footer.php';?>