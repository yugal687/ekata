<!--Website Header-->
@extends('layouts.website.header')
<link href="{{ asset('css/smsidebarstyle.css')}}" rel="stylesheet"/>
<!--Website Header Ends-->

@section('content')
    @include('layouts.website.smsidebar')
    <div class="container-fluid border-bottom">
        <div class="row">
            <div class="col-lg-2 col-md-12" style="background-color: #e9ecef">
                <div class="row">
                    <div class="col-12 " style="background-color: #EEE753">
                        <div class="cate">
                            <h3 class="text-center text-dark mt-2 category-font">
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
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="/products">Products</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <main class="px-1 px-sm-3 px-md-4 px-lg-5 py-0">
                    <div class="row">
                        @if(count($getproduct)>0)
                        @foreach($getproduct as $product)

                            <div
                                class="col-md-3 col-sm-6 mt-5 align-items-center text-center">
                                <a href="{{route('singleproduct',$product->id)}}">
                                    <div
                                        class="img-div bg-product-medium py-4 px-4 rounded-top-front rounded-bottom-front mx-auto">
                                        <img src="{{ $product->image[0]->name }}" class="img-fluid" alt="">
                                    </div>
                                    <h5 class="best_price pt-3 font-weight-bold text-main-danger">
                                        ${{$product->price}}</h5>
                                    <h5 class="best_name py-0 text-dark">{{ $product->product_name}}</h5>
                                    <h5 class="best_weight py-0 text-dark">{{$product->brand->brand_name}}</h5>
                                    <button type="button"
                                            class="btn bg-btn rounded-top-front-btn rounded-bottom-front-btn border text-white mt-2 d-block mx-auto w-100">
                                        Add to Cart
                                    </button>
                                </a>
                            </div>
                        @endforeach
                        @endif

                    </div>
                    <div class="row my-5 d-flex justify-content-center">
                        <div class="">
                            {{--<a href="/products" class="btn btn-large bg-main-primary text-white px-3 py-2">More Items
                            </a>--}}
                            <div>{{$getproduct->links()}}</div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
@stop
