$(document).ready(function () {
    /*Location Href*/
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $('ul.navbar-nav a').each(function() {
        if (this.href === path) {
            $(this).addClass('active');
        }
    });
    $('.main-sidebar-menu ul li.sidebar-dropdown a').each(function() {
        if (this.href === path) {
            $(this).addClass('active');
        }
    });
    $('.main-sidebar-menu ul li.sidebar-dropdown .sidebar-submenu ul li a').each(function() {
        if (this.href === path) {
            $(this).addClass('active');
            $(this).closest('.sidebar-submenu').slideDown(200);
            $(this).closest('.sidebar-dropdown').addClass('active');
        }
    });


    ///Sm SIdebar
    /*Sm-sidebar-scripts*/
    /*$(".sidebar-dropdown a").click(function () {
        $(".sidebar-submenu").slideUp(200);
        if (
            $(this)
                .parent()
                .hasClass("active")
        ) {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .parent()
                .removeClass("active");
        } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .next(".sidebar-submenu")
                .slideDown(200);
            $(this)
                .parent()
                .addClass("active");
        }
    });
    $(".sidebar-dropdown > a i").click(function (e) {
        e.preventDefault();
    });

    $("#toggle-smsidebar").click(function () {
        $(".smsidebar-menu").toggleClass("rightActive");
    });
    $(".smsidebar-menu i.close-menu").click(function () {
        $(".smsidebar-menu").toggleClass("rightActive");
    });*/
    /*SM Sidebar JS Ends*/
    /*Dropdown Trigger JS*/
    $("#droptrigger, #droptrigger-sm").click(function(e) {
        e.preventDefault();
        $(".dropcontent, .dropcontent-sm").toggleClass("open", 1000);
    });
    /*Dropdown Trigger JS Ends*/

    /*JS to hide Div when clicked outside*/
    /*$(document).mouseup(function (e) {
        if ($(e.target).closest('.dropcontent, .dropcontent-sm').length
            === 0) {
            e.preventDefault();
            $('.dropcontent, .dropcontent-sm').removeClass('open', 1000);
        }
        if ($(e.target).closest('#toggle-smsidebar').length
            === 0) {
            e.preventDefault();
            $(".smsidebar-menu").addClass("rightActive");
        }
    });*/
    /*JS to hide Div when clicked outside Ends*/

    /*Number Sniper Button JS*/
    /*$(document).on('click', '.number-spinner button', function () {
        var btn = $(this),
            oldValue = btn.closest('.number-spinner').find('input').val().trim(),
            newVal = 0;

        if (btn.attr('data-dir') == 'up') {
            newVal = parseInt(oldValue) + 1;
        } else {
            if (oldValue > 1) {
                newVal = parseInt(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        btn.closest('.number-spinner').find('input').val(newVal);
    });*/
    /*Number Sniper Button JS Ends*/


});

