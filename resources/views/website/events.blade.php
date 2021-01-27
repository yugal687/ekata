@extends('layouts.website.header')

@section('style')
<link href="{{ asset('css/webpages.css')}} " rel="stylesheet" />
@endsection

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        @foreach($events as $event)
        <div class="col-12">
            <ul class="list-unstyled">
                <li class="media row mb-4">
                    <img src="{{$event->image}}" class="img-fluid mr-3 col-sm-12 col-md-4" alt="">
                    <div class="media-body col-sm-12 col-md-8 mt-2 mt-md-0">
                        <h4 class="mt-0 mb-1 font-weight-bold">{{$event->title}}</h4>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-start text-md font-weight-bold">
                                <div>
                                    {{$event->event_date}}
                                </div>
                            </div>
                        </div>
                        <p>{{$event->description}}</p>
                        <a href="#" class="text-md">
                            Read more &rarr;
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        @endforeach

    </div>

</div>

@stop

@section('scripts')
<script>
</script>
@endsection
