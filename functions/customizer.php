<?php
function voyage_club_customize_register($wp_customize)
{
    // SECTION HERO CARROUSEL
    $wp_customize->add_section('hero_carrousel_section', [
        'title'    => __('Hero Carrousel', 'voyage-club'),
        'priority' => 30,
    ]);

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

    // Ajout des images (jusqu'à 10)
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

    // SECTION FOOTER
    $wp_customize->add_section('footer_section', [
        'title'    => __('Pied de page', 'voyage-club'),
        'priority' => 50,
    ]);

    $wp_customize->add_setting('footer_image', [
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_image', [
        'label'    => __('Image dans le footer', 'voyage-club'),
        'section'  => 'footer_section',
        'settings' => 'footer_image',
    ]));

    // SECTION RÉSEAUX SOCIAUX
    $wp_customize->add_section('social_section', [
        'title'    => __('Icônes sociales', 'voyage-club'),
        'priority' => 60,
    ]);

    // Icône 1 : GitHub
    $wp_customize->add_setting('icone_social_1_url', ['sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_setting('icone_social_1_img', ['sanitize_callback' => 'esc_url_raw']);

    $wp_customize->add_control('icone_social_1_url', [
        'label'   => __('Lien GitHub', 'voyage-club'),
        'section' => 'social_section',
        'type'    => 'url',
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'icone_social_1_img', [
        'label'    => __('Image GitHub', 'voyage-club'),
        'section'  => 'social_section',
        'settings' => 'icone_social_1_img',
    ]));

    // Icône 2 : LinkedIn
    $wp_customize->add_setting('icone_social_2_url', ['sanitize_callback' => 'esc_url_raw']);
    $wp_customize->add_setting('icone_social_2_img', ['sanitize_callback' => 'esc_url_raw']);

    $wp_customize->add_control('icone_social_2_url', [
        'label'   => __('Lien LinkedIn', 'voyage-club'),
        'section' => 'social_section',
        'type'    => 'url',
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'icone_social_2_img', [
        'label'    => __('Image LinkedIn', 'voyage-club'),
        'section'  => 'social_section',
        'settings' => 'icone_social_2_img',
    ]));
}

add_action('customize_register', 'voyage_club_customize_register');
