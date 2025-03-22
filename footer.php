<!-- Pied de page -->
<footer class="piedpage">
    <div class="piedpage__container global">

        <!-- Section principale du footer -->
        <section class="piedpage__s1">

            <!-- Menu externe + recherche -->
            <div class="piedpage__s1__menuRecherche">
                <?php
                wp_nav_menu(array(
                    "theme_location"  => "externe",
                    "container"       => "nav",
                    "container_class" => "piedpage__s1__externe",
                    "fallback_cb"     => false
                ));
                ?>
                
                <!-- Formulaire de recherche (Desktop) -->
                <div class="piedpage__s1__adresse__recherche recherche__ordi">
                    <?php get_search_form(); ?>
                </div>
            </div>

            <!-- Coordonnées et réseaux sociaux -->
            <div class="piedpage__s1__adresse">
                <p class="piedpage__s1__coord">HAIMEUR SARA</p>
                <p class="piedpage__s1__coord">
                    2901 rue Sherbrooke E<br> 
                    123-456-7899<br> 
                    <a href="mailto:info@cmaisonneuve.qc.ca">info@cmaisonneuve.qc.ca</a>
                </p> 

                <!-- Icônes sociales avec accessibilité -->
                <div class="piedpage__s1__icone-app">
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

            <!-- Description de l'agence -->
            <div class="piedpage__s1__description">
                UTOPIE Voyage est bien plus qu’une simple agence de voyages : c’est une invitation à découvrir le monde autrement.
                Que vous rêviez d’évasions insolites, de destinations paradisiaques ou d’expériences authentiques, nous créons des itinéraires sur mesure.
                Avec UTOPIE Voyage, chaque voyage devient une exploration hors du commun, où confort, découverte et émerveillement se rencontrent.
            </div>

        </section>

        <!-- Formulaire de recherche mobile -->
        <div class="piedpage__s1__adresse__recherche recherche__cell">
            <?php get_search_form(); ?>
        </div>

        <!-- Section bas de page (ex: mentions légales, copyright...) -->
        <section class="piedpage__s2">
            <p>&copy; <?php echo date('Y'); ?> UTOPIE Voyage. Tous droits réservés.</p>
        </section>

    </div>
</footer>

<!-- Appels de scripts WordPress -->
<?php wp_footer(); ?>
</body>
</html>
