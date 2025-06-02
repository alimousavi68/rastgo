<?php
/**
 * Register Customizer settings for Contact Button, Ranking Page, and Copyright
 */
function rastgo_customize_register_contact_button( $wp_customize ) {
    // Contact Button Section
    $wp_customize->add_section( 'rastgo_contact_button_section', [
        'title'       => __( 'تنظیمات صفحات و متن‌ها', 'yourtheme' ),
        'priority'    => 160,
        'description' => __( 'تنظیمات مربوط به صفحات و متن‌های سایت', 'yourtheme' ),
    ] );

    // 1. Contact Button Settings
    $wp_customize->add_setting( 'i8-contact-button-url', [
        'default'           => 0,
        'type'              => 'option',
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ] );

    $wp_customize->add_control( 'i8-contact-button-url-control', [
        'label'       => __( 'انتخاب برگه تماس', 'yourtheme' ),
        'section'     => 'rastgo_contact_button_section',
        'settings'    => 'i8-contact-button-url',
        'type'        => 'dropdown-pages',
        'priority'    => 10,
    ] );

    // 2. Ranking Page Settings
    $wp_customize->add_setting( 'i8-ranking-page-url', [
        'default'           => 0,
        'type'              => 'option',
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ] );

    $wp_customize->add_control( 'i8-ranking-page-url-control', [
        'label'       => __( 'انتخاب صفحه رتبه بندی', 'yourtheme' ),
        'section'     => 'rastgo_contact_button_section',
        'settings'    => 'i8-ranking-page-url',
        'type'        => 'dropdown-pages',
        'priority'    => 20,
    ] );

    // 3. Copyright Text Settings
    $wp_customize->add_setting( 'i8-copyright-text', [
        'default'           => '',
        'type'              => 'option',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ] );

    $wp_customize->add_control( 'i8-copyright-text-control', [
        'label'       => __( 'متن کپی رایت', 'yourtheme' ),
        'section'     => 'rastgo_contact_button_section',
        'settings'    => 'i8-copyright-text',
        'type'        => 'text',
        'priority'    => 30,
    ] );
}
add_action( 'customize_register', 'rastgo_customize_register_contact_button' );

/**
 * Helper functions to get the values
 */
function rastgo_get_contact_button_url() {
    $page_id = get_option( 'i8-contact-button-url', 0 );
    return $page_id ? get_permalink( $page_id ) : null;
}

function rastgo_get_ranking_page_url() {
    $page_id = get_option( 'i8-ranking-page-url', 0 );
    return $page_id ? get_permalink( $page_id ) : null;
}

function rastgo_get_copyright_text() {
    return get_option( 'i8-copyright-text', '' );
}
