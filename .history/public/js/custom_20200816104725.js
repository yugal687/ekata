$(document).ready(function () {
    //slider for sidebar section 
    $("#sidebar_carousel").owlCarousel({
        items: 6,
        dots: false,
        loop: false,
        mouseDrag: false,
        touchDrag: false,
        pullDrag: false,
        rewind: true,
        autoplay: false,
        margin: 0,
        nav: true
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
    })

});

