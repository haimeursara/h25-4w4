<?php
/**
 * Template Name: Pays
 */
get_header();
?>

<main class="page-pays">
  <section class="page-pays__intro">
    <h1>Les plus beaux pays</h1>
    <p>
      Plongez au cœur de l’aventure et laissez-vous emporter par l’appel du large ! Notre planète regorge de destinations incroyables, chacune promettant une expérience unique et mémorable. Que vous rêviez de plages idylliques baignées de soleil, de sommets majestueux invitant à la randonnée, de villes vibrantes d’histoire et de modernité, ou de rencontres culturelles authentiques, il y a un pays fait pour vous.
    </p>

    <!-- Galerie de 6 images -->
    <div class="page-pays__galerie">
      <figure><img src="<?php echo get_template_directory_uri(); ?>/images/img1.jpg" alt="Pays 1"></figure>
      <figure><img src="<?php echo get_template_directory_uri(); ?>/images/img2.jpg" alt="Pays 2"></figure>
      <figure><img src="<?php echo get_template_directory_uri(); ?>/images/img3.jpg" alt="Pays 3"></figure>
      <figure><img src="<?php echo get_template_directory_uri(); ?>/images/img4.jpg" alt="Pays 4"></figure>
      <figure><img src="<?php echo get_template_directory_uri(); ?>/images/img5.webp" alt="Pays 5"></figure>
      <figure><img src="<?php echo get_template_directory_uri(); ?>/images/img6.webp" alt="Pays 6"></figure>
    </div>
  </section>

  <?php creer_vague('#FFCA28', '#fff5e1'); ?>

  <section class="page-pays__restapi">
    <h2>Destinations par pays</h2>
    <div class="pays__boutons"></div>
    <div class="pays__resultats"></div>
  </section>

  <?php creer_vague('#fff5e1', '#3E2723'); ?>
</main>

<?php get_footer(); ?>
