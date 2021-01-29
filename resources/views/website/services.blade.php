@extends('layouts.website.header')

@section('style')
<link href="{{ asset('css/webpages.css')}} " rel="stylesheet" />
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
                            <a class="text-white" href="{{route('servicedetails',[$service->id,$service->title])}}" >Read more﻿
                                <i class="fas fa-angle-right"></i>
                            </a>
                        </footer>

                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </div>

{{--<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-6">
        <div class="event-image">
        <img src="images/Homepage/Banner/Banner.png" class="img-fluid" alt="">
        </div>

        </div>
        <div class="col-md-6">
        <div class="event-detail">
          <h1 class="text-center">Event Title</h1>
          <p class="text-bold mt-4">Event Time Duration:</p>

          <p class="mt-2">
          It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
          </p>
        </div>
        </div>
    </div>
</div>--}}
@stop

@section('scripts')
<script>

</script>
@endsection
