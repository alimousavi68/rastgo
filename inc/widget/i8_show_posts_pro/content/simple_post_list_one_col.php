<?php
echo $args['before_widget'];

echo '<div class="text-title box-title  ' . $head_font_size . ' fw-7 m-0 me-lg-2 me-md-2">';
if ($hide_title != 'on') {
    // echo $args['before_title'] . $title . $args['after_title'];
    echo $args['before_title'] . $icon_print . $title . $args['after_title'];
}
echo $sub_title_print . '</div>';

if ($hide_thumb != 'on'):
    echo '<div class="row mini-article simple-list">';
else:
    $no_bullet_class = ($icon_list_bullet) ? 'no-bullet' : '';
    echo '<ul class="row mini-article ' . $no_bullet_class . ' d-flex flex-colmun gap-2 px-0">';
endif;
?>
<style>
    .bullet-border {
        background-color: var(--i8-light-blue);
        width: 30px;
        height: 30px;
        border-radius: 20px;
        padding: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .no-bullet li {
        list-style: none;
        gap: 5px;
        margin-right: 15px;
        padding-left: 27px;
    }
</style>
<?php

// نمایش محتویات ویجت- نمایش پست ها
$category_posts = new WP_Query(
    array(
        'posts_per_page' => $num,
        'cat' => $cat,
        'order' => 'DESC',
        'orderby' => $orderby
    )
);


if ($category_posts->have_posts()) {
    while ($category_posts->have_posts()) {
        $category_posts->the_post();
        ?>
        <?php if ($hide_thumb != 'on'): ?>
            <div
                class="<?php echo $col; ?> d-flex mb-3 align-items-start gap-2 align-items-start  px-xl-3 px-lg-3 px-md-3 px-sm-1 px-1  pb-3 <?php echo ($category_posts->current_post + 1 == $category_posts->post_count) ? '' : 'border-bottom'; ?>">
                <div>
                    <a href="<?php the_permalink(); ?>" class="image_frame">
                        <?php echo i8_the_thumbnail('i8-lg-290-163', 'hover ' . $thumb_radius, array("width" => $thumb_width , "height" => $thumb_height)); ?>
                    </a>
                </div>
                <div class=" post-title">
                    <a class="i8-blink <?php echo $title_font_size; ?> <?php echo $title_font_weight; ?> l22-05 text-normal"
                        href="<?php echo get_the_permalink(); ?>">
                        <?php i8_limit_text(get_the_title(), 150, '...'); ?>
                    </a>
                    <?php if ($hide_excerpt != 'on'): ?>
                        <p class="lead text-gray mb-0 d-lg-block d-md-block d-none lead mb-0 text-gray pt-1">
                            <?php i8_limit_text(get_the_excerpt(), 135, '...'); ?>
                        </p>
                    <?php endif; ?>
                </div>

            </div>
        <?php elseif ($icon_list_bullet): ?>
            <li class="<?php echo $col; ?> mb-1 d-flex flex-row align-items-top">
                <div class="bullet-border">
                    <?php echo customizeSVG($icon_list_bullet, '#fff', '#fff', 30, 30, ''); ?>
                </div>
                <a class="i8-blink <?php echo $title_font_size; ?> <?php echo $title_font_weight; ?> l22-05 text-normal cursor-pointer text-grey"
                    href="<?php echo get_the_permalink(); ?>">
                    <?php i8_limit_text(get_the_title(), 72, '...'); ?>
                </a>
                <?php if ($hide_excerpt != 'on'): ?>
                    <p>
                        <?php i8_limit_text(get_the_excerpt(), 100, '...'); ?>
                    </p>
                <?php endif; ?>

            </li>
        <?php else: ?>
            <li class="<?php echo $col; ?> mb-1">
                <a class="i8-blink <?php echo $title_font_size; ?>  <?php echo $title_font_weight; ?> l22-05 text-normal cursor-pointer text-grey"
                    href="<?php echo get_the_permalink(); ?>">
                    <?php i8_limit_text(get_the_title(), 72, '...'); ?>
                </a>
                <?php if ($hide_excerpt != 'on'): ?>
                    <p>
                        <?php i8_limit_text(get_the_excerpt(), 100, '...'); ?>
                    </p>
                <?php endif; ?>

            </li>
            <?php
        endif;
    ?>
    <?php
    }
    wp_reset_postdata();
}

if ($hide_thumb != 'on'):
    echo '</div>';
else:
    echo '</ul>';
endif;

echo $args['after_widget'];


?>