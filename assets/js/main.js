document.addEventListener('DOMContentLoaded', function () {
    console.log('main.js loaded');
    // Initialize all offcanvas elements
    var offcanvasElementList = [].slice.call(document.querySelectorAll('.offcanvas'))
    var offcanvasList = offcanvasElementList.map(function (offcanvasEl) {
        return new bootstrap.Offcanvas(offcanvasEl, { backdrop: true })
    });
});