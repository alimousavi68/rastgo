<?php
// post tags 
$posttags = get_the_tags();
$tag_icon = '';
$tag_icon = customizeSVG($tag_icon, 'var(--i8-dark-primary)', 'var(--i8-dark-primary)');
$i8_read_time = get_post_meta($post->ID, 'i8_read_time', true) ?? '۵';
?>
<div class="container overflow-hidden">
    <!-- intro news -->
    <div class="row">
        <div class="col-12">
            <!-- news Image -->
            <?php echo i8_the_thumbnail('i8-xl-image', 'w-100 main-img img-fluid mb-4', $size = array('width' => 'auto', 'height' => 'auto'), true, '', false, true); ?>
            <!-- news Title -->
            <h1 class="main-title text-center mb-4">
                <?php the_title(); ?>
            </h1>
            <!-- news Metadata -->
            <div
                class="sub-box-details d-flex flex-column flex-md-row align-items-center justify-content-center mb-4">
                <span class="sub-box-item pe-2  border-end-0">
                    <?php
                    echo 'منتشر شده در ';
                    the_date('Y/m/d ')
                    ?>
                </span>
                <span class="sub-box-item px-2">
                    <?php if ($i8_read_time):
                        echo 'زمان مطالعه: ';
                        echo $i8_read_time;
                        echo ' دقیقه';
                    endif; ?>
                </span>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Secion -->
    <div class="single-page-breadcrumb py-2">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-column flex-md-row justify-content-between">
                    <?php if (function_exists('rastgo_breadcrumb')) rastgo_breadcrumb(); ?>
                    <div class="social-media-box d-flex align-items-center px-2 mx-1">
                        <span class="social-media-title">
                            اشتراک گذاری:
                        </span>
                        <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" class="social-media-item d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20"
                                fill="none" class="svg-icon">
                                <path
                                    d="M13.1666 8.4L20.9999 0H18.9999L12.2666 7.2L6.99992 0H0.333252L8.53325 11.2L0.333252 20H2.33325L9.43325 12.4L14.9999 20H21.6666L13.1666 8.4ZM3.29992 1.33333H5.96659L18.6666 18.6667H15.9999L3.29992 1.33333Z"
                                    fill="currentColor" />
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="social-media-item d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 16 24"
                                fill="none" class="svg-icon">
                                <path
                                    d="M10.4 4.8H14C14.3183 4.8 14.6235 4.67357 14.8486 4.44853C15.0736 4.22348 15.2 3.91826 15.2 3.6V1.2C15.2 0.88174 15.0736 0.576515 14.8486 0.351472C14.6235 0.126428 14.3183 0 14 0H10.4C8.80875 0 7.28263 0.632141 6.15741 1.75736C5.03219 2.88258 4.40005 4.4087 4.40005 6V9.6H2.00005C1.68179 9.6 1.37656 9.72643 1.15152 9.95147C0.926477 10.1765 0.800049 10.4817 0.800049 10.8V13.2C0.800049 13.5183 0.926477 13.8235 1.15152 14.0485C1.37656 14.2736 1.68179 14.4 2.00005 14.4H4.40005V22.8C4.40005 23.1183 4.52648 23.4235 4.75152 23.6485C4.97656 23.8736 5.28179 24 5.60005 24H8.00005C8.31831 24 8.62353 23.8736 8.84858 23.6485C9.07362 23.4235 9.20005 23.1183 9.20005 22.8V14.4H11.864C12.1382 14.408 12.4068 14.3218 12.6251 14.1559C12.8434 13.99 12.9983 13.7543 13.064 13.488L13.664 11.088C13.7086 10.9083 13.7109 10.7208 13.6709 10.54C13.6308 10.3593 13.5495 10.1903 13.4333 10.0462C13.3171 9.90209 13.1692 9.78683 13.001 9.70942C12.8329 9.63202 12.6491 9.59457 12.464 9.6H9.20005V6C9.20005 5.68174 9.32648 5.37652 9.55152 5.15147C9.77656 4.92643 10.0818 4.8 10.4 4.8Z"
                                    fill="#6281FF" />
                            </svg>
                        </a>
                        <a href="https://t.me/share/url?url=<?php the_permalink(); ?>" class="social-media-item d-flex align-items-center justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" class="svg-icon">
                                <path
                                    d="M12 0C5.37253 0 0 5.37253 0 12C0 18.6275 5.37253 24 12 24C18.6275 24 24 18.6275 24 12C24 5.37253 18.6275 0 12 0Z"
                                    fill="#40B3E0" />
                                <path
                                    d="M17.839 6.90289L15.6957 17.7092C15.6957 17.7092 15.396 18.4586 14.5716 18.0989L9.62556 14.3069L7.82706 13.4376L4.7995 12.4184C4.7995 12.4184 4.33488 12.2536 4.28988 11.8939C4.24497 11.5341 4.8145 11.3393 4.8145 11.3393L16.8498 6.61808C16.8498 6.61808 17.839 6.18345 17.839 6.90289Z"
                                    fill="white" />
                                <path
                                    d="M9.24549 17.5878C9.24549 17.5878 9.10112 17.5743 8.92121 17.0047C8.7414 16.4352 7.82715 13.4376 7.82715 13.4376L15.0962 8.82136C15.0962 8.82136 15.516 8.56654 15.501 8.82136C15.501 8.82136 15.5759 8.86626 15.3511 9.07608C15.1262 9.28598 9.64065 14.217 9.64065 14.217"
                                    fill="#D2E5F1" />
                                <path
                                    d="M11.522 15.7608L9.56561 17.5445C9.56561 17.5445 9.41271 17.6606 9.24536 17.5878L9.61999 14.2746"
                                    fill="#B5CFE4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Breadcrumb Secion -->
    <?php
    $result= get_post_meta($post->ID, 'i8_fact_result', true);
    if ($result) : ?>
        <div class="fact-check-card   border mx-auto p-0">
            <div class="rating-section   border-top border-bottom py-2 px-4 d-flex align-items-center" style="background-color: #F3F5F8;">
                <h5 class="context-title text-dark font-weight-bold">ادعا</h5>
            </div>
            <div class="claim-section-custom-border-rtl br p-3  bg-white ">
                <p class="claim-text-custom-font text-dark mb-0 pe-2" style="border-right: 4px solid #ffc107;">
                    <?php echo get_post_meta($post->ID, 'i8_fact_summary', true) ? get_post_meta($post->ID, 'i8_fact_summary', true) : 'موجود نیست' ?>
                </p>
            </div>

            <div class="rating-section border-top border-bottom py-2 px-4 d-flex align-items-center" style="background-color: #F3F5F8;">
                <h5 class="context-title text-dark font-weight-bold">نتیجه بررسی</h5>
            </div>
            <div class="context-section py-2 px-3 row-gap-2 d-flex bg-white ">
                <?php
                $factcheck_result = get_post_meta($post->ID, 'i8_fact_result', true);
                if ($factcheck_result == 'true') {
                    $factcheck_result = 'درست';
                    $factcheck_result_icon = get_template_directory_uri() . '/images/true.svg';
                    $text_color = 'text-success';
                } elseif ($factcheck_result == 'False') {
                    $factcheck_result = 'نادرست';
                    $factcheck_result_icon = get_template_directory_uri() . '/images/false.svg';
                    $text_color = 'text-danger';
                } elseif ($factcheck_result == 'halftrue') {
                    $factcheck_result = 'نیمه درست';
                    $factcheck_result_icon = get_template_directory_uri() . '/images/half-true.svg';
                    $text_color = 'text-warning';
                } elseif ($factcheck_result == 'Misleading') {
                    $factcheck_result = 'گمراه کننده';
                    $factcheck_result_icon = get_template_directory_uri() . '/images/misleading.svg';
                    $text_color = 'text-warning';
                } elseif ($factcheck_result == 'Unverifiable') {
                    $factcheck_result = 'غیر قابل اثبات';
                    $factcheck_result_icon = get_template_directory_uri() . '/images/unverifiable.svg';
                    $text_color = 'text-secondary';
                } elseif ($factcheck_result == 'Unfounded') {
                    $factcheck_result = 'بی اساس';
                    $factcheck_result_icon = get_template_directory_uri() . '/images/unfounded.svg';
                    $text_color = 'text-danger';
                } else {
                    $factcheck_result = 'این پست ادعایی ندارد.';
                }
                ?>
                <div class="icon-container ml-3 d-flex pt-3 pe-2">
                    <img src="<?php echo $factcheck_result_icon ?>" width="42" height="42" alt="" class="rating-icon-custom-size">
                </div>
                <div class="text-content flex-grow-1 d-flex flex-column row-gap-1">
                    <h3 class="rating-text <?php echo $text_color; ?> font-weight-bold mb-0 h2"><?php echo $factcheck_result; ?></h3>
                    <?php
                    $ranking_info_url = rastgo_get_ranking_page_url();
                    ?>
                    <a href="<?php echo ($ranking_info_url) ?? '#'; ?>" class="rating-link text-primary small d-block mt-1">
                        درباره این رتبه بندی
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5" />
                            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z" />
                        </svg>
                    </a>
                </div>
            </div>
            <p class="context-text d-flex gap-2 px-4 py-1 text-secondary bg-white">
                <?php echo get_post_meta($post->ID, 'i8_fact_result_summary', true) ? get_post_meta($post->ID, 'i8_fact_result_summary', true) : 'این پست ادعایی ندارد.' ?>
            </p>
        </div>
    <?php endif; ?>
    <!-- news body -->
    <div id="news_body" class="row pt-3 align-items-center">
        <?php the_content(); ?>
    </div>
    <!-- end container -->
    <!-- news tags -->
    <div class="row">
        <div class="col-12">
            <div class="tags-list p-4 d-flex flex-wrap">
                <span class="tag-title">
                    برچسب ها:
                </span>
                <?php
                echo $tag_icon;
                if ($posttags):
                    foreach ($posttags as $tag):
                        if ($tag):
                ?>
                            <a href="<?php echo get_tag_link($tag); ?>" class="tag-link ">
                                <?php echo '#' . $tag->name ?>
                            </a>
                <?php
                        else:
                            echo '<a href="#" class="tag-link ">بدون برچسب</a>';
                        endif;
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
    <!-- news publisher -->
    <?php
    // if this post have rumor_source taxonomy get retrive and echo rumor_source 's taxonomy for this post 
    $rumor_sources = get_the_terms($post->ID, 'rumor_source');
    if ($rumor_sources && !is_wp_error($rumor_sources)):
    ?>
        <div class="row mb-4">
            <div class="col-12">
                <div class="source-box">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <h4 class="source-box-title mb-0">
                            ناشران
                        </h4>
                    </div>
                    <div class="publishers-list d-flex align-items-center justify-content-center flex-wrap">
                        <?php
                        foreach ($rumor_sources as $source):
                            $source_link = get_term_link($source);
                        ?>
                            <a href="<?php echo esc_url($source_link); ?>" class="publishers-list-link d-flex align-items-center justify-content-center">
                                <svg width="20px" height="20px" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#325AFF" stroke="#325AFF">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title>open-external</title>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="icon" fill="#325AFF" transform="translate(85.333333, 64.000000)">
                                                <path d="M128,63.999444 L128,106.666444 L42.6666667,106.666667 L42.6666667,320 L256,320 L256,234.666444 L298.666,234.666444 L298.666667,362.666667 L4.26325641e-14,362.666667 L4.26325641e-14,64 L128,63.999444 Z M362.666667,1.42108547e-14 L362.666667,170.666667 L320,170.666667 L320,72.835 L143.084945,249.751611 L112.915055,219.581722 L289.83,42.666 L192,42.6666667 L192,1.42108547e-14 L362.666667,1.42108547e-14 Z" id="Combined-Shape"> </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <?php echo esc_html($source->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    else:
    // if not have rumor_source taxonomy show default publisher
    endif;
    ?>
    <!-- news publisher social media -->
    <?php
    // if this post have rumor_source taxonomy get retrive and echo rumor_source 's taxonomy for this post 
    $rumor_sources = get_the_terms($post->ID, 'social_network');
    if ($rumor_sources && !is_wp_error($rumor_sources)):
    ?>
        <div class="row mb-4">
            <div class="col-12">
                <div class="source-box">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <h4 class="source-box-title mb-0">
                            شبکه های اجتماعی
                        </h4>
                    </div>
                    <div class="publishers-list d-flex align-items-center justify-content-center flex-wrap">
                        <?php
                        foreach ($rumor_sources as $source):
                            $source_link = get_term_link($source);
                        ?>
                            <a href="<?php echo esc_url($source_link); ?>" class="publishers-list-link d-flex align-items-center justify-content-center">
                                <?php echo esc_html($source->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    else:
    // if not have rumor_source taxonomy show default publisher
    endif;
    ?>
</div>
<!-- news related post -->
<?php
get_template_part('template-parts/content/content-related-post');
?>
<!--section 1-->