// Change Theme Button
$("#themeSwitch").on("click", function () {
    $(this).toggleClass("switch-active");
    $("html").toggleClass("dark-theme");
});

// Breadcrumb Action
$(".breadcrumb-list-item").on("click", function (e) {
    e.preventDefault();
    let $this = $(this);
    let $attr = $this.attr("breadcrumb");

    console.log($attr);

    if (!$this.hasClass("breadcrumb-list-active")) {
        $this
            .addClass("breadcrumb-list-active")
            .siblings()
            .removeClass("breadcrumb-list-active");

        $(".breadcrumb-box-section .breadcrumb-boxs")
            .css("display", "none")
            .removeClass("breadcrumb-boxs-active");

        $("#" + $attr).fadeIn(300);
    }
});
