<?php
//header
get_header();
?>

<main class="main">
    <div class="container">
        <div class="row align-items-start position-relative">

            <!-- Aside Section -->
            <div class="d-none d-lg-block col-lg-3 col-xl-2 col-xxl-auto position-sticky top-16">
                <aside class="sidebar pb-5">
                    <?php
                    dynamic_sidebar('top_section_right');
                    ?>
                </aside>
            </div>
            <!-- END Aside Section -->

            <!-- Article List Section -->
            <div class="col-lg-9 col-xl-10 col-xxl-9">
                <div class="main-container row">
                    <?php
                    dynamic_sidebar('hf-sidebar');
                    ?>
                </div>


            </div>
        </div>
        <!-- END Article List Section -->

    </div>
    </div>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <?php
            dynamic_sidebar('hms-sidebar');
            ?>
        </div>
    </section>
    <!-- END About Section -->

 </main>


<?php
get_footer();
?>