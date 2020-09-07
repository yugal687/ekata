<!--Website Header-->
@extends('layouts.website.header')
<link href="{{ asset('css/smsidebarstyle.css')}}" rel="stylesheet"/>
<!--Website Header Ends-->
@section('style')
    <style>
        .overlayImage {
            position: relative;
            width: 100%;
            height: 450px;
        }

        .overlayImage img {
            width: 100%;
            height: 100%;
        }

        .overlayImage .overlayBackground {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, .6);
        }

        .overlayText {
            color: #fff;
            font-size: 70px;
            font-weight: 800;
            font-family: SansSerif;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
        }

    </style>
@stop


@section('content')
    @include('layouts.website.smsidebar')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-12" style="background-color: #e9ecef">
                <div class="row">
                    <div class="col-12 bg-main-secondary">
                        <div class="cate">
                            <h3 class="text-center text-dark mt-2 font-weight-bold">
                                CATEGORY
                                <span id="toggle-smsidebar" class="float-right mr-2"><i class="fas fa-bars text-white"></i></span>
                            </h3>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        {{--Include Sidebar Here--}}
                        @include('layouts.website.sidebar')
                        {{--@include('layouts.website.smsidebar')--}}
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-12">
                @foreach($getsingleCategory as $singleCategory)
                <div class="row">
                    <div class="col-12" style="padding: 0;">
                        <nav aria-label="breadcrumb" class="">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{route('maincategory',$singleCategory->id)}}">{{$singleCategory->category_name}}</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <main class="p-1 p-sm-3 p-md-4 p-lg-5">

                        <div class="row pb-3">
                            <div class="col-12">
                                <div class="overlayImage">
                                    <img
                                        src="{{ $singleCategory->image }}"
                                        class="categoryBannerImage img-fluid" alt="">
                                    <div class="overlayBackground"></div>
                                    <div class="overlayText">{{$singleCategory->category_name}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            @foreach($singleCategory->children as $subCategory)
                                <div class="col-md-12 mt-5">
                                    <div class="top-title">
                                        <h3 class="font-weight-bold d-inline bg-main-primary px-5 pb-1 rounded-top-front new-arrival-tag text-white">
                                            {{$subCategory->category_name}}
                                        </h3>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        @foreach($subCategory->product as $product)
                                            <div
                                                class="col-md-3 col-sm-6 col-12 mt-5 d-flex flex-column justify-centent-center align-items-center">
                                                <a href="{{route('singleproduct',$product->id)}}">

                                                <div
                                                    class="img-div bg-product-medium py-4 px-4 rounded-top-front rounded-bottom-front mx-auto">
                                                    <img src="{{ $product->image[0]->name}}" class="img-fluid" alt="">
                                                </div>
                                                <h5 class="best_price pt-3 font-weight-bold text-main-danger">${{$product->price}}</h5>
                                                <h5 class="best_name py-0 text-dark">{{$product->product_name}}</h5>
                                                <h5 class="best_weight py-0 text-dark">{{$product->brand->brand_name}}</h5>
                                                <button type="button"
                                                        class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                                    Add to Cart
                                                </button>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                        </div>

                </main>
                @endforeach
            </div>
        </div>
    </div>
@stop


@section('scripts')
    <script>

    </script>
@stop
