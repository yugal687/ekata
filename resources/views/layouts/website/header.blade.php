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
    <!------Fonts---------->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gabriela&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    <!-- owl carousel  -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">
    <!---Tiny Slider--->
    <!-- <link rel="stylesheet" href="{{ asset('css/tiny-slider.css')}}"> -->
    <!-- Template styles-->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    @yield('style')

    <style>
        @media screen and (max-width: 992px) {
            .logo-img {
                max-height: 99px;
            }
        }

        @media screen and (min-width: 992px) {
            .logo-img {
                max-height: 110px;
            }
        }

    </style>

</head>

<body>
    <div id="app">
        <div class="">
            <header>
                <div class="container-fluid">
                    <div class="row align-items-center text-white">
                        <div class="col-md-2 text-center">
                          <a href="/">  <img src="{{ asset('images/Logo Of Ekata.png') }}" class="img-fluid logo-img" alt="" /></a>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-6 ">
                            <div class="row d-flex justify-content-end ">
                                <div class="col-md-8 mr-5">
                                    <form action="{{url('searchedproducts')}}" method="post">
                                        @csrf
                                        <div class="input-group border-0 py-2 ">
                                            <input type="text" class="form-control border " name="search"
                                                id="search-box" required placeholder="Search items..."
                                                aria-label="Search items..." aria-describedby="basic-addon2">
                                            <p id="search-error"></p>
                                            <div class="input-group-append  ">
                                                <button type="submit" class="btn bg-main-primary text-dark search-btn">
                                                    <i class="fas text-white fa-search"></i>&nbsp; Search
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="w-100">
                            <header-navbar-component></header-navbar-component>
                            <!-- Cart Modal -->
                            <div>
                                <cart-items-component></cart-items-component>
                            </div>
                            <!---Cart Modal Ends---->
                        </div>
                    </div>
                </div>
            </header>

            <!--
            <header>
                <div class="body-inner">
                    <div id="top-bar" class="top-bar">

                        <div class="row align-items-center ">
                            <div class="col-lg-2 col-md-2  rounded-right-top text-center">
                                <img src="{{ asset('images/Logo Of Ekata.png') }}" class="img-fluid logo-img" alt="" />
                                {{--<div class="text-center">
                            <h3 class=" text-white font-weight-bold  mt-4">
                                Logo Here</h3>
                        </div>--}}
                            </div>

                            <div class="col-lg-10 col-md-10 ">
                                <div class="row ">
                                    <div class="col-md-6 "></div>
                                    <div class="col-lg-6 col-md-6 rounded ">
                                        <div class="mx-4">
                                            <form action="{{url('searchedproducts')}}" method="post">
                                                @csrf
                                                <div class="input-group border-0 py-2 ">
                                                    <input type="text" class="form-control border " name="search"
                                                        id="search-box" required placeholder="Search items..."
                                                        aria-label="Search items..." aria-describedby="basic-addon2">
                                                    <p id="search-error"></p>
                                                    <div class="input-group-append  ">
                                                        <button type="submit"
                                                            class="btn bg-main-primary text-white search-btn">
                                                            <i class="fas fa-search"></i>&nbsp; Search
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>-->
                                <!-- Bavigation MenuBar Starts Here-->

                                <!-- Bavigation MenuBar Ends Here-->
                            <!--
                            </div>
                        </div>
                        <header-navbar-component></header-navbar-component>

                    </div>-->
                    <!--/ Topbar end -->
                <!--</div>-->

                <!-- Cart Modal -->
                <!---<div>
                    <cart-items-component></cart-items-component>
                </div>-->


                <!---Cart Modal Ends---->
            <!--</header>-->

            @yield('content')



            {{--Footer Section--}}
            <footer>
                <div class="footer-container footer-container-top mt-4">
                    <div class="row d-flex align-items-center px-3">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-12 col-md-3 p-2 text-md-right my-auto">
                                    <p class="font-weight-bold">FOLLOW US:</p>
                                </div>
                                <div class="col-sm-12 col-md-9 p-2">
                                    <img src="{{ asset('images/Icons/green-facebook.png') }}"
                                        class="img-fluid footer-icons-small pr-2" style="width: 45px; height: 35px"
                                        alt="">
                                    <img src="{{ asset('images/Icons/green-insta.png') }}"
                                        class="img-fluid footer-icons-small pr-2" style="width: 45px; height: 35px"
                                        alt="">
                                    <img src="{{ asset('images/Icons/green-twitter.png') }}"
                                        class="img-fluid footer-icons-small pr-2" style="width: 45px; height: 35px"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-9 col-md-8 col-12 text-md-right text-sm-center">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>
                                <div class="col-lg-3 col-md-4 col-12">
                                    @if(count($websiteDetail) > 0)
                                    <a href="tel:{{$websiteDetail[0]->contact_number}}"
                                        class="btn btn-sm bg-main-secondary py-1 px-4 text-white" id="callBtn">
                                        Call Us
                                    </a>
                                    @endif
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

                        <div class="col-md-3 col-sm-6 pl-5">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="font-weight-bold">Our Services</h4>
                                </div>
                                <div class="col-12">
                                    <ul class="list-unstyled mt-4">
                                        <li class="list">Nepalese Foods</li>
                                        <li class="list">Indian Foods</li>
                                        <li class="list">Pakistani Foods</li>
                                        <li class="list">Bangladeshi Foods</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 pl-5">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="font-weight-bold">Opening Hours</h4>
                                </div>
                                <div class="col-12">
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
                        </div>

                        <div class="col-md-2 col-sm-6 pl-5">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="font-weight-bold">Contact Us</h4>
                                </div>
                                <div class="col-12">
                                    <ul class="list-unstyled mt-4">
                                        @if(count($websiteDetail) > 0)
                                        <li class="list">
                                            <a
                                                href="tel:{{$websiteDetail[0]->contact_number}}">{{$websiteDetail[0]->contact_number}}</a>
                                        </li>
                                        <li class="list">
                                            <a
                                                href="tel:{{$websiteDetail[0]->optional_contact}}">{{$websiteDetail[0]->optional_contact}}</a>
                                        </li>
                                        <li class="list">
                                            <a
                                                href="mailto:{{$websiteDetail[0]->email}}">{{$websiteDetail[0]->email}}</a>
                                        </li>
                                        <li class="list">
                                            <address>
                                                <a href="https://www.google.com/maps/place/Softtech+Multimedia+Pvt.+Ltd.+Chitwan/@27.6875094,84.4318738,17z/data=!3m1!4b1!4m5!3m4!1s0x3994fb0a4785686d:0xd7ed579bd57a1450!8m2!3d27.6875094!4d84.4340678"
                                                    target="_blank">
                                                    {{$websiteDetail[0]->address}}
                                                </a>
                                            </address>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <hr class="style7">


                <div class="container">
                    <div class="col-md-12">
                        <h2 class="text-center heading-font">OUR DELIVERY
                            SERVICES:</h2>
                        <p class="text-center">
                            3020 Albion | 3020 Sunshine | 3020 Sunshine North | 3020 Sunshine West | 3021 Albanvale |
                            3021
                            Kealba |
                            3021 Kings Park | 3021 St Albans | 3022 Ardeer | 3023 Burnside | 3023 Burnside Heights |
                            3023
                            Cairnlea |
                            3023 Caroline Springs | 3023 Deer Park | 3033 Keilor East | 3036 Keilor | 3036 Keilor North
                            | 3037
                            Delahey | 3037 Sydenham | 3037 Taylors Hill | 3038 Keilor Downs | 3038 Keilor Lodge | 3038
                            Taylors
                            Lakes
                            | 3042 Airport West | 3042 Keilor Park | 3042 Niddri
                        </p>
                    </div>
                </div>


                <hr class="style7">

                <div class="container">
                    <p class="text-center"><b>Help:</b> Customer Service,Disputes & Reports,Buyer Protection,Report IPR
                        infringement
                    </p>
                </div>

                <div class="container-fluid">
                    <div class="row pt-2" id="copyright-footer">
                        <div class="left">
                            <p> &copy; Copyright 2020. All rights reserved. Designed by <a href="#"> Soft-Tech
                                    Multimedia.</a>
                            </p>
                        </div>
                        <div class="right">
                            <p><a href="#"><u>Terms of use</u></a> | <a href="#"><u>Privacy
                                        Policy</u></a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Javascript Files
    ================================================== -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- Jquery Ui--}}
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    {{--Bootstrap Js--}}
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Template custom -->
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>

    <!-- owl carousel js -->
    <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <!--Tiny SLider-->
    <!-- <script src="{{ asset('js/tiny-slider.js') }}"></script> -->

    @yield('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });

    </script>
    <!-- Body inner end -->
</body>

</html>
