<?php
// post tags 
$posttags = get_the_tags();

$tag_icon = '';
$tag_icon = customizeSVG($tag_icon, 'var(--i8-dark-primary)', 'var(--i8-dark-primary)');

$reference_name = (get_post_meta($post->ID, 'hasht-reference-name', true)) ? get_post_meta($post->ID, 'hasht-reference-name', true) : '';
$reference_link = (get_post_meta($post->ID, 'hasht-reference-link', true)) ? get_post_meta($post->ID, 'hasht-reference-link', true) : '#';
?>
<div class="container">

    <!-- intro news -->
    <div class="row">
        <div class="col-12">
            <!-- news Image -->
            <?php echo i8_the_thumbnail('', 'w-100 main-img img-fluid mb-4', $size = array('width' => 'auto', 'height' => 'auto'), true, '', false, true); ?>
            <!-- news Title -->
            <h1 class="main-title text-center mb-4">
                <?php the_title(); ?>
            </h1>
            <!-- news Metadata -->
            <div
                class="sub-box-details d-flex flex-column flex-md-row align-items-center justify-content-center mb-4">
                <span class="sub-box-item pe-2">
                    <?php
                    echo 'منتشر شده در ';
                    the_date('Y/m/d ')
                    ?>
                </span>
                <span class="sub-box-item px-2">
                    ۵ دقیقه مطالعه
                </span>
                <?php if ($reference_name): ?>
                    <a href="<?php echo ($reference_link) ? $reference_link : '#'; ?>" class="sub-box-link ps-2">
                        <?php echo $reference_name; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Secion -->
    <div class="single-page-breadcrumb">
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
    <!-- news body -->
    <div class="row py-3 align-items-center mb-3">
        <?php the_content(); ?>
    </div>
    <!-- end container -->
    <!-- news tags -->
    <div class="row mb-4">
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

    <!-- news source -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="source-box">
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <h4 class="source-box-title mb-0">
                        منابع
                    </h4>
                </div>
                <ul class="source-box-list p-0 m-0">
                    <li class="source-list-item list-unstyled mb-1">
                        1- مصاحبه ایمیلی با دارن لینویل، <a href="#" class="source-link-item">استاد ارتباطات
                            دانشگاه</a> کلمسون، ۱۲ مه ۲۰۲۵
                    </li>
                    <li class="source-list-item list-unstyled mb-1">
                        1- مصاحبه ایمیلی با دارن لینویل، <a href="#" class="source-link-item">استاد ارتباطات
                            دانشگاه</a> کلمسون، ۱۲ مه ۲۰۲۵
                    </li>
                    <li class="source-list-item list-unstyled mb-1">
                        اسکات رادنیتز، استاد دانشکده مطالعات بین‌الملل جکسون در دانشگاه واشنگتن، ۱۲ مه ۲۰۲۵
                    </li>
                    <li class="source-list-item list-unstyled mb-1">
                        اسکات رادنیتز، استاد دانشکده مطالعات بین‌الملل جکسون در دانشگاه واشنگتن، ۱۲ مه ۲۰۲۵
                    </li>
                    <li class="source-list-item list-unstyled mb-1">
                        اسکات رادنیتز، استاد دانشکده مطالعات بین‌الملل جکسون در دانشگاه واشنگتن، ۱۲ مه ۲۰۲۵
                    </li>
                    <li class="source-list-item list-unstyled mb-1">
                        اسکات رادنیتز، استاد دانشکده مطالعات بین‌الملل جکسون در دانشگاه واشنگتن، ۱۲ مه ۲۰۲۵
                    </li>
                    <li class="source-list-item list-unstyled mb-1">
                        اسکات رادنیتز، استاد دانشکده مطالعات بین‌الملل جکسون در دانشگاه واشنگتن، ۱۲ مه ۲۰۲۵
                    </li>
                    <li class="source-list-item list-unstyled mb-1">
                        اسکات رادنیتز، استاد دانشکده مطالعات بین‌الملل جکسون در دانشگاه واشنگتن، ۱۲ مه ۲۰۲۵
                    </li>
                    <li class="source-list-item list-unstyled mb-1">
                        اسکات رادنیتز، استاد دانشکده مطالعات بین‌الملل جکسون در دانشگاه واشنگتن، ۱۲ مه ۲۰۲۵
                    </li>
                    <li class="source-list-item list-unstyled mb-1">
                        اسکات رادنیتز، استاد دانشکده مطالعات بین‌الملل جکسون در دانشگاه واشنگتن، ۱۲ مه ۲۰۲۵
                    </li>
                    <li class="source-list-item list-unstyled mb-1">
                        اسکات رادنیتز، استاد دانشکده مطالعات بین‌الملل جکسون در دانشگاه واشنگتن، ۱۲ مه ۲۰۲۵
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- news publisher -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="source-box">
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <h4 class="source-box-title mb-0">
                        ناشران
                    </h4>
                </div>
                <div class="publishers-list d-flex align-items-center justify-content-center flex-wrap">
                    <a href="#"
                        class="publishers-list-link d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="36" height="22" viewBox="0 0 36 22" fill="none" class="me-1">
                            <rect x="0.5" y="0.106934" width="35" height="21"
                                fill="url(#pattern0_132_85)" />
                            <defs>
                                <pattern id="pattern0_132_85" patternContentUnits="objectBoundingBox"
                                    width="1" height="1">
                                    <use xlink:href="#image0_132_85"
                                        transform="matrix(0.002 0 0 0.00333333 0.2 0)" />
                                </pattern>
                                <image id="image0_132_85" width="300" height="300"
                                    preserveAspectRatio="none"
                                    xlink:href="data:image/png;base64,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" />
                            </defs>
                        </svg>

                        مهدی یراحی
                    </a>
                    <a href="#"
                        class="publishers-list-link d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="36" height="22" viewBox="0 0 36 22" fill="none" class="me-1">
                            <rect x="0.5" y="0.106934" width="35" height="21"
                                fill="url(#pattern0_132_85)" />
                            <defs>
                                <pattern id="pattern0_132_85" patternContentUnits="objectBoundingBox"
                                    width="1" height="1">
                                    <use xlink:href="#image0_132_85"
                                        transform="matrix(0.002 0 0 0.00333333 0.2 0)" />
                                </pattern>
                                <image id="image0_132_85" width="300" height="300"
                                    preserveAspectRatio="none"
                                    xlink:href="data:image/png;base64,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" />
                            </defs>
                        </svg>

                        مسیح علینژاد
                    </a>
                    <a href="#"
                        class="publishers-list-link d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                            fill="none" class="me-1">
                            <path
                                d="M12.5 6.43991C11.2814 6.43991 10.0901 6.80095 9.07684 7.47735C8.06358 8.15375 7.27383 9.11516 6.80748 10.24C6.34113 11.3648 6.21911 12.6026 6.45686 13.7966C6.69459 14.9907 7.28142 16.0876 8.14314 16.9485C9.00484 17.8093 10.1027 18.3956 11.2979 18.6331C12.4932 18.8707 13.732 18.7487 14.8579 18.2829C15.9838 17.817 16.9461 17.028 17.6231 16.0157C18.3003 15.0033 18.6616 13.8132 18.6616 12.5957C18.6635 11.7867 18.5056 10.9854 18.1966 10.2377C17.8876 9.48988 17.4339 8.8105 16.8613 8.23849C16.2887 7.66647 15.6087 7.21312 14.8603 6.90446C14.1118 6.59581 13.3097 6.43794 12.5 6.43991ZM12.5 16.6044C11.7064 16.6044 10.9306 16.3693 10.2707 15.9288C9.61097 15.4884 9.09662 14.8623 8.79293 14.1298C8.48923 13.3973 8.40977 12.5913 8.56459 11.8136C8.71941 11.036 9.10156 10.3216 9.66267 9.76101C10.2238 9.20043 10.9389 8.81863 11.7172 8.66396C12.4956 8.50928 13.3023 8.58866 14.0356 8.89208C14.7688 9.19549 15.3955 9.70936 15.8363 10.3685C16.2772 11.0277 16.5125 11.8028 16.5125 12.5957C16.5125 13.6588 16.0898 14.6786 15.3373 15.4303C14.5849 16.1821 13.5641 16.6044 12.5 16.6044ZM20.3597 6.18467C20.3597 6.48163 20.2717 6.77191 20.1065 7.0188C19.9414 7.26571 19.7066 7.45816 19.432 7.57179C19.1575 7.68543 18.8553 7.71516 18.5637 7.65723C18.2722 7.59929 18.0045 7.4563 17.7943 7.24633C17.5842 7.03636 17.441 6.76883 17.383 6.47759C17.3249 6.18633 17.3547 5.88446 17.4685 5.61011C17.5822 5.33577 17.7749 5.10128 18.0219 4.93631C18.2692 4.77132 18.5597 4.68326 18.8569 4.68326C19.2555 4.68326 19.6378 4.84145 19.9196 5.12302C20.2015 5.40458 20.3597 5.78648 20.3597 6.18467ZM24.4324 7.68607C24.4761 5.81957 23.7792 4.01153 22.4937 2.65636C21.1445 1.35567 19.3339 0.642907 17.4593 0.674497C15.5056 0.584412 9.49436 0.584412 7.54071 0.674497C5.67302 0.634094 3.86448 1.32988 2.50626 2.61131C1.22081 3.96649 0.523925 5.77453 0.567627 7.64103C0.477458 9.59285 0.477458 15.5985 0.567627 17.5503C0.523925 19.4169 1.22081 21.2249 2.50626 22.58C3.86448 23.8615 5.67302 24.5572 7.54071 24.5168C9.52441 24.637 15.4756 24.637 17.4593 24.5168C19.3276 24.5605 21.1373 23.8643 22.4937 22.58C23.7792 21.2249 24.4761 19.4169 24.4324 17.5503C24.5225 15.5985 24.5225 9.59285 24.4324 7.64103V7.68607ZM21.8776 19.6973C21.6735 20.2138 21.3656 20.6827 20.9726 21.0753C20.5796 21.4679 20.1103 21.7756 19.5933 21.9795C17.2603 22.4508 14.8753 22.6123 12.5 22.4599C10.1297 22.6125 7.74961 22.4509 5.42173 21.9795C4.90487 21.7756 4.4354 21.4679 4.04247 21.0753C3.64953 20.6827 3.3415 20.2138 3.13745 19.6973C2.50626 18.1058 2.64152 14.3523 2.64152 12.6107C2.64152 10.869 2.50626 7.10053 3.13745 5.52405C3.33574 5.00256 3.64158 4.52857 4.03511 4.13281C4.42864 3.73707 4.90106 3.42841 5.42173 3.22689C7.74961 2.75542 10.1297 2.59387 12.5 2.74644C14.8753 2.59412 17.2603 2.75567 19.5933 3.22689C20.1103 3.43075 20.5796 3.7385 20.9726 4.13107C21.3656 4.52363 21.6735 4.99265 21.8776 5.50903C22.5088 7.10053 22.3585 10.854 22.3585 12.5957C22.3585 14.3373 22.5088 18.1058 21.8776 19.6823V19.6973Z"
                                fill="#DD215C" />
                        </svg>

                        مسیح علینژاد
                    </a>
                    <a href="#"
                        class="publishers-list-link d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                            fill="none" class="me-1">
                            <path
                                d="M12.5 6.43991C11.2814 6.43991 10.0901 6.80095 9.07684 7.47735C8.06358 8.15375 7.27383 9.11516 6.80748 10.24C6.34113 11.3648 6.21911 12.6026 6.45686 13.7966C6.69459 14.9907 7.28142 16.0876 8.14314 16.9485C9.00484 17.8093 10.1027 18.3956 11.2979 18.6331C12.4932 18.8707 13.732 18.7487 14.8579 18.2829C15.9838 17.817 16.9461 17.028 17.6231 16.0157C18.3003 15.0033 18.6616 13.8132 18.6616 12.5957C18.6635 11.7867 18.5056 10.9854 18.1966 10.2377C17.8876 9.48988 17.4339 8.8105 16.8613 8.23849C16.2887 7.66647 15.6087 7.21312 14.8603 6.90446C14.1118 6.59581 13.3097 6.43794 12.5 6.43991ZM12.5 16.6044C11.7064 16.6044 10.9306 16.3693 10.2707 15.9288C9.61097 15.4884 9.09662 14.8623 8.79293 14.1298C8.48923 13.3973 8.40977 12.5913 8.56459 11.8136C8.71941 11.036 9.10156 10.3216 9.66267 9.76101C10.2238 9.20043 10.9389 8.81863 11.7172 8.66396C12.4956 8.50928 13.3023 8.58866 14.0356 8.89208C14.7688 9.19549 15.3955 9.70936 15.8363 10.3685C16.2772 11.0277 16.5125 11.8028 16.5125 12.5957C16.5125 13.6588 16.0898 14.6786 15.3373 15.4303C14.5849 16.1821 13.5641 16.6044 12.5 16.6044ZM20.3597 6.18467C20.3597 6.48163 20.2717 6.77191 20.1065 7.0188C19.9414 7.26571 19.7066 7.45816 19.432 7.57179C19.1575 7.68543 18.8553 7.71516 18.5637 7.65723C18.2722 7.59929 18.0045 7.4563 17.7943 7.24633C17.5842 7.03636 17.441 6.76883 17.383 6.47759C17.3249 6.18633 17.3547 5.88446 17.4685 5.61011C17.5822 5.33577 17.7749 5.10128 18.0219 4.93631C18.2692 4.77132 18.5597 4.68326 18.8569 4.68326C19.2555 4.68326 19.6378 4.84145 19.9196 5.12302C20.2015 5.40458 20.3597 5.78648 20.3597 6.18467ZM24.4324 7.68607C24.4761 5.81957 23.7792 4.01153 22.4937 2.65636C21.1445 1.35567 19.3339 0.642907 17.4593 0.674497C15.5056 0.584412 9.49436 0.584412 7.54071 0.674497C5.67302 0.634094 3.86448 1.32988 2.50626 2.61131C1.22081 3.96649 0.523925 5.77453 0.567627 7.64103C0.477458 9.59285 0.477458 15.5985 0.567627 17.5503C0.523925 19.4169 1.22081 21.2249 2.50626 22.58C3.86448 23.8615 5.67302 24.5572 7.54071 24.5168C9.52441 24.637 15.4756 24.637 17.4593 24.5168C19.3276 24.5605 21.1373 23.8643 22.4937 22.58C23.7792 21.2249 24.4761 19.4169 24.4324 17.5503C24.5225 15.5985 24.5225 9.59285 24.4324 7.64103V7.68607ZM21.8776 19.6973C21.6735 20.2138 21.3656 20.6827 20.9726 21.0753C20.5796 21.4679 20.1103 21.7756 19.5933 21.9795C17.2603 22.4508 14.8753 22.6123 12.5 22.4599C10.1297 22.6125 7.74961 22.4509 5.42173 21.9795C4.90487 21.7756 4.4354 21.4679 4.04247 21.0753C3.64953 20.6827 3.3415 20.2138 3.13745 19.6973C2.50626 18.1058 2.64152 14.3523 2.64152 12.6107C2.64152 10.869 2.50626 7.10053 3.13745 5.52405C3.33574 5.00256 3.64158 4.52857 4.03511 4.13281C4.42864 3.73707 4.90106 3.42841 5.42173 3.22689C7.74961 2.75542 10.1297 2.59387 12.5 2.74644C14.8753 2.59412 17.2603 2.75567 19.5933 3.22689C20.1103 3.43075 20.5796 3.7385 20.9726 4.13107C21.3656 4.52363 21.6735 4.99265 21.8776 5.50903C22.5088 7.10053 22.3585 10.854 22.3585 12.5957C22.3585 14.3373 22.5088 18.1058 21.8776 19.6823V19.6973Z"
                                fill="#DD215C" />
                        </svg>

                        مسیح علینژاد
                    </a>
                    <a href="#"
                        class="publishers-list-link d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                            fill="none" class="me-1">
                            <g clip-path="url(#clip0_132_65)">
                                <path
                                    d="M12.5 0.606934C5.87253 0.606934 0.5 5.97946 0.5 12.6069C0.5 19.2344 5.87253 24.6069 12.5 24.6069C19.1275 24.6069 24.5 19.2344 24.5 12.6069C24.5 5.97946 19.1275 0.606934 12.5 0.606934Z"
                                    fill="#40B3E0" />
                                <path
                                    d="M18.339 7.50965L16.1957 18.3159C16.1957 18.3159 15.896 19.0654 15.0716 18.7057L10.1256 14.9137L8.32706 14.0444L5.2995 13.0252C5.2995 13.0252 4.83488 12.8603 4.78988 12.5006C4.74497 12.1409 5.3145 11.9461 5.3145 11.9461L17.3498 7.22484C17.3498 7.22484 18.339 6.79022 18.339 7.50965Z"
                                    fill="white" />
                                <path
                                    d="M9.74549 18.1947C9.74549 18.1947 9.60112 18.1812 9.42121 17.6115C9.2414 17.042 8.32715 14.0444 8.32715 14.0444L15.5962 9.42819C15.5962 9.42819 16.016 9.17338 16.001 9.42819C16.001 9.42819 16.0759 9.4731 15.8511 9.68291C15.6262 9.89282 10.1406 14.8238 10.1406 14.8238"
                                    fill="#D2E5F1" />
                                <path
                                    d="M12.022 16.3676L10.0656 18.1513C10.0656 18.1513 9.91271 18.2673 9.74536 18.1946L10.12 14.8813"
                                    fill="#B5CFE4" />
                            </g>
                            <defs>
                                <clipPath id="clip0_132_65">
                                    <rect width="24" height="24" fill="white"
                                        transform="translate(0.5 0.606934)" />
                                </clipPath>
                            </defs>
                        </svg>

                        مسیح علینژاد
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- news related post -->
<?php
get_template_part('template-parts/content/content-related-post');
?>


<!--section 1-->