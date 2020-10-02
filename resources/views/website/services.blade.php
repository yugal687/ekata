@extends('layouts.website.header')

@section('style')
    <link href="{{ asset('css/webpages.css')}} " rel="stylesheet"/>
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
                    <h3 class="heading-title">Services We Are Focused On</h3>
                    <p class="heading-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet
                        architecto autem
                        deserunt,</p>
                </div>
            </main>
            <div class="row mt-2">
                @foreach($services as $service)
                <div class="col-md-4 col-sm-6 mt-3">
                    <div class="service-card-content">
                        <header class="service-card-header">
                            <h3 class="service-card-title mb-0">{{$service->title}}</h3>
                            <time class="service-card-time">{{$service->date}}</time>
                        </header>
                        <div class="service-card-body">
                            <p>{!! $service->details !!} </p>
                        </div>

                        <footer class="service-card-footer">
                            <a class="text-white" href="{{route('servicedetails',$service->id)}}" >Read more﻿
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

@section('scripts')
    <script>

    </script>
@endsection
