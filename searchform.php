<form class="recherche" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="search-input" class="screen-reader-text">Rechercher :</label>
    <input id="search-input" class="recherche__input" type="search" name="s" placeholder="Rechercher..." 
           value="<?php echo get_search_query(); ?>" aria-label="Rechercher un contenu">
    <button class="recherche__bouton" type="submit">
        <img src="https://s2.svgbox.net/hero-outline.svg?ic=search" alt="Rechercher" width="20" height="20">
    </button>
</form>
