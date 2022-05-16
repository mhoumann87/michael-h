<?php

if (!isset($page_title)) {
    $page_title = ' - Web Developer';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>michael-h.dk <?php echo $page_title; ?></title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=PT+Serif:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="<?php echo url_for('/assets/css/styles.css'); ?>">
</head>

<body class="grid">
  <a href="#main" class="skip-to-content">Skip to main content</a>

  <header>

    <section class="content container flex">

      <div class="logo">
        <img src="<?php echo url_for('/assets/images/logo.svg'); ?>" alt="logo" />
      </div>

      <input
        type="checkbox"
        name="open-menu"
        class="open-menu"
        id="open-menu"
        role="button"
        />

      <label for="open-menu" role="button" class="menu-icon-toggle">
        <span class="sr-only">Menu</span>

        <div class="menu-line line1 diagonal"></div>
        <div class="menu-line horizontal"></div>
        <div class="menu-line line2 diagonal"></div>
      </label>

      <nav role="primary-navigation" class="primary-navigation">

        <ul
          id="primary-navigation"
          class="flex primary-navigation__list"
          data-visible="false"
        >

          <li><a href="#">Home</a></li>
          <li><a href="#">Portfolio</a></li>
          <li><a href="#">News</a></li>
          <li><a href="#">Photography</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>

        </ul>

      </nav>

    </section>

  </header>
