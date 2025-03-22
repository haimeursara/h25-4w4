<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="carte carte--grande">
        
        <div class="carte__contenu">

            <!-- Image mise en avant -->
            <?php if (has_post_thumbnail()) : ?>
                <figure class="carte__image">
                    <?php the_post_thumbnail('thumbnail', ['alt' => get_the_title()]); ?>
                </figure>
            <?php endif; ?>

            <!-- Titre de l'article -->
            <h2 class="carte__titre"><?php the_title(); ?></h2>

            <!-- Description / Extrait de l'article -->
            <p class="carte__description"><?php echo wp_trim_words(get_the_excerpt(), 20, "..."); ?></p>

            <!-- Affichage des catégories -->
            <div class="carte__categories">
                <?php
                $categories = get_the_category();
                if (!empty($categories)) :
                    foreach ($categories as $category) :
                        echo '<span class="carte__categorie">' . esc_html($category->name) . '</span> ';
                    endforeach;
                endif;
                ?>
            </div>

            <!-- Températures -->
            <?php if (get_field("temperature_minimale") || get_field("temperature_maximale")) : ?>
                <p>Température minimale : <?php echo esc_html(get_field("temperature_minimale")); ?> °C</p>
                <p>Température maximale : <?php echo esc_html(get_field("temperature_maximale")); ?> °C</p>
            <?php endif; ?>

            <!-- Bouton de lecture de l'article -->
            <a class="carte__bouton carte__bouton--actif" href="<?php the_permalink(); ?>" role="button">Voir plus...</a>

        </div>

    </article>
<?php endwhile; wp_reset_postdata(); else : ?>
    <p class="carte__message">Aucun article disponible pour le moment.</p>
<?php endif; ?>
