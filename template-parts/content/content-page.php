<?php
// post tags 
$posttags = get_the_tags();
$tag_icon = '';
$tag_icon = customizeSVG($tag_icon, 'var(--i8-dark-primary)', 'var(--i8-dark-primary)');
$i8_read_time = get_post_meta($post->ID, 'i8_read_time', true) ?? '۵';
?>
<div class="container">
    <!-- intro news -->
    <div class="row">
        <div class="col-12">
            <!-- news Title -->
            <h1 class="main-title text-center mb-4">
                <?php the_title(); ?>
            </h1>
        </div>
    </div>
 
    <!-- news body -->
    <div class="row pt-3 align-items-center">
        <?php the_content(); ?>
    </div>
    <!-- end container -->
   
</div>
<!--section 1-->