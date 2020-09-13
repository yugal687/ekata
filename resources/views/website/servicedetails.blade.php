@extends('layouts.website.header')

@section('style')
    <link href="{{ asset('css/webpages.css')}} " rel="stylesheet"/>
@stop

@section('content')
    <div class="border-bottom">
        <div class="container my-5">
            <div class="row">
                <div class="col-12">
                    <h3 class="heading-title mb-3">{{$services[0]->title}}</h3>
                </div>
                <div class="col-12">
                    <time class="service-card-time">{{$services[0]->date}}</time>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                {!! $services[0]->details !!}
                </div>
            </div>

        </div>
    </div>
@stop


