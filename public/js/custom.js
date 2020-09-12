$(document).ready(function () {
    /*Location Href*/
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $('ul a').each(function() {
        if (this.href === path) {
            $(this).addClass('active');
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

