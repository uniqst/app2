function fix_size() {
    var images = $('.img-container img');
    images.each(setsize);

    function setsize() {
        var img = $(this),
            img_dom = img.get(0),
            container = img.parents('.img-container');
        if (img_dom.complete) {
            resize();
        } else img.one('load', resize);

        function resize() {
            if ((container.width() / container.height()) < (img_dom.width / img_dom.height)) {
                img.width('100%');
                img.height('auto');
                return;
            }
            img.height('100%');
            img.width('auto');
        }
    }
}
fix_size();

$(document).ready(function() {

$(window).on('resize', fix_size);
});