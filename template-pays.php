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
