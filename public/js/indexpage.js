$(document).ready(function () {
    /*Vertical Sidebar Carousel*/
    
    /*Vertical Sidebar Carousel Ends*/


    /*Banner Image Carousel*/
    $("#banner-image-carousel").owlCarousel({
        items: 1,
        dots: true,
        navigation: false,
        singleItem: true,
        autoplay: true,
        loop: true,
        responsiveClass: true,
        autoplayTimeout: 7000,
        smartSpeed: 800,

    });
    /*Banner Image Carousel Ends*/

    /*slider for clearance section*/
    $('#clearence_carousel').owlCarousel({
        loop: true,
        dots: false,
        responsiveClass: true,
        mouseDrag: true,
        touchDrag: true,
        pullDrag: true,
        autoplay: true,
        nav: true, 
        navText: ['<i class="fas fa-chevron-left fa-4x" style="color: #b6b6b6"></i>', '<i class="fas fa-chevron-right fa-4x"  style="color: #b6b6b6"></i>'],
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
            },

            1000: {
                items: 4,
            },

            1366: {
                items: 4,
            }
        }
    });
    /*Clearance Section Ends*/

    /*New Arrival Carousel*/
    /*-------------------*/
    var newArrivalItemDetails = $("#new_arrival_carousel_item");
    var newArrivalItems = $("#new_items");
    var slidesPerPage = 4; //globaly define number of elements per page
    var syncedSecondary = true;

    newArrivalItemDetails.owlCarousel({
        items: 1,
        slideSpeed: 2000,
        nav: false,
        autoplay: true,
        dots: false,
        loop: true,
        responsiveRefreshRate: 200,
        navText: ['<i class="fas fa-chevron-left fa-4x" style="color: #b6b6b6"></i>', '<i class="fas fa-chevron-right fa-4x"  style="color: #b6b6b6"></i>'],
    }).on('changed.owl.carousel', syncPosition);

    newArrivalItems
        .on('initialized.owl.carousel', function () {
            newArrivalItems.find(".owl-item").eq(0).addClass("current");
        })
        .owlCarousel({
            dots: false,
            nav: true,
            smartSpeed: 200,
            slideSpeed: 500,
            slideBy: 1, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
            responsiveRefreshRate: 100,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 2,
                },

                993: {
                    items: 3,
                },

                1200: {
                    items: 4,
                }
            },
            navText: ['<i class="fas fa-chevron-left fa-4x" style="color: #b6b6b6"></i>', '<i class="fas fa-chevron-right fa-4x"  style="color: #b6b6b6"></i>'],
        }).on('changed.owl.carousel', syncPosition2);

    function syncPosition(el) {
        //if you set loop to false, you have to restore this next line
        //var current = el.item.index;

        //if you disable loop you have to comment this block
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - (el.item.count / 2) - .5);

        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }

        //end block

        newArrivalItems
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
        var onscreen = newArrivalItems.find('.owl-item.active').length - 1;
        var start = newArrivalItems.find('.owl-item.active').first().index();
        var end = newArrivalItems.find('.owl-item.active').last().index();

        if (current > end) {
            newArrivalItems.data('owl.carousel').to(current, 100, true);
        }
        if (current < start) {
            newArrivalItems.data('owl.carousel').to(current - onscreen, 100, true);
        }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
            var number = el.item.index;
            newArrivalItemDetails.data('owl.carousel').to(number, 100, true);
        }
    }

    newArrivalItems.on("click", ".owl-item", function (e) {
        e.preventDefault();
        var number = $(this).index();
        newArrivalItemDetails.data('owl.carousel').to(number, 300, true);
    });
    /*New Arrival Carousel Ends*/

    /*Customer Reviews Carousel*/
    $("#customer-reviews-carousel").owlCarousel({
        items: 1,
        autoplay: true,
        loop: true,
        margin: 20,
        responsiveClass: true,
        autoplayTimeout: 7000,
        smartSpeed: 800,
        nav: true,
        navText: ["Previous", "Next"],
    });
    /*Customer Reviews Carousel Ends*/


    /*Save Feedback*/
    $('#stars li').on('mouseover', function () {
        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

        // Now highlight all the stars that's not after the current hovered star
        $(this).parent().children('li.star').each(function (e) {
            if (e < onStar) {
                $(this).addClass('hover');
            } else {
                $(this).removeClass('hover');
            }
        });

    }).on('mouseout', function () {
        $(this).parent().children('li.star').each(function (e) {
            $(this).removeClass('hover');
        });
    });
    $('#stars li').on('click', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.star');
        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }

        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }

        // JUST RESPONSE (Not needed)
        ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
        var msg = "";
        if (ratingValue > 1) {
            msg = "Thanks! You rated this " + ratingValue + " stars.";
        }
        else {
            msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
        }
    });
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $("#saveFeedback").click(function () {
        var review = $("#review").val();
        $.ajax({
            /* the route pointing to the post function */
            url: '/saveFeedback',
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: {_token: CSRF_TOKEN, rating: ratingValue, feedback: review},
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success:function(response){
                if(response) {
                    $('.success-box').fadeIn(200);
                    $('.success-box div.text-message').html("<span>" + response.success + "</span>");
                    $("#stars li").removeClass('selected');
                    $("#review").val(' ');
                }
            },
        });
    });
    $('i.close-feedback').click(function (){
        var successBox = document.getElementById('success_box');
        successBox.style.display = 'none';
    });
    /*Save Feedback Ends*/

    /*todays special*/
    $('#todaySpecials').owlCarousel({
        loop: true,
        dots: false,
        responsiveClass: true,
        mouseDrag: true,
        touchDrag: true,
        pullDrag: true,
        autoplay: true,
        nav: true,
        navigation : true, 
        navText: ['<i class="fas fa-chevron-left fa-4x" style="color: #b6b6b6"></i>', '<i class="fas fa-chevron-right fa-4x"  style="color: #b6b6b6"></i>'],
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
            },

            1000: {
                items: 4,
            },

            1366: {
                items: 4,
            }
        }
    });
    /*todays special */



    /*weekly special */
    $('#weeklySpecials').owlCarousel({
        loop: true,
        dots: false,
        mouseDrag: true,
        touchDrag: true,
        pullDrag: true,
        autoplay: false,
        nav: true,
        navText: ['<i class="fas fa-chevron-left fa-4x" style="color: #b6b6b6"></i>', '<i class="fas fa-chevron-right fa-4x"  style="color: #b6b6b6"></i>'],
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
            },

            1000: {
                items: 4,
            },

            1366: {
                items: 4,
            }
        }
    });
    $('#weeklySpecials .owl-nav').removeClass('disabled');
    /*weekly special ends*/
    


    /*Vertical Smsidebar Carousel | Tiny Slider | Disable for now*/
    /*var slider = tns({
        "container": ".smindex-sidebar-carousel",
        "items": 3,
        "slideBy": 1,
        mouseDrag: true,
        preventScrollOnTouch: 'force',
        "swipeAngle": false,
        "speed": 400,
        "loop": true,
        "controls": true,
        "controlsPosition": "bottom",
        "controlsText": ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
        "responsive": {
            "0": {
                "items": 3
            },
            "576": {
                "items": 4
            },
            "768": {
                "items": 6
            }
        },
    });*/
    /*------------------------*/

});
