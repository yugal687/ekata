<!-- website header -->
@extends('layouts.website.header')
<!-- website header ends -->

@section('style')
    <style>
        .card {
            box-shadow: none !important;
        }

        /*Banner Areas*/
        .banner-area img {
            width: 100%;
            height: 82vh;
        }

        #banner-image-carousel.owl-theme .owl-nav.disabled + .owl-dots {
            margin-top: 0;
            z-index: 200;
        }

        /*Clearence Section Css*/
        #clearence_section .owl-theme {
            position: relative;
        }

        #clearence_section .owl-theme .owl-next,
        #clearence_section .owl-theme .owl-prev {
            top: 50%;
            margin-top: -5%;
            position: absolute;
        }

        #clearence_section .owl-theme .owl-nav [class*=owl-] {
            background: transparent;
        }

        #clearence_section .owl-theme .owl-next {
            right: -150px;
        }

        #clearence_section .owl-theme .owl-prev {
            left: -150px;
        }

        #clearence_section .owl-carousel.owl-drag .owl-item {
            padding: 0 50px;
        }


        /*New arrival Items*/
        #new_arrival_carousel_item .image-container {
            height: 50vh;
        }

        #new_arrival_carousel_item .image-container img {
            width: 100%;
            height: 100%;
        }

        #new_items .item {
            height: 30vh;
            margin: 0 30px;
        }

        #new_items .current .item {
            background: #9D9C9C;
            color: #fff;
            border-radius: 20px;
        }

        #new_items .owl-prev,
        #new_items .owl-next {
            top: 50%;
            margin-top: -5%;
            position: absolute;
        }

        #new_items.owl-theme .owl-prev {
            left: -150px;
        }

        #new_items.owl-theme .owl-next {
            right: -150px;
        }

        #new_items.owl-theme .owl-nav [class*=owl-] {
            background: transparent;
        }

        /*Reviews and SignUp*/
        .signup, .reviews {
            transform: translateY(-70px);
        }


        /*About Us Section*/
        .about-us-img {
            width: 100%;
            height: 385px;
        }

        .about-us-img img {
            width: 100%;
            height: 385px;
        }

        .circle-1, .circle-2, .circle-3, .circle-4 {
            position: absolute;
            top: 15px;
            width: 35px;
            height: 35px;
            border-radius: 100%;
            background-color: #fff;
            border: 2px solid #00000060;
        }

        .circle-1, .circle-3 {
            left: 30px;
        }

        .circle-2, .circle-4 {
            right: 30px;
        }

        /*Reviews Ratings*/
        .reviews-rating {
            margin: -10px;
            font-size: 40px;
            overflow: hidden;
        }

        .reviews-rating input {
            opacity: 0;
            position: absolute;
        }

        .reviews-rating a,
        .reviews-rating label {
            float: right;
            color: #fff;
            text-decoration: none;
            -webkit-transition: color .4s;
            -moz-transition: color .4s;
            -o-transition: color .4s;
            transition: color .4s;
        }

        .reviews-rating label:hover ~ label,
        .reviews-rating input:focus ~ label,
        .reviews-rating label:hover,
        .reviews-rating a:hover,
        .reviews-rating a:hover ~ a,
        .reviews-rating a:focus,
        .reviews-rating a:focus ~ a {
            color: #F0A500;
            cursor: pointer;
        }

        .reviews-rating {
            direction: rtl;
        }

        .reviews-rating a {
            float: none
        }


        /*Vertical Sidebar Carousel*/
        .vertical-sidebar-carousel {
            background-color: #fff;
            height: 148vh;
            /*overflow: hidden;*/
        }

        @media screen and (max-width: 767px) {
            .vertical-sidebar-carousel {
                background-color: #fff;
                height: 92vh;
                /*overflow: hidden;*/
            }
        }

        .vertical-sidebar-carousel .sidebar-vertical-carousel {
            cursor: grab;
        }

        .sidebar-vertical-carousel figure {
            width: 70px;
            height: 70px;
            border-radius: 100%;
            margin-bottom: 0.3rem;
            background-color: #b1b1b1;
        }

        .sidebar-vertical-carousel figure img {
            width: 40px;
            height: 40px;
            margin: 15px;
        }

        ul.controls li {
            list-style: none;
            display: inline-block;
        }

        .controls {
            margin: 0;
            padding: 0;
            position: absolute;
            left: 0;
            background: #F0A500;
            color: #000;
            width: 100%;
            display: flex;
            align-items: center;
        }

        .controls .prev {
            display: none;
        }

        .controls .prev, .controls .next {
            transition: background-color 600ms ease-in-out;
        }

        .controls .prev:hover, .controls .next:hover {
            cursor: pointer;
            /*background-color: #CF7500;*/
        }

        .controls .prev:focus, .controls .next:focus {
            outline: none;
        }

        /*Customer Reviews Slider*/
        .customer-reviews-slider {
            height: 330px;
            overflow: hidden;
        }

        #customer-reviews-carousel.owl-theme .owl-dots {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translate(-50%, 0%);
            text-align: center;
            -webkit-tap-highlight-color: transparent;
        }

        #customer-reviews-carousel.owl-theme .owl-dots .owl-dot span {
            background: #fff;
        }

        #customer-reviews-carousel.owl-theme .owl-dots .owl-dot.active span {
            background: #b1b1b1;
        }

        #customer-reviews-carousel .owl-item {
            height: 220px;
            top: 30px;
        }

        #customer-reviews-carousel.owl-theme .owl-nav {
            text-align: center;
            -webkit-tap-highlight-color: transparent;
            display: flex;
            justify-content: space-between;
        }

        #customer-reviews-carousel.owl-theme .owl-nav [class*=owl-] {
            color: #FFF;
            font-size: 14px;
            margin: 0px 5px;
            padding: 5px 20px;
            background: transparent;
            display: inline-block;
            cursor: pointer;
            border-radius: 3px;
            border: 1px solid #fff;
        }

        img.review-images {
            border-radius: 15px;
            width: 100%;
            height: 190px;
        }

    </style>
@stop

@section('content')

    <section class="hero-section">
        <div class="row m-0 p-0">
            <!-- sidebar slider section starts here -->
            <div class="col-md-2 bg-main-primary rounded-bottom-right mb-4">
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
                        @include('layouts.website.indexsidebar')
                    </div>
                </div>
            </div>

            <!-- sidebar slider section ends here -->


            <div class="col-md-10 m-0 p-0 ">
                <!-- banner section starts here -->
                <div class="banner-area">
                    {{--<h3 class="text-center mt-5 border">---Hello Banner section ---</h3>--}}


                    <div id="banner-image-carousel" class="owl-carousel owl-theme">
                        @foreach($bannerImage as $image)
                            <div class="item"><img src="{{$image->image}}" alt=""></div>
                        @endforeach
                    </div>
                    {{--<img src="{{ asset('images/Homepage/Banner/Banner.png') }}" class="img-fluid" alt="">--}}
                </div>
                <!-- banner section ends here -->

                <!-- clearence section starts here -->
                <section id="clearence_section">
                    <div class="row m-0 p-0 mt-4">
                        <div class="container">
                            <div class="col-md-12">
                                <div class="card border-0 bg-light">
                                    <div class="card-header bg-main-secondary py-3 card-rounded-top">
                                        <h2 class="font-weight-bold text-center mt-2">CLEARENCE</h2>
                                    </div>
                                    <div class="card-body bg-product-light rounded-bottom-front card-bdy ">
                                        <div id="clearence_carousel"
                                             class="owl-carousel owl-carousel owl-theme px-3  py-2">
                                            <div
                                                class="item text-center d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="img-div bg-product-medium px-5 py-4 rounded-top-front rounded-bottom-front mx-auto">
                                                            <img src="{{asset('images/Product_pngs/masala.png')}}"
                                                                 width="150" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 class="best_price pt-3 font-weight-bold text-main-danger">
                                                            <s>was $10.99</s></h5>
                                                        <h5 class="best_price font-weight-bold text-main-primary">
                                                            $10.99</h5>
                                                        <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                                        <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                                        <button type="button"
                                                                class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block mx-auto">
                                                            Add to Cart
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                            <div
                                                class="item text-center d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="img-div bg-product-medium px-5 py-4 rounded-top-front rounded-bottom-front mx-auto">
                                                            <img
                                                                src="{{ asset('images/category/basmati_rice/Basmati_rice.png')}}"
                                                                width="150" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 class="best_price pt-3 font-weight-bold text-main-danger">
                                                            <s>was $10.99</s></h5>
                                                        <h5 class="best_price font-weight-bold text-main-primary">
                                                            $10.99</h5>
                                                        <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                                        <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                                        <button type="button"
                                                                class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block mx-auto">
                                                            Add to Cart
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="item text-center d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="img-div bg-product-medium px-5 py-4 rounded-top-front rounded-bottom-front mx-auto">
                                                            <img src="{{ asset('images/Product_pngs/masala.png')}}"
                                                                 width="150" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 class="best_price pt-3 font-weight-bold text-main-danger">
                                                            <s>was $10.99</s></h5>
                                                        <h5 class="best_price font-weight-bold text-main-primary">
                                                            $10.99</h5>
                                                        <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                                        <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                                        <button type="button"
                                                                class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block mx-auto">
                                                            Add to Cart
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                            <div
                                                class="item text-center d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="img-div bg-product-medium px-5 py-4 rounded-top-front rounded-bottom-front mx-auto">
                                                            <img
                                                                src="{{asset('images/category/basmati_rice/Basmati_rice.png')}}"
                                                                width="150" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 class="best_price pt-3 font-weight-bold text-main-danger">
                                                            <s>was $10.99</s></h5>
                                                        <h5 class="best_price font-weight-bold text-main-primary">
                                                            $10.99</h5>
                                                        <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                                        <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                                        <button type="button"
                                                                class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block mx-auto">
                                                            Add to Cart
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="item text-center d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="img-div bg-product-medium px-5 py-4 rounded-top-front rounded-bottom-front mx-auto">
                                                            <img src="{{asset('images/Product_pngs/masala.png')}}"
                                                                 width="150" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 class="best_price pt-3 font-weight-bold text-main-danger">
                                                            <s>was $10.99</s></h5>
                                                        <h5 class="best_price font-weight-bold text-main-primary">
                                                            $10.99</h5>
                                                        <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                                        <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                                        <button type="button"
                                                                class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block mx-auto">
                                                            Add to Cart
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                            <div
                                                class="item text-center d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="img-div bg-product-medium px-5 py-4 rounded-top-front rounded-bottom-front mx-auto">
                                                            <img
                                                                src="{{asset('images/category/basmati_rice/Basmati_rice.png')}}"
                                                                width="150" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 class="best_price pt-3 font-weight-bold text-main-danger">
                                                            <s>was $10.99</s></h5>
                                                        <h5 class="best_price font-weight-bold text-main-primary">
                                                            $10.99</h5>
                                                        <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                                        <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                                        <button type="button"
                                                                class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block mx-auto">
                                                            Add to Cart
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="item text-center d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="img-div bg-product-medium px-5 py-4 rounded-top-front rounded-bottom-front mx-auto">
                                                            <img src="{{asset('images/Product_pngs/masala.png')}}"
                                                                 width="150" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 class="best_price pt-3 font-weight-bold text-main-danger">
                                                            <s>was $10.99</s></h5>
                                                        <h5 class="best_price font-weight-bold text-main-primary">
                                                            $10.99</h5>
                                                        <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                                        <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                                        <button type="button"
                                                                class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block mx-auto">
                                                            Add to Cart
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                            <div
                                                class="item text-center d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="img-div bg-product-medium px-5 py-4 rounded-top-front rounded-bottom-front mx-auto">
                                                            <img
                                                                src="{{asset('images/category/basmati_rice/Basmati_rice.png')}}"
                                                                width="150" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 class="best_price pt-3 font-weight-bold text-main-danger">
                                                            <s>was $10.99</s></h5>
                                                        <h5 class="best_price font-weight-bold text-main-primary">
                                                            $10.99</h5>
                                                        <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                                        <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                                        <button type="button"
                                                                class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block mx-auto">
                                                            Add to Cart
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="item text-center d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="img-div bg-product-medium px-5 py-4 rounded-top-front rounded-bottom-front mx-auto">
                                                            <img src="{{asset('images/Product_pngs/masala.png')}}"
                                                                 width="150" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 class="best_price pt-3 font-weight-bold text-main-danger">
                                                            <s>was $10.99</s></h5>
                                                        <h5 class="best_price font-weight-bold text-main-primary">
                                                            $10.99</h5>
                                                        <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                                        <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                                        <button type="button"
                                                                class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block mx-auto">
                                                            Add to Cart
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                            <div
                                                class="item text-center d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="img-div bg-product-medium px-5 py-4 rounded-top-front rounded-bottom-front mx-auto">
                                                            <img
                                                                src="{{asset('images/category/basmati_rice/Basmati_rice.png')}}"
                                                                width="150" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 class="best_price pt-3 font-weight-bold text-main-danger">
                                                            <s>was $10.99</s></h5>
                                                        <h5 class="best_price font-weight-bold text-main-primary">
                                                            $10.99</h5>
                                                        <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                                        <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                                        <button type="button"
                                                                class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block mx-auto">
                                                            Add to Cart
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="item text-center d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="img-div bg-product-medium px-5 py-4 rounded-top-front rounded-bottom-front mx-auto">
                                                            <img src="{{asset('images/Product_pngs/masala.png')}}"
                                                                 width="150" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 class="best_price pt-3 font-weight-bold text-main-danger">
                                                            <s>was $10.99</s></h5>
                                                        <h5 class="best_price font-weight-bold text-main-primary">
                                                            $10.99</h5>
                                                        <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                                        <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                                        <button type="button"
                                                                class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block mx-auto">
                                                            Add to Cart
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                            <div
                                                class="item text-center d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="img-div bg-product-medium px-5 py-4 rounded-top-front rounded-bottom-front mx-auto">
                                                            <img
                                                                src="{{asset('images/category/basmati_rice/Basmati_rice.png')}}"
                                                                width="150" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 class="best_price pt-3 font-weight-bold text-main-danger">
                                                            <s>was $10.99</s></h5>
                                                        <h5 class="best_price font-weight-bold text-main-primary">
                                                            $10.99</h5>
                                                        <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                                        <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                                        <button type="button"
                                                                class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block mx-auto">
                                                            Add to Cart
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="item text-center d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div
                                                            class="img-div bg-product-medium px-5 py-4 rounded-top-front rounded-bottom-front mx-auto">
                                                            <img src="{{asset('images/Product_pngs/masala.png')}}"
                                                                 width="150" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 class="best_price pt-3 font-weight-bold text-main-danger">
                                                            <s>was $10.99</s></h5>
                                                        <h5 class="best_price font-weight-bold text-main-primary">
                                                            $10.99</h5>
                                                        <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                                        <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                                        <button type="button"
                                                                class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block mx-auto">
                                                            Add to Cart
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- clearence section ends here -->

            </div>
            <!-- banner section ends here -->
        </div>
    </section>
    <!-- hero section ends here -->

    <div class="new_arrival_section1">
        <div class="container-mine">
            <div class="row m-0 p-0 mt-5">
                <div class="col-md-12  mb-5  ">
                    <div class="top-title">
                        <h3 class="font-weight-bold d-inline bg-main-primary px-3 pb-1 rounded-top-front new-arrival-tag text-white">
                            NEW ARRIVALS
                        </h3>
                    </div>
                </div>
            </div>
            <div id="new_arrival_carousel_item" class="owl-carousel owl-theme m-0 p-0">
                <div class="item">
                    <div class="container">
                        <div class="row m-0 p-0 my-4">
                            <div
                                class="col-md-6 image-container text-center bg-product-medium rounded-top-front rounded-bottom-front">
                                <img src="{{ asset('images/Product_pngs/khukuri.png') }}" class="img-fluid p-3"
                                     alt="">
                            </div>
                            <div class="col-md-6">
                                <div class="container h-100 d-flex justify-content-center align-items-center">
                                    <dl class="row pr-5">
                                        <dt class="col-sm-5 ">
                                            <h5 class="font-weight-bold">Product Name&nbsp;&nbsp;&nbsp;:</h5>
                                        </dt>
                                        <dd class="col-sm-7">
                                            <!-- product name here -->
                                            <h5 class="font-weight-normal">Khukuri (Knife)</h5>
                                        </dd>

                                        <dt class="col-sm-5 font-weight-bold ">
                                            <h5 class="font-weight-bold">Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h5>
                                        </dt>
                                        <dd class="col-sm-7">
                                            <!-- product category here -->
                                            <h5 class="font-weight-normal">Accessories</h5>
                                        </dd>

                                        <dt class="col-sm-5 font-weight-bold ">
                                            <h5 class="font-weight-bold">Description&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h5>
                                        </dt>
                                        <dd class="col-sm-7 ">
                                            <!-- product description here -->
                                            <h5 class="font-weight-normal ">Khukuri is one of the National weapen of
                                                Nepal.
                                                Etiam porta sem malesuada magna mollis euismod.</h5>
                                        </dd>


                                        <dt class="col-sm-5 font-weight-bold  ">
                                            <h5 class="font-weight-bold">Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h5>
                                        </dt>
                                        <dd class="col-sm-7">
                                            <!-- product price here -->
                                            <h5 class="font-weight-bold text-main-secondary">$ 359.99</h5>
                                        </dd>

                                        <div class="col-sm-12">
                                            <button type="button"
                                                    class="btn bg-main-primary btn-lg btn-block font-weight-bold text-white rounded-top-front rounded-bottom-front">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="general-slider" class="bg-product-light mt-5">
            <div class="container">
                <div class="card-body bg-product-light rounded-bottom-front card-bdy">
                    <div id="new_items" class="owl-carousel owl-theme px-3">
                        @foreach($latestProduct as $lastproduct)
                            <div class="item text-center d-flex justify-content-center align-items-center">
                                <div class="new_items_img">
                                    <div class="row m-4">
                                        <div
                                            class="col-12 bg-product-medium rounded-top-front rounded-bottom-front mt-3">

                                            <img src="{{ asset('images/Product_pngs/masala.png') }}"
                                                 class="img-fluid p-2"
                                                 alt="">
                                        </div>
                                        <div class="col-12 mt-3 mb-2">
                                            <h6>{{$lastproduct->product_name}}</h6>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

    </div>


    <!-- new arrival section starts here -->
    {{--<section id="new_arrival_section">
        <div class="container-mine">
            <div class="row m-0 p-0 mt-5">
                <div class="col-md-12  mb-5  ">
                    <div class="top-title">
                        <h3 class="font-weight-bold d-inline bg-main-primary px-3 pb-1 rounded-top-front new-arrival-tag text-white">
                            NEW ARRIVALS
                        </h3>
                    </div>
                </div>
                <!-- new arrival content start here -->
                <div class="container">
                    <div class="row m-0 p-0 my-4">
                        <div class="col-md-6">
                            <div id="new_arrival_carousel" class="owl-carousel owl-carousel owl-theme m-0 p-0">
                                <div class="item text-center bg-product-medium rounded-top-front rounded-bottom-front">
                                    1
                                </div>
                                <div class="item text-center bg-product-medium rounded-top-front rounded-bottom-front">
                                    2
                                </div>
                                <div class="item text-center bg-product-medium rounded-top-front rounded-bottom-front">
                                    3
                                </div>
                                <div class="item text-center bg-product-medium rounded-top-front rounded-bottom-front">
                                    4
                                </div>
                                <div class="item text-center bg-product-medium rounded-top-front rounded-bottom-front">
                                    5
                                </div>
                                <div class="item text-center bg-product-medium rounded-top-front rounded-bottom-front">
                                    6
                                </div>
                                <div class="item text-center bg-product-medium rounded-top-front rounded-bottom-front">
                                    7
                                </div>
                                <div class="item text-center bg-product-medium rounded-top-front rounded-bottom-front">
                                    8
                                </div>
                                <div class="item text-center bg-product-medium rounded-top-front rounded-bottom-front">
                                    9
                                </div>
                                <div class="item text-center bg-product-medium rounded-top-front rounded-bottom-front">
                                    10
                                </div>
                                <div class="item text-center bg-product-medium rounded-top-front rounded-bottom-front">
                                    11
                                </div>
                                <div class="item text-center bg-product-medium rounded-top-front rounded-bottom-front">
                                    12
                                </div>
                                <div class="item text-center bg-product-medium rounded-top-front rounded-bottom-front ">
                                    13
                                </div>
                            </div>
                        </div>
                        <!-- product slider section ends here -->

                        <!-- product description section starts here -->
                        <div class="col-md-6 ">
                            <div class="container h-100 d-flex justify-content-center align-items-center">
                                <dl class="row pr-5">
                                    <dt class="col-sm-5 ">
                                        <h5 class="font-weight-bold">Product Name&nbsp;&nbsp;&nbsp;:</h5>
                                    </dt>
                                    <dd class="col-sm-7">
                                        <!-- product name here -->
                                        <h5 class="font-weight-normal">Khukuri (Knife)</h5>
                                    </dd>

                                    <dt class="col-sm-5 font-weight-bold ">
                                        <h5 class="font-weight-bold">Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h5>
                                    </dt>
                                    <dd class="col-sm-7">
                                        <!-- product category here -->
                                        <h5 class="font-weight-normal">Accessories</h5>
                                    </dd>

                                    <dt class="col-sm-5 font-weight-bold ">
                                        <h5 class="font-weight-bold">Description&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h5>
                                    </dt>
                                    <dd class="col-sm-7 ">
                                        <!-- product description here -->
                                        <h5 class="font-weight-normal ">Khukuri is one of the National weapen of Nepal.
                                            Etiam porta sem malesuada magna mollis euismod.</h5>
                                    </dd>


                                    <dt class="col-sm-5 font-weight-bold  ">
                                        <h5 class="font-weight-bold">Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h5>
                                    </dt>
                                    <dd class="col-sm-7">
                                        <!-- product price here -->
                                        <h5 class="font-weight-bold text-main-secondary">$ 359.99</h5>
                                    </dd>

                                    <div class="col-sm-12">
                                        <button type="button"
                                                class="btn bg-main-primary btn-lg btn-block font-weight-bold text-white rounded-top-front rounded-bottom-front">
                                            Add to Cart
                                        </button>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        <!-- product description section ends here -->
                    </div>
                </div>
            </div>
        </div>
    </section>--}}
    <!-- new arrival section ends here -->

    <!-- general product slider starts here -->

    {{--<section id="general-slider" class="bg-product-light my-5">
        <div class="container">
            <div class="card-body bg-product-light rounded-bottom-front card-bdy mt-2">
                <div id="general-product-slider" class="owl-carousel owl-carousel owl-theme ">
                    <div
                        class="item text-center bg-product-medium d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front ">
                        1
                    </div>
                    <div
                        class="item text-center bg-product-medium d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                        2
                    </div>
                    <div
                        class="item text-center bg-product-medium d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                        3
                    </div>
                    <div
                        class="item text-center bg-product-medium d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                        4
                    </div>
                    <div
                        class="item text-center bg-product-medium d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                        5
                    </div>
                    <div
                        class="item text-center bg-product-medium d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                        6
                    </div>
                    <div
                        class="item text-center bg-product-medium d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                        7
                    </div>
                    <div
                        class="item text-center bg-product-medium d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                        8
                    </div>
                    <div
                        class="item text-center bg-product-medium d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                        9
                    </div>
                    <div
                        class="item text-center bg-product-medium d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                        10
                    </div>
                    <div
                        class="item text-center bg-product-medium d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                        11
                    </div>
                    <div
                        class="item text-center bg-product-medium d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front">
                        12
                    </div>
                    <div
                        class="item text-center bg-product-medium d-flex justify-content-center align-items-center rounded-top-front rounded-bottom-front ">
                        13
                    </div>
                </div>
            </div>
        </div>
    </section>--}}
    <!-- general product slider ends here -->

    <!-- best selling section starts here -->
    <section id="best-selling-section">
        <div class="best-selling bg-main-primary">
            <div class="container">
                <div class="row m-0 p-0 py-5">
                    <div class="col-md-3 py-3">
                        <img src="{{ asset('images/best_selling.png')}}" width="100%" alt="">
                        <div
                            class="card-body bg-main-secondary border-0 rounded-top-front rounded-bottom-front text-center best-selling-tag">
                            <h3 class="font-weight-bold pb-0">BEST SELLING</h3>
                            <h6 class="font-weight-bold pt-0">Best of all time</h6>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex flex-column justify-centent-center align-items-center ">
                        <div class="img-div bg-product-medium p-4 rounded-top-front rounded-bottom-front mx-auto">
                            <img src="{{asset('images/best_selling.png')}}" width="150" alt="">
                        </div>
                        <h5 class="best_price pt-3 pb-2 font-weight-bold text-white ">$10.99</h5>
                        <h5 class="best_name py-0 text-white ">Hello Product</h5>
                        <h5 class="best_weight py-0 text-white ">500 gm</h5>
                        <button type="button"
                                class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                            Add to Cart
                        </button>

                    </div>
                    <div class="col-md-3 d-flex flex-column justify-centent-center align-items-center">
                        <div class="img-div bg-product-medium p-4 rounded-top-front rounded-bottom-front mx-auto">
                            <img src="{{asset('images/best_selling.png')}}" width="150" alt="">
                        </div>
                        <h5 class="best_price pt-3 pb-2 font-weight-bold text-white">$10.99</h5>
                        <h5 class="best_name py-0  text-white">Hello Product</h5>
                        <h5 class="best_weight py-0  text-white">500 gm</h5>
                        <button type="button"
                                class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                            Add to Cart
                        </button>

                    </div>
                    <div class="col-md-3 d-flex flex-column justify-centent-center align-items-center">
                        <div class="img-div bg-product-medium p-4 rounded-top-front rounded-bottom-front mx-auto">
                            <img src="{{asset('images/best_selling.png')}}" width="150" alt="">
                        </div>
                        <h5 class="best_price pt-3 pb-2 font-weight-bold text-white">$10.99</h5>
                        <h5 class="best_name py-0  text-white">Hello Product</h5>
                        <h5 class="best_weight py-0  text-white">500 gm</h5>
                        <button type="button"
                                class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                            Add to Cart
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- best selling section ends here -->

    <!-- special section starts here -->
    <section id="special-section">
        <div class="container-mine">
            <div class="row m-0 p-0 my-5">
                <div class="col-md-12 mt-5">
                    <div class="top-title">
                        <h3 class="font-weight-bold d-inline bg-main-primary px-5 pb-1 rounded-top-front new-arrival-tag text-white">
                            SPECIALS</h3>
                    </div>
                </div>
                <!-- <div class="container"> -->
                <!-- <div class="special-content"> -->

                <!-- first row -->
                <div class="row m-0 p-0 mb-4">
                    <!-- col-item-start -->
                    <div class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                        @foreach ($discountedProducts as $discountedProduct)
                            <a href="{{route('singleproduct',$product->id)}}">

                                <div
                                    class="img-div bg-product-medium p-4 rounded-top-front rounded-bottom-front mx-auto">
                                    <img src="" width="150" alt="">
                                </div>
                                <h5 class="best_price pt-3 font-weight-bold text-main-danger">
                                    <s>was {{$discountedProduct->price}}</s></h5>
                                <h5 class="best_price font-weight-bold text-main-danger">{{$discountedProduct->sale_price}}</h5>
                                <h5 class="best_name py-0 text-dark">{{$discountedProduct->product_name}}</h5>
                                <button type="button"
                                        class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                    Add to Cart
                                </button>
                            </a>
                    @endforeach
                    <!-- col-item-end -->
                    </div>
                </div>
                <!-- second row -->
            </div>
        </div>
    </section>
    <!-- special section ends here -->

    <!-- reviews and signup section starts here -->
    <section id="reviews-signup-section mt-5">
        <div class="section-bar bg-main-primary mt-5"></div>
        <div class="container-mine">
            <div class="row m-0 p-0 w-100">
                <div class="col-md-7">
                    <div class="reviews bg-main-primary rounded-top-front rounded-bottom-front pt-4 pb-0">
                        <div class="circle-1"></div>
                        <div class="circle-2"></div>
                        <h3 class="font-weight-bold text-center bg-main-primary mb-3 py-3 text-white"
                            style="font-family: 'Times New Roman'">REVIEWS</h3>
                        <div class="row m-0 p-0 text-white" style="font-family: serif">
                            <div class="col-md-7">
                                <div class="row mx-2">
                                    <div class="col-12 text-center">
                                        <h5 class="">Give us your reviews</h5>
                                    </div>
                                    <div class="col-12 text-center">
                                        <div class="reviews-rating">
                                            <a href="#5" title="Give 5 stars">★</a>
                                            <a href="#4" title="Give 4 stars">★</a>
                                            <a href="#3" title="Give 3 stars">★</a>
                                            <a href="#2" title="Give 2 stars">★</a>
                                            <a href="#1" title="Give 1 star">★</a>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <textarea class="form-control" rows="7"
                                                  placeholder="Your Feedback"></textarea>
                                    </div>
                                    <div class="col-12 text-center">
                                        <input class="btn border-white text-white mt-3 px-4" type="submit" value="Send">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row pr-3">
                                    <div class="col-12 text-center">
                                        <h5 class="">Customer reviews</h5>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="customer-reviews-slider" style="">
                                            <div id="customer-reviews-carousel" class="owl-carousel owl-theme">
                                                <div class="item">

                                                    <img class="review-images"
                                                         src="https://da8yur8xq4co8.cloudfront.net/wp-content/uploads/2016/06/barismo.png"
                                                         alt="">
                                                </div>
                                                <div class="item">
                                                    <img class="review-images"
                                                         src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRylqTFnRy7K55760Dhy9UjVee1FzSdsHwiwA&usqp=CAU"
                                                         alt="">
                                                </div>
                                                <div class="item">
                                                    <img class="review-images"
                                                         src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSKp3eKXD4fFCVjCkJNwQkW8EK2BywlUTMz-Q&usqp=CAU"
                                                         alt="">
                                                </div>
                                                <div class="item">
                                                    <img class="review-images"
                                                         src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTP5qXEa1Y6iU3pNn6ovS-1ck56NJOJ-uS5gg&usqp=CAU"
                                                         alt="">
                                                </div>
                                                <div class="item">
                                                    <img class="review-images"
                                                         src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTP5qXEa1Y6iU3pNn6ovS-1ck56NJOJ-uS5gg&usqp=CAU"
                                                         alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 ">
                    <div class="signup bg-main-secondary rounded-top-front rounded-bottom-front py-4">
                        <div class="circle-3"></div>
                        <div class="circle-4"></div>
                        <h3 class="font-weight-bold text-center bg-main-secondary mb-3 pb-3 text-white"
                            style="font-family: 'Times New Roman'">SIGNUP</h3>
                        <div class="container">
                            <div class="row m-0 p-0">
                                <div class="col-md-6 pr-0">
                                    <input type="text" name="firstName"
                                           class="form-control rounded-top-front rounded-bottom-front"
                                           placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="lastName"
                                           class="form-control rounded-top-front rounded-bottom-front"
                                           placeholder="Last Name">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <input type="email" name="emailAddress"
                                           class="form-control rounded-top-front rounded-bottom-front"
                                           placeholder="E-mail address">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <input type="password" name="password1"
                                           class="form-control rounded-top-front rounded-bottom-front"
                                           placeholder="New password">
                                </div>
                                <div class="col-md-12 mt-2">
                                    <input type="password" name="password2"
                                           class="form-control rounded-top-front rounded-bottom-front"
                                           placeholder="Re-enter password">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="" class="text-white">Date of birth</label>
                                    <input type="date" name="dob"
                                           class="form-control rounded-top-front rounded-bottom-front" placeholder="">
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label class="text-white">Gender</label>
                                    <select name="" id="" class="form-control rounded-top-front rounded-bottom-front">
                                        <option value="" selected disabled>--Select Gender--</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-3 d-flex ">
                                    <input type="checkbox" class=" mt-1 mr-1">
                                    <p class="text-small privacy-info">
                                        <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt
                                            architecto <u><a href="#">Privacy</a></u> odio nihil officia nisi veritatis.</small>
                                    </p>
                                </div>
                                <div class="col-md-4 mt-2 d-flex justify-content-center">
                                    <button type="button"
                                            class="btn btn-sm bg-main-secondary border rounded text-white px-4">Sign up
                                    </button>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <h6 class="text-center font-weight-bold ">OR</h6>
                                </div>
                                <div class="col-md-6 mt-2 text-center">
                                    <h6><a href="#" class="text-white" style="text-decoration: underline">Signup with
                                            google</a></h6>
                                    <h6><a href="#" class="text-white" style="text-decoration: underline">Signup with
                                            facebook</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- reviews and signup section ends here -->
    <!-- About Us Section -->
    <section id="about-section">
        <div class="container-fluid bg-main-primary">
            <div class="container py-5">
                <div class="row py-4">
                    <div class="col-md-6 px-5 about-us-img">
                        <img src="{{ asset('images/Rice_Page/Parliament-Gold-Rice__37939.1566787289.jpg') }}" width=""
                             height="" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-6 px-5">
                        <div class="row text-center mt-2">
                            <div class="col-12">
                                <h3 class="text-white font-weight-bold" style="font-family: 'Times New Roman'">ABOUT
                                    US</h3>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <p class="text-white text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, corporis itaque quis quod
                                repellendus totam vel vero? Atque facere in nesciunt quis tenetur unde, voluptates!
                                Autem id
                                molestiae nam voluptates?
                            </p>
                            <p class="text-white text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur minus
                                perspiciatis quaerat quas? Beatae, commodi dolorem dolores dolorum exercitationem
                                expedita
                                magnam nobis obcaecati recusandae repellendus sed unde veniam veritatis.
                            </p>
                        </div>
                        <div class="row mt-3 text-center d-flex justify-content-center">
                            <button type="button"
                                    class="btn btn-white border text-white px-5 mt-2 d-block">
                                Read More
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section Ends -->

@stop

@section('scripts')
    <script>
        $(document).ready(function () {
            /*Banner Image Carousel*/
            $("#banner-image-carousel").owlCarousel({
                items: 1,
                dots: true,
                navigation: false,
                singleItem: true,
                autoplay: true,
                loop: true,
                responsiveClass: true,
                autoplayTimeout: 7000,
                smartSpeed: 800,

            });


            /*Customer Reviews Carousel*/
            $("#customer-reviews-carousel").owlCarousel({
                items: 1,
                autoplay: true,
                loop: true,
                margin: 20,
                responsiveClass: true,
                autoplayTimeout: 7000,
                smartSpeed: 800,
                nav: true,
                navText: ["Previous", "Next"],

            });

            /*New Arrival Carousel*/
            /*-------------------*/
            var newArrivalItemDetails = $("#new_arrival_carousel_item");
            var newArrivalItems = $("#new_items");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;

            newArrivalItemDetails.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: false,
                autoplay: true,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
            }).on('changed.owl.carousel', syncPosition);

            newArrivalItems
                .on('initialized.owl.carousel', function () {
                    newArrivalItems.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: true,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100,
                    navText: ['<svg width="10%" height="10%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 3px;stroke: #b6b6b6;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="10%" height="10%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 3px;stroke: #b6b6b6;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
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

                newArrivalItems
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = newArrivalItems.find('.owl-item.active').length - 1;
                var start = newArrivalItems.find('.owl-item.active').first().index();
                var end = newArrivalItems.find('.owl-item.active').last().index();

                if (current > end) {
                    newArrivalItems.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    newArrivalItems.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    newArrivalItemDetails.data('owl.carousel').to(number, 100, true);
                }
            }

            newArrivalItems.on("click", ".owl-item", function (e) {
                e.preventDefault();
                var number = $(this).index();
                newArrivalItemDetails.data('owl.carousel').to(number, 300, true);
            });
            /*New Arribal Carousel Ends*/
        });
    </script>
@stop
