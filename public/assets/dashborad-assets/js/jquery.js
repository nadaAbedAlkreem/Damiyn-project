
(function ($) {
    'use strict'

    // ______________LOADER
    $("#global-loader").fadeOut("slow");


    // This template is mobile first so active menu in navbar
    // has submenu displayed by default but not in desktop
    // so the code below will hide the active menu if it's in desktop
    if (window.matchMedia('(min-width: 992px)').matches) {
        $('.main-navbar .active').removeClass('show');
        $('.main-header-menu .active').removeClass('show');
    }
    // Shows header dropdown while hiding others
    $('.main-header .dropdown > a').on('click', function (e) {
        e.preventDefault();
        $(this).parent().toggleClass('show');
        $(this).parent().siblings().removeClass('show');
        $(this).find('.drop-flag').removeClass('show');
    });
    $('.country-flag1').on('click', function (e) {

        $(this).parent().toggleClass('show');
        $('.main-header .dropdown > a').parent().siblings().removeClass('show');
    });

    // ______________Full screen
    $(document).on("click", ".full-screen", function toggleFullScreen() {
        $('html').addClass('fullscreen-button');
        if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
            if (document.documentElement.requestFullScreen) {
                document.documentElement.requestFullScreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullScreen) {
                document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            } else if (document.documentElement.msRequestFullscreen) {
                document.documentElement.msRequestFullscreen();
            }
        } else {
            $('html').removeClass('fullscreen-button');
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        }
    })


    // ______________Cover Image
    $(".cover-image").each(function () {
        var attr = $(this).attr('data-bs-image-src');
        if (typeof attr !== typeof undefined && attr !== false) {
            $(this).css('background', 'url(' + attr + ') center center');
        }
    });


    // ______________Toast
    $(".toast").toast();

    /* Headerfixed */
    $(window).on("scroll", function (e) {
        if ($(window).scrollTop() >= 66) {
            $('main-header').addClass('fixed-header');
        }
        else {
            $('.main-header').removeClass('fixed-header');
        }
    });

    // ______________Search
    $('body, .main-header form[role="search"] button[type="reset"]').on('click keyup', function (event) {
        if (event.which == 27 && $('.main-header form[role="search"]').hasClass('active') ||
            $(event.currentTarget).attr('type') == 'reset') {
            closeSearch();
        }
    });
    function closeSearch() {
        var $form = $('.main-header form[role="search"].active')
        $form.find('input').val('');
        $form.removeClass('active');
    }
    // Show Search if form is not active // event.preventDefault() is important, this prevents the form from submitting
    $(document).on('click', '.main-header form[role="search"]:not(.active) button[type="submit"]', function (event) {
        event.preventDefault();
        var $form = $(this).closest('form'),
            $input = $form.find('input');
        $form.addClass('active');
        $input.focus();
    });
    // if your form is ajax remember to call `closeSearch()` to close the search container
    $(document).on('click', '.main-header form[role="search"].active button[type="submit"]', function (event) {
        event.preventDefault();
        var $form = $(this).closest('form'),
            $input = $form.find('input');
        $('#showSearchTerm').text($input.val());
        closeSearch()
    });
});


