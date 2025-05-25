<?php
//header
get_header();
?>




<main class="main pb-5">
    <div class="container">
        <div class="row align-items-start position-relative">

            <!-- Aside Section -->
            <div class="d-none d-lg-block col-lg-3 col-xl-2 col-xxl-auto position-sticky top-16">
                <aside class="sidebar pb-5">
                    <div class="sidebar-search-box">
                        <form action="" method="" class="search-form">
                            <input type="text" class="form-control cs-inp mb-2" id="" placeholder=" جستجوی کلمه...">
                            <span class="d-block form-title mb-1">
                                از:
                            </span>

                            <div class="cs-date-container mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none" class="svg-icon">
                                    <g clip-path="url(#clip0_52_19)">
                                        <path
                                            d="M6.445 12.688V7.354H5.812C5.35913 7.59651 4.92102 7.86565 4.5 8.16V8.855C4.875 8.598 5.469 8.235 5.758 8.078H5.77V12.688H6.445ZM7.633 11.383C7.68 12.023 8.227 12.789 9.336 12.789C10.594 12.789 11.336 11.723 11.336 9.918C11.336 7.984 10.555 7.25 9.383 7.25C8.457 7.25 7.586 7.922 7.586 9.059C7.586 10.219 8.41 10.829 9.262 10.829C10.008 10.829 10.492 10.453 10.645 10.039H10.672C10.668 11.355 10.211 12.203 9.367 12.203C8.703 12.203 8.359 11.753 8.317 11.383H7.633ZM10.586 9.066C10.586 9.762 10.027 10.246 9.402 10.246C8.801 10.246 8.258 9.863 8.258 9.046C8.258 8.223 8.84 7.836 9.426 7.836C10.059 7.836 10.586 8.234 10.586 9.066Z"
                                            fill="#A6A6A6" />
                                        <path
                                            d="M3.5 0C3.63261 0 3.75979 0.0526784 3.85355 0.146447C3.94732 0.240215 4 0.367392 4 0.5V1H12V0.5C12 0.367392 12.0527 0.240215 12.1464 0.146447C12.2402 0.0526784 12.3674 0 12.5 0C12.6326 0 12.7598 0.0526784 12.8536 0.146447C12.9473 0.240215 13 0.367392 13 0.5V1H14C14.5304 1 15.0391 1.21071 15.4142 1.58579C15.7893 1.96086 16 2.46957 16 3V14C16 14.5304 15.7893 15.0391 15.4142 15.4142C15.0391 15.7893 14.5304 16 14 16H2C1.46957 16 0.960859 15.7893 0.585786 15.4142C0.210714 15.0391 0 14.5304 0 14V3C0 2.46957 0.210714 1.96086 0.585786 1.58579C0.960859 1.21071 1.46957 1 2 1H3V0.5C3 0.367392 3.05268 0.240215 3.14645 0.146447C3.24021 0.0526784 3.36739 0 3.5 0ZM2 2C1.73478 2 1.48043 2.10536 1.29289 2.29289C1.10536 2.48043 1 2.73478 1 3V14C1 14.2652 1.10536 14.5196 1.29289 14.7071C1.48043 14.8946 1.73478 15 2 15H14C14.2652 15 14.5196 14.8946 14.7071 14.7071C14.8946 14.5196 15 14.2652 15 14V3C15 2.73478 14.8946 2.48043 14.7071 2.29289C14.5196 2.10536 14.2652 2 14 2H2Z"
                                            fill="#A6A6A6" />
                                        <path
                                            d="M2.5 4C2.5 3.86739 2.55268 3.74021 2.64645 3.64645C2.74021 3.55268 2.86739 3.5 3 3.5H13C13.1326 3.5 13.2598 3.55268 13.3536 3.64645C13.4473 3.74021 13.5 3.86739 13.5 4V5C13.5 5.13261 13.4473 5.25979 13.3536 5.35355C13.2598 5.44732 13.1326 5.5 13 5.5H3C2.86739 5.5 2.74021 5.44732 2.64645 5.35355C2.55268 5.25979 2.5 5.13261 2.5 5V4Z"
                                            fill="#A6A6A6" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_52_19">
                                            <rect width="16" height="16" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <input type="text" placeholder="تاریخ" class="usage cs-date-inp form-control" />
                            </div>

                            <span class="d-block form-title mb-1">
                                تا:
                            </span>

                            <div class="cs-date-container mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none" class="svg-icon">
                                    <g clip-path="url(#clip0_52_19)">
                                        <path
                                            d="M6.445 12.688V7.354H5.812C5.35913 7.59651 4.92102 7.86565 4.5 8.16V8.855C4.875 8.598 5.469 8.235 5.758 8.078H5.77V12.688H6.445ZM7.633 11.383C7.68 12.023 8.227 12.789 9.336 12.789C10.594 12.789 11.336 11.723 11.336 9.918C11.336 7.984 10.555 7.25 9.383 7.25C8.457 7.25 7.586 7.922 7.586 9.059C7.586 10.219 8.41 10.829 9.262 10.829C10.008 10.829 10.492 10.453 10.645 10.039H10.672C10.668 11.355 10.211 12.203 9.367 12.203C8.703 12.203 8.359 11.753 8.317 11.383H7.633ZM10.586 9.066C10.586 9.762 10.027 10.246 9.402 10.246C8.801 10.246 8.258 9.863 8.258 9.046C8.258 8.223 8.84 7.836 9.426 7.836C10.059 7.836 10.586 8.234 10.586 9.066Z"
                                            fill="#A6A6A6" />
                                        <path
                                            d="M3.5 0C3.63261 0 3.75979 0.0526784 3.85355 0.146447C3.94732 0.240215 4 0.367392 4 0.5V1H12V0.5C12 0.367392 12.0527 0.240215 12.1464 0.146447C12.2402 0.0526784 12.3674 0 12.5 0C12.6326 0 12.7598 0.0526784 12.8536 0.146447C12.9473 0.240215 13 0.367392 13 0.5V1H14C14.5304 1 15.0391 1.21071 15.4142 1.58579C15.7893 1.96086 16 2.46957 16 3V14C16 14.5304 15.7893 15.0391 15.4142 15.4142C15.0391 15.7893 14.5304 16 14 16H2C1.46957 16 0.960859 15.7893 0.585786 15.4142C0.210714 15.0391 0 14.5304 0 14V3C0 2.46957 0.210714 1.96086 0.585786 1.58579C0.960859 1.21071 1.46957 1 2 1H3V0.5C3 0.367392 3.05268 0.240215 3.14645 0.146447C3.24021 0.0526784 3.36739 0 3.5 0ZM2 2C1.73478 2 1.48043 2.10536 1.29289 2.29289C1.10536 2.48043 1 2.73478 1 3V14C1 14.2652 1.10536 14.5196 1.29289 14.7071C1.48043 14.8946 1.73478 15 2 15H14C14.2652 15 14.5196 14.8946 14.7071 14.7071C14.8946 14.5196 15 14.2652 15 14V3C15 2.73478 14.8946 2.48043 14.7071 2.29289C14.5196 2.10536 14.2652 2 14 2H2Z"
                                            fill="#A6A6A6" />
                                        <path
                                            d="M2.5 4C2.5 3.86739 2.55268 3.74021 2.64645 3.64645C2.74021 3.55268 2.86739 3.5 3 3.5H13C13.1326 3.5 13.2598 3.55268 13.3536 3.64645C13.4473 3.74021 13.5 3.86739 13.5 4V5C13.5 5.13261 13.4473 5.25979 13.3536 5.35355C13.2598 5.44732 13.1326 5.5 13 5.5H3C2.86739 5.5 2.74021 5.44732 2.64645 5.35355C2.55268 5.25979 2.5 5.13261 2.5 5V4Z"
                                            fill="#A6A6A6" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_52_19">
                                            <rect width="16" height="16" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <input type="text" placeholder="تاریخ" class="usage cs-date-inp form-control" />
                            </div>

                            <span class="d-block form-title mb-2">
                                موضوع:
                            </span>

                            <select class="form-select cs-select-inp mb-2" aria-label="">
                                <option selected>انتخاب موضوع</option>
                                <option value="1">اول</option>
                                <option value="2">دوم</option>
                                <option value="3">سوم</option>
                            </select>

                            <span class="d-block form-title mb-1">
                                ناشران:
                            </span>

                            <!-- <select class="js-example-basic-single js-select2-01" name="state">
                                    <option value="AL">Alabama</option>
                                    <option value="WY">Wyoming</option>
                                </select> -->
                            <div class="mb-2 overflow-hidden js-select2-box">
                                <select class="js-states form-control js-select2-01" id="" multiple="multiple"
                                    name="states[]">
                                    <option value="AL">ناشر1</option>
                                    <option value="AL2">ناشر2</option>
                                </select>
                            </div>

                            <!-- <select class="form-select cs-select-inp mb-2" aria-label="">
                                    <option selected>انتخاب ناشر</option>
                                    <option value="1">اول</option>
                                    <option value="2">دوم</option>
                                    <option value="3">سوم</option>
                                </select> -->

                            <span class="d-block form-title mb-2">
                                نتیجه بررسی:
                            </span>
                            <select class="form-select cs-select-inp mb-2" aria-label="">
                                <option selected>انتخاب نتیجه</option>
                                <option value="1">اول</option>
                                <option value="2">دوم</option>
                                <option value="3">سوم</option>
                            </select>

                            <span class="d-block form-title mb-2">
                                شبکه های اجتماعی:
                            </span>
                            <div class="mb-2 overflow-hidden js-select2-box">
                                <select class="js-states form-control js-select2-01" id="" multiple="multiple"
                                    name="states[]">
                                    <option value="AL">شبکه1</option>
                                    <option value="AL2">شبکه2</option>
                                </select>
                            </div>
                            <!-- <select class="form-select cs-select-inp mb-3" aria-label="">
                                    <option selected>انتخاب شبکه</option>
                                    <option value="1">اول</option>
                                    <option value="2">دوم</option>
                                    <option value="3">سوم</option>
                                </select> -->

                            <button
                                class="btn cs-submit-btn d-flex w-100 align-items-center justify-content-center">
                                فیلتر
                            </button>
                        </form>
                    </div>
                </aside>
            </div>
            <!-- END Aside Section -->

            <!-- Article List Section -->
            <div class="col-lg-9 col-xl-10 col-xxl-9">
                <div class="main-container row">

                    <?php
                    if (have_posts()) :
                        while (have_posts()) :
                            the_post();
                    ?>
                            <!-- Article Item -->
                            <div class="col-md-6 col-xl-4">
                                <article class="article-item position-relative overflow-hidden">
                                    <a href="<?php the_permalink(); ?>" class="article-img-box d-block position-relative overflow-hidden">
                                        <?php echo i8_the_thumbnail('medium', 'article-img w-100 h-100 object-cover', $size = array('width' => '', 'height' => ''), true, '', false, true) ?>
                                    </a>
                                    <div class="article-content">
                                        <span class="article-tag">
                                            <?php
                                            $category = get_the_category();
                                            echo $category ? esc_html($category[0]->name) : '';
                                            ?>
                                        </span>
                                        <div class="article-time">
                                            <?php
                                            echo 'منتشر شده در ';
                                            the_date('Y/m/d ')
                                            ?>
                                        </div>
                                        <h3 class="article-title overflow-hidden">
                                            <a href="<?php the_permalink(); ?>" class="d-block article-link">
                                                <?php i8_limit_text(get_the_title(), 250, '...'); ?>
                                            </a>
                                        </h3>
                                    </div>
                                </article>
                            </div>
                            <!-- END Article Item -->
                    <?php
                        endwhile;
                        // Pagination
                        i8_custom_pagination();
                    else :
                        //to do 
                        echo '<p>پستی وجو ندارد!</p>';
                    endif;
                    ?>

                </div>
            </div>
            <!-- END Article List Section -->

        </div>
    </div>
</main>


<!-- main section -->


<!-- /main -->
<?php
//footer
get_footer();
?>