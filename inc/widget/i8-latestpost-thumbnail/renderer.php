<?php
function i8_render_latest_posts($instance)
{
    $category = $instance['category'] ?? 'all';
    $count = $instance['count'] ?? 9;
    $sticky = $instance['sticky_editors'] ?? 0;
    $sticky_count = $instance['sticky_editors_count'] ?? 2;

    $posts = i8_get_latest_posts($category, $count, $sticky, $sticky_count);
?>
    <div class="row i8-last-post-1">

        <?php foreach ($posts as $item) {
        ?>

            <div class="col-md-6 col-xl-4">
                <article class="article-item position-relative overflow-hidden <?php $x = get_post_meta($item->ID, 'i8_editor_choice', true);
                                                                                echo get_post_meta($item->ID, 'i8_editor_choice', true) == 1 ? 'article-pin-active' : ''; ?>">
                    <?php if (get_post_meta($item->ID, 'i8_editor_choice', true) == 1): ?>
                        <span class="article-pin position-absolute top-0 right-0">انتخاب سردبیران</span>
                    <?php endif; ?>

                    <a href="<?php echo get_the_permalink($item->ID); ?>" class="article-img-box d-block position-relative overflow-hidden">
                        <?php echo get_the_post_thumbnail($item->ID, 'medium', ['class' => 'article-img w-100 h-100 object-cover']) ?>

                    </a>

                    <div class="article-content">
                        <?php
                            $post_category = get_post_meta( $item->ID, 'i8_primary_category',true );
                            if ( $post_category ) {
                                $category = get_category( $post_category );
                                if ( $category ) {
                                    echo '<span class="article-tag">' . esc_html( $category->name ) . '</span>';
                                }
                            } 
                            ?>
                        <div class="article-time">
                            منتشر شده در <?php echo get_the_date('Y/m/d', $item->ID) ?> ساعت <?php
                                                                                                echo get_the_date('H:i',  $item->ID); ?>
                        </div>
                        <h3 class="article-title overflow-hidden">
                            <a href="<?php echo get_permalink( $item->ID); ?>" class="d-block article-link">
                                <?php echo $item->post_title; ?>
                            </a>
                        </h3>
                    </div>
                </article>
            </div>
        <?php
        }
        wp_reset_postdata(); ?>


    </div>
    <div class="col-12 text-center pt-4">
        <a href="#" class="article-more">
            نمایش بیشتر
          </a>
    </div>
<?php
}
