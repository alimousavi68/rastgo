<?php
// این فایل باید فقط HTML خالص باشه و از $widget به جای $this استفاده کنیم.
?>
<p>
    <label for="<?php echo $widget->get_field_id('title'); ?>">عنوان:</label>
    <input class="widefat" id="<?php echo $widget->get_field_id('title'); ?>" name="<?php echo $widget->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>">
</p>

<p>
    <label for="<?php echo $widget->get_field_id('category'); ?>">دسته‌بندی:</label>
    <select class="widefat" id="<?php echo $widget->get_field_id('category'); ?>" name="<?php echo $widget->get_field_name('category'); ?>">
        <option value="all" <?php selected($instance['category'], 'all'); ?>>همه دسته‌ها</option>
        <?php
        $categories = get_categories();
        foreach ($categories as $cat) {
            echo '<option value="' . esc_attr($cat->term_id) . '"' . selected($instance['category'], $cat->term_id, false) . '>' . esc_html($cat->name) . '</option>';
        }
        ?>
    </select>
</p>

<p>
    <label for="<?php echo $widget->get_field_id('count'); ?>">تعداد پست‌ها:</label>
    <input class="tiny-text" id="<?php echo $widget->get_field_id('count'); ?>" name="<?php echo $widget->get_field_name('count'); ?>" type="number" step="1" min="1" value="<?php echo $instance['count']; ?>">
</p>

<p>
    <input class="checkbox" type="checkbox" <?php checked($instance['sticky_editors'], 1); ?> id="<?php echo $widget->get_field_id('sticky_editors'); ?>" name="<?php echo $widget->get_field_name('sticky_editors'); ?>" value="1">
    <label for="<?php echo $widget->get_field_id('sticky_editors'); ?>">انتخاب سردبیران ابتدا نمایش داده شود؟</label>
</p>

<div style="margin-right: 20px; margin-bottom: 15px;">
    <label for="<?php echo $widget->get_field_id('sticky_editors_count'); ?>">تعداد پست‌های انتخاب سردبیر:</label>
    <input class="tiny-text" id="<?php echo $widget->get_field_id('sticky_editors_count'); ?>" name="<?php echo $widget->get_field_name('sticky_editors_count'); ?>" type="number" step="1" min="1" value="<?php echo $instance['sticky_editors_count']; ?>">
</div>
