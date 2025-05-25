<?php 
function i8_get_latest_posts($category, $count, $include_editors = false, $editors_count = 2) {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $count,
        'post_status' => 'publish',
        'ignore_sticky_posts' => true,
    );

    if ($category != 'all') {
        $args['cat'] = (int)$category;
    }

    if ($include_editors) {
        // گرفتن پست‌های انتخاب سردبیر
        $editors_args = $args;
        $editors_args['posts_per_page'] = $editors_count;
        $editors_args['meta_key'] = 'editor_choice';
        $editors_args['meta_value'] = 'true';
        $editors_args['meta_compare'] = '=';

        $editors_posts = get_posts($editors_args);
        $editors_ids = wp_list_pluck($editors_posts, 'ID');

        // گرفتن پست‌های معمولی که انتخاب سردبیر نیستن
        $remaining_count = $count - count($editors_posts);
        if ($remaining_count > 0) {
            $args['posts_per_page'] = $remaining_count;
            $args['post__not_in'] = $editors_ids;

            $args['meta_query'] = array(
                'relation' => 'OR',
                array(
                    'key' => 'i8_editor_choice',
                    'value' => '1',
                    'compare' => '!='
                ),
                array(
                    'key' => 'i8_editor_choice',
                    'compare' => 'NOT EXISTS'
                )
            );

            $regular_posts = get_posts($args);
        } else {
            $regular_posts = array();
        }

        return array_merge($editors_posts, $regular_posts);
    }

    return get_posts($args);
}
