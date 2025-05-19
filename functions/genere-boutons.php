<?php

function categorie_par_destination($cat_a_retirer = '') {
    $categories = get_categories([
        'exclude' => get_cat_ID($cat_a_retirer),
        'orderby' => 'name',
        'order'   => 'ASC',
    ]);

    if (!empty($categories)) {
        echo '<ul class="boutons-categories">';
        foreach ($categories as $cat) {
            echo '<li class="bouton-categorie categorie__ul__li" data-category_id="' . esc_attr($cat->term_id) . '">';
            echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '">' . esc_html($cat->name) . '</a>';
            echo '</li>';
        }
        echo '</ul>';
    }
}
function afficher_icones_sociaux() {
    $icones = [];

    // Ajoute manuellement les icônes définies
    for ($i = 1; $i <= 2; $i++) {
        $url = get_theme_mod("icone_social_{$i}_url");
        $img = get_theme_mod("icone_social_{$i}_img");

        if ($url && $img) {
            $icones[] = ['url' => $url, 'img' => $img];
        }
    }

    if (!empty($icones)) {
        echo '<div class="reseaux">';
        foreach ($icones as $icone) {
            echo '<a href="' . esc_url($icone['url']) . '" target="_blank" rel="noopener">
                    <img src="' . esc_url($icone['img']) . '" alt="Icône réseau" width="24">
                  </a>';
        }
        echo '</div>';
    }
}


