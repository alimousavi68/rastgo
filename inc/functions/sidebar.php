<?php
/**
 * declaration sidebars for functions.php
 */
add_action('widgets_init', 'i8_add_custom_sidebar');
function i8_add_custom_sidebar()
{
    //  hero section -  بخش بالای سایت - راست 
    register_sidebar(array(
        'name'           => 'صفحه نخست - سایدبار سمت راست',
        'id'             => 'top_section_right',
        'class'          => 'top_section_right',
        'description'    => 'این ساید بار در بالای سایت و سمت راست صفحه نخست قرار دارد.',
        'before_widget'  => '',
        'after_widget'   => '',
        'before_title'   => '',
        'after_title'    => '',
        'before_sidebar' => '',
        'after_sidebar'  => '',
        'show_in_rest'   => false,
    ));
 

    //  home main bar - ویژه - سایدبار اصلی صفحه نخست
    register_sidebar(array(
        'name'           => 'صفحه نخست - انتهای صفحه',
        'id'             => 'hms-sidebar',
        'class'          => 'hms-sidebar',
        'description'    => '۲-این ستون در صفحه اصلی و در سمت انتهای صفحه قرار میگیرد.',
        'before_widget'  => '<div class="widget box">',
        'after_widget'   => '</div>',
        'before_title'   => '',
        'after_title'    => '',
        'before_sidebar' => '',
        'after_sidebar'  => '',
        'show_in_rest'   => false,
    ));


  
    //  home main bar - bottom - انتهای صفحه اصلی
    register_sidebar(array(
        'name'           => 'صفحه نخست - ستون اصلی',
        'id'             => 'hf-sidebar',
        'class'          => 'hf-sidebar',
        'description'    => 'این ستون در صفحه اصلی قرار میگیرد',
        'before_widget'  => '<div class="widget multimdeia-dark-bg">',
        'after_widget'   => '</div>',
        'before_title'   => '',
        'after_title'    => '',
        'before_sidebar' => '',
        'after_sidebar'  => '',
        'show_in_rest'   => false,
    ));

    //  footer right sidebar - ساید بار فوتر - راست
    register_sidebar(array(
        'name'           => 'اول - ساید بار فوتر - راست',
        'id'             => 'fr-sidebar',
        'class'          => 'fr-sidebar',
        'description'    => 'این سایدبار در فوتر تمامی صفحات و در سمت راست قرار می گیرد.',
        'before_widget'  => '<div class="widget">',
        'after_widget'   => '</div>',
        'before_title'   => '',
        'after_title'    => '',
        'before_sidebar' => '',
        'after_sidebar'  => '',
        'show_in_rest'   => false,
    ));

    //  footer right sidebar - ساید بار فوتر - وسط
    register_sidebar(array(
        'name'           => 'سایدبار فوتر - سمت وسط اول',
        'id'             => 'fc-sidebar',
        'class'          => 'fc-sidebar',
        'description'    => 'این سایدبار در فوتر تمامی صفحات و در وسط قرار می گیرد.',
        'before_widget'  => '<div class="widget col-12 col-lg-6 col-md-6 col-sm-12 d-flex flex-column align-items-center align-content-center ">',
        'after_widget'   => '</div>',
        'before_title'   => '',
        'after_title'    => '',
        'before_sidebar' => '',
        'after_sidebar'  => '',
        'show_in_rest'   => false,
    ));
    //  footer right sidebar - 2ساید بار فوتر - وسط
    register_sidebar(array(
        'name'           => 'سایدبار فوتر - سمت وسط دوم',
        'id'             => 'fcc-sidebar',
        'class'          => 'fcc-sidebar',
        'description'    => 'این سایدبار در فوتر تمامی صفحات و در وسط قرار می گیرد.',
        'before_widget'  => '<div class="widget col-12 col-lg-6 col-md-6 col-sm-12 d-flex flex-column align-items-center align-content-center ">',
        'after_widget'   => '</div>',
        'before_title'   => '',
        'after_title'    => '',
        'before_sidebar' => '',
        'after_sidebar'  => '',
        'show_in_rest'   => false,
    ));

    //  footer left sidebar - ساید بار فوتر - چپ
    register_sidebar(array(
        'name'           => 'ساید بار فوتر - چپ',
        'id'             => 'fl-sidebar',
        'class'          => 'fl-sidebar',
        'description'    => 'این سایدبار در فوتر تمامی صفحات و در سمت چپ قرار می گیرد.',
        'before_widget'  => '<div class="widget">',
        'after_widget'   => '</div>',
        'before_title'   => '',
        'after_title'    => '',
        'before_sidebar' => '',
        'after_sidebar'  => '',
        'show_in_rest'   => false,
    ));
}
