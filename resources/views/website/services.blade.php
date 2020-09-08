@extends('layouts.website.header')

@section('style')
    <style>
        .heading-title {
            color: #252525;
            font-size: 34px;
            font-family: 'Poppins', SansSerif;
            font-weight: 900;
        }

        .heading-description-main {
            font-size: 18px;
            font-family: "Source Code Pro";
        }

        .heading-description {
            font-size: 20px;
            font-family: "Source Code Pro";
        }

        .contact-us {
            background-color: #e1e1e1;
            text-align: center;
        }

        .contact-us h1 {
            font-family: "Times New Roman";
            font-size: 3rem;
            color: #CF7500;
        }

        .container-sm {
            max-width: 41.25rem;
        }

        .service-card-content {
            background: #cf7500;
            border-radius: 10px;
            position: relative;
            color: #fff;
            width: 100%;
            height: 100%;
            max-width: 400px;
            padding: 16px;
            transform: scale(1);
            transition: transform 300ms ease-in-out;
        }
        .service-card-content:hover {
            -ms-transform: scale(1.05); /* IE 9 */
            -webkit-transform: scale(1.05); /* Safari 3-8 */
            transform: scale(1.05);
            cursor: pointer;
        }
        .service-card-title{
            font-weight: bold;
            font-size: 20px;
        }
        .service-card-time{
            font-weight: normal;
            font-size: 16px;
            opacity: 0.8;
        }
        .service-card-body p{
            font-weight: normal;
            font-size: 18px;
            line-height: 22px;
            font-family: Calibri;
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
        }
        .service-card-footer a{
            font-size: 16px;
            font-weight: bold;
        }
        .service-card-footer a i{
            padding: 0 5px;
        }
    </style>
@endsection



@section('content')
    <div class="container-fluid pb-4 border-bottom">
        <div class="row py-5 d-flex justify-content-center text-center contact-us">
            <div class="container container-sm">
                <h1 class="">Our Services</h1>
                <p class="heading-description-main mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet
                    architecto autem
                    deserunt, dolor doloremque dolores, eveniet facilis fuga ipsam natus nostrum reiciendis saepe sequi
                    voluptas voluptatibus! Corporis eligendi quibusdam rem?</p>
            </div>
        </div>
        <div class="container my-5">
            <main class="row">
                <div class="col-md-12">
                    <h1 class="heading-title">Services We Are Focused On</h1>
                    <p class="heading-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet
                        architecto autem
                        deserunt,</p>
                </div>
            </main>
            <div class="row mt-2">
                @foreach($services as $service)
                <div class="col-md-4 col-sm-6 mt-3">
                    <div class="service-card-content">
                        <header class="service-card-header mb-2">
                            <h1 class="service-card-title mb-0">{{$service->title}}</h1>
                            <time class="service-card-time">{{$service->date}}</time>
                        </header>
                        <div class="service-card-body">
                            <p>{!! $service->details !!} </p>
                        </div>

                        <footer class="service-card-footer">
                            <a class="text-white" href="#" >Read more﻿
                                <i class="fas fa-angle-right"></i>
                            </a>
                        </footer>

                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </div>
@stop
