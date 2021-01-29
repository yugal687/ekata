@extends('layouts.website.header')

@section('style')
    <link href="{{ asset('css/webpages.css')}} " rel="stylesheet"/>
@stop

@section('content')
    <div class="border-bottom">
        <div class="container my-5">
            @foreach($events as $event)
            <div class="row">
                <div class="col-12">
                    <img src="{{$event->image}}" class="img-fluid" alt="">
                </div>
                <div class="col-12">
                    <h3 class="heading-title mb-3">{{$event->title}}</h3>
                </div>
                <div class="col-12">
                    <time class="service-card-time">Event Date: {{$event->event_date}}</time>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
{!! $event->description !!}
                </div>
            </div>
@endforeach
        </div>
    </div>
@stop


