<?php
//header
get_header();
?>
<main class="main single-page-content">
    <section class="single-page-section">
        <div class="container ">
            <div class="row  border border-2 p-4 ">
                <?php
                get_template_part('template-parts/content/content-page');
                ?>

            </div>
        </div>
    </section>

</main>


<?php
//footer
get_footer();
?>