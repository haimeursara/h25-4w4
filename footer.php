<?php afficher_svg_footer('#3E2723', '100'); ?>

<footer class="piedpage">
  <div class="piedpage__container global">

    <div class="piedpage__s1">

      <!-- Bloc 1 : Coordonnées + menu externe -->
      <div class="piedpage__bloc piedpage__infos">
        <p class="piedpage__nom">HAIMEUR SARA</p>
        <address class="piedpage__contact">
          2901 rue Sherbrooke E<br>
          123-456-7899<br>
          <a href="mailto:info@cmaisonneuve.qc.ca">info@cmaisonneuve.qc.ca</a>
        </address>

        <!-- Menu externe -->
        <nav class="footer__menu">
          <?php
            wp_nav_menu([
              'theme_location' => 'externe',
              'container' => false,
              'menu_class' => 'menu menu--footer',
              'fallback_cb' => false
            ]);
          ?>
        </nav>

        <!-- Icônes dynamiques -->
        <?php afficher_icones_sociaux(); ?>
      </div>

      <!-- Bloc 2 : Description -->
      <div class="piedpage__bloc piedpage__description">
        UTOPIE Voyage est bien plus qu’une simple agence de voyages : c’est une invitation à découvrir le monde autrement. Que vous rêviez d’évasions insolites, de destinations paradisiaques ou d’expériences authentiques, nous créons des itinéraires sur mesure.
      </div>

      <!-- Bloc 3 : Recherche desktop -->
      <div class="piedpage__bloc piedpage__recherche recherche__ordi">
        <?php get_search_form(); ?>
      </div>
    </div>

    <!-- Recherche mobile -->
    <div class="piedpage__recherche recherche__cell">
      <?php get_search_form(); ?>
    </div>

    <!-- Image personnalisée -->
    <?php if ($img = get_theme_mod('footer_image')): ?>
      <div class="footer__image">
        <img src="<?= esc_url($img); ?>" alt="Image destination sélectionnée" />
      </div>
    <?php endif; ?>

    <!-- Bas de page -->
    <div class="piedpage__s2">
      <p>&copy; <?= date('Y'); ?> UTOPIE Voyage – Tous droits réservés.</p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
