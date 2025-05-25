<?php 
class Latest_Posts_latestpost_overlay_widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'latest_posts_latestpost_overlay_widget',
            'ویجت پست‌های دلخواه (سفارشی)',
            array('description' => 'نمایش پست‌های یک دسته خاص در قالب سفارشی')
        );
    }

    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        $count = !empty($instance['count']) ? absint($instance['count']) : 4;
        $category = !empty($instance['category']) ? absint($instance['category']) : 0;

        $query_args = array(
            'post_type' => 'post',
            'posts_per_page' => $count,
        );

        if ($category) {
            $query_args['cat'] = $category;
        }

        $query = new WP_Query($query_args);

        echo '<div class="row latest-post-2">';

        if (!empty($title)) {
            echo '<div class="col-12"><h4 class="text-center main-title">' . esc_html($title) . '</h4></div>';
        }

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'medium') ?: 'https://via.placeholder.com/300x200?text=No+Image';

                echo '<div class="col-md-6 col-lg-3">';
                echo '<a href="' . esc_url(get_permalink()) . '" class="about-box d-block overflow-hidden position-relative">';
                echo '<img src="' . esc_url($image_url) . '" class="about-box-img w-100 h-100 object-cover" alt="' . esc_attr(get_the_title()) . '">';
                echo '<h5 class="about-box-title position-absolute overflow-hidden m-0">' . esc_html(get_the_title()) . '</h5>';
                echo '</a></div>';
            }
            wp_reset_postdata();
        } else {
            echo '<div class="col-12 text-center">پستی یافت نشد.</div>';
        }

        echo '</div>';
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : 'عنوان بخش';
        $count = !empty($instance['count']) ? $instance['count'] : 4;
        $category = !empty($instance['category']) ? $instance['category'] : 0;
        $categories = get_categories(array('hide_empty' => false));
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">عنوان:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" 
                name="<?php echo $this->get_field_name('title'); ?>" type="text" 
                value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('count'); ?>">تعداد پست‌ها:</label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('count'); ?>" 
                name="<?php echo $this->get_field_name('count'); ?>" type="number" 
                step="1" min="1" value="<?php echo esc_attr($count); ?>" size="3">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('category'); ?>">دسته‌بندی:</label>
            <select class="widefat" id="<?php echo $this->get_field_id('category'); ?>" 
                name="<?php echo $this->get_field_name('category'); ?>">
                <option value="0" <?php selected($category, 0); ?>>همه دسته‌ها</option>
                <?php foreach ($categories as $cat) : ?>
                    <option value="<?php echo $cat->term_id; ?>" 
                        <?php selected($category, $cat->term_id); ?>>
                        <?php echo esc_html($cat->name); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        return array(
            'title'    => sanitize_text_field($new_instance['title']),
            'count'    => absint($new_instance['count']),
            'category' => absint($new_instance['category']),
        );
    }
}

// ثبت ویجت
function register_latest_posts_latestpost_overlay_widget() {
    register_widget('Latest_Posts_Latestpost_Overlay_Widget');
}
add_action('widgets_init', 'register_latest_posts_latestpost_overlay_widget');
