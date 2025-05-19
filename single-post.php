<?php get_header(); ?>

<main class="populaire">
    <div class="global carteSingle">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="carteSingle__contenu">

                <!-- Image mise en avant OU fallback -->
                <?php if (has_post_thumbnail()) : ?>
                    <figure class="carteSingle__image">
                        <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
                    </figure>
                <?php else : ?>
                    <figure class="carteSingle__image">
                        <img src="<?= get_template_directory_uri(); ?>/images/default.jpg" alt="Image par défaut">
                    </figure>
                <?php endif; ?>

                <!-- Titre -->
                <h2 class="carteSingle__titre"><?php the_title(); ?></h2>

                <!-- Métadonnées -->
                <div class="carteSingle__meta">
                    <p>Auteur : <?php the_author(); ?></p>
                    <p>Publié le : <?php echo get_the_date(); ?></p>
                    <p>Catégories : <?php the_category(', '); ?></p>
                </div>

                <!-- Contenu -->
                <div class="carteSingle__contenu__texte">
                    <?php the_content(); ?>
                </div>

                <!-- Températures -->
                <div class="carteSingle__temperature">
                    <?php if (get_field("temperature_minimale")) : ?>
                        <p>Température minimale : <?php echo esc_html(get_field("temperature_minimale")); ?> °C</p>
                    <?php endif; ?>
                    <?php if (get_field("temperature_maximale")) : ?>
                        <p>Température maximale : <?php echo esc_html(get_field("temperature_maximale")); ?> °C</p>
                    <?php endif; ?>
                    <?php if (get_field("temperature_moyenne")) : ?>
                        <p>Température moyenne : <?php echo esc_html(get_field("temperature_moyenne")); ?> °C</p>
                    <?php endif; ?>
                </div>

                <!-- Navigation -->
                <div class="carteSingle__navigation">
                    <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="carteSingle__retour">← Retour aux articles</a>
                    <div class="carteSingle__nav-links">
                        <?php previous_post_link('%link', '← Article précédent'); ?>
                        <?php next_post_link('%link', 'Article suivant →'); ?>
                    </div>
                </div>

            </article>
        <?php endwhile; wp_reset_postdata(); else : ?>
            <p class="carteSingle__message">Désolé, aucun contenu disponible pour cet article.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
