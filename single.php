<?php
/**
 * single.php - Modèle pour afficher un article unique
 */
get_header();
?>

<main class="populaire">
    <div class="global carteSingle">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="populaire__article">
                
                <!-- Image mise en avant -->
                <?php if (has_post_thumbnail()) : ?>
                    <figure class="populaire__image">
                        <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
                    </figure>
                <?php endif; ?>

                <!-- Titre de l'article -->
                <h1 class="populaire__titre"><?php the_title(); ?></h1>

                <!-- Contenu de l'article -->
                <div class="populaire__contenu">
                    <?php the_content(); ?>
                </div>

                <!-- Navigation entre les articles -->
                <div class="populaire__navigation">
                    <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="populaire__retour">← Retour aux articles</a>
                    <div class="populaire__nav-links">
                        <?php previous_post_link('%link', 'Article précédent'); ?>
                        <?php next_post_link('%link', 'Article suivant'); ?>
                    </div>
                </div>

            </article>
        <?php endwhile; wp_reset_postdata(); else : ?>
            <p class="populaire__message">Désolé, aucun contenu disponible pour cet article.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
