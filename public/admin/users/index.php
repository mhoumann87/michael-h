<?php
require_once '../../../private/initialize.php';

require_login();

$page_title = '- All Users';

$id = $_SESSION['user_id'];


if (!is_admin()) {
  redirect_to(url_for('/admin/users/show.php?id='.$id));
}

//* Get the users form the database
$users = User::find_all();

// var_dump($users);

include_once SHARED_PATH.'/admin_header.php';

?>

<h2>All Users</h2>

<aside>
  <?php include './navigation.php'; ?>
</aside>

<main>
  <table>
    <tr>
      <th>User Id</th>
      <th>User Name</th>
      <th>Email</th>
      <th>Role</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
    </tr>

    <?php foreach ($users as $user) { ?>

      <tr>
        <td><?php echo h($user->user_id); ?></td>
        <td><?php echo h($user->username); ?></td>
        <td><?php echo h($user->email); ?></td>
        <td><?php echo $user->is_admin == 1 ? 'Administrator' : 'User'; ?></td>
        <td><a href="<?php echo url_for('/admin/users/show.php?id='.$user->user_id)?>">Show</a></td>
        <td><a href="<?php echo url_for('/admin/users/edit.php?id='.$user->user_id)?>">Edit</a></td>
        <td><a href="<?php echo url_for('/admin/users/delete.php?id='.$user->user_id)?>">Delete</a></td>
      </tr>

    <?php } ?>
  </table>
</main>

<?php include SHARED_PATH.'/footer.php';

