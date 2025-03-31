<?php
/**
 * front-page.php - Modèle pour afficher la page d'accueil
 */
get_header();
?>

<main>

    <!-- SECTION HERO -->
    <section class="hero">
        <div class="hero__contenu global">
            <h1 class="hero__titre">Voyager autrement avec UTOPIE Voyage!</h1>
            <p class="hero__description">
                UTOPIE Voyage est bien plus qu’une simple agence de voyages : c’est une invitation à découvrir le monde autrement.
                Que vous rêviez d’évasions insolites, de destinations paradisiaques ou d’expériences authentiques, nous créons des itinéraires sur mesure pour vous faire vivre des aventures uniques.
            </p>

            <button class="hero__bouton">Inscription</button>

            <p class="hero__info-top">HAIMEUR SARA</p>
            <p class="hero__info">
                2901 Sherbrooke St E<br> 
                123-456-7899<br> 
                info@cmaisonneuve.qc.ca
            </p>

            <div class="hero__icone-app">
                <a href="#" aria-label="Facebook">
                    <img src="https://s2.svgbox.net/social.svg?ic=facebook&color=000000" width="20" height="20">
                </a>
                <a href="#" aria-label="LinkedIn">
                    <img src="https://s2.svgbox.net/social.svg?ic=linkedin&color=000000" width="20" height="20">
                </a>
                <a href="#" aria-label="PayPal">
                    <img src="https://s2.svgbox.net/social.svg?ic=paypal&color=000000" width="20" height="20">
                </a>
                <a href="#" aria-label="Stack Overflow">
                    <img src="https://s2.svgbox.net/social.svg?ic=stackoverflow&color=000000" width="20" height="20">
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION ARTICLES POPULAIRES -->
    <section class="populaire">
        <div class="boite__flex global">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    
                    <!-- Vérifie si l'article appartient à la catégorie "galerie" -->
                    <?php if (in_category('galerie')) : ?>
                        <?php the_content(); ?>
                    <?php else : ?>

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

                                <!-- Extrait de l'article -->
                                <p class="carte__description"><?php echo wp_trim_words(get_the_excerpt(), 20, "..."); ?></p>

                                <!-- Affichage des catégories associées -->
                                <div class="carte__categories">
                                    <?php
                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        foreach ($categories as $category) {
                                            echo '<span class="carte__categorie">' . esc_html($category->name) . '</span> ';
                                        }
                                    }
                                    ?>
                                </div>

                                <!-- Températures minimales et maximales -->
                                <?php if (get_field("temperature_minimale") || get_field("temperature_maximale")) : ?>
                                    <p>Température minimale : <?php echo esc_html(get_field("temperature_minimale")); ?> °C</p>
                                    <p>Température maximale : <?php echo esc_html(get_field("temperature_maximale")); ?> °C</p>
                                <?php endif; ?>

                                <!-- Lien vers l'article -->
                                <a class="carte__bouton carte__bouton--actif" href="<?php the_permalink(); ?>">Voir plus...</a>

                            </div>
                        </article>

                    <?php endif; ?>
                    
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="populaire__message">Aucun article disponible pour le moment.</p>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
