<?php
/**
 * category.php – modèle des catégories
 */
get_header(); ?>

<main>
    <section class="destination">
        <?php categorie_par_destination("Populaire"); ?>
        <h2 class="destination__titre">Articles de la catégorie "<?php single_cat_title(); ?>"</h2>

        <div class="destination__list">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="carte carte--grande">
                        <div class="carte__contenu">
                            <?php if (has_post_thumbnail()) : ?>
                                <figure class="carte__image">
                                    <?php the_post_thumbnail('thumbnail', ['alt' => get_the_title()]); ?>
                                </figure>
                            <?php endif; ?>

                            <h2 class="carte__titre"><?php the_title(); ?></h2>
                            <p class="carte__description"><?php echo wp_trim_words(get_the_excerpt(), 20, "..."); ?></p>

                            <div class="carte__categories">
                                <?php
                                $categories = get_the_category();
                                foreach ($categories as $category) {
                                    echo '<span class="carte__categorie">' . esc_html($category->name) . '</span> ';
                                }
                                ?>
                            </div>

                            <a class="carte__bouton carte__bouton--actif" href="<?php the_permalink(); ?>">Voir plus...</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <p>Aucun article trouvé dans cette catégorie.</p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
