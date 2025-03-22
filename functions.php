<?php
/**
 * Ajoute des fonctionnalités au thème WordPress.
 */

if (!function_exists('mon_theme_supports')) {
    function mon_theme_supports() {
        // Support pour le titre automatique
        add_theme_support('title-tag');

        // Activation des menus
        add_theme_support('menus');

        // Activation des images mises en avant (featured images)
        add_theme_support('post-thumbnails');

        // Activation des flux RSS automatiques
        add_theme_support('automatic-feed-links');

        // Ajout du support du logo personnalisé
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
 * Chargement des styles CSS du thème.
 */
if (!function_exists('theme_tp_enqueue_styles')) {
    function theme_tp_enqueue_styles() {
        // Normalisation des styles avec Normalize.css
        wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1', 'all');

        // Feuille de style principale du thème
        wp_enqueue_style('main-style', get_stylesheet_uri(), array('normalize'), filemtime(get_stylesheet_directory() . '/style.css'), 'all');
    }
}
add_action('wp_enqueue_scripts', 'theme_tp_enqueue_styles');

/**
 * Modifie la requête principale de WordPress avant qu'elle soit exécutée.
 * Ce hook `pre_get_posts` intervient juste avant l'exécution de la requête principale.
 * Ici, nous filtrons la requête de la page d'accueil pour afficher uniquement les articles de la catégorie "populaire".
 *
 * @param WP_Query $query La requête principale de WordPress.
 */
if (!function_exists('modifie_requete_principale')) {
    function modifie_requete_principale($query) {
        if ($query->is_home() && $query->is_main_query() && !is_admin()) {
            $query->set('category_name', 'populaire'); // Filtrer par catégorie
            $query->set('orderby', 'title'); // Trier par titre
            $query->set('order', 'ASC'); // Ordre alphabétique croissant
        }
    }
}
add_action('pre_get_posts', 'modifie_requete_principale');
?>
