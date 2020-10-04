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
    $(".sidebar-dropdown a").click(function () {
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
        $(".smsidebar-menu").removeClass("rightActive");
    });
    $(".smsidebar-menu i.close-menu").click(function () {
        $(".smsidebar-menu").addClass("rightActive");
    });
    /*SM Sidebar JS Ends*/
    /*Dropdown Trigger JS*/
    $("#droptrigger").click(function(e) {
        e.preventDefault();
        $(".dropcontent").toggleClass("open", 1000);
    });
    $("#droptrigger-sm").click(function(e) {
        e.preventDefault();
        $(".dropcontent-sm").toggleClass("open", 1000);
    });
    /*Dropdown Trigger JS Ends*/

    /*JS to hide Div when clicked outside*/
    $(document).mouseup(function (e) {
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
    });
    /*JS to hide Div when clicked outside Ends*/

});

