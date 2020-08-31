<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Ekata Convenience Store</title>
    <!-- Mobile Specific Metas
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- CSS
    ================================================== -->

    <!-- Bootstrap -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- owl carousel  -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <!---Tiny Slider--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    @yield('style')

    <style>
        /*******************************
* MODAL AS LEFT/RIGHT SIDEBAR
* Add "left" or "right" in modal parent div, after class="modal".
* Get free snippets on bootpen.com
*******************************/
        .modal.right .modal-dialog {
            position: fixed;
            top: 16%;
            margin: auto;
            width: 320px;
            height: 85%;
        }

        /*.modal.right .modal-content {
            height: 84%;
            overflow-y: auto;
        }*/
        .modal.right .modal-content {
            flex-direction: row;
        }

        .modal.right .modal-body {
            padding: 15px 15px 80px;
        }

        /*Right*/
        .modal.right.fade .modal-dialog {
            right: 20px;
        }

        /* ----- MODAL STYLE ----- */
        .badge {
            background-color: #CF7500;
            border-radius: 10px;
            color: white;
            display: inline-block;
            font-size: 12px;
            line-height: 1;
            padding: 3px 7px;
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
        }

        .shopping-cart {
            margin: 0;
            float: right;
            background: white;
            width: 450px;
            position: relative;
            border-radius: 3px;
            padding: 20px;
        }

        .shopping-cart .shopping-cart-header {
            border-bottom: 1px solid #e8e8e8;
            padding-bottom: 15px;
        }

        .shopping-cart .shopping-cart-header .shopping-cart-total {
            float: right;
        }

        .shopping-cart .shopping-cart-items {
            padding: 20px;
            max-height: 300px;
            overflow-y: scroll;
        }

        .shopping-cart .shopping-cart-items li {
            list-style: none;
            border-bottom: 1px solid #00000040;
        }

        .shopping-cart .shopping-cart-items img {
            float: left;
            margin-right: 12px;
        }

        .shopping-cart .shopping-cart-items .item-name {
            display: block;
            padding-top: 10px;
            font-size: 16px;
        }

        .shopping-cart .shopping-cart-items .item-price {
            color: #CF7500;
            margin-right: 8px;
        }

        .shopping-cart .shopping-cart-items .item-quantity {
            color: #abb0be;
        }

        /*.shopping-cart:after {
            bottom: 100%;
            left: 80%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: white;
            border-width: 8px;
            margin-left: -8px;
        }*/

        .cart-icon {
            color: #F0A500;
            font-size: 24px;
            margin-right: 7px;
            float: left;
        }

        .shopping-cart .button {
            background-color: #cf7500;
            color: white;
            text-align: center;
            padding: 12px;
            text-decoration: none;
            display: block;
            border-radius: 3px;
            font-size: 16px;
            text-transform: uppercase;
            margin: 25px 0 15px 0;
            cursor: pointer;
        }

        .main-color-text {
            color: #CF7500;
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        /*Navbar*/
        /*a.navbar-brand{
            display: none;
        }*/
        @media (min-width: 992px) {
            ul.navbar-nav.mr-auto {
                margin-bottom: -8px;
            }
            #topNavbar nav .active{
                border-bottom: 3px solid #fff !important;
            }

            .navbar-expand-lg .navbar-nav .nav-link {
                padding-bottom: 12px;
            }

            .nav-right.container-mine {
                margin: 5px 60px;
            }
            .sm-user-checkout{
                display: none;
            }
        }
        @media (max-width: 991px){
            #topNavbar nav .active{
                border-bottom: 3px solid #fff !important;
                font-weight: bold;
                width: 30%
            }
            .nav-right.container-mine {
                margin: 25px 60px 5px;
            }
            .navbar{
                transition: slide-down 2s ease-in-out;
            }
            .sticky {
                position: fixed;
                top: -5px;
                width: 100%;
                z-index: 10002;
            }
            .sm-user-checkout {
                top: 10px;
                position: absolute;
                right: 140px;
            }
            .lg-user-checkout{
                display: none;
            }
        }

    </style>

</head>

<body>
<header>

    <div class="body-inner">
        <div id="top-bar" class="top-bar">

            <div class="row m-0 p-0">
                <div class="col-lg-2 col-md-12 m-0 p-0 bg-main-primary rounded-right-top">
                    <div class="container-mine">
                        <div class="text-center">
                            <h3 class=" text-white font-weight-bold pl-2 mt-4">Logo
                                Here</h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-10 col-md-12 m-0 p-0 ">
                    <div class="row m-0 p-0">
                        <div class="col-md-6 m-0 p-0"></div>
                        <div class="col-md-6 bg-main-secondary rounded m-0 p-0">
                            <div class="mx-4">
                                <div class="input-group border-0 py-2 ">
                                    <input type="text" class="form-control border-0 " placeholder="Search items..."
                                           aria-label="Search items..." aria-describedby="basic-addon2">
                                    <div class="input-group-append bg-main-secondary ">
                                            <span
                                                class="input-group-text bg-main-primary border-0 text-white .rounded-around"
                                                id="basic-addon2">
                                                Search</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bavigation MenuBar Starts Here-->
                    <div id="topNavbar">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-main-primary">
                            <a class="navbar-brand" href="#">
                            </a>
                            <div class="sm-user-checkout">
                                <a href="#" class="user">
                                    <svg width="1.7em" height="1.7em" viewBox="0 0 16 16"
                                         class="bi bi-person-bounding-box text-white mr-2 mt-1" fill="currentColor"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                                        <path fill-rule="evenodd"
                                              d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    </svg>
                                </a>
                                <a href="#" class="cart" data-toggle="modal" data-target="#cartModal">
                                    <svg width="2em" height="2em" viewBox="0 0 16 16"
                                         class="bi bi-cart4 text-white ml-2" fill="currentColor"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                    </svg>
                                    <div class="cart-count rounded bg-main-secondary text-white"> 1</div>
                                </a>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>



                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active px-2">
                                        <a class="nav-link text-white" href="/">Home <span
                                                class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item px-2">
                                        <a class="nav-link text-white" href="#">About Us</a>
                                    </li>
                                    <li class="nav-item px-2">
                                        <a class="nav-link text-white" href="#">Services</a>
                                    </li>
                                    <li class="nav-item px-2">
                                        <a class="nav-link text-white" href="#">Products</a>
                                    </li>
                                    <li class="nav-item px-2">
                                        <a class="nav-link text-white" href="/contact">Contact Us</a>
                                    </li>
                                </ul>
                                <div class="nav-right container-mine lg-user-checkout">
                                    <a href="#" class="user">
                                        <svg width="1.7em" height="1.7em" viewBox="0 0 16 16"
                                             class="bi bi-person-bounding-box text-white mr-2 mt-1" fill="currentColor"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                                            <path fill-rule="evenodd"
                                                  d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                    </a>
                                    <a href="#" class="cart" data-toggle="modal" data-target="#cartModal">
                                        <svg width="2em" height="2em" viewBox="0 0 16 16"
                                             class="bi bi-cart4 text-white ml-2" fill="currentColor"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                        </svg>
                                        <div class="cart-count rounded bg-main-secondary text-white"> 1</div>
                                    </a>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <!-- Bavigation MenuBar Ends Here-->
                </div>
            </div>

        </div>
        <!--/ Topbar end -->
    </div>

    <!-- Cart Modal -->
    <div class="modal right fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="shopping-cart">
                    <div class="shopping-cart-header">
                        <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">3</span>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!--end shopping-cart-header -->

                    <ul class="shopping-cart-items">
                        <li class="clearfix">
                            <div class="row pb-2 align-items-center">
                                <div class="col-4" style="overflow: hidden">
                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg"
                                         class="img-fluid" width="80px" height="100px"
                                         alt=""/>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <span class="item-name">Sony DSC-RX100M III</span>
                                    </div>
                                    <div class="row pb-1">
                                        <span class="item-price font-weight-bold">$849.99</span>
                                    </div>
                                    {{--<div class="row">
                                        <span class="item-quantity">Quantity:</span>
                                    </div>--}}
                                    <div class="row pr-4">
                                        <div class="col-xs-3 col-xs-offset-3">
                                            <div class="input-group input-group-sm number-spinner">
				                                <span class="input-group-prepend">
					                                    <button class="btn bg-main-secondary text-white" data-dir="dwn">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                </span>
                                                <input type="text" class="form-control text-center" value="1">
                                                <span class="input-group-append">
                                                    <button class="btn bg-main-secondary text-white" data-dir="up">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
				                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <a href="#" class="">
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li class="clearfix">
                            <div class="row pb-2 align-items-center">
                                <div class="col-4" style="overflow: hidden">
                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg"
                                         class="img-fluid" width="80px" height="100px"
                                         alt=""/>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <span class="item-name">Sony DSC-RX100M III</span>
                                    </div>
                                    <div class="row pb-1">
                                        <span class="item-price font-weight-bold">$849.99</span>
                                    </div>
                                    {{--<div class="row">
                                        <span class="item-quantity">Quantity:</span>
                                    </div>--}}
                                    <div class="row pr-4">
                                        <div class="col-xs-3 col-xs-offset-3">
                                            <div class="input-group input-group-sm number-spinner">
				                                <span class="input-group-prepend">
					                                    <button class="btn bg-main-secondary text-white" data-dir="dwn">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                </span>
                                                <input type="text" class="form-control text-center" value="1">
                                                <span class="input-group-append">
                                                    <button class="btn bg-main-secondary text-white" data-dir="up">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
				                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <a href="#" class="">
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li class="clearfix">
                            <div class="row pb-2 align-items-center">
                                <div class="col-4" style="overflow: hidden">
                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg"
                                         class="img-fluid" width="80px" height="100px"
                                         alt=""/>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <span class="item-name">Sony DSC-RX100M III</span>
                                    </div>
                                    <div class="row pb-1">
                                        <span class="item-price font-weight-bold">$849.99</span>
                                    </div>
                                    {{--<div class="row">
                                        <span class="item-quantity">Quantity:</span>
                                    </div>--}}
                                    <div class="row pr-4">
                                        <div class="col-xs-3 col-xs-offset-3">
                                            <div class="input-group input-group-sm number-spinner">
				                                <span class="input-group-prepend">
					                                    <button class="btn bg-main-secondary text-white" data-dir="dwn">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                </span>
                                                <input type="text" class="form-control text-center" value="1">
                                                <span class="input-group-append">
                                                    <button class="btn bg-main-secondary text-white" data-dir="up">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
				                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <a href="#" class="">
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="row">
                        <div class="col-12 text-right">
                            <span class="lighter-text">Total:</span>
                            <span class="main-color-text font-weight-bold">$2,229.97</span>
                        </div>
                    </div> <!--end shopping-cart-header -->


                    <a href="/billings" class="button">Checkout</a>
                </div> <!--end shopping-cart -->
            </div> <!--end container -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->


    <!---Cart Modal Ends---->
</header>

@yield('content')

{{--Footer Section--}}
<footer>
    <div class="footer-container mt-4">
        <div class="row d-flex align-items-center px-3">
            <div class="col-md-6">
                <div class="d-flex">
                    <div class="p-2 my-auto">
                        <p class="font-weight-bold">FOLLOW US:</p>
                    </div>
                    <div class="p-2">
                        <img src="{{ asset('images/Icons/facebook.png') }}"
                             class="img-fluid footer-icons-small pr-2" style="width: 50px; height: 40px" alt="">
                        <img src="{{ asset('images/Icons/instagram.png') }}"
                             class="img-fluid footer-icons-small pr-2" style="width: 50px; height: 40px" alt="">
                        <img src="{{ asset('images/Icons/twitter.png') }}"
                             class="img-fluid footer-icons-small pr-2" style="width: 50px; height: 40px" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row d-flex align-items-center">
                    <div class="col-8">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-sm bg-main-primary py-1 px-4 text-white" id="callBtn" type="submit">Call
                            Us
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <hr class="horzline">
    </div>

    <div class="footer-container">
        <div class="row" id="details">
            <div class="col-md-3 col-sm-6">
                <h4 class="col-12 text-center font-weight-bold">
                    Ekata Store
                </h4>
                <div class="col-12 text-center mt-4">
                    <p class="">Shop Confidence with Ekata</p>
                </div>
                <div class="row large-icon-container my-3">
                    <div class="col-4 icon-border-right text-center">
                        <div class="row d-flex justify-content-center">
                            <img src="{{ asset('images/Icons/bettervalue.png') }}"
                                 class="img-fluid footer-icons-large p-2" alt="">
                        </div>
                        <h6>Better Value</h6>
                    </div>
                    <div class="col-4 icon-border-right text-center">
                        <div class="row d-flex justify-content-center">
                            <img src="{{ asset('images/Icons/fastdelivery.png') }}"
                                 class="img-fluid footer-icons-large p-2" style="opacity: 0.8;" alt="">
                        </div>
                        <h6>Fast Delivery</h6>
                    </div>
                    <div class="col-4 text-center">
                        <div class="row d-flex justify-content-center">
                            <img src="{{ asset('images/Icons/safepayent.png') }}"
                                 class="img-fluid footer-icons-large p-2" style="opacity: 0.6;" alt="">
                        </div>
                        <h6>Safe Payment</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 text-center">
                        <h4 class="font-weight-bold">Our Services</h4>
                    </div>
                    <ul class="list-unstyled mt-4">
                        <li class="list">Nepalese Foods</li>
                        <li class="list">Indian Foods</li>
                        <li class="list">Pakistani Foods</li>
                        <li class="list">Bangladeshi Foods</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 text-center">
                        <h4 class="font-weight-bold">Opening Hours</h4>
                    </div>
                    <ul class="list-unstyled mt-4">
                        <li class="list">Mon: 9am-6pm</li>
                        <li class="list">Tue: 9am-6pm</li>
                        <li class="list">Wed: 9am-6pm</li>
                        <li class="list">Thus: 9am-6pm</li>
                        <li class="list">Fri: 9am-6pm</li>
                        <li class="list" style="color: red">Sat-Sun: closed</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 text-center">
                        <h4 class="font-weight-bold">Contact Us</h4>
                    </div>
                    <ul class="list-unstyled mt-4">
                        <li class="list">0420446000 042000000</li>
                        <li class="list">abcdekata@gmail.com</li>
                        <li class="list">soft tech road, preston</li>
                        <li class="list">VIC 3072</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <hr class="style7">


    <div class="container">
        <div class="col-md-12">
            <h2 class="text-center font-weight-bold" style="font-family: 'Times New Roman'">OUR DELIVERY SERVICES:</h2>
            <p class="text-center">
                3020 Albion | 3020 Sunshine | 3020 Sunshine North | 3020 Sunshine West | 3021 Albanvale | 3021 Kealba |
                3021 Kings Park | 3021 St Albans | 3022 Ardeer | 3023 Burnside | 3023 Burnside Heights | 3023 Cairnlea |
                3023 Caroline Springs | 3023 Deer Park | 3033 Keilor East | 3036 Keilor | 3036 Keilor North | 3037
                Delahey | 3037 Sydenham | 3037 Taylors Hill | 3038 Keilor Downs | 3038 Keilor Lodge | 3038 Taylors Lakes
                | 3042 Airport West | 3042 Keilor Park | 3042 Niddri
            </p>
        </div>
    </div>


    <hr class="style7">

    <div class="container">
        <p class="text-center"><b>Help:</b> Customer Service,Disputes & Reports,Buyer Protection,Report IPR infringement
        </p>
    </div>

    <div class="container-fluid">
        <div class="row pt-2" id="copyright-footer">
            <div class="col-md-9">
                <p><i class="fa fa-copyright" aria-hidden="true"></i> Copyright 2020. All rights reserved. Designed by
                    Soft tech
                    Multimedia.</p>
            </div>
            <div class="col-md-3">
                <p><i class="fa fa-copyright" aria-hidden="true"></i><u>Terms of use</u> | <u>Privacy Policy</u></p>
            </div>
        </div>
    </div>
</footer>


<!-- Javascript Files
    ================================================== -->
<!-- jquery cdn -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
{{-- Jquery Ui--}}
<script
    src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
    integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
    crossorigin="anonymous"></script>
{{--Bootstrap Js--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<!-- Template custom -->
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>

<!-- owl carousel js -->
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<!--Tiny SLider-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

@yield('scripts')

<script>
    $(window).scroll(function(){
        if ($(window).scrollTop() >= 400) {
            $('nav.navbar').addClass('sticky');
        }
        else {
            $('nav.navbar').removeClass('sticky');
        }
    });
    /*jQuery time*/
    $(document).ready(function () {
        $("#accordion h3").click(function () {
            //slide up all the link lists
            $("#accordion ul ul").slideUp();
            $(this).find('i').toggleClass('fa-angle-down fa-angle-up')
            //slide down the link list below the h3 clicked - only if its closed
            if (!$(this).next().is(":visible")) {
                $(this).next().slideDown();
            }
        });
        /*Active List*/
        $('#accordion ul ul li a').click(function (e) {

            $('#accordion li.activeList').removeClass('activeList');

            var $parent = $(this).parent();
            $parent.addClass('activeList');
            e.preventDefault();
        });
        /*Active Heading*/
        $('#accordion li h3').click(function () {

            $('#accordion li.activeHeading').removeClass('activeHeading');

            var $parent = $(this).parent();
            $parent.addClass('activeHeading');
            /*e.preventDefault();*/
        });

        ///Sm SIdebar
        /*Sm-sidebar-scripts*/
        $(".sidebar-dropdown a").click(function() {
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
        $(".sidebar-dropdown > a i").click(function(e) {
            e.preventDefault();
        });
        $("#toggle-smsidebar").click(function() {
            $(".smsidebar-menu").toggleClass("rightActive");
        });
    });
    /*Number Snipper Button*/
    $(document).on('click', '.number-spinner button', function () {
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
    });
</script>
<!-- Body inner end -->
</body>

</html>






