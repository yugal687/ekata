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
    <div class="body-inner">

        <div id="top-bar" class="top-bar">
            <div class="row">
                <div class="col-md-2 bg-main-primary rounded-right-top">
                    <div class="container-mine">
                        <div class=" text-center">
                            <h3 class="text-white font-weight-bold pt-2">LogoHere</h3>
                        </div>
                    </div>

                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6 bg-main-secondary rounded-left-front px-0 mx-0">
                            <div class="container-mine">
                                <div class="input-group border-0 py-2 ">
                                    <input type="text" class="form-control border-0 rounded-left-front" placeholder="Search items..." aria-label="Search items..." aria-describedby="basic-addon2">
                                    <div class="input-group-append bg-main-secondary">
                                        <span class="input-group-text bg-main-primary border-0 text-white rounded-right-front" id="basic-addon2">
                                            Search</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-main-primary">
            <div class="container">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <!--/ Topbar end -->

        <!-- Header start -->
    </div>