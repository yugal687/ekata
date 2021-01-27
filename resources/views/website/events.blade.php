@extends('layouts.website.header')

@section('style')
<link href="{{ asset('css/webpages.css')}} " rel="stylesheet" />
@endsection

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
@foreach($events as $event)
        <div class="col-md-6">
            <div class="event-image">
                <img src="{{$event->image}}" class="img-fluid" alt="">
            </div>

        </div>
        <div class="col-md-6">
            <div class="event-detail">
                <h1 class="text-center">{{$event->title}}</h1>
                <p class="text-bold mt-4">Event Time Duration:{{$event->event_date}}</p>

                <p class="mt-2">
                   {{$event->description}}
                </p>
            </div>
        </div>
    @endforeach
    </div>

</div>

@stop

@section('scripts')
<script>
</script>
@endsection
