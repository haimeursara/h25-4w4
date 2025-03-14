<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utopie Voyage</title>

    <?php wp_head(); ?>
</head>
<body>
    <header>
        <div class="entete global">
            <figure class="entete__logo-box">
                <?php
                if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
                ?>
            </figure>
            
            <label for="checkbox__burger" class="burger">
                <img class="burger__img" src="https://s2.svgbox.net/hero-outline.svg?ic=menu&color=000">
            </label>
            <input type="checkbox" id="checkbox__burger" class="checkbox__burger">

            <div class="entete__nav">
                <?php wp_nav_menu(array(
                    'menu' => 'principal',
                    'container' => 'nav',
                    'container_class' => 'entete__menu'
                )); ?>
                
                <?php get_search_form(); ?>
            </div>
        </div>
    </header>
