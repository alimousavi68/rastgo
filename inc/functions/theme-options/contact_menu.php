<?php
/**
 * Register Customizer setting for Contact Button Page
 */
function rastgo_customize_register_contact_button( $wp_customize ) {
    // 1. افزودن بخش جدید (Section) در Customizer
    $wp_customize->add_section( 'rastgo_contact_button_section', [
        'title'       => __( 'دکمه تماس', 'yourtheme' ),
        'priority'    => 160,
        'description' => __( 'تنظیم آدرس (برگه) برای دکمه تماس', 'yourtheme' ),
    ] );

    // 2. افزودن Setting برای ذخیرهٔ شناسهٔ برگه
    $wp_customize->add_setting( 'i8-contact-button-url', [
        'default'           => 0,                      // مقدار پیش‌فرض (هیچ برگه‌ای)
        'type'              => 'option',               // ذخیره در wp_options
        'sanitize_callback' => 'absint',               // حتما یک عدد صحیح مثبت
        'transport'         => 'refresh',              // ریلود صفحه پس از تغییر
    ] );

    // 3. افزودن کنترل دراپ‌‌داون برگه‌ها (Dropdown Pages)
    $wp_customize->add_control( 'i8-contact-button-url-control', [
        'label'       => __( 'انتخاب برگه تماس', 'yourtheme' ),
        'section'     => 'rastgo_contact_button_section',
        'settings'    => 'i8-contact-button-url',
        'type'        => 'dropdown-pages',
        'priority'    => 10,
    ] );
}
add_action( 'customize_register', 'rastgo_customize_register_contact_button' );

/**
 * Helper: get the URL of the selected contact page
 *
 * @return string|null URL of the chosen page, or null if none selected.
 */
function rastgo_get_contact_button_url() {
    $page_id = get_option( 'i8-contact-button-url', 0 );
    if ( $page_id ) {
        return get_permalink( $page_id );
    }
    return null;
}
