<?php get_header(); ?>

<?php
$image_404 = get_theme_mod('image_404');
$titre_404 = get_theme_mod('titre_404', "Oops, vous avez échoué sur l'île 404 !");
$message_404 = get_theme_mod('message_404', 'Pas de panique, cher membre explorateur ! Vous avez dérivé un peu trop loin des destinations de rêve que notre club a soigneusement sélectionnées pour vous. Reprenez votre périple en cliquant sur "Accueil" pour découvrir à nouveau nos voyages d’exception !');
$couleur_texte_404 = get_theme_mod('couleur_texte_404', '#ffff00');
?>

<main class="erreur404 global" style="background-image: url('<?php echo esc_url($image_404); ?>');">
    <section class="erreur404__contenu">
        <h1 class="erreur404__titre" style="color: <?php echo esc_attr($couleur_texte_404); ?>;"><?php echo esc_html($titre_404); ?></h1>
        <p class="erreur404__message" style="color: <?php echo esc_attr($couleur_texte_404); ?>;"><?php echo esc_html($message_404); ?></p>
        <a href="<?php echo esc_url(home_url()); ?>" class="erreur404__lien">Retour à l'accueil</a>

        <nav class="erreur404__menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu_404',
                'container' => false,
                'fallback_cb' => false,
                'menu_class' => '',
            ));
            ?>
        </nav>
    </section>
</main>

<?php get_footer(); ?>
