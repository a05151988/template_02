jQuery(window).load(function () {
    NProgress.done();
});

jQuery(document).ready(function() {
    NProgress.start();
});
jQuery(function () {
    jQuery('[data-toggle="tooltip"]').tooltip({html:true});
})