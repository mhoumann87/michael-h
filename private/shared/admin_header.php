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

  <link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&family=Poiret+One&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="<?php echo url_for('/assets/css/styles.css'); ?>">
</head>

<body class="grid">

<header>

  <div class="container flex">
    <div class="logo">
    <img src="<?php echo url_for('/assets/images/logo.svg'); ?>" alt="logo" />
    </div>
  
    <?php include SHARED_PATH.'/admin_nav.php'; ?>
  </div>

</header>

<div class="container">

<?php echo display_session_message();?> 


