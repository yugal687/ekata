<!-- website header -->
@include('layouts.website.header')
<!-- website header ends -->



<!--css part-->
<link rel="stylesheet" href="{{ asset('css/cntbox.css') }}">
<!--css end-->


<div class="container-fluid">
    <div class="row d-flex justify-content-center text-center cntus">
        <div class="">
            <h1>Contact Us</h1>
            <p>Ekata Convinence Store sit amet, consectetur adipiscing</p>
            <input class="btn btn-sm" style="background-color: #e39b30" type="submit" value="Call Us">
        </div>
    </div>
    <div class="container card_box">
        <div class="row">
            <div class="col-md-4">
                <div class="card small">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <i class="fab fa-twitter-square fa-3x"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-title">Todo</div>
                                <p>Lorem Ipsum</p>
                                <p>Lorem Ipsum</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card small">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <i class="fas fa-user-alt"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-title">Todo</div>
                                <p>Lorem Ipsum</p>
                                <p>Lorem Ipsum</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card small">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <i class="fas fa-user-alt"></i>
                            </div>
                            <div class="col-md-7">
                                <div class="card-title">Todo</div>
                                <p>Lorem Ipsum</p>
                                <p>Lorem Ipsum</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--header-->
{{--<div class="topnav">
    <a class="active" href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
    <input type="text" placeholder="Search..">
</div>--}}
<!--headerends-->


<!--<div class="container-fluid">
    <div class="cntus">

        <h1>Contact Us</h1>
        <p>Ekata Convinence Store sit amet, consectetur adipiscing</p>
        <input class="btn btn-sm" style="background-color: #e39b30" type="submit" value="Call Us">

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <p>
                                <i class="fa fa-phone fa-3x fa_color"></i></p>
                        </div>
                        <div class="col-9">
                            <h5 class="card-title">
                                PHONE
                            </h5>
                            <p class="card-text">
                                0420446778,<br>
                                0420446778
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <i class="fa fa-envelope fa-3x fa_color" aria-hidden="true"></i>
                        </div>
                        <div class="col-9">
                            <h5 class="card-title">
                                E-MAIL
                            </h5>
                            <p class="card-text">
                                melcleaning@gmail.com<br>
                                abcdcleaning@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <i class="fa fa-map-marker fa-3x fa_color" aria-hidden="true"></i>
                        </div>
                        <div class="col-9">
                            <h5 class="card-title">
                                LOCATION
                            </h5>
                            <p class="card-text">
                                356 MURRAY ROAD,PRESTON VIC 3072
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>-->

<div class="container-fluid">
    <div class="row enq">
        <div class="col-md-6">
            <div class="row d-flex justify-content-center">
                <div class="col-md-5 text-center">
                    <h4 class="text-white text-center">ENQUIRY FORM</h4>
                    <input class="form-control" type="text" id="fname" name="firstname" placeholder="Name">
                    <input class="form-control" type="email" id="mail" name="email" placeholder="E-mail">
                    <input class="form-control" type="phone" id="phone" name="phone" placeholder="Phone No.">
                    <textarea class="form-control" id="messagebox" rows="3" placeholder="Description"></textarea>
                    <input class="btn btn-sm" id="sndbtn" type="submit" value="SEND">
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row d-flex justify-content-center">
                <div class="text-center">
                    <h4 class="text-white text-center">LOCATION</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- website footer -->
@include('layouts.website.footer')
<!-- website footer ends -->

