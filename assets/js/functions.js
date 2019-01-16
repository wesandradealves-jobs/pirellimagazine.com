$(document).ready(function () {
    if($('.tendencias-carousel').length)
    {
        $('.tendencias-carousel').slick({
            dots: false,
        }),
        $('.tendencias-carousel .slick-arrow').wrapAll('<div class="tendencias-carousel-nav"/>');
    }
    $( ".hamburger" ).click(function() {
        $(this).toggleClass('is-active');
    }); 
});
      
      