<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UTOPIE Voyage</title>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/normalize.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <?php wp_head(); ?>
</head>
<body>
<header class="entete">
  <figure class="entete__logo">
    <?php
      if (function_exists('the_custom_logo') && has_custom_logo()) {
        the_custom_logo();
      } else {
        echo '<img src="' . get_template_directory_uri() . '/images/logo.png" alt="Logo UTOPIE Voyage" height="40">';
      }
    ?>
  </figure>


  <input type="checkbox" id="chk__burger" class="chk__burger">


  <label for="chk__burger" class="burger">
    <img src="https://s2.svgbox.net/hero-outline.svg?ic=menu" alt="Menu" width="32" height="32">
  </label>


  <nav class="entete__nav">
    <?php
      wp_nav_menu(array(
        'theme_location' => 'principal',
        'container' => false,
        'menu_class' => 'menu',
        'fallback_cb' => false,
      ));
    ?>
  </nav>


  <div class="entete__recherche">
    <?php get_search_form(); ?>
  </div>
</header>
