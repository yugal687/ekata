<!-- website header -->
@extends('layouts.website.header')
<!-- website header ends -->

@section('style')
    <link href="{{ asset('css/webpages.css')}} " rel="stylesheet"/>
    <style>
        h6 a, address a{
            text-decoration: none;
            font-size: 15px;
            color: #212529;
        }
    </style>
@stop

@section('content')
    <div class="container-fluid" >
        @foreach($websiteDetail as $Details)
        <div class="row py-5 d-flex justify-content-center text-center contact-us">
            <div class="col-md-6 col-sm-12">
                <h1>Contact Us</h1>
                <p>{{$Details->additional_information}}</p>
                <a type="button" class="btn bg-main-primary text-white px-3 py-1" href="tel:{{ $Details->contact_number}}">Call Us</a>
            </div>
        </div>
        <div class="container card_box">
            <div class="row my-5 py-3">
                <div class="col-md-4 px-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <i class="fas fa-phone-alt fa-4x fa-color"></i>
                                </div>
                                <div class="col-md-9 text-center">
                                    <h4 class="font-weight-bold pb-3">PHONE</h4>
                                    <h6><a href="tel:{{ $Details->contact_number}}">{{ $Details->contact_number}}</a></h6>
                                    <h6><a href="tel:{{ $Details->optional_contact}}">{{ $Details->optional_contact}}</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 px-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <i class="far fa-envelope fa-4x fa-color"></i>
                                </div>
                                <div class="col-md-9 text-center">
                                    <h4 class="font-weight-bold pb-3">EMAIL</h4>
                                    <h6><a href="mailto:{{$websiteDetail[0]->email}}">{{$Details->email}}</a></h6>
                                    <h6><a href="mailto:{{$websiteDetail[0]->optional_email}}">{{$Details->optional_email}}</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 px-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <i class="fas fa-map-marker-alt fa-4x fa-color"></i>
                                </div>
                                <div class="col-md-9 text-center">
                                    <h4 class="font-weight-bold pb-3">LOCATION</h4>
                                    <address>
                                        <a href="https://www.google.com/maps/place/Softtech+Multimedia+Pvt.+Ltd.+Chitwan/@27.6875094,84.4318738,17z/data=!3m1!4b1!4m5!3m4!1s0x3994fb0a4785686d:0xd7ed579bd57a1450!8m2!3d27.6875094!4d84.4340678" target="_blank">
                                           {{$Details->address}}
                                        </a>
                                    </address>
                                    {{--<h6>365 MURRAY ROAD, PRESTON</h6>
                                    <h6>VIC 3072</h6>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @endforeach
    </div>

    <div class="container-fluid enquiry-section">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-6 text-center">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 text-center">
                            <h3 class="text-white heading-font text-center">ENQUIRY FORM</h3>
                            <form action="{{url("saveEnquiry")}}" method="post">
                                {{csrf_field()}}
                            <input class="form-control mt-4" type="text" name="firstname" placeholder="Name" required>
                            <input class="form-control mt-3" type="email" name="email" placeholder="E-mail" required>
                            <input class="form-control mt-3" type="number" name="phone" placeholder="Phone No." required>
                            <textarea class="form-control mt-3" rows="5" name="description" placeholder="Description" required></textarea>
                            <button class="btn border-white text-white mt-4" type="submit">SEND</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 text-center">
                            <h3 class="text-white heading-font text-center">LOCATION</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
