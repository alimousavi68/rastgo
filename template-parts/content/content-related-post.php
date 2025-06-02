<?php
// دریافت برچسب‌های مرتبط با پست فعلی
$post_tags = wp_get_post_tags(get_the_ID(), array('fields' => 'ids'));

// دریافت دسته‌بندی‌های مرتبط با پست فعلی
$post_categories = wp_get_post_categories(get_the_ID(), array('fields' => 'ids'));
$num = 4;
// ساخت آرایه از آرگومان‌های برای بازیابی خبرهای مرتبط
$args = array(
    'post__not_in' => array(get_the_ID()), // عدم دریافت خود پست فعلی
    'posts_per_page' => $num,
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => array(
        'relation' => 'OR',
        array(
            'taxonomy' => 'post_tag',
            'field' => 'id',
            'terms' => $post_tags,
        )
    ),
);

// اجرای پرس و جو برای بازیابی خبرهای مرتبط
$related_posts = new WP_Query($args);
if ($related_posts->have_posts()) :
?>

<section class="offers-post-section mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="main-title text-center mb-4">
                    گزارش های مرتبط
                </h4>
            </div>
            <?php
            // نمایش خبرهای مرتبط
            
                while ($related_posts->have_posts()) {
                    $related_posts->the_post();
            ?>
                    <div class="col-md-6 col-xl-3">
                        <article class="article-item position-relative overflow-hidden">
                            <!-- post thumbnail -->
                            <a href="<?php the_permalink(); ?>" class="article-img-box d-block position-relative overflow-hidden">
                                <?php echo i8_the_thumbnail('medium', 'article-img w-100 h-100 object-cover', $dimenition = array('width' => '', 'height' => ''), true, '', false, true); ?>
                            </a>

                            <div class="article-content">
                                <!-- post category -->
                                <span class="article-tag">
                                    <?php
                                    $category = get_the_category();
                                    echo $category ? esc_html($category[0]->name) : '';
                                    ?>
                                </span>
                                <!-- post pub date -->
                                <div class="article-time">
                                    <?php
                                    echo 'منتشر شده در ';
                                    the_date('Y/m/d ')
                                    ?>
                                </div>

                                <h3 class="article-title overflow-hidden">
                                    <a href="<?php echo get_the_permalink(); ?>" class="d-block article-link">
                                        <?php i8_limit_text(get_the_title(), 72, '...'); ?>
                                    </a>
                                </h3>
                            </div>
                        </article>
                    </div>

            <?php
                }
            
            // بازنشانی پست فعلی
            wp_reset_postdata();
            ?>



        </div>
    </div>
</section>
<?php endif; ?>

<?php
