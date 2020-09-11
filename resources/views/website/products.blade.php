<!--Website Header-->
@extends('layouts.website.header')
<link href="{{ asset('css/smsidebarstyle.css')}}" rel="stylesheet"/>
<!--Website Header Ends-->

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
                                <span id="toggle-smsidebar" class="float-right mr-2"><i
                                        class="fas fa-bars text-white"></i></span>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        {{--Include Sidebar Here--}}
                        @include('layouts.website.sidebar')
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-12">
                <div class="row">
                    <div class="col-12" style="padding: 0;">
                        <nav aria-label="breadcrumb" class="">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Category</a></li>
                                <li class="breadcrumb-item"><a href="#">Dry Goods</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Rice</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <main class="p-1 p-sm-3 p-md-4 p-lg-5">
                        <div class="row">
                            @foreach($getproduct as $product)

                            <div
                                class="col-md-3 col-sm-6 mt-5 d-flex flex-column justify-content-center align-items-center text-center">
                                <a href="{{route('singleproduct',$product->id)}}">
                                <div
                                    class="img-div bg-product-medium p-2 rounded-top-front rounded-bottom-front mx-auto">
                                    <img src="{{ $product->image[0]->name }}" class="p-2" alt="">
                                </div>
                                <h5 class="best_price pt-3 font-weight-bold text-main-danger">{{$product->price}}</h5>
                                <h5 class="best_name py-0 text-dark">{{$product->product_name}}</h5>
                                <button type="button"
                                        class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block mx-auto">
                                    Add to Cart
                                </button>
                                </a>
                            </div>
                            @endforeach

                        </div>
                </main>
            </div>
        </div>
    </div>
@stop
