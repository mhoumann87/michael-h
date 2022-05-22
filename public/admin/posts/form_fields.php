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