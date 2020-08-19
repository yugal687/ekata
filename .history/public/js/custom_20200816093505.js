$(document).ready(function () {
    //slider for sidebar section 
    $(".owl-carousel").owlCarousel({
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
    $('.owl-carousel    ').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 5,
                nav: true,
                loop: false
            }
        }
    })
});

