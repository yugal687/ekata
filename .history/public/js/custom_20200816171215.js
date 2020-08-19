$(document).ready(function () {
    //slider for sidebar section 
    $("#sidebar_carousel").owlCarousel({
        dots: false,
        loop: true,
        mouseDrag: false,
        touchDrag: false,
        pullDrag: false,
        rewind: true,
        autoplay: false,
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
                items: 6,
            }
        }
    });

    //slider for clearence section  
    $('#clearence_carousel').owlCarousel({
        loop: true,
        margin: 30,
        dots: false,
        responsiveClass: true,
        mouseDrag: true,
        touchDrag: true,
        pullDrag: true,
        nav: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
            },

            1000: {
                items: 3,
            },

            1366: {
                items: 5,
            }
        }
    });


    //slider for new arrival section  
    $('#new_arrival_carousel').owlCarousel({
        loop: true,
        margin: 30,
        items: 1,
        dots: false,
        responsiveClass: true,
        mouseDrag: true,
        touchDrag: true,
        pullDrag: true,
        nav: true

    });



});

