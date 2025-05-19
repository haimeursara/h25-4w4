<?php
function voyage_club_customize_register($wp_customize)
{
    // Section Carrousel
    $wp_customize->add_section('hero_carrousel_section', [
        'title'    => __('Hero Carrousel', 'voyage-club'),
        'priority' => 30,
    ]);

    // Nombre d’images à afficher
    $wp_customize->add_setting('hero_carrousel_number', [
        'default'           => 3,
        'sanitize_callback' => 'absint',
    ]);

    $wp_customize->add_control('hero_carrousel_number', [
        'label'       => __('Nombre d\'images du carrousel'),
        'section'     => 'hero_carrousel_section',
        'type'        => 'number',
        'input_attrs' => [
            'min' => 1,
            'max' => 10,
        ],
    ]);

    // Ajout des images dynamiquement (10 max)
    for ($i = 1; $i <= 10; $i++) {
        $wp_customize->add_setting("hero_carrousel_image_$i", [
            'sanitize_callback' => 'esc_url_raw',
        ]);

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "hero_carrousel_image_{$i}", [
            'label'    => __("Image Carrousel #$i", 'voyage-club'),
            'section'  => 'hero_carrousel_section',
            'settings' => "hero_carrousel_image_$i",
        ]));
    }
}

add_action('customize_register', 'voyage_club_customize_register');
