<?php
/**
 * Ajoute des fonctionnalités au thème WordPress.
 */

if (!function_exists('mon_theme_supports')) {
    function mon_theme_supports() {
        add_theme_support('title-tag');
        add_theme_support('menus');
        add_theme_support('post-thumbnails');
        add_theme_support('automatic-feed-links');
        add_theme_support('custom-logo', array(
            'height'      => 150,
            'width'       => 150,
            'flex-height' => true,
            'flex-width'  => true,
        ));
    }
}
add_action('after_setup_theme', 'mon_theme_supports');

/**
 * Enqueue styles CSS
 */
if (!function_exists('theme_tp_enqueue_styles')) {
    function theme_tp_enqueue_styles() {
        wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1', 'all');
        wp_enqueue_style('main-style', get_stylesheet_uri(), array('normalize'), filemtime(get_stylesheet_directory() . '/style.css'), 'all');
    }
}
add_action('wp_enqueue_scripts', 'theme_tp_enqueue_styles');

/**
 * Personnalisation du Customizer pour la page 404
 */
function theme_customize_register($wp_customize) {
    $wp_customize->add_section('section_404', array(
        'title' => __('Page 404', 'votre-theme'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('image_404');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'image_404', array(
        'label' => __('Image de fond pour la page 404'),
        'section' => 'section_404',
        'settings' => 'image_404',
    )));

    $wp_customize->add_setting('titre_404', array('default' => "Oops, vous avez échoué sur l'île 404 !"));
    $wp_customize->add_control('titre_404', array(
        'label' => __('Titre personnalisé'),
        'section' => 'section_404',
        'type' => 'text',
    ));

    $wp_customize->add_setting('message_404', array('default' => 'Pas de panique, cher membre explorateur...'));
    $wp_customize->add_control('message_404', array(
        'label' => __('Message personnalisé'),
        'section' => 'section_404',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('couleur_texte_404', array('default' => '#ffff00'));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur_texte_404', array(
        'label' => __('Couleur du texte'),
        'section' => 'section_404',
        'settings' => 'couleur_texte_404',
    )));
}
add_action('customize_register', 'theme_customize_register');

/**
 * Enregistrement d’un menu pour la page 404
 */
function register_404_menu() {
    register_nav_menu('menu_404', __('Menu de destinations 404', 'votre-theme'));
}
add_action('after_setup_theme', 'register_404_menu');

/**
 * Modifie la requête principale de WordPress pour la page d’accueil
 */
if (!function_exists('modifie_requete_principale')) {
    function modifie_requete_principale($query) {
        if ($query->is_home() && $query->is_main_query() && !is_admin()) {
            $query->set('category_name', 'populaire');
            $query->set('orderby', 'title');
            $query->set('order', 'ASC');
        }
    }
}
add_action('pre_get_posts', 'modifie_requete_principale');
?>
