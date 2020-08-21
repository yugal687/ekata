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
    <!-- Template styles-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    @yield('style')

</head>

<body>
<header>
    <div class="body-inner">
        <div id="top-bar" class="top-bar">

            <div class="row m-0 p-0">
                <div class="col-md-2 m-0 p-0 bg-main-primary rounded-right-top">
                    <div class="container-mine">
                        <div class="text-center">
                            <h3 class=" text-white font-weight-bold pl-2 mt-4">Logo
                                Here</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-10 m-0 p-0 ">
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

                    <nav class="navbar navbar-expand-lg navbar-dark bg-main-primary px-0">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="container">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#"><b>Home</b> <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item ml-3">
                                        <a class="nav-link text-white" href="#"><b>About Us</b></a>
                                    </li>
                                    <li class="nav-item ml-3">
                                        <a class="nav-link text-white" href="#"><b>Services</b></a>
                                    </li>
                                    <li class="nav-item ml-3">
                                        <a class="nav-link text-white" href="#"><b>Products</b></a>
                                    </li>
                                    <li class="nav-item ml-3">
                                        <a class="nav-link text-white" href="/contact"><b>Contact Us</b></a>
                                    </li>
                                </ul>

                            </div>

                            <div class="nav-right container-mine">
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
                                <a href="#" class="cart">
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
                    <!-- Bavigation MenuBar Ends Here-->
                </div>
            </div>

        </div>
        <!--/ Topbar end -->
    </div>
</header>

@yield('content')


{{--Footer Section--}}
<footer>
    <div class="container flwus">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex">
                    <div class="p-2">
                        <p>Follow Us:</p>
                    </div>
                    <div class="p-2">
                        <i class="fab fa-facebook-square fa-2x" aria-hidden="true"></i>
                        <i class="fab fa-instagram-square fa-2x" aria-hidden="true"></i>
                        <i class="fab fa-twitter-square fa-2x" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="ml-md-4 text-center">
                <div class="d-flex">
                    <div class="p-2">
                        <p>here are our link,Please follow us.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2 text-center">


                <input class="btn btn-sm" id="sndbtn" type="submit" value="SEND">


            </div>
        </div>
        <hr class="horzline">
    </div>

    <div class="container-fluid">
        <div class="row" id="details">
            <div class="col-md-3">
                <h4 class="text-center">Ekata Store</h4>
                <ul class="list-unstyled text-center">
                    <li class="list">Shop Confidence with Ekata</li>
                </ul>
            </div>

            <div class="col-md-3">
                <h4>Our Services</h4>
                <ul class="list-unstyled">
                    <li class="list">Nepalese Foods</li>
                    <li class="list">Indian Foods</li>
                    <li class="list">Pakistani Foods</li>
                    <li class="list">Bangladeshi Foods</li>
                </ul>
            </div>

            <div class="col-md-3">
                <h4>Opening Hours</h4>
                <ul class="list-unstyled">
                    <li class="list">Mon: 9am-6pm</li>
                    <li class="list">Tue: 9am-6pm</li>
                    <li class="list">Wed: 9am-6pm</li>
                    <li class="list">Thus: 9am-6pm</li>
                    <li class="list">Fri: 9am-6pm</li>
                    <li class="list" style="color: red">Sat-Sun: closed</li>
                </ul>
            </div>

            <div class="col-md-3">
                <h4>Contact Us</h4>
                <ul class="list-unstyled">
                    <li class="list">0420446000 042000000</li>
                    <li class="list">abcdekata@gmail.com</li>
                    <li class="list">soft tech road, preston</li>
                    <li class="list">VIC 3072</li>
                </ul>
            </div>
        </div>
    </div>


    <hr class="style7">


    <div class="container">
        <div class="col-md-12">
            <h2 class="text-center">OUR DELIVERY SERVICES:</h2>
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
        <div class="row" id="footer">
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
<!-- Template custom -->
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
<!-- <script type="text/javascript" src="{{asset('js/js/custom.js')}}"></script> -->

<!-- owl carousel js -->
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>

@yield('scripts')

<script>
    /*jQuery time*/
    $(document).ready(function(){
        $("#accordion h3").click(function(){
            //slide up all the link lists
            $("#accordion ul ul").slideUp();
            $(this).find('i').toggleClass('fa-angle-down fa-angle-up')
            //slide down the link list below the h3 clicked - only if its closed
            if(!$(this).next().is(":visible"))
            {
                $(this).next().slideDown();
            }
        });
        /*Active List*/
        $('#accordion ul ul li a').click(function(e) {

            $('#accordion li.activeList').removeClass('activeList');

            var $parent = $(this).parent();
            $parent.addClass('activeList');
            e.preventDefault();
        });
        /*Active Heading*/
        $('#accordion li h3').click(function(e) {

            $('#accordion li.activeHeading').removeClass('activeHeading');

            var $parent = $(this).parent();
            $parent.addClass('activeHeading');
            e.preventDefault();
        });
    })
</script>
<!-- Body inner end -->
</body>

</html>






