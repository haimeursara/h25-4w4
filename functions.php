<?php

// === Chargement de fonctions additionnelles ===
$functions_dir = get_template_directory() . '/functions/';
$function_files = array('genere-boutons.php');

foreach ($function_files as $file) {
    include_once $functions_dir . $file;
}

// === SUPPORTS DU THÈME ===
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

    // ✅ Menus WordPress
    register_nav_menus([
        'principal' => __('Menu principal', 'theme_tp'),
        'externe'   => __('Menu externe', 'theme_tp'),
    ]);
}
add_action('after_setup_theme', 'mon_theme_supports');

// === ENQUEUE CSS/JS ===
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

// === MODIFIE LA REQUÊTE DE L'ACCUEIL (POPULAIRE) ===
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
    // Section HERO (exemple)
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

    // Section HERO CARROUSEL
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
add_action('customize_register', 'theme_tp_customize_register');

// === SVG ANIMÉ POUR FOOTER ===
function afficher_svg_footer($color = "#3E2723", $height = "100") {
    echo '<div class="svg-separateur" style="width:100%; height:' . esc_attr($height) . 'px; overflow:hidden; margin-bottom:-1px;">
        <svg class="svg-vague" viewBox="0 0 1440 320" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
            <path fill="' . esc_attr($color) . '" fill-opacity="1">
                <animate 
                    attributeName="d"
                    dur="8s"
                    repeatCount="indefinite"
                    values="
                        M0,64L48,69.3C96,75,192,85,288,101.3C384,117,480,139,576,154.7C672,171,768,181,864,165.3C960,149,1056,107,1152,90.7C1248,75,1344,85,1392,90.7L1440,96V320H0Z;
                        M0,96L60,101.3C120,107,240,117,360,122.7C480,128,600,128,720,144C840,160,960,192,1080,197.3C1200,203,1320,181,1380,170.7L1440,160V320H0Z;
                        M0,64L48,69.3C96,75,192,85,288,101.3C384,117,480,139,576,154.7C672,171,768,181,864,165.3C960,149,1056,107,1152,90.7C1248,75,1344,85,1392,90.7L1440,96V320H0Z
                    "
                />
            </path>
        </svg>
    </div>';
}
function creer_vague($couleur_haut, $couleur_bas) {
  echo '
    <div style="background:' . esc_attr($couleur_bas) . '; position: relative;">
      <svg viewBox="0 0 1440 320" preserveAspectRatio="none" style="display:block; width:100%; height:80px; background:' . esc_attr($couleur_haut) . '">
        <path fill="' . esc_attr($couleur_bas) . '" fill-opacity="1"
          d="M0,160L60,144C120,128,240,96,360,117.3C480,139,600,213,720,229.3C840,245,960,203,1080,181.3C1200,160,1320,160,1380,160L1440,160V320H0Z">
        </path>
      </svg>
    </div>';
}
wp_enqueue_script(
  'destination_restapi',
  get_template_directory_uri() . '/js/destinations.js',
  [],
  filemtime(get_template_directory() . '/js/destinations.js'),
  true
);


