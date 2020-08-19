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
    <!-- Template styles-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>
    <!-- <div class="row">
        <div class="col-md-2 bg-main-primary rounded-right-top">
            <div class="container-mine">
                <div class="text-center">
                    <h3 class=" text-white font-weight-bold pl-2 mt-3">Logo-- Here</h3>
                </div>
            </div>
        </div> -->
    <!-- col-md-2 ends here -->
    <!-- <div class="col-md-10 m-0 p-0">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 bg-main-secondary rounded-left-front px-0 mx-0">
                    <div class="ml-3 mr-5">
                        <div class="input-group border-0 py-2">
                            <input type="text" class="form-control border-0 rounded-left-front" placeholder="Search items..." aria-label="Search items..." aria-describedby="basic-addon2">
                            <div class="input-group-append bg-main-secondary">
                                <span class="input-group-text bg-main-primary border-0 text-white rounded-right-front" id="basic-addon2">
                                    <i class="fa fa-search"></i> &nbsp;Search</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

    <!-- Bavigation MenuBar Starts Here-->

    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-main-primary px-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                                <a class="nav-link text-white" href="#"><b>Contact Us</b></a>
                            </li>
                        </ul>

                    </div>

                    <div class="nav-right mr-4">
                        <a href="#">
                            <svg width="1.7em" height="1.7em" viewBox="0 0 16 16" class="bi bi-person-bounding-box text-white mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                                <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                        </a>
                        <a href="#" class="cart">
                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-cart4 text-white ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                            </svg>
                            <div class="cart-count rounded bg-main-secondary text-white"> 1 </div>
                        </a>
                    </div>
                </div>
            </nav> -->
    <!-- Bavigation MenuBar Ends Here-->
    <!-- </div> -->
    <!-- col-md-10 ends here -->
    <!-- </div> -->
    <!--/ Topbar end -->

    <header>
        <div class="row">
            <!-- col-md-2 starts here -->
            <div class="col-md-2 bg-main-primary">
                <div class="container-mine">
                    <div class="text-center">
                        <h3 class="text-white font-weight-bold">Logo Here</h3>
                    </div>
                </div>
            </div>
            <!-- col-md-2 ends here -->
            <!-- col-md-10 starts here -->
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6">hello</div>
                    <div class="col-md-6 bg-main-secondary">
                        hello
                    </div>
                </div>
            </div>
            <!-- col-md-10 ends here -->
        </div>
    </header>