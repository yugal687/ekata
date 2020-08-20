$(document).ready(function () {
    //slider for sidebar section 
    // $(".owl-carousel").owlCarousel({
    //     items: 6,
    //     dots: false,
    //     loop: false,
    //     mouseDrag: false,
    //     touchDrag: false,
    //     pullDrag: false,
    //     rewind: true,
    //     autoplay: false,
    //     margin: 0,
    //     nav: true
    // });

    //slider for clearence section 
    $(".card-bdy #clearence_carousel").owlCarousel({
        items: 3,
        dots: false,
        loop: false,
        mouseDrag: false,
        touchDrag: false,
        pullDrag: false,
        rewind: true,
        autoplay: false,
        margin: 0,
        nav: true,
        responsive: {
            0: {
                items: 1
            },

            600: {
                items: 3
            },

            1024: {
                items: 3
            },

            1366: {
                items: 5
            }
        }
    });
});

