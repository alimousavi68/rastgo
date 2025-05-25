<?php
//header
get_header();
?>



<main class="main single-page-content">
    <section class="single-page-section">
        <?php
        get_template_part('template-parts/content/content-single');
        ?>

        <div class="container">
            <div class="row">
                <?php
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }
                ?>
            </div>
        </div>
    </section>

</main>





<?php
//footer
get_footer();
?>