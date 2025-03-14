<?php get_header(); ?>

<?php  
$hero_auteur = get_theme_mod('hero_auteur', 'Haimeur Sara');
$hero_background = get_theme_mod('hero_background', '');
$hero_text_color = get_theme_mod('hero_couleur', '');
$hero_email = get_theme_mod('hero_mail', '');
$hero_lieu = get_theme_mod('hero_lieu', '');
$hero_telephone = get_theme_mod('hero_telephone', '');
?>

<style>
    .hero_couleur{
        color: <?php echo esc_attr($hero_text_color); ?>;
    }
</style>

<section class="hero" style="background-image: url(<?php echo esc_url($hero_background); ?>)">
    <div class="hero__contenu global">
        <h1 class="hero__titre hero_couleur"> <?php bloginfo('name'); ?> </h1>
        <p class="hero__description hero_couleur"> <?php bloginfo('description'); ?> </p>
        <p class="hero__courriel hero_couleur"> <?php echo esc_html($hero_email); ?> </p>
        <p class="hero__adresse hero_couleur"> <?php echo esc_html($hero_lieu); ?> </p>
        <p class="hero__telephone hero_couleur"> <?php echo esc_html($hero_telephone); ?> </p>
        <p class="hero__auteur hero_couleur">Auteur : <?php echo esc_html($hero_auteur); ?></p>
        <div class="hero__icone">
            <img src="https://s2.svgbox.net/social.svg?ic=facebook&color=000" width="32" height="32">
            <img src="https://s2.svgbox.net/social.svg?ic=instagram&color=000" width="32" height="32">
        </div>
    </div>
</section>

<section class="populaire">
    <div class="global">
        <?php if (have_posts()) : while (have_posts()) : the_post(); 
            if (in_category("galerie"))  {
                the_content();
            } else {  
                get_template_part('gabarits/carte'); 
            }
        endwhile; endif; ?>
    </div>
</section>

<?php get_footer(); ?>

</body>
</html>
