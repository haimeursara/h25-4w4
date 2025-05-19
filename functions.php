<?php

// Chemin vers le dossier functions
$functions_dir = get_template_directory() . '/functions/';
$function_files = array('genere-boutons.php');

foreach ($function_files as $file) {
    include_once $functions_dir . $file;
}

// === SUPPORTS ===
function mon_theme_supports() {
    add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'mon_theme_supports');

// === STYLES & JS ===
function theme_4w4_enqueue_styles() {
    wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css');
    wp_enqueue_style('mon-style-style', get_stylesheet_uri());

    wp_enqueue_script(
        'destination_restapi',
        get_template_directory_uri() . '/js/destination.js',
        [],
        filemtime(get_template_directory() . '/js/destination.js'),
        true
    );

    wp_enqueue_script(
        'hero-carousel',
        get_template_directory_uri() . '/js/carousel.js',
        [],
        filemtime(get_template_directory() . '/js/carousel.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'theme_4w4_enqueue_styles');

// === PAGE D'ACCUEIL : SEULEMENT CATÉGORIE POPULAIRE ===
function modifie_requete_principal($query) {
    if ($query->is_home() && $query->is_main_query() && !is_admin()) {
        $query->set('category_name', 'populaire');
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
}
add_action('pre_get_posts', 'modifie_requete_principal');

// === CUSTOMIZER ===
function theme_tp_customize_register($wp_customize) {
    $wp_customize->add_section('hero_section', array(
        'title' => __('Section Hero', 'theme_tp'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('hero_auteur', array(
        'default' => __('Eddy Martin', 'theme_tp'),
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('hero_auteur', array(
        'label' => __('Auteur', 'theme_tp'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_background', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background', array(
        'label' => __('Image en arrière plan', 'theme_tp'),
        'section' => 'hero_section',
    )));

    // === Hero Carrousel dynamique ===
    $wp_customize->add_section('hero_carrousel_section', [
        'title'    => __('Hero Carrousel', 'theme_tp'),
        'priority' => 31,
    ]);

    $wp_customize->add_setting('hero_carrousel_number', [
        'default'           => 3,
        'sanitize_callback' => 'absint',
    ]);

    $wp_customize->add_control('hero_carrousel_number', [
        'label'       => __('Nombre d\'images du carrousel'),
        'section'     => 'hero_carrousel_section',
        'type'        => 'number',
        'input_attrs' => ['min' => 1, 'max' => 10],
    ]);

    for ($i = 1; $i <= 10; $i++) {
        $wp_customize->add_setting("hero_carrousel_image_$i", [
            'sanitize_callback' => 'esc_url_raw',
        ]);

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "hero_carrousel_image_$i", [
            'label'    => __("Image Carrousel #$i", 'theme_tp'),
            'section'  => 'hero_carrousel_section',
            'settings' => "hero_carrousel_image_$i",
        ]));
    }
}
function afficher_svg_footer($color = "#ffffff", $height = "80", $position = "bottom") {
    echo '<div class="svg-separateur" style="position:relative; overflow:hidden;">
        <svg viewBox="0 0 1440 320" width="100%" height="' . esc_attr($height) . '">
            <path fill="' . esc_attr($color) . '" fill-opacity="1"
                d="M0,64L48,69.3C96,75,192,85,288,101.3C384,117,480,139,576,154.7C672,171,768,181,864,165.3C960,149,1056,107,1152,90.7C1248,75,1344,85,1392,90.7L1440,96V320H0Z">
            </path>
        </svg>
    </div>';
}
add_action('customize_register', 'theme_tp_customize_register');
