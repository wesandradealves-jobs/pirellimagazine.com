$(document).ready(function () {
    if($('.tendencias-carousel').length)
    {
        $('.tendencias-carousel').slick({
            dots: false,
        }),
        $('.tendencias-carousel .slick-arrow').wrapAll('<div class="tendencias-carousel-nav"/>');
    }
    $( ".hamburger" ).click(function() {
        $(this).toggleClass('is-active'),
        $('.navigation:not(.-mobile').css('z-index', 20),
        $('.navigation.-mobile').toggleClass('toggle');
    }); 
    $(window).on('resize scroll', function () {
        $('.is-active').removeClass('is-active'),
        $('.toggle').removeClass('toggle');
    });     
    $('.navigation.-mobile a').each(function() {
        $(this).click(function() {
            if($(this).next('ul').length)
            {
                $(this).toggleClass('toggle'),
                $(this).next('ul').toggleClass('toggle');
            }
        }); 
    });    
    $(document).mouseup(function (e)
    {
        var container = $('.navigation.-mobile').children();

        if (!container.is(e.target) 
            && container.has(e.target).length === 0)
        {
            $('.is-active').removeClass('is-active'),
            $('.toggle').removeClass('toggle');
        }
    });        
});
      
      