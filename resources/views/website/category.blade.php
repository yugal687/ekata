<!--Website Header-->
@extends('layouts.website.header')
<!--Website Header Ends-->

@section('style')
    <link href="{{ asset('css/smsidebarstyle.css')}}" rel="stylesheet"/>
    <link href="{{ asset('css/webpages.css')}}" rel="stylesheet"/>

@endsection

@section('content')
    @include('layouts.website.smsidebar')
    <div class="container-fluid border-bottom">
        <div class="row">
            <div class="col-lg-2 col-md-12" style="background-color: #e9ecef">
                <div class="row">
                    <div class="col-12 " style="background-color: #EEE753">
                        <div class="cate">
                            <h3 class="category-font text-center text-dark mt-2">
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
                @foreach($getsingleCategory as $category)
                    <div class="row">
                        <div class="col-12" style="padding: 0;">
                            <nav aria-label="breadcrumb" class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('maincategory',[$category->parent->id,$category->parent->category_name])}}">{{$category->parent->category_name}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('category',[$category->id,$category->category_name])}}">{{$category->category_name}}</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <main class="p-1 p-sm-3 p-md-4 p-lg-5">
                        <div class="row pb-3">
                            <div class="col-12">
                                <img src="{{ $category->parent->image }}"
                                     class="categoryBannerImage img-fluid" alt="">
                            </div>
                        </div>
                        <div class="row">
                            @if(count($category->product)>0)
                                @foreach($category->product as $product)
                                    <div class="col-md-3 col-sm-6 col-12 mt-5 text-center">
                                        <a href="{{route('singleproduct',[$product->id,$product->product_name])}}">
                                            <div
                                                class="img-div bg-product-medium py-4 px-4 rounded-top-front rounded-bottom-front mx-auto">
                                                <img src="{{ $product->image[0]->name}}" class="img-fluid" alt="">
                                            </div>
                                            @if($product->sale_price)
                                                <h5 class="product-price pt-3 font-weight-bold text-main-danger">
                                                    ${{$product->sale_price}}</h5>
                                            @else
                                                <h5 class="product-price pt-3 font-weight-bold text-main-danger">
                                                    ${{$product->price}}</h5>
                                            @endif
                                            <h5 class="text-dark">{{$product->product_name}}</h5>
                                            <h5 class="brand-name text-dark">{{$product->brand->brand_name}}</h5>
                                            <button type="button"
                                                    class="btn bg-btn rounded-top-front-btn rounded-bottom-front-btn border text-white mt-2 d-block mx-auto w-100">
                                                Add to Cart
                                            </button>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <div class="row text-center d-flex justify-content-center no-result-section mt-5">
                                    <div class="col-md-6 col-sm-8">
                                        <h3>Sorry No Products Available</h3>
                                        <p class="text-sm">Sorry! Recently there are no products available with in this subcategory.</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 text-center">
                                {{-- <a href="{{ route('category',$category->id)}}" class="btn btn-large bg-main-primary text-white px-3 py-2">More Items
                                 </a>--}}
                                {{--   <div>{{$getsingleCategory[0]->product->links()}}</div>--}}
                            </div>
                        </div>

                    </main>
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
