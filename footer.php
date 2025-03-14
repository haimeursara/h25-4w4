<footer>
    <div class="piedpage global">
        <section class="piedpage__s1">
            <div class="piedpage__s1__externe">
                <p class="piedpage__s1__externe__titre hero_couleur">Liste de Liens</p>
                <?php wp_nav_menu(array("menu" => "externe", "container" => "nav")); ?>
            </div>
            <div class="piedpage__s1__adresse">
                <div class="piedpage__s1__adresse__coord hero_couleur">
                    <?php echo esc_html(get_theme_mod('footer_adresse', 'Adresse par défaut')); ?> | 
                    <?php echo esc_html(get_theme_mod('footer_lieu', 'Lieu par défaut')); ?> | 
                    <?php echo esc_html(get_theme_mod('footer_telephone', 'Téléphone par défaut')); ?>
                </div>
                <div class="piedpage__s1__adresse__recherche">
                    <?php get_search_form(); ?>
                </div>
            </div>
            <div class="piedpage__s1__description hero_couleur">
                <p class="piedpage__s1__description__titre hero_couleur">Qui sommes-nous?</p>
                <?php echo esc_html(get_theme_mod('footer_mission', 'Notre mission par défaut')); ?>
            </div>
        </section>
    </div>
</footer>
<?php wp_footer(); ?>
