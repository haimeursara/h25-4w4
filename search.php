<?php
get_header();
?>

<main class="search-results">
    <div class="boite__flex global">
        <h1 class="search-results__title">
            Résultats de recherche pour : <span class="search-term"><?php echo get_search_query(); ?></span>
        </h1>

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="populaire__article">
                    <h2 class="populaire__titre">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <div class="populaire__contenu">
                        <?php echo wp_trim_words(get_the_excerpt(), 50, "..."); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="search-results__link">Lire la suite</a>
                </article>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); // Réinitialise les données globales ?>
        <?php else : ?>
            <div class="search-results__empty">
                <h2>Aucun résultat trouvé pour : "<?php echo get_search_query(); ?>"</h2>
                <p>Essayez avec d'autres mots-clés ou consultez nos articles récents :</p>

                <ul class="search-results__suggestions">
                    <?php
                    $recent_posts = wp_get_recent_posts(array('numberposts' => 5, 'post_status' => 'publish'));
                    foreach ($recent_posts as $post) :
                    ?>
                        <li>
                            <a href="<?php echo get_permalink($post['ID']); ?>">
                                <?php echo esc_html($post['post_title']); ?>
                            </a>
                        </li>
                    <?php endforeach; wp_reset_query(); ?>
                </ul>

                <!-- Formulaire de recherche pour relancer une recherche -->
                <div class="search-results__form">
                    <h3>Faire une nouvelle recherche :</h3>
                    <?php get_search_form(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
