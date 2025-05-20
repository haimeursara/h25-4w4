<?php
/**
 * front-page.php - Modèle pour afficher la page d'accueil
 */
get_header();
?>

<main>

    <!-- SECTION HERO AVEC CARROUSEL EN BACKGROUND -->
    <section class="hero">

        <!-- Carrousel dynamique en background -->
        <div class="hero__background">
            <?php
            $nb_images = get_theme_mod('hero_carrousel_number', 3);
            for ($i = 1; $i <= $nb_images; $i++) :
                $img = get_theme_mod("hero_carrousel_image_$i");
                if (!$img) continue;
            ?>
                <input type="radio" name="carrousel" id="slide<?= $i ?>" class="hero__radio__input" <?= $i === 1 ? 'checked' : '' ?>>
                <label for="slide<?= $i ?>" class="hero__radio__label"></label>
                <div class="hero__slide" style="background-image: url('<?= esc_url($img) ?>')"></div>
            <?php endfor; ?>
        </div>

        <!-- Contenu Hero animé -->
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
                    <img src="https://s2.svgbox.net/social.svg?ic=facebook&color=ffffff" width="20" height="20">
                </a>
                <a href="#" aria-label="LinkedIn">
                    <img src="https://s2.svgbox.net/social.svg?ic=linkedin&color=ffffff" width="20" height="20">
                </a>
                <a href="#" aria-label="PayPal">
                    <img src="https://s2.svgbox.net/social.svg?ic=paypal&color=ffffff" width="20" height="20">
                </a>
                <a href="#" aria-label="Stack Overflow">
                    <img src="https://s2.svgbox.net/social.svg?ic=stackoverflow&color=ffffff" width="20" height="20">
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION ARTICLES POPULAIRES -->
    <section class="populaire">
        <div class="boite__flex global">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php if (in_category('galerie')) : ?>
                        <?php the_content(); ?>
                    <?php else : ?>
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
                                    if (!empty($categories)) {
                                        foreach ($categories as $category) {
                                            echo '<span class="carte__categorie">' . esc_html($category->name) . '</span> ';
                                        }
                                    }
                                    ?>
                                </div>

                                <?php if (get_field("temperature_minimale") || get_field("temperature_maximale")) : ?>
                                    <p>Température minimale : <?php echo esc_html(get_field("temperature_minimale")); ?> °C</p>
                                    <p>Température maximale : <?php echo esc_html(get_field("temperature_maximale")); ?> °C</p>
                                <?php endif; ?>

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

    <!-- SECTION DESTINATIONS : catégories dynamiques -->
    <section class="destination">
        <h2 class="destination__titre">Articles de la catégorie</h2>
        <?php categorie_par_destination("Populaire"); ?>
        <div class="destination__list"></div>
    </section>

</main>
<?php get_footer(); ?>
