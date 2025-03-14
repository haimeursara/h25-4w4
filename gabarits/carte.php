<?php
if (has_post_thumbnail()) {
  the_post_thumbnail('thumbnail');
}
?>
<div class="carte__contenu--texte">
  <h2 class="carte__titre">
    <?php the_title(); ?>
  </h2>
  <p class="carte__description">
    <?php echo wp_trim_words(get_the_excerpt(), 20, "..."); ?>
  </p>

  <p>Temp. Min: <?php echo the_field("temperature_minimum"); ?> °C</p>
  <p>Temp. Max: <?php echo the_field("temperature_maximum"); ?> °C</p>


  <a class="carte__bouton carte__bouton--actif" href="<?php the_permalink(); ?>">Suite</a>

  <?php the_category(); ?>
</div>