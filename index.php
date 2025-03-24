<?php
get_header(); 
?>

<main class="populaire">
    <div class="boite__flex global">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="populaire__article">
                    <h2 class="populaire__titre"><?php the_title(); ?></h2>
                    <div class="populaire__contenu">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="populaire__message">Désolé, aucun contenu disponible pour le moment.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
