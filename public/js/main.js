/*-----------------------------------------------------------------------------------
  Template Name: Republic  Government HTML Template.
  Template URI: #
  Description: Republic is a unique website template designed in HTML with a simple & beautiful look. There is an excellent solution for creating clean, wonderful and trending material design corporate, corporate any other purposes websites.
  Author: HasTech
  Author URI: https://themeforest.net/user/hastech/portfolio
  Version: 1.0

-----------------------------------------------------------------------------------*/
/*-------------------------------
[  Table of contents  ]
---------------------------------
  01. jQuery MeanMenu
  02. wow js active
  03. Sticky Header
  04. ScrollUp
  05. Start  Site Info
  06. Search Bar
  07. Magnific Popup
  08. CounterUp

/*--------------------------------
[ End table content ]
-----------------------------------*/
(function($) {
    'use strict';
    
    /*-------------------------------------------
      01. jQuery MeanMenu
    --------------------------------------------- */
    $('.mobile-menu nav').meanmenu({
        meanMenuContainer: '.mobile-menu-area',
        meanScreenWidth: "767",
        meanRevealPosition: "right",
    });
    
    
    /*-------------------------------------------
      02. wow js active
    --------------------------------------------- */
    new WOW().init();
    
    
    /*-------------------------------------------
      03. Sticky Header
    --------------------------------------------- */
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();
        if (scroll < 245) {
            $("#sticky-header-with-topbar").removeClass("scroll-header");
        } else {
            $("#sticky-header-with-topbar").addClass("scroll-header");
        }
    });

    /*--------------------------
      04. ScrollUp
    ---------------------------- */
    $.scrollUp({
        scrollText: '<i class="zmdi zmdi-chevron-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
    
    
    /*------------------------------------    
      05. Start  Site Info
    --------------------------------------*/
    $('.toggle-menu').on('click', function() {
        if ($(this).siblings('.site-info-wrap').hasClass('active')) {
            $(this).siblings('.site-info-wrap').removeClass('active').slideUp();
            $(this).removeClass('active');
            if ($(this).find("i").hasClass('zmdi-menu')) {
                $(this).find("i").removeClass('zmdi-menu').addClass('zmdi-close');
            } else {
                $(this).find("i").removeClass('zmdi-close').addClass('zmdi-menu');
            }
        } else {
            $('.toggle-menu .site-info-wrap').removeClass('active').slideUp();
            $('.toggle-menu .site-info-wrap').removeClass('active');
            $(this).addClass('active');
            $(this).siblings('.site-info-wrap').addClass('active').slideDown();
            if ($(this).find("i").hasClass('zmdi-menu')) {
                $(this).find("i").removeClass('zmdi-menu').addClass('zmdi-close');
            }
        }
    });
    $('.icon-clear').on('click', function() {
        $('.site-info-wrap').removeClass('active').slideUp();
        $('.toggle-menu').find("i").removeClass('zmdi-close').addClass('zmdi-menu');
    });
    
    
    // End  site info
    /*------------------------------------    
      06. Search Bar
    --------------------------------------*/
    $('.search__open').on('click', function() {
        $('body').toggleClass('search__box__show__hide');
        return false;
    });
    $('.search__close__btn .search__close__btn_icon').on('click', function() {
        $('body').toggleClass('search__box__show__hide');
        return false;
    });
    
    
    /*--------------------------------
      07. Magnific Popup
    ----------------------------------*/
    $('.video-popup').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        zoom: {
            enabled: true,
        }
    });
    
    $('.image-popup').magnificPopup({
        type: 'image',
        mainClass: 'mfp-fade',
        removalDelay: 100,
        gallery: {
            enabled: true,
        }
    });
    
    
    /*-----------------------------
      08. CounterUp
    -----------------------------*/
    $('.count').counterUp({
        delay: 60,
        time: 3000
    });



})(jQuery);