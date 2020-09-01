<!-- website header -->
@extends('layouts.website.header')
<!-- website header ends -->


<link rel="stylesheet" href="{{ asset('css/cate-carousel.css')}} ">
@section('style')
    <style>
        /*Rate Stars*/
        .rating {
            font-size: 25px;
            overflow: hidden;
        }

        .rating input {
            opacity: 0;
            position: absolute;
        }

        .rating a,
        .rating label {
            float: right;
            color: #aaa;
            text-decoration: none;
            -webkit-transition: color .4s;
            -moz-transition: color .4s;
            -o-transition: color .4s;
            transition: color .4s;
        }

        .rating label:hover ~ label,
        .rating input:focus ~ label,
        .rating label:hover,
        .rating a:hover,
        .rating a:hover ~ a,
        .rating a:focus,
        .rating a:focus ~ a {
            color: #F0A500;
            cursor: pointer;
        }

        .rating {
            direction: rtl;
        }

        .rating a {
            float: none
        }

        /*--------------*/

        .single-item-share a{
            color: #00000070;
        }

        #single-item-carousel {
            height: 500px;
            width: 100%;
        }

        #sync1 .item {
            background: #ebebeb;
            padding: 5% 30%;
            margin: 5px;
            color: #fff;
            border-radius: 3px;
            text-align: center;
            overflow: hidden;
        }

        #sync1 .item img {
            width: 100%;
            height: 320px;
        }

        #sync2 .item {
            background: #c9c9c9;
            padding: 5% 25%;
            margin: 5px;
            color: #fff;
            border-radius: 3px;
            text-align: center;
            cursor: pointer;
        }

        #sync2 .item img {
            width: 100%;
            height: 80px;
        }


        #sync2 .current .item {
            background: #ebebeb;
            border: 1px solid #CF7500;
        }

        .owl-theme .owl-nav {
            /*default owl-theme theme reset .disabled:hover links */
        }

        .owl-theme .owl-nav [class*="owl-"] {
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        .owl-theme .owl-nav [class*="owl-"].disabled:hover {
            background-color: #d6d6d6;
        }

        #sync1.owl-theme {
            position: relative;
        }

        #sync1.owl-theme .owl-next,
        #sync1.owl-theme .owl-prev {
            width: 25px;
            height: 60px;
            margin-top: -30px;
            position: absolute;
            top: 50%;
        }

        #sync1.owl-theme .owl-prev {
            left: 0;
        }

        #sync1.owl-theme .owl-next {
            right: 0;
        }

        .owl-carousel .owl-stage {
            margin: 0 auto;
        }

    </style>
@stop

@section('content')
    <div class="container-fluid">
        <!--main row-->
        <div class="row ">
            <div class="col-md-2" style="background-color: #e9ecef">
                <div class="row">
                    <div class="col-12 bg-main-secondary">
                        <div class="cate">
                            <h3 class="text-center text-dark mt-2 font-weight-bold">CATEGORY</h3>
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

            <div class="col-md-10">
                @foreach($singleProduct as $product)
                <div class="row">
                    <div class="col-12" style="padding: 0;">
                        <nav aria-label="breadcrumb" class="">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{route('maincategory',$product->category->parent->id)}}">{{$product->category->parent->category_name}}</a></li>
                                <li class="breadcrumb-item"><a href="{{route('category',$product->category->id)}}">{{$product->category->category_name}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$product->product_name}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <main class="p-5">
                    <div class="row">
                        <div class="col-md-8">
                            <div id="single-item-carousel">
                                <div id="sync1" class="owl-carousel owl-theme">
                                    <div class="item">
                                        <img src="{{ asset('images/category/basmati_rice/Basmati_rice.png') }}"
                                             class="img-fluid" alt="">
                                    </div>
                                    <div class="item">
                                        <img src=" {{ asset('images/category/basmati_rice/Layer 5.png') }}"
                                             class="img-fluid" alt="">
                                    </div>
                                    <div class="item">
                                        <img
                                            src="{{ asset('images/category/basmati_rice/raw-basmati-rice-500x500.png') }}"
                                            class="img-fluid" alt="">
                                    </div>
                                </div>

                                <div id="sync2" class="owl-carousel owl-theme">
                                    <div class="item">
                                        <img src="{{ asset('images/category/basmati_rice/Basmati_rice.png') }}" alt="">

                                    </div>
                                    <div class="item">
                                        <img src=" {{ asset('images/category/basmati_rice/Layer 5.png') }}" alt="">
                                    </div>
                                    <div class="item">
                                        <img
                                            src="{{ asset('images/category/basmati_rice/raw-basmati-rice-500x500.png') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 pl-3">
                            <div>
                                <h4 class="font-weight-bold">{{$product->product_name}} </h4>
                                <div class="rating rating2">
                                    <a href="#5" title="Give 5 stars">★</a>
                                    <a href="#4" title="Give 4 stars">★</a>
                                    <a href="#3" title="Give 3 stars">★</a>
                                    <a href="#2" title="Give 2 stars">★</a>
                                    <a href="#1" title="Give 1 star">★</a>
                                </div>
                                <h6>Category: {{$product->category->category_name}}</h6>
                                <h6>Avilibility: <span class="text-danger">In Stock</span></h6>
                            </div>
                            <div class="pt-3">
                                <h6>Price</h6>
                                <h4 class="font-weight-bold text-danger">{{$product->price}}</h4>
                            </div>
                            <div class="pt-2">
                                <h6>Size</h6>
                                <div class="btn-group-sm" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-secondary">Left</button>
                                    <button type="button" class="btn bg-main-primary text-white">Middle</button>
                                    <button type="button" class="btn btn-secondary">Right</button>
                                </div>
                            </div>
                            <div class="pt-3">
                                <h6>Quantity</h6>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="input-group input-group number-spinner">
				                                <span class="input-group-prepend">
					                                    <button class="btn bg-main-secondary text-white" data-dir="dwn">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                </span>
                                            <input type="text" class="form-control text-center" value="1">
                                            <span class="input-group-append">
                                                    <button class="btn bg-main-secondary text-white" data-dir="up">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
				                                </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="pt-3">
                                <div class="row">
                                    <div class="col-8">
                                        <button type="button" onclick="savetoLocalStorage({{$product}})"
                                                class="btn btn-large bg-main-primary border text-white px-5 mt-2 d-block">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-5 pl-5">
                                <div class="row align-items-center">
                                    <h6 class="single-item-share">
                                        Share:
                                        <span>
                                            <a href="#">
                                                <i class="fab fa-facebook-f fa-2x px-2"></i>
                                            </a>
                                        </span>
                                        <span>
                                            <a href="#">
                                                <i class="fab fa-instagram fa-2x px-2"></i>
                                            </a>
                                        </span>
                                        <span>
                                            <a href="#">
                                                <i class="fab fa-twitter fa-2x px-2"></i>
                                            </a>
                                        </span>
                                    </h6>
                                </div>
                            </div>

                        </div>
                    </div>
                    <section id="special-section">
                        <div class="container mt-5 pt-2">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="text-center font-weight-bold">Recently Viewed Items</h4>
                                </div>

                                <div class="col-md-9">
                                    <hr style="border-top: 1px solid">
                                </div>
                            </div>
                            <!-- <div class="container"> -->
                            <!-- <div class="special-content"> -->

                            <!-- first row -->
                            <div class="row m-0 p-0">
                                <!-- col-item-start -->
                                <div
                                    class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium p-2 rounded-top-front rounded-bottom-front mx-auto bg-cate-sec">
                                        <img src="{{ asset('images/best_selling.png')}}" width="150" alt="">
                                    </div>

                                    <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>

                                    <!-- col-item-end -->
                                </div>
                                <!-- col-item-start -->
                                <div
                                    class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium p-2 rounded-top-front rounded-bottom-front bg-cate-sec mx-auto">
                                        <img src="{{asset('images/best_selling.png')}}" width="150" alt="">
                                    </div>

                                    <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>

                                    <!-- website footer -->
                                    <!-- col-item-end -->
                                </div>
                                <!-- col-item-start -->
                                <div
                                    class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium p-2 bg-cate-sec rounded-top-front rounded-bottom-front mx-auto">
                                        <img src="{{asset('images/best_selling.png')}}" class="img-fluid" width="150"
                                             alt="">

                                    </div>

                                    <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>

                                    <!-- col-item-end -->
                                </div>
                                <!-- col-item-start -->
                                <div
                                    class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium bg-cate-sec p-2 rounded-top-front rounded-bottom-front mx-auto">
                                        <img src="{{asset('images/best_selling.png')}}" width="150" alt="">
                                    </div>

                                    <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>

                                    <!-- col-item-end -->
                                </div>
                            </div>
                            <!-- second row -->
                            <div class="row">
                                <div class="container mt-5">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4 class="text-center font-weight-bold">Recommended for you</h4>
                                        </div>

                                        <div class="col-md-9">
                                            <hr style="border-top: 1px solid">
                                        </div>
                                    </div>
                                </div>


                                <!-- col-item-start -->
                                <div
                                    class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium p-2 bg-cate-sec rounded-top-front rounded-bottom-front mx-auto">
                                        <img src="{{asset('images/best_selling.png')}}" width="150" alt="">
                                    </div>

                                    <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>

                                    <!-- col-item-end -->
                                </div>
                                <!-- col-item-start -->
                                <div
                                    class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium bg-cate-sec p-2 rounded-top-front rounded-bottom-front mx-auto">
                                        <img src="{{asset('images/best_selling.png')}}" width="150" alt="">
                                    </div>

                                    <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary bg-cate-sec rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>

                                    <!-- col-item-end -->
                                </div>
                                <!-- col-item-start -->
                                <div
                                    class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium p-2 rounded-top-front rounded-bottom-front bg-cate-sec mx-auto">
                                        <img src="{{asset('images/best_selling.png')}}" width="150" alt="">
                                    </div>

                                    <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>

                                    <!-- col-item-end -->
                                </div>
                                <!-- col-item-start -->
                                <div
                                    class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium p-2 bg-cate-sec rounded-top-front rounded-bottom-front bg-cate-sec mx-auto">
                                        <img src="{{asset('images/best_selling.png')}}" width="150" alt="">
                                    </div>

                                    <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>

                                    <!-- col-item-end -->
                                </div>
                            </div>
                            <!-- second row -->
                        </div>
                    </section>
                    <!-- special section ends here -->
                </main>
                @endforeach

            </div>

        </div>
        <!--main row ends-->


    </div>
@stop

@section('scripts')
    <script>
        function savetoLocalStorage(product) {
            let savedata = JSON.stringify(product);
            console.log(savedata);
            localStorage.setItem("savedata",savedata);

        }
        $(document).ready(function () {

            var sync1 = $("#sync1");
            var sync2 = $("#sync2");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;

            sync1.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                autoplay: true,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
            }).on('changed.owl.carousel', syncPosition);

            sync2
                .on('initialized.owl.carousel', function () {
                    sync2.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: true,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100
                }).on('changed.owl.carousel', syncPosition2);

            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;

                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);

                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }

                //end block

                sync2
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync2.find('.owl-item.active').length - 1;
                var start = sync2.find('.owl-item.active').first().index();
                var end = sync2.find('.owl-item.active').last().index();

                if (current > end) {
                    sync2.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync2.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync1.data('owl.carousel').to(number, 100, true);
                }
            }

            sync2.on("click", ".owl-item", function (e) {
                e.preventDefault();
                var number = $(this).index();
                sync1.data('owl.carousel').to(number, 300, true);
            });
        });
    </script>
@stop
