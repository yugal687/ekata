<!--Website Header-->
@extends('layouts.website.header')
<!--Website Header Ends-->


@section('style')
    <style>
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
            font-family: montserrat;
            color: #2C3E50;
            font-size: 13px;
        }

        #shipping-payment-form input:focus, #shipping-payment-form textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #CF7500;
            outline-width: 0;
            transition: All 0.5s ease-in;
            -webkit-transition: All 0.5s ease-in;
            -moz-transition: All 0.5s ease-in;
            -o-transition: All 0.5s ease-in;
        }

        /*buttons*/
        #shipping-payment-form .action-button {
            width: auto;
            background: #CF7500;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 10px 20px;
            margin: 10px 5px;
        }

        #shipping-payment-form .action-button:hover, #shipping-payment-form .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #CF7500;
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
            font-size: 18px;
            text-transform: uppercase;
            color: #2C3E50;
            margin-bottom: 10px;
            letter-spacing: 2px;
            font-weight: bold;
        }

        .fs-subtitle {
            font-weight: normal;
            font-size: 13px;
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
            background: #333333;
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
            border: 0px solid rgb(217, 217, 217);
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
            border: 5px solid rgb(38, 163, 134);
            background: #82CCC8;
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

    {{--
        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    --}}

    <script>

        $(function () {

            /*Validation if Checkbox is checked*/
            $(".next").click(function () {
                if ($("#toggleShippingAddress").is(':checked')) {
                    var fname = $("#firstname").val();
                    var lname = $("#lastname").val();
                    var address = $("#address").val();
                    var suburb = $("#suburb").val();
                    var postalcode = $("#postal_code").val();
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
                    });
                    if (fname.length == "") {
                        $("#p1").text("Please fill your first name");
                        $("#firstname").focus();
                        return false;
                    }
                    if (lname.length == "") {
                        $("#p2").text("Please fill your last name");
                        $("#lastname").focus();
                        return false;
                    }
                    if (address.length == "") {
                        $("#p3").text("Please fill your address");
                        $("#address").focus();
                        return false;
                    }
                    if (suburb.length == "") {
                        $("#p4").text("Please fill your suburb name");
                        $("#suburb").focus();
                        return false;
                    }
                    if (postalcode.length == "") {
                        $("#p5").text("Please fill postal code");
                        $("#postal_code").focus();
                        return false;
                    }
                    if (email.length == "") {
                        $("#p6").text("Please fill email address");
                        $("#postal_code").focus();
                        return false;
                    }
                    if (!regExp.test(email)) {
                        $("#p6").text("Please fill up your valid email");
                        $("#email").focus();
                        return false;
                    }
                    if (contactnumber.length == "") {
                        $("#p7").text("Please fill your contact number");
                        $("#contact_number").focus();
                        return false;
                    }
                    if (contactnumber.length < 10) {
                        $("#p7").text("Contact numbers must be at least 10 digits long");
                        $("#contact_number").focus();
                        return false;
                    } else {
                        $(".tab-pane").hide();
                        $("#step2").fadeIn(1000);
                        $('.progressbar-dots').removeClass('active');
                        $('.progressbar-dots:nth-child(2)').addClass('active');
                    }
                } else {
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
            $("#creditCard").click(function () {
                $(".creditCard").show();
                $(".paypalCard").hide();
                $('#paypalCard').toggleClass('btn-secondary', 'btn-primary');
                $('#creditCard').removeClass('btn-secondary');
                $('#creditCard').addClass('btn-primary');
            });
            $("#paypalCard").click(function () {
                $(".paypalCard").show();
                $(".creditCard").hide();
                $('#creditCard').toggleClass('btn-secondary', 'btn-primary');
                $('#paypalCard').removeClass('btn-secondary');
                $('#paypalCard').addClass('btn-primary');
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

            // This function displays Smart Payment Buttons on your web page.
            /*  paypal.Button.render({
                  // Configure environment
                  env: 'sandbox',
                  client: {
                      sandbox: 'demo_sandbox_client_id',
                      production: 'demo_production_client_id'
                  },
                  // Customize button (optional)
                  locale: 'en_US',
                  style: {
                      size: 'medium',
                      color: 'gold',
                      shape: 'pill',
                  },

                  // Enable Pay Now checkout flow (optional)
                  commit: true,

                  // Set up a payment
                  payment: function (data, actions) {
                      return actions.payment.create({
                          transactions: [{
                              amount: {
                                  total: '0.01',
                                  currency: 'AUD',
                              }
                          }]
                      });
                  },
                  // Execute the payment
                  onAuthorize: function (data, actions) {
                      return actions.payment.execute().then(function () {
                          // Show a confirmation message to the buyer
                          window.alert('Thank you for your purchase!');
                      });
                  }
              }, '#paypal-button');
  */
        });


    </script>
@stop

