<?php 
// حتماً اول فایل کلاس رو لود کن
require_once __DIR__ . '/widget.php';
// require_once __DIR__ . '/form-fields.php';
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/renderer.php';

// سپس ثبت ویجت
add_action('widgets_init', function () {
    register_widget('I8_LatestPost_Thumbnail_Widget');
});
