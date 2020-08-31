<!--Website Header-->
@extends('layouts.website.header')
<!--Website Header Ends-->

@section('style')
    <style>
        .testing-section{
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
            width: 100px;
            background: #CF7500;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 10px 5px;
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
    </style>
@stop

@section('content')
    <div class="container testing-section" style="">
        <div class="row mb-2">
            <div class="col-md-12">
                <h1 class="text-center align-items-center justify-content-center" style="font-family:'Times New Roman'">
                    Payment And Shipping</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <form action="" id="shipping-payment-form">
                    <div class="progress-wrap">
                        <div class="line-progress-bar">
                            <div class="line"></div>
                            <ul class="checkout-bar">
                                <li class="progressbar-dots active"><span>step 1</span></li>
                                <li class="progressbar-dots"><span>step 2</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content mt-4" id="main-form">
                        <div class="tab-pane" id="step1">
                            <h2 class="fs-title">Billing / Shipping Address</h2>
                            <h3 class="fs-subtitle">Please Fill Up Billing Address</h3>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="firstname"
                                           placeholder="* First Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="lastname" placeholder="* Last Name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="address1" placeholder="* Address">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="address2"
                                           placeholder="* Optional Address ">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" id="address1" placeholder="* City">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="value" class="form-control" id="address2"
                                           placeholder="* Postal Code ">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="email" class="form-control" id="address1" placeholder="* E-mail">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="value" class="form-control" id="address1" placeholder="* Phone No">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-1">
                                    <input type="checkbox" id="toggleShippingAddress" class="form-check-input">
                                </div>
                                <div class="col-10 text-left">
                                    <label class="form-check-label" for="toggleShippingAddress">Check if shipping
                                        address is different than billing address</label>
                                </div>
                            </div>
                            <div class="shipping-address-form mt-3">
                                <h3 class="fs-subtitle">Please Fill Up Shipping Address</h3>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="firstname"
                                               placeholder="* First Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="lastname"
                                               placeholder="* Last Name">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="address1"
                                               placeholder="* Address">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="address2"
                                               placeholder="* Optional Address ">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" id="address1" placeholder="* City">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="value" class="form-control" id="address2"
                                               placeholder="* Postal Code ">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="email" class="form-control" id="address1"
                                               placeholder="* E-mail">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="value" class="form-control" id="address1"
                                               placeholder="* Phone No">
                                    </div>
                                </div>
                            </div>

                            <input type="button" name="next" class="next action-button" value="Next"/>

                            {{--<input type="button" name="next" class="next-btn next-btn1" value="Next"/>--}}

                        </div>
                        <div class="tab-pane" id="step2">
                            <h2 class="fs-title">Payment Information</h2>
                            <h3 class="fs-subtitle">Please Fill Up Paymennt Information</h3>
                            <div class="row mb-3">
                                <div class="col-12 text-left">
                                    <button type="button" class="btn btn-primary" id="creditCard">Credit Card</button>
                                    <button type="button" class="btn btn-secondary" id="paypal">Paypal</button>
                                </div>
                            </div>
                            <div class="creditCard" id="">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <input type="number" class="form-control" id="cardNumber"
                                                       placeholder="1234 5678 9012 3456">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="date" class="form-control" id="expiryDate"
                                                       placeholder="MM/YY">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="number" class="form-control" id="cvccvv"
                                                       placeholder="CVC / CVV">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <input type="text" class="form-control" id="cardHolderName"
                                                       placeholder="Card Holder Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="paypal">
                                <div class="row">
                                    <div class="col-12">

                                    </div>
                                </div>
                            </div>

                            <input type="button" name="previous" class="prev action-button-previous"
                                   value="Previous"/>
                            {{--<input type="button" name="next" class="next action-button" value="Next"/>--}}
                            <input type="button" name="pay" class="pay action-button" value="Pay Now"/>
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-md-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 col-sm-12">
                        <h4 class="pt-5" style="font-family:'Times New Roman'; color: #00000070;">HELP? CONTACT US:12345678</h4>
                        <hr/>
                        <div class="row pt-2">
                            <div class="col-md-9">
                                <h6><strong>SUB-TOTAL</strong></h6>
                            </div>
                            <div class="col-md-3">
                                <b>: $9.99</b>
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-9">
                                <h6><strong>DISCOUNT</strong></h6>
                            </div>
                            <div class="col-md-3">
                                <b>: $0.99</b>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-9">
                                <h6><strong>ESTIMATED TOTAL</strong></h6>
                            </div>
                            <div class="col-md-3">
                                <b>: $9.00</b>
                            </div>
                        </div>

                        <div class="row mt-5 orders">
                            <div class="col-md-12">
                                <div>
                                    <h5><strong><u>Your Order Details</u></strong></h5>
                                    <ul class="px-3">
                                        <li class="my-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img style="width: 100%; height: auto" src="/images/noodle.jpg">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5>Item Name</h5>
                                                    <h6>Quantity: 1</h6>
                                                    <h6>Price: $1</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img style="width: 100%; height: auto" src="/images/noodle.jpg">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5>Item Name</h5>
                                                    <h6>Quantity: 1</h6>
                                                    <h6>Price: $1</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img style="width: 100%; height: auto" src="/images/noodle.jpg">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5>Item Name</h5>
                                                    <h6>Quantity: 1</h6>
                                                    <h6>Price: $1</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img style="width: 100%; height: auto" src="/images/noodle.jpg">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5>Item Name</h5>
                                                    <h6>Quantity: 1</h6>
                                                    <h6>Price: $1</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img style="width: 100%; height: auto" src="/images/noodle.jpg">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5>Item Name</h5>
                                                    <h6>Quantity: 1</h6>
                                                    <h6>Price: $1</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img style="width: 100%; height: auto" src="/images/noodle.jpg">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5>Item Name</h5>
                                                    <h6>Quantity: 1</h6>
                                                    <h6>Price: $1</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img style="width: 100%; height: auto" src="/images/noodle.jpg">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5>Item Name</h5>
                                                    <h6>Quantity: 1</h6>
                                                    <h6>Price: $1</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img style="width: 100%; height: auto" src="/images/noodle.jpg">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5>Item Name</h5>
                                                    <h6>Quantity: 1</h6>
                                                    <h6>Price: $1</h6>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $('.shipping-address-form').hide();

        $("#toggleShippingAddress").click(function () {
            if ($(this).is(":checked")) {
                $(".shipping-address-form").slideDown();
            } else {
                $(".shipping-address-form").slideUp();
            }
        });

        /*Credit Card and Pay[ppal*/
        $("#creditCard").click(function () {
            $(".creditCard").show();
            $(".paypal").hide();
            $('#paypal').toggleClass('btn-secondary', 'btn-primary');
            $('#creditCard').removeClass('btn-secondary');
            $('#creditCard').addClass('btn-primary');
        });
        $("#paypal").click(function () {
            $(".paypal").show();
            $(".creditCard").hide();
            $('#creditCard').toggleClass('btn-secondary', 'btn-primary');
            $('#paypal').removeClass('btn-secondary');
            $('#paypal').addClass('btn-primary');
        });


        $(".next").click(function () {
            $(".tab-pane").hide();
            $("#step2").fadeIn(1000);
            $('.progressbar-dots').removeClass('active');
            $('.progressbar-dots:nth-child(2)').addClass('active');

        });
        $(".prev").click(function () {
            $(".tab-pane").hide();
            $("#step1").fadeIn(1000);
            $('.progressbar-dots').removeClass('active');
            $('.progressbar-dots:nth-child(1)').addClass('active');

        });

        $(".pay").click(function () {
            $("#loader").show();
            setTimeout(function () {
                $("#booking-form").html("<h2>Your message was sent successfully. Thanks! We'll be in touch as soon as we can, which is usually like lightning (Unless we're sailing or eating tacos!).</h2>");
            }, 1000);
            return false;
        });
    </script>
@stop

