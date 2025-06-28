"use strict";

// Change Theme Button
$("#themeSwitch").on("click", function () {
  $(this).toggleClass("switch-active");
  $("html").toggleClass("dark-theme"); // ذخیره وضعیت در localStorage

  if ($("html").hasClass("dark-theme")) {
    localStorage.setItem("theme", "dark");
  } else {
    localStorage.setItem("theme", "light");
  }
}); // هنگام بارگذاری صفحه، وضعیت را بازیابی کن

$(document).ready(function () {
  if (localStorage.getItem("theme") === "dark") {
    $("html").addClass("dark-theme");
    $("#themeSwitch").addClass("switch-active");
  }
}); // Breadcrumb Action

$(".breadcrumb-list-item").on("click", function (e) {
  e.preventDefault();
  var $this = $(this);
  var $attr = $this.attr("breadcrumb");
  console.log($attr);

  if (!$this.hasClass("breadcrumb-list-active")) {
    $this.addClass("breadcrumb-list-active").siblings().removeClass("breadcrumb-list-active");
    $(".breadcrumb-box-section .breadcrumb-boxs").css("display", "none").removeClass("breadcrumb-boxs-active");
    $("#" + $attr).fadeIn(300);
  }
});