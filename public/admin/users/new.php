<?php

require_once '../../../private/initialize.php';

$page_title = ' - Create User';

if (is_post_request()) {
    // If the form data is submitted, create record based on these parameters

    // "Collect" all the parameters in an array
    $args = $_POST['user'];
    $user = new User($args);
    $result = $user->save();

    // If we get an result, it means we succeeded and we let the user know
    // with session_message() and redirect the user to the user page
    if ($result === true) {
        $new_id = $user->id;

        if (is_admin()) {
            $session->message('User was created successfully.');
            redirect_to(url_for('/admin/users/index.php'));
        } else {
            redirect_to(url_for('/admin/login.php'));
        }
    }

    // If we get a result that are false, we just automatically show the errors.

} else {

    // The form hasn't been filled and saved yet, so we show an empty form
    $user = new User;
}

?>

<?php include SHARED_PATH . '/admin_header.php';?>

<main>

  <h2>Create User</h2>

  <section class="grid content-grid">

    <aside>
      <?php include '../navigation.php';?>
    </aside>

    <section class="content">

      <?php echo display_errors($user->errors); ?>

        <form action="<?php echo url_for('/admin/users/new.php'); ?>" method="post">

          <?php include './form_fields.php';?>

          <input class="btn" type="submit" value="Create User" />

        </form>

    </section>

  </section>
</main>

<?php include SHARED_PATH . '/footer.php';?>