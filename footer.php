<?php
//footer
?>


<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<footer class="footer px-3 px-lg-0">
  <div class="footer-container mx-auto mb-4">
    <div class="container">
      <div class="row">

        <div class="col-md-6 col-lg-3">
          <?php dynamic_sidebar('fr-sidebar'); ?>
        </div>

        <div class="col-md-6 col-lg-3">
          <?php dynamic_sidebar('fc-sidebar'); ?>
        </div>

        <div class="col-md-6 col-lg-3">
          <?php dynamic_sidebar('fcc-sidebar'); ?>
        </div>

        <div class="col-md-6 col-lg-3">
          <?php dynamic_sidebar('fl-sidebar'); ?>
        </div>

      </div>
    </div>
  </div>
  <!-- footer menu -->
  <div class="col-12 bottom-menu pt-2">

    <div class="container p-3 ">
      <div class="row d-flex text-center text-lg-end text-md-end text-sm-center row-gap-3 flex-wrap-reverse">
        <span class="col-12 col-lg-10 col-md-10 col-sm-12 fs-14">
        <?php
          $copyright_text = rastgo_get_copyright_text();
          echo $copyright_text ? $copyright_text : 'تمامی حقوق این سایت محفوظ است.';
        ?>

        </span>
        <div class="col-12 col-lg-2 col-sm-12 col-md-2 fs-14">
          <div
            class="d-xl-flex d-lg-flex d-md-flex justify-content-center gap-2 social-links justify-content-center align-items-center">
            <span class="">طراحی و تولید: <a href="https://ihasht.ir/" class="text-white i8-blink" title="هشت بهشت"
                alt="Website designer: Hasht Behesht professional website design site" target="_blank">هشت بهشت</a>
            </span>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- End - footer menu -->
</footer>







<!-- Search Modal -->
<div class="modal fade search-modal" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="searchModalLabel">جست و جو</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
          <input type="text" class="form-control" name="s" placeholder="محتوا">
        </div>
        <div class="modal-footer justify-content-start">
          <button type="submit" class="btn btn-success">جست و جو</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">انصراف</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END Search Modal -->



<!-- footer -->

<!-- // link to top -->
<script type="text/javascript" defer>
  document.addEventListener('DOMContentLoaded', function() {
    "use strict";

    // Scroll back to top
    var progressPath = document.querySelector('.progress-wrap path');
    if (progressPath) {
      var pathLength = progressPath.getTotalLength();
      progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
      progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
      progressPath.style.strokeDashoffset = pathLength;
      progressPath.getBoundingClientRect();
      progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';

      var updateProgress = function() {
        var scroll = window.scrollY || document.documentElement.scrollTop;
        var height = (document.documentElement.scrollHeight || document.body.scrollHeight) - window.innerHeight;
        var progress = pathLength - (scroll * pathLength) / height;
        progressPath.style.strokeDashoffset = progress;
      };

      updateProgress();
      window.addEventListener('scroll', updateProgress);

      var offset = 50;
      var duration = 550;
      window.addEventListener('scroll', function() {
        var progressWrap = document.querySelector('.progress-wrap');
        if (window.scrollY > offset) {
          progressWrap.classList.add('active-progress');
        } else {
          progressWrap.classList.remove('active-progress');
        }
      });

      document.querySelector('.progress-wrap').addEventListener('click', function(event) {
        event.preventDefault();
        window.scrollTo({
          top: 0,
          behavior: "smooth"
        });
      });
    }
  });
</script>

<style>
  :root {
    --prgc-main: var(--i8-light-complete-color);
    --prgc-arrow: var(--i8-light-complete-color);
    --prgc-arrow2: var(--i8-light-complete-color);
    --prgc-line: rgb(255, 153, 0 / 20%);
  }

  /* #Progress
================================================== */

  .progress-wrap {
    position: fixed;
    right: 10px;
    bottom: 15vh;
    height: 46px;
    width: 46px;
    cursor: pointer;
    display: block;
    border-radius: 50px;
    box-shadow: inset 0 0 0 2px #325aff;
    z-index: 10000;
    opacity: 0;
    visibility: hidden;
    transform: translateY(15px);
    -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
    /* background-color: #ffffff; */
  }

  .progress-wrap.active-progress {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }

  .progress-wrap::after {
    position: absolute;
    content: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="blue" class="bi bi-arrow-up-short" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5"/></svg>');
    text-align: center;
    line-height: 46px;
    font-size: 20px;
    color: var(--i8-light-complete-color);
    left: 0;
    top: 0;
    height: 46px;
    width: 46px;
    cursor: pointer;
    display: block;
    z-index: 1;
    -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
  }

  .progress-wrap:hover::after {
    opacity: 0;
  }

  .progress-wrap::before {
    position: absolute;
    content: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="blue" class="bi bi-arrow-up-short" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5"/></svg>');
    text-align: center;
    line-height: 46px;
    font-size: 20px;
    opacity: 0;
    background-image: linear-gradient(298deg, var(--prgc-arrow), var(--prgc-arrow2));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    left: 0;
    top: 0;
    height: 46px;
    width: 46px;
    cursor: pointer;
    display: block;
    z-index: 2;
    -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
  }

  .progress-wrap:hover::before {
    opacity: 1;
  }

  .progress-wrap svg path {
    fill: none;
  }

  .progress-wrap svg.progress-circle path {
    stroke: var(--prgc-main);
    stroke-width: 4;
    box-sizing: border-box;
    -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
  }
</style>

<div class="progress-wrap">
  <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
    <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
  </svg>
</div>
<!-- end link to top  -->

<!-- theme switch -->

<?php rastgo_mobile_offcanvas_menu( 'mobile' ); ?>

<?php wp_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/persianDatepicker.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/select2.min.js"></script>
<script>
  (function($) {
    // Change Theme Button
    jQuery(document).ready(function() {

      // بازیابی وضعیت تم از localStorage
      if (localStorage.getItem("theme") === "dark") {
        jQuery("html").addClass("dark-theme");
        jQuery("#themeSwitch").addClass("switch-active");
      } else {
        jQuery("html").removeClass("dark-theme");
        jQuery("#themeSwitch").removeClass("switch-active");
      }

      // دکمه تغییر تم
      jQuery("#themeSwitch").on("click", function() {
        jQuery(this).toggleClass("switch-active");
        jQuery("html").toggleClass("dark-theme");
        if (jQuery("html").hasClass("dark-theme")) {
          localStorage.setItem("theme", "dark");
        } else {
          localStorage.setItem("theme", "light");
        }
      });
    });

    // Breadcrumb Action 
    let resetTimeout;

    jQuery(".breadcrumb-list-item").on("mouseenter", function() {
      clearTimeout(resetTimeout); // جلوگیری از مخفی‌سازی در حین جابجایی

      let $this = jQuery(this);
      let $attr = $this.attr("breadcrumb");

      // مخفی‌سازی همه زیرمنوها و حذف اکتیو از همه
      jQuery(".breadcrumb-list-item").removeClass("breadcrumb-list-active");
      jQuery(".breadcrumb-boxs").removeClass("breadcrumb-boxs-active").hide();

      // فعال‌سازی آیتم فعلی و نمایش زیرمنو مربوطه
      $this.addClass("breadcrumb-list-active");
      jQuery("#" + $attr).addClass("breadcrumb-boxs-active").fadeIn(200);
    });

    // وقتی موس از کل ناحیه breadcrumb خارج شد، همه چیز به حالت پیش‌فرض برگرده
    jQuery(".breadcrumb-box-section").on("mouseleave", function() {
      resetTimeout = setTimeout(function() {
        jQuery(".breadcrumb-list-item").removeClass("breadcrumb-list-active");
        jQuery(".breadcrumb-boxs").removeClass("breadcrumb-boxs-active").hide();

        // فعال‌سازی آیتم اول و زیرمنوی مربوطه
        jQuery(".breadcrumb-list-item").first().addClass("breadcrumb-list-active");
        jQuery(".breadcrumb-boxs").first().addClass("breadcrumb-boxs-active").fadeIn(200);
      }, 300); // تأخیر برای جلوگیری از پرش ناخواسته
    });

    // جلوگیری از بسته شدن وقتی موس روی زیرمنوها هست
    jQuery(".breadcrumb-boxs").on("mouseenter", function() {
      clearTimeout(resetTimeout);
    });

    jQuery(".usage").persianDatepicker();

    // Select2 initialization moved inside document.ready
    jQuery(document).ready(function() {
      jQuery('.js-select2-01').select2();
    });

  })(jQuery);
</script>

</body>

</html>