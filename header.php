<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="<?php echo (get_theme_mod('i8_light_primary_color')) ? get_theme_mod('i8_light_primary_color') : '#383838'; ?>" />

    <!-- SEO Meta Tags -->
    <title><?php wp_title(' | ', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <meta name="description" content="<?php
                                        if (is_home() || is_front_page()) {
                                            bloginfo('description');
                                        } elseif (is_single()) {
                                            echo strip_tags(get_the_excerpt());
                                        } else {
                                            bloginfo('description');
                                        }
                                        ?>">
    <meta name="keywords" content="<?php
                                    if (is_single()) {
                                        $tags = get_the_tags();
                                        $tag_names = array();
                                        if ($tags) {
                                            foreach ($tags as $tag) {
                                                $tag_names[] = $tag->name;
                                            }
                                            echo implode(', ', $tag_names);
                                        }
                                    } else {
                                        echo 'فکت، راست آزمایی اخبار، فکت ایران';
                                    }
                                    ?>">
    <?php if (is_singular()) : ?>
        <link rel="canonical" href="<?php echo get_permalink(); ?>" />
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.rtl.min.css">
    <!-- Datepicker -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/persianDatepicker-default.css" />
    <!-- Select2 -->
    <!-- <link href="<?php echo get_template_directory_uri(); ?>/assets/css/select2.min.css" rel="stylesheet" /> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->

    <!-- Social Media Meta Tags -->
    <!--open graph tags -->
    <meta property="og:title" content="<?php wp_title(' | ', true, 'right'); ?> <?php bloginfo('name'); ?>">
    <meta property="og:description" content="<?php
                                                if (is_home() || is_front_page()) {
                                                    bloginfo('description');
                                                } elseif (is_single()) {
                                                    echo strip_tags(get_the_excerpt());
                                                }
                                                ?>">
    <meta property="og:image"
        content="<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/images/global/no-image.webp'; ?>">
    <meta property="og:url" content="<?php echo get_permalink(); ?>">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
    <meta property="og:type" content="article">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?>">
    <meta name="twitter:description" content="<?php
                                                if (is_home() || is_front_page()) {
                                                    bloginfo('description');
                                                } elseif (is_single()) {
                                                    echo strip_tags(get_the_excerpt());
                                                }
                                                ?>">
    <meta name="twitter:image"
        content="<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/images/global/no-image.webp'; ?>">



    <!-- Head action  -->
    <?php wp_head(); ?>


    <!-- General style -->
    <style>

    </style>

    <!-- if single page -->
    <?php if (is_singular()): ?>
        <!-- print style -->
        <style media="print">

        </style>
    <?php endif; ?>

</head>


<body dir="rtl" class="<?php echo (is_singular()) ? ' single-page' : ' bg-main'; ?>">
    <!-- Header -->
    <header class="header overflow-hidden">
        <div class="header-container d-flex align-items-stretch mx-auto justify-content-between">
            <div class="header-logo d-flex align-items-center">
                <?php get_my_site_logo(); ?>
            </div>

            <div class="header-left-box d-flex align-items-center overflow-hidden">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="d-none d-md-block header-search-form flex-grow-1 position-relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        class="svg-icon">
                        <path
                            d="M23.6917 22.2575L18.2838 16.8448C19.7423 15.0683 20.6134 12.7926 20.6134 10.3163C20.6134 4.62459 15.9984 0.00958252 10.3067 0.00958252C4.61501 0.00958252 0 4.62459 0 10.3163C0 16.008 4.61501 20.623 10.3067 20.623C12.7928 20.623 15.0734 19.742 16.8548 18.2739L22.2626 23.6817C22.894 24.2592 23.4861 23.8872 23.6917 23.6817C24.1028 23.2755 24.1028 22.6637 23.6917 22.2575ZM2.01142 10.3163C2.01142 5.73552 5.72594 2.021 10.3067 2.021C14.8874 2.021 18.6069 5.73552 18.6069 10.3163C18.6069 14.897 14.8923 18.6115 10.3116 18.6115C5.73083 18.6115 2.01142 14.897 2.01142 10.3163Z"
                            fill="currentColor" />
                    </svg>
                    <input type="text" value="<?php echo get_search_query(); ?>" name="s" class="form-control cs-input" placeholder="جستجو کنید">
                </form>

                <div class="header-actions-box d-flex align-items-center">
                    <button class="search-action d-md-none d-flex align-items-center justify-content-center"
                        data-bs-toggle="modal" data-bs-target="#searchModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            class="svg-icon">
                            <path
                                d="M23.6917 22.2575L18.2838 16.8448C19.7423 15.0683 20.6134 12.7926 20.6134 10.3163C20.6134 4.62459 15.9984 0.00958252 10.3067 0.00958252C4.61501 0.00958252 0 4.62459 0 10.3163C0 16.008 4.61501 20.623 10.3067 20.623C12.7928 20.623 15.0734 19.742 16.8548 18.2739L22.2626 23.6817C22.894 24.2592 23.4861 23.8872 23.6917 23.6817C24.1028 23.2755 24.1028 22.6637 23.6917 22.2575ZM2.01142 10.3163C2.01142 5.73552 5.72594 2.021 10.3067 2.021C14.8874 2.021 18.6069 5.73552 18.6069 10.3163C18.6069 14.897 14.8923 18.6115 10.3116 18.6115C5.73083 18.6115 2.01142 14.897 2.01142 10.3163Z"
                                fill="currentColor" />
                        </svg>
                    </button>

                    <!-- Contact menu -->
                    <?php
                    $contact_url = rastgo_get_contact_button_url();
                    if ($contact_url) : ?>
                        <a href="<?php echo esc_url($contact_url); ?>" class="envelope-action d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="19" viewBox="0 0 27 19" fill="none"
                                class="svg-icon">
                                <g clip-path="url(#clip0_64_914)">
                                    <path
                                        d="M24.4688 18.7812H2.53125C1.13569 18.7812 0 17.6456 0 16.25V2.75C0 1.35444 1.13569 0.21875 2.53125 0.21875H24.4688C25.8643 0.21875 27 1.35444 27 2.75V16.25C27 17.6456 25.8643 18.7812 24.4688 18.7812ZM2.53125 17.0938H24.4688C24.9337 17.0938 25.3125 16.7157 25.3125 16.25V3.01747L14.0493 12.6717C13.8907 12.8075 13.6958 12.875 13.5 12.875C13.3042 12.875 13.1093 12.8075 12.9507 12.6717L1.6875 3.01747V16.25C1.6875 16.7157 2.06634 17.0938 2.53125 17.0938ZM24.0165 1.90625H2.9835L13.5 10.92L24.0165 1.90625Z"
                                        fill="currentColor" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_64_914">
                                        <rect width="27" height="18" fill="white" transform="translate(0 0.5)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    <?php endif; ?>


                    <!-- Mobile Menu -->
                    <button class="mobile-nav-action d-md-none d-flex align-items-center justify-content-center"
                        type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMobileNavs"
                        aria-controls="offcanvasMobileNavs">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            class="svg-icon">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.75 18C3.75 17.8011 3.82902 17.6103 3.96967 17.4697C4.11032 17.329 4.30109 17.25 4.5 17.25H19.5C19.6989 17.25 19.8897 17.329 20.0303 17.4697C20.171 17.6103 20.25 17.8011 20.25 18C20.25 18.1989 20.171 18.3897 20.0303 18.5303C19.8897 18.671 19.6989 18.75 19.5 18.75H4.5C4.30109 18.75 4.11032 18.671 3.96967 18.5303C3.82902 18.3897 3.75 18.1989 3.75 18ZM3.75 12C3.75 11.8011 3.82902 11.6103 3.96967 11.4697C4.11032 11.329 4.30109 11.25 4.5 11.25H19.5C19.6989 11.25 19.8897 11.329 20.0303 11.4697C20.171 11.6103 20.25 11.8011 20.25 12C20.25 12.1989 20.171 12.3897 20.0303 12.5303C19.8897 12.671 19.6989 12.75 19.5 12.75H4.5C4.30109 12.75 4.11032 12.671 3.96967 12.5303C3.82902 12.3897 3.75 12.1989 3.75 12ZM3.75 6C3.75 5.80109 3.82902 5.61032 3.96967 5.46967C4.11032 5.32902 4.30109 5.25 4.5 5.25H19.5C19.6989 5.25 19.8897 5.32902 20.0303 5.46967C20.171 5.61032 20.25 5.80109 20.25 6C20.25 6.19891 20.171 6.38968 20.0303 6.53033C19.8897 6.67098 19.6989 6.75 19.5 6.75H4.5C4.30109 6.75 4.11032 6.67098 3.96967 6.53033C3.82902 6.38968 3.75 6.19891 3.75 6Z"
                                fill="currentColor" />
                        </svg>
                    </button>

                    <div class="change-switch-theme switch-active" id="themeSwitch">
                        <input class="form-check-input" type="checkbox" role="switch" id="">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="svg-icon" viewBox="0 0 16 16">
                            <path
                                d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->

    <!-- Offcanvas Mobile Navigation -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasMobileNavs" aria-labelledby="offcanvasMobileNavsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasMobileNavsLabel">منو</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!-- Mobile navigation content will go here -->
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'navbar-nav justify-content-end flex-grow-1 pe-3',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new Bootstrap_5_Walker_Nav_Menu(),
            ));
            ?>
        </div>
    </div>
    <!-- End Offcanvas Mobile Navigation -->


    <?php if (true): ?>
        <!-- Breadcrumb Secion -->
        <div class="breadcrumb-box-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php render_custom_breadcrumb_menu('primary'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Secion -->
    <?php endif; ?>