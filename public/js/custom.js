$(document).ready(function () {
    /*Location Href*/
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $('ul a').each(function() {
        if (this.href === path) {
            $(this).addClass('active');
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



    $("#droptrigger, #droptrigger-sm").click(function(e) {
        e.preventDefault();
        $(".dropcontent, .dropcontent-sm").toggleClass("open", 1000);
    });
    $('.body-wrapper').click(function (e){
        e.preventDefault();
        $('.dropcontent, .dropcontent-sm').removeClass('open', 1000);
    });
});

