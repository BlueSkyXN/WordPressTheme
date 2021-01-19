
(function($){ //create closure so we can safely use $ as alias for jQuery

    $(document).ready(function(){

        "use strict";

        /*-----------------------------------------------------------------------------------*/
        /*  Superfish Menu
        /*-----------------------------------------------------------------------------------*/
        // initialise plugin
        if ($(window).width() >= 960) {
            var example = $('.sf-menu').superfish({
                //add options here if required
                delay:       100,
                speed:       'fast',
                autoArrows:  false  
            }); 
        }
        var removePreloader = function() {
            $('.preloader-wrap').css('opacity', 0);
            setTimeout(function(){$('.preloader-wrap').hide();}, 600);
        }           

        $(function() {
            removePreloader();              
        });

        // Flexslider
        $(window).load(function(){

            $('.content-loop .hentry').matchHeight({
                byRow: true
            });

            $('#carousel').fadeIn('1000'); 

            $('#carousel').flexslider({
                animation: "slide",
                controlNav: false,
                directionNav: true,
                animationLoop: true,
                slideshow: false,
                itemWidth: 136,
                itemMargin: 10, 
                touch: true,       
                asNavFor: '#slider'            
            });

            $('#slider').flexslider({
                animation: 'fade',
                controlNav: false,
                directionNav:true,
                animationLoop: true,
                touch: true,
                initDelay: 0,
                animationSpeed: 0,
                sync: "#carousel"
            });

        });

        $(window).load(function() {
            // executes when complete page is fully loaded, including all frames, objects and images
            //$(".fa").css('visibility','visible').fadeIn('1000'); 
            $(".custom-share").fadeIn('1000'); 
            $(".bottom-right").fadeIn('1000'); 
            $(".widget_posts_thumbnail .entry-wrap").fadeIn('1000');   
            $('.sidebar .widget_ad .widget-title').fadeIn("1000"); 
            $('.site-footer .widget_ad .widget-title').fadeIn("1000");           
        });

        /*-----------------------------------------------------------------------------------*/
        /*  Back to Top
        /*-----------------------------------------------------------------------------------*/
        // hide #back-top first
        //$("#back-top").hide();

        $(function () {
            // fade in #back-top
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('#back-top').css('visibility','visible');
                } else {
                    $('#back-top').css('visibility','hidden');
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
        /* Header Search
        /*-----------------------------------------------------------------------------------*/

        $('.search-icon > .genericon-search').click(function(){

            $('.header-search').slideDown('fast', function() {});
            $('.search-icon > .genericon-search').toggleClass('active');
            $('.search-icon > .genericon-close').toggleClass('active');                                                                

        });

        $('.search-icon > .genericon-close').click(function(){

            $('.header-search').slideUp('fast', function() {});
            $('.search-icon > .genericon-search').toggleClass('active');
            $('.search-icon > .genericon-close').toggleClass('active');                                       

        });          

    });

})(jQuery);