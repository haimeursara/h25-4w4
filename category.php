<?php

get_header();
?>

<main class="populaire">
    <div class="boite__flex global">

        <!-- Titre dynamique selon le contexte -->
        <header class="populaire__header">
            <?php if (is_home() && !is_front_page()) : ?>
                <h1 class="populaire__titre">Blog</h1>
            <?php elseif (is_category()) : ?>
                <h1 class="populaire__titre">Catégorie : <?php single_cat_title(); ?></h1>
            <?php elseif (is_tag()) : ?>
                <h1 class="populaire__titre">Étiquette : <?php single_tag_title(); ?></h1>
            <?php elseif (is_search()) : ?>
                <h1 class="populaire__titre">Résultats de recherche pour : "<?php echo get_search_query(); ?>"</h1>
            <?php elseif (is_archive()) : ?>
                <h1 class="populaire__titre"><?php the_archive_title(); ?></h1>
            <?php else : ?>
                <h1 class="populaire__titre">Articles récents</h1>
            <?php endif; ?>
        </header>

        <!-- Vérifie si des articles existent -->
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part("gabarit/carte"); ?>
            <?php endwhile; ?>

            <!-- Ajout de la pagination -->
            <div class="pagination">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => __('&laquo; Précédent', 'textdomain'),
                    'next_text' => __('Suivant &raquo;', 'textdomain'),
                ));
                ?>
            </div>

        <?php else : ?>
            <p class="populaire__message">Aucun article trouvé.</p>
        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>
