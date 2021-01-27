@extends('layouts.website.header')

@section('style')
<link href="{{ asset('css/webpages.css')}} " rel="stylesheet" />
@endsection

@section('content')
<div class="container-fluid mt-5">
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
                    It is a long established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it look like
                    readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                    default model text, and a search for 'lorem ipsum' will uncover many web sites still in their
                    infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose
                    (injected humour and the like).
                </p>
            </div>
        </div>
    </div>
    
</div>

@stop

@section('scripts')
<script>
</script>
@endsection