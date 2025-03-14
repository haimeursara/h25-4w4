<?php
function theme_tp_customize_register($wp_customize) {
    // Section Hero
    $wp_customize->add_section('hero_section', array(
        'title' => __('Section Hero', 'theme_tp'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('hero_auteur', array(
        'default' => __('Sara Haimeur', 'theme_tp'),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('hero_auteur', array(
        'label' => __('Auteur', 'theme_tp'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_mail', array(
        'default' => __('Adresse Mail', 'theme_tp'),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('hero_mail', array(
        'label' => __('Hero Email', 'theme_tp'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_lieu', array(
        'default' => __('Adresse Physique (lieu)', 'theme_tp'),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('hero_lieu', array(
        'label' => __('Hero Lieu', 'theme_tp'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_telephone', array(
        'default' => __('Numéro de téléphone', 'theme_tp'),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('hero_telephone', array(
        'label' => __('Hero Telephone', 'theme_tp'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_background', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background', array(
        'label' => __('Image en arrière-plan', 'theme_tp'),
        'section' => 'hero_section',
    )));

    $wp_customize->add_setting('hero_couleur', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_couleur', array(
        'label' => __('Couleur du texte', 'theme_tp'),
        'section' => 'hero_section',
    )));

    $wp_customize->add_section('footer_section', array(
        'title' => __('Footer Customisation', 'theme_tp'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('footer_mission', array(
        'default' => __('Notre mission', 'theme_tp'),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('footer_mission', array(
        'label' => __('Mission', 'theme_tp'),
        'section' => 'footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('footer_adresse', array(
        'default' => __('Adresse', 'theme_tp'),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('footer_adresse', array(
        'label' => __('Adresse', 'theme_tp'),
        'section' => 'footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('footer_lieu', array(
        'default' => __('Lieu physique', 'theme_tp'),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('footer_lieu', array(
        'label' => __('Lieu physique', 'theme_tp'),
        'section' => 'footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('footer_telephone', array(
        'default' => __('Numéro de téléphone', 'theme_tp'),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('footer_telephone', array(
        'label' => __('Numéro de téléphone', 'theme_tp'),
        'section' => 'footer_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'theme_tp_customize_register');

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
add_action( 'after_setup_theme', 'mon_theme_supports' );


function theme_4w4_enqueue_styles() { 
wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css');  
wp_enqueue_style('mon-style-style', get_stylesheet_uri()); 
} 
/* 
*/
add_action('wp_enqueue_scripts', 'theme_4w4_enqueue_styles');

/**
 * Modifie la requete principale de WordPress avant qu'elle soit exécuté
 * le hook « pre_get_posts » se manifeste juste avant d'exécuter la requête principal
 * Dépendant de la condition initiale on peut filtrer un type particulier de requête
 * Dans ce cas ci nous filtrons la requête de la page d'accueil
 * @param WP_query  $query la requête principal de WP
 */


function modifie_requete_principal( $query ) {
    if ( $query->is_home() && $query->is_main_query() && ! is_admin() ) {
      $query->set( 'category_name', 'populaire' );
      $query->set( 'orderby', 'title' );
      $query->set( 'order', 'ASC' );
      }
     }
     add_action( 'pre_get_posts', 'modifie_requete_principal' );


?>