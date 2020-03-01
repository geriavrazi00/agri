(function($) {
    "use strict";

    // =====================================================
    //      PRELOADER
    // =====================================================
    $(window).on("load", function() {
        if ($(".preloader").length) {
            $(".preloader")
                .delay(20)
                .fadeOut("slow", function() {
                    $(this).remove();
                });
        }
    });

    // =====================================================
    //      BACK TO TOP BUTTON
    // =====================================================
    $(window).scroll(function() {
        // if ($(this).scrollTop() > 100) {
        //     $(".back-to-top").fadeIn("slow");
        // } else {
        //     $(".back-to-top").fadeOut("slow");
        // }

        var mybutton = document.getElementById("back-to-top");

        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    });

    $(".back-to-top").click(function(e) {
        e.preventDefault();

        $("html, body").animate({ scrollTop: 0 }, 500, "easeInOutExpo");
        //window.focus();
        //return false;

        //document.body.scrollTop = 0;
        //document.documentElement.scrollTop = 0;
    });

    // =====================================================
    //      SCROLL REVEAL - EASY SCROLL ANIMATIONS
    // =====================================================
    window.sr = ScrollReveal();
    sr.reveal(".animated-element", { interval: 300 });

    // =====================================================
    //      NAVBAR
    // =====================================================
    var c,
        currentScrollTop = 0;
    $(window).on("scroll load", function() {
        if ($(window).scrollTop() >= 100) {
            $(".navbar").addClass("active");
        } else {
            $(".navbar").removeClass("active");
        }

        // Navbar functionality
        var a = $(window).scrollTop(),
            b = $(".navbar").height();

        currentScrollTop = a;
        if (c < currentScrollTop && a > b + b) {
            $(".navbar").addClass("scrollUp");
        } else if (c > currentScrollTop && !(a <= b)) {
            $(".navbar").removeClass("scrollUp");
        }
        c = currentScrollTop;
    });

    // =====================================================
    //      PREVENTING URL UPDATE ON NAVIGATION LINK
    // =====================================================
    $(".link-scroll").on("click", function(e) {
        var anchor = $(this);
        $("html, body")
            .stop()
            .animate(
                {
                    scrollTop: $(anchor.attr("href")).offset().top - 100
                },
                1000
            );

        e.preventDefault();
    });
})(jQuery);
