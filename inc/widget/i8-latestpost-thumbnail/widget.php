<?php
class I8_LatestPost_Thumbnail_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'I8_LatestPost_Thumbnail_Widget',
            'ویجت پست‌های آخر با تصویر',
            array('description' => 'نمایش آخرین پست‌ها یا بر اساس دسته‌بندی همراه با گزینه انتخاب سردبیران')
        );

        require_once get_template_directory() . '/inc/widget/i8-latestpost-thumbnail/helpers.php';
        require_once get_template_directory() . '/inc/widget/i8-latestpost-thumbnail/renderer.php';
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        i8_render_latest_posts($instance);

        echo $args['after_widget'];
    }

    public function form($instance) {
    $defaults = array(
        'title' => '',
        'category' => 'all',
        'count' => 5,
        'sticky_editors' => 0,
        'sticky_editors_count' => 2,
    );
    $instance = wp_parse_args((array) $instance, $defaults);
    
    $widget = $this;
    include __DIR__ . '/form-fields.php';
}


    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['category'] = sanitize_text_field($new_instance['category']);
        $instance['count'] = absint($new_instance['count']);
        $instance['sticky_editors'] = isset($new_instance['sticky_editors']) ? 1 : 0;
        $instance['sticky_editors_count'] = absint($new_instance['sticky_editors_count']);
        return $instance;
    }
}

function i8_register_latest_post_widget() {
    register_widget('I8_LatestPost_Thumbnail_Widget');
}
add_action('widgets_init', 'i8_register_latest_post_widget');