<?php get_header(); ?>

<main class="populaire">
    <div class="global carteSingle">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="carteSingle__contenu">

                <!-- Image mise en avant -->
                <?php if (has_post_thumbnail()) : ?>
                    <figure class="carteSingle__image">
                        <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
                    </figure>
                <?php endif; ?>

                <!-- Titre de l'article -->
                <h2 class="carteSingle__titre"><?php the_title(); ?></h2>

                <!-- Contenu de l'article -->
                <div class="carteSingle__temperature">
                    <?php the_content(); ?>
                    
                    <!-- Champs personnalisés pour la température -->
                    <?php if (get_field("temperature_minimale") || get_field("temperature_maximale")) : ?>
                        <p>Température minimale : <?php echo esc_html(get_field("temperature_minimale")); ?> °C</p>
                        <p>Température maximale : <?php echo esc_html(get_field("temperature_maximale")); ?> °C</p>
                    <?php endif; ?>
                </div>

                <!-- Boutons de navigation -->
                <div class="carteSingle__navigation">
                    <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="carteSingle__retour">← Retour aux articles</a>
                    <div class="carteSingle__nav-links">
                        <?php previous_post_link('%link', 'Article précédent'); ?>
                        <?php next_post_link('%link', 'Article suivant'); ?>
                    </div>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); else : ?>
            <p class="carteSingle__message">Désolé, aucun contenu disponible pour cet article.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
