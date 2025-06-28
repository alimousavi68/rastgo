<?php 
class Latest_Posts_latestpost_overlay_widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'latest_posts_latestpost_overlay_widget',
            'ویجت برگه های دلخواه (سفارشی)',
            array('description' => 'نمایش برگه ها در قالب سفارشی')
        );
    }

    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        $selected_pages = !empty($instance['pages']) ? (array)$instance['pages'] : array();

        echo '<div class="row latest-post-2">';

        if (!empty($title)) {
            echo '<div class="col-12"><h4 class="text-center main-title">' . esc_html($title) . '</h4></div>';
        }

        if (!empty($selected_pages)) {
            foreach ($selected_pages as $page_id) {
                $page = get_post($page_id);
                if (!$page) continue;
                $image_url = get_the_post_thumbnail_url($page_id, 'medium') ?: 'https://via.placeholder.com/300x200?text=No+Image';

                echo '<div class="col-md-6 col-lg-3">';
                echo '<a href="' . esc_url(get_permalink($page_id)) . '" class="about-box d-block overflow-hidden position-relative">';
                echo '<img src="' . esc_url($image_url) . '" class="about-box-img w-100 h-100 object-cover" alt="' . esc_attr($page->post_title) . '">';
                echo '<h5 class="about-box-title position-absolute overflow-hidden m-0">' . esc_html($page->post_title) . '</h5>';
                echo '</a></div>';
            }
        } else {
            echo '<div class="col-12 text-center">برگه‌ای انتخاب نشده است.</div>';
        }

        echo '</div>';
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : 'عنوان بخش';
        $selected_pages = !empty($instance['pages']) ? (array)$instance['pages'] : array();

        // Get all pages
        $pages = get_pages(array('sort_column' => 'post_title', 'sort_order' => 'asc'));
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">عنوان:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" 
                name="<?php echo $this->get_field_name('title'); ?>" type="text" 
                value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('pages'); ?>">انتخاب برگه‌ها:</label>
            <select class="widefat" id="<?php echo $this->get_field_id('pages'); ?>[]" 
                name="<?php echo $this->get_field_name('pages'); ?>[]" multiple size="6">
                <?php foreach ($pages as $page): ?>
                    <option value="<?php echo $page->ID; ?>" <?php echo in_array($page->ID, $selected_pages) ? 'selected' : ''; ?>>
                        <?php echo esc_html($page->post_title); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <small>برای انتخاب چند برگه کلید Ctrl (یا Cmd در مک) را نگه دارید.</small>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['pages'] = array_map('absint', (array)($new_instance['pages'] ?? []));
        return $instance;
    }
}

// ثبت ویجت
function register_latest_posts_latestpost_overlay_widget() {
    register_widget('Latest_Posts_Latestpost_Overlay_Widget');
}
add_action('widgets_init', 'register_latest_posts_latestpost_overlay_widget');
