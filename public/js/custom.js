$(document).ready(function () {
    // Add active class to the current Nav
    $('ul.navbar-nav li.nav-item a.nav-link').click(function (e) {
        $('ul.navbar-nav li.active').removeClass('active');
        var $parent = $(this).parent();
        $parent.addClass('active');
        /*e.preventDefault();*/
    });


    /*Vertical Sidebar Carousel | Tiny Slider*/
    /*------------------------*/
    var slider = tns({
        container: ".sidebar-vertical-carousel",
        "items": 9,
        "axis": "vertical",
        "swipeAngle": false,
        "speed": 400,
        "mouseDrag": true,
        slideBy: 1,
        gutter: 12,
        nav: false,
        loop: true,
        autoplay: true,
        autoplayButtonOutput: false,
        controlsContainer: "#customize-controls",
        /*rewind: true*/
    });

    /*Vertical Sidebar Carousel Ends*/

    /*$("#sidebar_carousel").owlCarousel({
        dots: false,
        loop: true,
        mouseDrag: false,
        touchDrag: false,
        pullDrag: false,
        rewind: true,
        autoplay: true,
        margin: 0,
        nav: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 4,
                nav: true
            },
            600: {
                items: 5,
            },

            1000: {
                items: 6,
            },

            1366: {
                items: 8,
            }
        }
    });*/

    //slider for clearence section
    $('#clearence_carousel').owlCarousel({
        loop: true,
        margin: 30,
        dots: false,
        responsiveClass: true,
        mouseDrag: true,
        touchDrag: true,
        pullDrag: true,
        autoplay: true,
        nav: true,
        navText: ['<svg width="10%" height="10%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 3px;stroke: #b6b6b6;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="10%" height="10%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 3px;stroke: #b6b6b6;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
            },

            1000: {
                items: 3,
            },

            1366: {
                items: 3,
            }
        }
    });


    //slider for new arrival section
    $('#new_arrival_carousel').owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        responsiveClass: true,
        mouseDrag: true,
        touchDrag: true,
        pullDrag: true,
        autoplay: true,
        nav: false

    });

    //slider for clearence section
    $('#general-product-slider').owlCarousel({
        loop: true,
        margin: 30,
        dots: false,
        responsiveClass: true,
        mouseDrag: true,
        touchDrag: true,
        pullDrag: true,
        autoplay: true,
        nav: true,
        responsive: {
            0: {
                items: 2,
                nav: true
            },
            600: {
                items: 3,
            },

            1000: {
                items: 4,
            },

            1366: {
                items: 5,
            }
        }
    });


});

