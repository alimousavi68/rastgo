<?php

/**
 * Add and active theme features
 */
require_once(get_template_directory() . '/inc/functions/active-features.php');

/**
 * Add Sidebar to theme
 */
require_once(get_template_directory() . '/inc/functions/sidebar.php');

/**
 * Load Custom widgets
 * 
 */
require_once(get_template_directory() . '/inc/widget/i8_show_posts_pro/i8_show_posts_pro.php');
require_once(get_template_directory() . '/inc/widget/i8_show_ads_pro/i8_show_ads_pro.php');
require_once(get_template_directory() . '/inc/widget/i8_show_posts_two_col.php');
require_once(get_template_directory() . '/inc/widget/i8_site_info_box.php');
require_once(get_template_directory() . '/inc/widget/i8_market_data.php');
require_once(get_template_directory() . '/inc/widget/i8_menu.php');
require_once get_template_directory() . '/inc/widget/i8-latestpost-thumbnail/init.php';
require_once get_template_directory() . '/inc/widget/i8-latestpost-overlay/index.php';

/**
 * Include simple_html_dom library
 */
require_once get_template_directory() . '/lib/simple_html_dom.php';


/**
 *  helper functions 
 */
require_once(get_template_directory() . '/inc/functions/helper-functions.php');

/**
 *  Customize theme options
 */
require_once(get_template_directory() . '/inc/functions/theme-options/general_setting.php');
require_once(get_template_directory() . '/inc/functions/theme-options/theme_color_pallets.php');
require_once(get_template_directory() . '/inc/functions/theme-options/theme_copy_write.php');
require_once(get_template_directory() . '/inc/functions/theme-options/inline_ads/theme_inline_ads.php');
require_once(get_template_directory() . '/inc/functions/theme-options/theme_custom_scripts.php');
require_once(get_template_directory() . '/inc/functions/theme-options/theme_footer.php');
require_once(get_template_directory() . '/inc/functions/theme-options/theme_search.php');
require_once(get_template_directory() . '/inc/functions/theme-options/theme_social_links.php');
require_once(get_template_directory() . '/inc/functions/theme-options/contact_menu.php');


/**
 * Change Excerpt limit characters
 */
function custom_excerpt_length($length)
{
    return 350;
}
add_filter('excerpt_length', 'custom_excerpt_length');


/**
 * Custom Term Field
 * 
 */
require_once(get_template_directory() . '/inc/functions/i8_CustomTermField.php');

require_once(get_template_directory() . '/inc/functions/factcheck_metabox.php');


// //Include jalali-date external library 
// require_once(get_template_directory() . '/lib/jDateTime-master/jdatetime.class.php');

/**
 * Enqueue scripts and styles.
 */
function rastgo_enqueue_scripts() {
    wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), '5.3.1.1', true);
    wp_enqueue_script('rastgo-main', get_template_directory_uri() . '/assets/js/main.js', array('bootstrap-bundle'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'rastgo_enqueue_scripts');

/**
 * Custom Walker for Bootstrap 5 Nav Menu
 */
class Bootstrap_5_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $classes[] = 'nav-item';
        if ($args->walker->has_children) {
            $classes[] = 'dropdown';
        }
        if ($item->current || $item->current_item_ancestor || $item->current_item_parent) {
            $classes[] = 'active';
        }
        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $attributes .= ($args->walker->has_children) ? ' class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"' : ' class="nav-link"';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}


// add meia upload for author role
function add_upload_cap_to_authors() {
    $role = get_role('author');
    if ($role && !$role->has_cap('upload_files')) {
        $role->add_cap('upload_files');
    }
}
add_action('init', 'add_upload_cap_to_authors');
