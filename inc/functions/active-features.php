<?php

/**
 * Enable features for functions.php
 */

/**
 * Setup Theme Support
 */
add_action('after_setup_theme', 'i8_theme_setup');
function i8_theme_setup()
{
    register_nav_menus(array(
        'primary' => __('Main Menu'),
        'sidebar'  => __('sidebar menu'),
        'mobile'  => __('Mobile menu'),
        'footer'  => __('footer menu')
    ));
}

/**
 * post thumbnail for theme
 */
add_theme_support('post-thumbnails');

/**
 * remove un-use Image size
 */
// تابع برای حذف اندازه‌های پیش‌فرض تصاویر
function remove_default_image_sizes($sizes) {
    unset($sizes['thumbnail']); // حذف thumbnail (150x150)
    unset($sizes['medium']); // حذف medium (300x300)
    unset($sizes['medium_large']); // حذف medium_large (768x0)
    unset($sizes['large']); // حذف large (1024x1024)
    unset($sizes['1536x1536']); // حذف large (1024x1024)

    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');


/**
 * define Custom Image size
 */
add_image_size('i8-xl-image', 1296 , 729 , true);  //  , 
add_image_size('i8-md-image', 296 , 153 , true);  //  , 




/**
 * add theme Style sheet file to site header
 */
function i8_Add_stylesheets()
{
    wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/assets/css/main.min.css', '', '3.8');
}
add_action('wp_enqueue_scripts', 'i8_Add_stylesheets');



function disable_classic_editor_style() {
    if (is_admin()) {
        return;
    }
    // حذف فایل classic-themes.min.css
    wp_dequeue_style('wp-block-library'); // حذف فایل style-rtl.min.css
    wp_dequeue_style( 'classic-theme-styles' );
}
add_action('wp_enqueue_scripts', 'disable_classic_editor_style',100);

// تابع برای تولید meta description
function custom_meta_description() {
    // بررسی اگر در صفحه اصلی هستیم
    if (is_front_page()) {
        // تولید meta description مربوط به صفحه اصلی
        $meta_description = get_bloginfo( 'description' );
    }
    // بررسی اگر در صفحه مطلب (single) هستیم
    elseif (is_single()) {
        // تولید meta description مربوط به مطلب فعلی
        global $post;
        $meta_description = get_post_meta($post->ID, 'meta_description', true);
        if (empty($meta_description)) {
            // اگر meta description برای مطلب تعریف نشده باشد، از خلاصه مطلب استفاده می‌کنیم
            $meta_description = wp_trim_words($post->post_content, 30, '...');
        }
    }
    // بررسی اگر در صفحه برچسب (tag) هستیم
    elseif (is_tag()) {
        // تولید meta description مربوط به برچسب فعلی
        $meta_description = ' برچسب: ' . single_tag_title('', false);
    }
    elseif (is_category()) {
        // تولید meta description مربوط به دسته‌بندی فعلی
        $category_description = category_description();
        if (!empty($category_description)) {
            $meta_description = ' دسته‌بندی: ' . $category_description;
        } else {
            $meta_description = ' دسته‌بندی: ' . single_cat_title('', false);
        }
    }
    // بررسی اگر در صفحه‌های آرشیو مطالب (برچسب‌ها، دسته‌بندی‌ها و ...) هستیم
    elseif (is_archive()) {
        // تولید meta description مربوط به صفحه‌های آرشیو مطالب
        $archive_description = get_the_archive_description();
        if (!empty($archive_description)) {
            $meta_description = $archive_description;
        } else {
            $meta_description = ' صفحه‌های آرشیو مطالب';
        }
    }

    // اگر متغیر meta description تعریف شده باشد، آن را به هدر اضافه می‌کنیم
    if (isset($meta_description)) {
        echo '<meta name="description" content="' . esc_attr($meta_description) . '">' . "\n";
    }
}
add_action('wp_head', 'custom_meta_description');



//Disable emojis in WordPress
add_action( 'init', 'smartwp_disable_emojis' );

function smartwp_disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
function disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
}
//End Disable emojis in WordPress