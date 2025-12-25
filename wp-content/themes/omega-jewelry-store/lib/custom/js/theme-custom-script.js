jQuery(document).ready(function ($) {
    "use strict";
    var isMobile = false;
    if (/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        $('html').addClass('touch');
        isMobile = true;
    } else {
        $('html').addClass('no-touch');
        isMobile = false;
    }

    // Banner Slider
    var swiper = new Swiper('.theme-main-carousel', {
        centeredSlides: true,
        slidesPerView: 1,
        loop: true,
        spaceBetween: 30,
        speed: 1000,
        roundLengths: true,
        keyboard: true,
        parallax: true,
        mousewheel: false,
        grabCursor: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            768: {
                slidesPerView: 1,
            },
            1200: {
                slidesPerView: 1,
            },
            1600: {
                slidesPerView: 1,
            }
        }
    });

    // Scroll To
    $(".scroll-content").click(function () {
        $('html, body').animate({
            scrollTop: $("#site-content").offset().top
        }, 500);
    });
    // Aub Menu Toggle
    $('.submenu-toggle').click(function () {
        $(this).toggleClass('button-toggle-active');
        var currentClass = $(this).attr('data-toggle-target');
        $(currentClass).toggleClass('submenu-toggle-active');
    });
    $('.skip-link-menu-start').focus(function () {
        if (!$("#offcanvas-menu #primary-nav-offcanvas").length == 0) {
            $("#offcanvas-menu #primary-nav-offcanvas ul li:last-child a").focus();
        }
    });
    // Toggle Menu
    $('.navbar-control-offcanvas').click(function () {
        $(this).addClass('active');
        $('body').addClass('body-scroll-locked');
        $('#offcanvas-menu').toggleClass('offcanvas-menu-active');
        $('.button-offcanvas-close').focus();
    });
    $('.offcanvas-close .button-offcanvas-close').click(function () {
        $('#offcanvas-menu').removeClass('offcanvas-menu-active');
        $('.navbar-control-offcanvas').removeClass('active');
        $('body').removeClass('body-scroll-locked');
        setTimeout(function () {
            $('.navbar-control-offcanvas').focus();
        }, 300);
    });
    $('#offcanvas-menu').click(function () {
        $('#offcanvas-menu').removeClass('offcanvas-menu-active');
        $('.navbar-control-offcanvas').removeClass('active');
        $('body').removeClass('body-scroll-locked');
    });
    $(".offcanvas-wraper").click(function (e) {
        e.stopPropagation(); //stops click event from reaching document
    });
    $('.skip-link-menu-end').on('focus', function () {
        $('.button-offcanvas-close').focus();
    });
    // Data Background
    var pageSection = $(".data-bg");
    pageSection.each(function (indx) {
        if ($(this).attr("data-background")) {
            $(this).css("background-image", "url(" + $(this).data("background") + ")");
        }
    });
    // Scroll to Top on Click
    $('.to-the-top').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 700);
        return false;
    });
    // Login Modal
    // Locked Modal Logic
    var isNotLoggedIn = $('#login-popup-trigger').length > 0;

    if (isNotLoggedIn) {
        // Auto-open login modal
        setTimeout(function () {
            $('#login-modal').addClass('active modal-locked').fadeIn();
            $('#login-modal input[type="text"]').first().focus();
        }, 500);

        // Hide close button
        $('#close-login-modal').hide();
    } else {
        // Normal behavior: allow opening manually
        $('#login-popup-trigger').on('click', function (e) {
            e.preventDefault();
            $('#login-modal').addClass('active').fadeIn();
            setTimeout(function () {
                $('#login-modal input[type="text"]').first().focus();
            }, 300);
        });
    }

    // Close logic - ONLY if not locked
    $('#close-login-modal, .modal-overlay').on('click', function (e) {
        if ($('#login-modal').hasClass('modal-locked')) {
            return; // Do nothing if locked
        }

        if (e.target !== this && !$(e.target).hasClass('modal-overlay')) return;

        $('#login-modal').removeClass('active').fadeOut();
    });

    // Flip Logic
    $(document).on('click', '.to-register-flip', function (e) {
        e.preventDefault();
        $('.modal-flip-container').addClass('flip');
    });

    $(document).on('click', '.to-login-flip', function (e) {
        e.preventDefault();
        $('.modal-flip-container').removeClass('flip');
    });

    // Close Register Modal specific button (same as login close really, but for correctness)
    $('#close-register-modal').on('click', function () {
        if ($('#login-modal').hasClass('modal-locked')) { return; }
        $('#login-modal').removeClass('active').fadeOut();
    });

    // FORCE UPDATE CART COUNT ON ADD
    $(document.body).on('added_to_cart', function (event, fragments, cart_hash, $button) {
        updateCartCountFromFragments(fragments);
    });

    // FORCE UPDATE CART COUNT ON REMOVE (from Cart Page AJAX)
    $(document.body).on('removed_from_cart', function (event, fragments, cart_hash) {
        updateCartCountFromFragments(fragments);
    });

    // FORCE UPDATE ON ANY REFRESH
    $(document.body).on('wc_fragments_refreshed', function () {
        // We need to fetch the count if it's not passed directly, but usually fragments are in the DOM now.
        // We can re-read the fragment from a hidden place or rely on the previous events.
        // Better yet, trigger a refresh if we suspect desync.
    });

    // Helper function
    function updateCartCountFromFragments(fragments) {
        if (fragments && fragments['.omega-cart-count']) {
            $('.omega-cart-count').replaceWith(fragments['.omega-cart-count']);
        }
    }

});

jQuery(window).scroll(function () {
    var data_sticky = jQuery('.header-navbar').attr('data-sticky');

    if (data_sticky == "true") {
        if (jQuery(this).scrollTop() > 1) {
            jQuery('.header-navbar').addClass("stick_head");
        } else {
            jQuery('.header-navbar').removeClass("stick_head");
        }
    }
});

//Loader
jQuery(window).load(function () {
    jQuery(".preloader").delay(1000).fadeOut("fast");
});