<!--Website Header-->
@extends('layouts.website.header')
<!--Website Header Ends-->


@section('style')
    <style>
        .btn-main-primary{
            background-color: #94943a;
            color: #fff;
        }
        .btn-main-primary:hover{
            background-color: #76762c;
            color: #fff;
        }
        .btn-main-secondary{
            background-color: #d8d98b;
            color: #fff;
        }
        .btn-main-secondary:hover{
            background-color: #b6b76c;
            color: #fff;
        }

        .testing-section {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        /* Form fields */
        #shipping-payment-form {
            text-align: center;
            position: relative;
            margin-top: 30px;
        }

        #shipping-payment-form #main-form {
            background: white;
            border: 0 none;
            border-radius: 0;
            box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.1);
            padding: 20px 30px;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            /*stacking fieldsets above each other*/
            position: relative;
        }

        /*inputs*/
        #shipping-payment-form input, #shipping-payment-form textarea {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 0;
            margin-bottom: 0;
            width: 100%;
            box-sizing: border-box;
            font-family: 'Lato', sans-serif;
            color: #2C3E50;
            font-size: 13px;
        }

        #shipping-payment-form input:focus, #shipping-payment-form textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            /*border: 1px solid #CF7500;*/
            border: 1px solid #94943a;
            outline-width: 0;
            transition: All 0.5s ease-in;
            -webkit-transition: All 0.5s ease-in;
            -moz-transition: All 0.5s ease-in;
            -o-transition: All 0.5s ease-in;
        }

        /*buttons*/
        #shipping-payment-form .action-button {
            font-family: 'Lato', sans-serif;
            width: auto;
            /*background: #CF7500;*/
            background: #94943a;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 10px 20px;
            margin: 10px 5px;
        }
        .stripe-payment-btn{
            font-family: 'Lato', sans-serif;
            font-size: 13px;
        }

        #shipping-payment-form .action-button:hover, #shipping-payment-form .action-button:focus {
            box-shadow: 0 0 0 2px #fff, 0 0 0 3px #94943a;
        }

        #shipping-payment-form .action-button-previous {
            width: 100px;
            background: #C5C5F1;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #shipping-payment-form .action-button-previous:hover, #shipping-payment-form .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #C5C5F1;
        }

        /*headings*/
        .fs-title {
            font-family: 'Lato', sans-serif;
            font-size: 1.5rem;
            text-transform: uppercase;
            color: #2C3E50;
            margin-bottom: 10px;
            letter-spacing: 2px;
            font-weight: bold;
        }

        .fs-subtitle {
            font-family: 'Lato', sans-serif;
            font-weight: normal;
            font-size: 1rem;
            color: #666;
            margin-bottom: 20px;
        }

        /* Progress Bar */
        .progress-wrap {
            margin: auto;
            display: table;
        }

        .line-progress-bar {
            display: flex;
            margin: auto;
            width: 100%;
        }

        .line {
            height: 1px;
            width: 250px;
            border-bottom-style: solid;
            border-bottom-width: 1px;
            border-bottom-color: rgb(217, 217, 217);
            position: absolute;
            margin-top: 8px;
        }

        .progress-wrap div ul {
            display: flex;
            width: 250px;
            list-style: none;
            padding: 0;
            margin: initial;
            justify-content: space-between;
            z-index: 1;
        }

        .progressbar-dots {
            display: inline-flex;
            border: #949494 solid 4px;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            text-align: center;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: #d4d4d4;
            font-size: 20px;
            margin-left: 0px;
            color: #d4d4d4;
            background: rgb(217, 217, 217);
        }

        .progressbar-dots span {
            font-size: 12px;
            line-height: 12px;
            position: absolute;
            margin-top: 60px;
            /* width: 75px; */
            float: left;
            margin-left: -30px;
            display: none;
        }

        .progressbar-dots.active {
            color: #fff;
            /*border: 5px solid #ff7500;*/
            border: 5px solid #94943a;
            /*background: #f0a500;*/
            background: #d8d98b;
        }

        /*  Tab */
        .tab-pane {
            display: none;
        }

        .tab-pane:first-child {
            display: block;
        }

        /*Orders*/
        .orders ul {
            max-height: 300px;
            overflow-y: scroll;
            overflow-x: hidden;
        }

        .orders li {
            list-style: none;
        }


        .modal-body {
            padding: 0;
        }

        .modal-content, .modal-body, #login-card {
            max-width: 350px;
            border-radius: 25px;
            margin: auto;
        }

    </style>
@stop

@section('content')
    <billing-component>
    </billing-component>
@stop

@section('scripts')

    <script>
        $(function () {
            /*Validation if Checkbox is checked*/
            $(".next").click(function () {
                /*Billing*/
                var fname_billing = $("#first_name_billing").val();
                var lname_billing = $("#last_name_billing").val();
                var address_billing = $("#address_billing").val();
                var suburb_billing = $("#suburb_billing").val();
                var postalCode_billing = $("#postal_code_billing").val();
                var state_billing = $("#state_billing").val();
                var email_billing = $("#email_billing").val();
                var contactNumber_billing = $("#contact_number_billing").val();
                var regExp = /^([\w\.\+]{1,})([^\W])(@)([\w]{1,})(\.[\w]{1,})+$/;


                $('input').on("keypress", function () {
                    if (fname_billing.length !== null) {
                        $("#p1_billing").text("");
                    }
                    if (lname_billing.length !== null) {
                        $("#p2_billing").text("");
                    }
                    if (address_billing.length !== null) {
                        $("#p3_billing").text("");
                    }
                    if (suburb_billing.length !== null) {
                        $("#p4_billing").text("");
                    }
                    if (postal_code_billing.length !== null) {
                        $("#p5_billing").text("");
                    }
                    if (email_billing.length !== null) {
                        $("#p6_billing").text("");
                    }
                    if (contactNumber_billing.length !== null) {
                        $("#p7_billing").text("");
                    }
                    if (state_billing.length !== null) {
                        $("#p8_billing").text("");
                    }
                });

                if ($("#toggleShippingAddress").is(':checked')) {
                    /*Shipping*/
                    var fname = $("#firstname").val();
                    var lname = $("#lastname").val();
                    var address = $("#address").val();
                    var suburb = $("#suburb").val();
                    var postalcode = $("#shipping_postal_code_billing").val();
                    var state = $("#state").val();
                    var email = $("#email").val();
                    var contactnumber = $("#contact_number").val();
                    var regExp = /^([\w\.\+]{1,})([^\W])(@)([\w]{1,})(\.[\w]{1,})+$/;

                    $('input').on("keypress", function () {
                        if (fname.length !== null) {
                            $("#p1").text("");
                        }
                        if (lname.length !== null) {
                            $("#p2").text("");
                        }
                        if (address.length !== null) {
                            $("#p3").text("");
                        }
                        if (suburb.length !== null) {
                            $("#p4").text("");
                        }
                        if (postalcode.length !== null) {
                            $("#p5").text("");
                        }
                        if (email.length !== null) {
                            $("#p6").text("");
                        }
                        if (contactnumber.length !== null) {
                            $("#p7").text("");
                        }
                        if (state.length !== null) {
                            $("#p7").text("");
                        }
                    });
                    if (fname.length == "") {
                        $("#p1").text("Please fill up your first name");
                        $("#firstname").focus();
                        return false;
                    }
                    if (lname.length == "") {
                        $("#p2").text("Please fill up your last name");
                        $("#lastname").focus();
                        return false;
                    }
                    if (address.length == "") {
                        $("#p3").text("Please fill up your address");
                        $("#address").focus();
                        return false;
                    }
                    if (suburb.length == "") {
                        $("#p4").text("Please fill up your suburb name");
                        $("#suburb").focus();
                        return false;
                    }
                    if (state.length == "") {
                        $("#p8").text("Please fill up your state name");
                        $("#suburb").focus();
                        return false;
                    }
                    if (postalcode.length == "") {
                        $("#p5").text("Please fill up your postal code");
                        $("#postal_code").focus();
                        return false;
                    }
                    if (email.length == "") {
                        $("#p6").text("Please fill up your email address");
                        $("#postal_code").focus();
                        return false;
                    }
                    if (!regExp.test(email)) {
                        $("#p6").text("Please fill up your valid email");
                        $("#email").focus();
                        return false;
                    }
                    if (contactnumber.length == "") {
                        $("#p7").text("Please fill up your contact number");
                        $("#contact_number").focus();
                        return false;
                    }
                    if (contactnumber.length < 10) {
                        $("#p7").text("Contact number must be at least 10 digits long");
                        $("#contact_number").focus();
                        return false;
                    } else {
                        $(".tab-pane").hide();
                        $("#step2").fadeIn(1000);
                        $('.progressbar-dots').removeClass('active');
                        $('.progressbar-dots:nth-child(2)').addClass('active');
                    }
                } else if (fname_billing.length == "") {
                    $("#p1_billing").text("Please fill up your first name");
                    $("#first_name_billing").focus();
                    return false;
                }else if (lname_billing.length == "") {
                    $("#p2_billing").text("Please fill up your last name");
                    $("#last_name_billing").focus();
                    return false;
                }else if (address_billing.length == "") {
                    $("#p3_billing").text("Please fill up your address");
                    $("#address_billing").focus();
                    return false;
                } else if (suburb_billing.length == "") {
                    $("#p4_billing").text("Please fill up your suburb name");
                    $("#suburb_billing").focus();
                    return false;
                }else if (state_billing.length == "") {
                    $("#p8_billing").text("Please fill up your state name");
                    $("#suburb_billing").focus();
                    return false;
                } else if (postalCode_billing.length == "") {
                    $("#p5_billing").text("Please fill up your postal code");
                    $("#postal_code_billing").focus();
                    return false;
                } else if (email_billing.length == "") {
                    $("#p6_billing").text("Please fill up your email address");
                    $("#email_billing").focus();
                    return false;
                } else if (!regExp.test(email_billing)) {
                    $("#p6_billing").text("Please fill up your valid email");
                    $("#email_billing").focus();
                    return false;
                } else if (contactNumber_billing.length == "") {
                    $("#p7_billing").text("Please fill up your contact number");
                    $("#contact_number_billing").focus();
                    return false;
                } else if (contactNumber_billing.length < 10) {
                    $("#p7_billing").text("Contact number must be at least 10 digits long");
                    $("#contact_number_billing").focus();
                    return false;
                }else {
                    $(".tab-pane").hide();
                    $("#step2").fadeIn(1000);
                    $('.progressbar-dots').removeClass('active');
                    $('.progressbar-dots:nth-child(2)').addClass('active');
                }
            });


            $('.shipping-address-form').hide();

            $("#toggleShippingAddress").click(function () {
                if ($(this).is(":checked")) {
                    $(".shipping-address-form").slideDown();
                } else {
                    $(".shipping-address-form").slideUp();
                }
            });

            /*Credit Card and Pay[ppal*/
            $(".paypalCard").hide();
            $(".cashOnDelivery").hide();
            $("#creditCard").click(function () {
                $(".creditCard").show();
                $(".paypalCard").hide();
                $(".cashOnDelivery").hide();
                $('#paypalCard').addClass('btn-main-secondary');
                $('#cashOnDelivery').addClass('btn-main-secondary');
                $('#creditCard').removeClass('btn-main-secondary');
                $('#creditCard').addClass('btn-main-primary');
            });
            $("#paypalCard").click(function () {
                $(".paypalCard").show();
                $(".creditCard").hide();
                $(".cashOnDelivery").hide();
                $('#creditCard').addClass('btn-main-secondary');
                $('#cashOnDelivery').addClass('btn-main-secondary');
                $('#paypalCard').removeClass('btn-main-secondary');
                $('#paypalCard').addClass('btn-main-primary');
            });
            $("#cashOnDelivery").click(function () {
                $(".cashOnDelivery").show();
                $(".paypalCard").hide();
                $(".creditCard").hide();
                $('#creditCard').addClass('btn-main-secondary');
                $('#paypalCard').addClass('btn-main-secondary');
                $('#cashOnDelivery').removeClass('btn-main-secondary');
                $('#cashOnDelivery').addClass('btn-main-primary');
            });
            $(".prev").click(function () {
                $(".tab-pane").hide();
                $("#step1").fadeIn(1000);
                $('.progressbar-dots').removeClass('active');
                $('.progressbar-dots:nth-child(1)').addClass('active');
            });

            $(".pay").click(function () {
                $(".tab-pane").hide();
                $("#step3").fadeIn(1000);
                $('.progressbar-dots').removeClass('active');
                $('.progressbar-dots:nth-child(3)').addClass('active');
            });
        });


    </script>
@stop

