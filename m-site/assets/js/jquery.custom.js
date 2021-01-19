
(function($){ //create closure so we can safely use $ as alias for jQuery

    $(document).ready(function(){

        "use strict";

        /*-----------------------------------------------------------------------------------*/
        /*  bxSlider
        /*-----------------------------------------------------------------------------------*/
        $('#featured-slider .bxslider').bxSlider({
            auto: true,
            preloadImages: 'all',
            pause: '6000',
            autoHover: true,
            adaptiveHeight: true,
            mode: 'fade',
            onSliderLoad: function(){ 
                $("#featured-slider .bxslider").css("display", "block");
                $('#featured-slider .entry-header').fadeIn("100");
                $('#featured-slider .gradient').fadeIn("100"); 
                $(".ribbon").fadeIn('1000');
            }
        });                           

        $('.gallery-slider').show().bxSlider({
            auto: true,
            preloadImages: 'all',
            pause: '6000',
            autoHover: true,
            adaptiveHeight: true,
            mode: 'fade',
            onSliderLoad: function(){ 
                $(".single #primary .gallery-slider").css("display", "block");
                $(".single #primary .bx-wrapper").css("visibility", "visible");                 
            }
        });  

        $(window).load(function() {
         // executes when complete page is fully loaded, including all frames, objects and images
          $(".custom-share").fadeIn('1000'); 
        });
               
        /*-----------------------------------------------------------------------------------*/
        /*  Back to Top
        /*-----------------------------------------------------------------------------------*/
        // hide #back-top first
        $("#back-top").hide();

        $(function () {
            // fade in #back-top
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('#back-top').fadeIn('200');
                } else {
                    $('#back-top').fadeOut('200');
                }
            });

            // scroll body to 0px on click
            $('#back-top a').click(function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 400);
                return false;
            });
        });   

        /*-----------------------------------------------------------------------------------*/
        /*  Misc.
        /*-----------------------------------------------------------------------------------*/       
         $('.widget_ad .widget-title').fadeIn("100"); 

        /*-----------------------------------------------------------------------------------*/
        /*  Mobile Menu & Search
        /*-----------------------------------------------------------------------------------*/

        /* Mobile Menu */
        $('.top-menu-icon > .genericon-menu').click(function(){

            $('.top-menu').fadeIn('fast');
            $('.top-menu-icon > .genericon-menu').toggleClass('active');
            $('.top-menu-icon > .genericon-close').toggleClass('active');

        });

        $('.top-menu-icon > .genericon-close').click(function(){

            $('.top-menu').fadeOut('fast');
            $('.top-menu-icon > .genericon-menu').toggleClass('active');
            $('.top-menu-icon > .genericon-close').toggleClass('active');

        });          

        /* Mobile Search */
        $('.search-icon > .genericon-search').click(function(){

            $('.header-search').fadeIn('fast');
            $('.search-icon > .genericon-search').toggleClass('active');
            $('.search-icon > .genericon-close').toggleClass('active');

        });

        $('.search-icon > .genericon-close').click(function(){

            $('.header-search').fadeOut('fast');
            $('.search-icon > .genericon-search').toggleClass('active');
            $('.search-icon > .genericon-close').toggleClass('active');

        });         

        /* List Categories */ 
        $('.posts-counter .dropdown-icon').click(function(){
            $('.list-categories').toggle();
        });

    });


})(jQuery);