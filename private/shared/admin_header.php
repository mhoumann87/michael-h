<?php

if (!isset($page_title)) {
  $page_title = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Area <?php echo $page_title; ?></title>
  <link rel="stylesheet" href="<?php echo url_for('/assets/css/styles.css'); ?>">
</head>
<body>

<header>
  <div class="logo">
  <img src="<?php echo url_for('/assets/images/logo.svg'); ?>" alt="logo" />
  </div>
  

  <?php include SHARED_PATH.'/admin_nav.php'; ?>

</header>

<div class="container">

<?php echo display_session_message();?> 


