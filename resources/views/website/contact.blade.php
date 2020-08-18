<!-- website header -->
@include('layouts.website.header')
<!-- website header ends -->


{{--<link rel="stylesheet" href="css/bootstrap.min.css">--}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!--css part-->
<link rel="stylesheet" href="css/cntheader.css">
<link rel="stylesheet" href="css/cntbox.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
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
                                <i class="fa fa-twitter-square fa-3x"></i>
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

<div class="container flwus">
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex">
                <div class="p-2">
                    <p>Follow Us:</p>
                </div>
                <div class="p-2">
                    <i class="fa fa-facebook-square" aria-hidden="true"></i>
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                    <i class="fa fa-twitter-square" aria-hidden="true"></i>
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
        <p class="text-center">hello hi bye bye kgasdjasb ashgdhashdbjh kjhkjhsajhdj|asdasdsa | sadsadsadasdasd
            |asdsadasdasdasd | sadsadsadasdasdasdas |sdasadsadasdasdasdas| sadsadsadasdasds</p>
    </div>
</div>


<hr class="style7">

<div class="container">
    <p class="text-center"><b>Help:</b> Customer Service,Disputes & Reports,Buyer Protection,Report IPR infringement</p>
</div>

<div class="container-fluid">
    <div class="row" id="footer">
        <div class="col-md-9">
            <p><i class="fa fa-copyright" aria-hidden="true"></i> Copyright 2020. All rights reserved. Designed by Soft tech
                Multimedia.</p>
        </div>

        <div class="col-md-3">
            <p><i class="fa fa-copyright" aria-hidden="true"></i><u>Terms of use</u> | <u>Privacy Policy</u></p>
        </div>
    </div>
</div>



<script src="js/bootstrap.min.js"></script>


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

