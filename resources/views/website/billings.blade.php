<!--Website Header-->
@extends('layouts.website.header')
<!--Website Header Ends-->

@section('style')
    <style>
        .billing-section {
            height: 100%;
            margin-bottom: 100px;
        }

        /*form styles*/
        #msform {
            text-align: center;
            position: relative;
            margin-top: 30px;
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.1);
            padding: 20px 30px;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            /*stacking fieldsets above each other*/
            position: relative;
        }

        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        /*inputs*/
        #msform input, #msform textarea {
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

        #msform input:focus, #msform textarea:focus {
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
        #msform .action-button {
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

        #msform .action-button:hover, #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #CF7500;
        }

        #msform .action-button-previous {
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

        #msform .action-button-previous:hover, #msform .action-button-previous:focus {
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

        /*progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
        }

        #progressbar li {
            list-style-type: none;
            color: white;
            text-transform: uppercase;
            font-size: 9px;
            width: 50%;
            float: left;
            position: relative;
            letter-spacing: 1px;
        }

        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 24px;
            height: 24px;
            line-height: 26px;
            display: block;
            font-size: 12px;
            color: #333;
            background: white;
            border-radius: 25px;
            margin: 0 auto 10px auto;
        }

        /*progressbar connectors*/
        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: white;
            position: absolute;
            left: -50%;
            top: 9px;
            z-index: -1; /*put it behind the numbers*/
        }

        #progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }

        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        #progressbar li.active:before, #progressbar li.active:after {
            background: #CF7500;
            color: white;
        }


        /* Not relevant to this form */
        .dme_link {
            margin-top: 30px;
            text-align: center;
        }

        .dme_link a {
            background: #FFF;
            font-weight: bold;
            color: #CF7500;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            padding: 5px 25px;
            font-size: 12px;
        }
        .dme_link a:hover, .dme_link a:focus {
            background: #C5C5F1;
            text-decoration: none;
        }
        .orders ul{
            max-height: 400px;
            overflow-y: scroll;
            overflow-x: hidden;
        }
        .orders li{
            list-style: none;
        }
        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            color: #fff;
            background-color: #CF7500;
        }

    </style>
@stop


@section('content')
    <div class="container billing-section">
        <div class="row">
            <div class="col-md-12 pt-5">
                <h1 class="text-center align-items-center justify-content-center" style="font-family:'Times New Roman'">Payment And Shipping</h1>
            </div>
        </div>

        <div class="row pt-3">
            <div class="col-md-7">
                {{--<h2 class="font-weight-bold text-main-primary" style="font-family:'Times New Roman'">PAYMENT</h2>
                <hr style="border: 1px solid">

                <h4 style="font-family:'Times New Roman'">ENTER BILLING ADDRESS:</h4>

                <div class="col-md-12 pt-2">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="firstname" placeholder="* First Name">
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
                                <input type="text" class="form-control" id="address2" placeholder="* Optional Address ">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control" id="address1" placeholder="* City">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="value" class="form-control" id="address2" placeholder="* Postal Code ">
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
                    </form>
                </div>--}}

                <div class="row">
                    <div class="col-md-12">
                        <form id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active">Personal Details</li>
                                <li>Payment Information</li>
                                {{--<li>Account Setup</li>--}}
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>
                                <h2 class="fs-title">Billing Address</h2>
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
                                <input type="button" name="next" class="next action-button" value="Next"/>
                            </fieldset>

                            <fieldset>
                                <h2 class="fs-title">Payment Information</h2>
                                <h3 class="fs-subtitle">Please Fill Up Paymennt Information</h3>
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                                   href="#pills-home" role="tab" aria-controls="pills-home"
                                                   aria-selected="true">Credit Card</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                                   href="#pills-profile" role="tab" aria-controls="pills-profile"
                                                   aria-selected="false">Paypal</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                         aria-labelledby="pills-home-tab">
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

                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                         aria-labelledby="pills-profile-tab">
                                        <div class="row">
                                            <div class="col-12">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="button" name="previous" class="previous action-button-previous"
                                       value="Previous"/>
                                <input type="button" name="next" class="next action-button" value="Next"/>
                            </fieldset>

                            {{--<fieldset>
                                <h2 class="fs-title">Create your account</h2>
                                <h3 class="fs-subtitle">Fill in your credentials</h3>
                                <input type="text" name="email" placeholder="Email"/>
                                <input type="password" name="pass" placeholder="Password"/>
                                <input type="password" name="cpass" placeholder="Confirm Password"/>
                                <input type="button" name="previous" class="previous action-button-previous"
                                       value="Previous"/>
                                <input type="submit" name="submit" class="submit action-button" value="Submit"/>
                            </fieldset>--}}
                        </form>
                        <!-- link to designify.me code snippets -->
                    </div>
                </div>

            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4 pt-5">
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

                <button type="button" class="btn bg-main-primary btn-lg text-white mt-3">PAY NOW</button>

                <div class="row mt-5 orders">
                    <div class="col-md-12">
                        <div>
                            <h5><strong><u>Your Order Details</u></strong></h5>
                            <ul class="px-3">
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
@stop

@section('scripts')
    <script>

        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".next").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50) + "%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'position': 'absolute'
                    });
                    next_fs.css({'left': left, 'opacity': opacity});
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".previous").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({'left': left});
                    previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity});
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".submit").click(function () {
            return false;
        })
    </script>
@stop

<!--ends-->
