<!-- website header -->
@extends('layouts.website.header')
<link rel="stylesheet" href="{{ asset('css/indexpage.css')}}">
<!-- website header ends -->

@section('style')
    <style>
        .card {
            box-shadow: none !important;
        }




    </style>
@stop

@section('content')
    <section class="hero-section">
        <div class="row m-0 p-0">
            <!-- sidebar slider section starts here -->
            <div class="col-lg-2 col-md-12 bg-main-primary rounded-bottom-right d-lg-block d-none mb-4">
                <div class="row">
                    <div class="col-12 bg-main-secondary">
                        <div class="cate">
                            <h3 class="text-center text-dark mt-2 font-weight-bold">CATEGORY</h3>
                        </div>
                    </div>
                </div>
                <div class="row index-sidebar-section">
                    <div class="col-12">
                        {{--Include Sidebar Here--}}
                        @include('layouts.website.indexsidebar')
                    </div>
                </div>
            </div>

            <!-- sidebar slider section ends here -->


            <div class="col-lg-10 col-md-12 m-0 p-0 ">
                <!-- banner section starts here -->
                <div class="banner-area">
                    <div id="banner-image-carousel" class="owl-carousel owl-theme">
                        @foreach($bannerImage as $images)
                            <div class="item"><img src="{{ $images->image }}" alt=""></div>
                        @endforeach
                    </div>
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
                                                @foreach ($discountedProducts as $discountedProduct)

                                                <div
                                                    class="item text-center rounded-top-front rounded-bottom-front">
                                                    <div class="row d-flex justify-content-center align-items-center">
                                                        <a href="{{ route('singleproduct',$discountedProduct->id)}}">

                                                            <div class="col-12">
                                                                <div
                                                                    class="img-div bg-product-medium px-5 py-4 rounded-top-front rounded-bottom-front mx-auto">
                                                                    <div class="ribbon-wrapper ribbon-lg">
                                                                        <div class="ribbon bg-main-secondary text-dark">
                                                                            clearance
                                                                        </div>
                                                                    </div>
                                                                    <img src="{{$discountedProduct->image[0]->name}}"
                                                                         width="150" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <h5 class="best_price pt-3 font-weight-bold text-main-danger">
                                                                    <s>${{$discountedProduct->price}}</s></h5>
                                                                <h5 class="best_price font-weight-bold text-main-primary">
                                                                    ${{$discountedProduct->sale_price}}</h5>
                                                                <h5 class="best_name py-0 text-dark">{{$discountedProduct->product_name}}</h5>
                                                                <h5 class="best_weight py-0 text-dark">{{$discountedProduct->brand->brand_name}}</h5>
                                                                <button type="button"
                                                                        class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block mx-auto">
                                                                    Add to Cart
                                                                </button>
                                                            </div>
                                                        </a>

                                                    </div>
                                                </div>
                                                @endforeach

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
                <div class="col-md-12  mb-5">
                    <div class="top-title">
                        <h3 class="font-weight-bold d-inline bg-main-primary px-3 pb-1 rounded-top-front new-arrival-tag text-white">
                            NEW ARRIVALS
                        </h3>
                    </div>
                </div>
            </div>
            <div id="new_arrival_carousel_item" class="owl-carousel owl-theme m-0 p-0">
                @foreach($latestProduct as $lastproduct)

                    <div class="item">
                            <div class="container">
                                <div class="row m-0 p-0 my-4">

                                    <div class="col-md-6 px-5 image-container text-center bg-product-medium rounded-top-front rounded-bottom-front">
                                        <img src="{{$lastproduct->image[0]->name}}" class="img-fluid py-3 px-5"
                                             alt="">
                                    </div>
                                    <div class="col-md-6 mt-md-0 mt-3">
                                        <div class="container h-100 d-flex justify-content-center align-items-center">
                                            <dl class="row">
                                                <dt class="col-sm-5">
                                                    <h5 class="font-weight-bold">Product Name&nbsp;&nbsp;&nbsp;:</h5>
                                                </dt>
                                                <dd class="col-sm-7">
                                                    <a href="{{ route('singleproduct',$lastproduct->id)}}">
                                                    <!-- product name here -->
                                                    <h5 class="font-weight-normal">{{$lastproduct->product_name}}</h5>
                                                    </a>
                                                </dd>

                                                <dt class="col-sm-5 font-weight-bold ">
                                                    <h5 class="font-weight-bold">Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h5>
                                                </dt>
                                                <dd class="col-sm-7">
                                                    <!-- product category here -->
                                                    <h5 class="font-weight-normal">{{$lastproduct->category->category_name}}</h5>
                                                </dd>

                                                <dt class="col-sm-5 font-weight-bold ">
                                                    <h5 class="font-weight-bold">Description&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h5>
                                                </dt>
                                                <dd class="col-sm-7" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                                    <!-- product description here -->
                                                    <h5 class="font-weight-normal ">{{$lastproduct->additional_information}}</h5>
                                                </dd>


                                                <dt class="col-sm-5 font-weight-bold">
                                                    <h5 class="font-weight-bold">Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h5>
                                                </dt>
                                                <dd class="col-sm-7">
                                                    <!-- product price here -->
                                                    <h5 class="font-weight-bold text-main-secondary">
                                                        ${{$lastproduct->price}}</h5>
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
                @endforeach

            </div>
        </div>
        <section id="general-slider" class="bg-product-light mt-0 mt-md-5">
            <div class="container">
                <div class="card-body bg-product-light rounded-bottom-front card-bdy">
                    <div id="new_items" class="owl-carousel owl-theme px-3">
                        @foreach($latestProduct as $lastproduct)
                            <div class="item text-center d-flex justify-content-center align-items-center">

                                <div class="new_items_img">
                                    <div class="row m-4">
                                        <div
                                            class="col-12 bg-product-medium rounded-top-front rounded-bottom-front mt-3">

                                            <img src="{{$lastproduct->image[0]->name}}"
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

    <!-- best selling section starts here -->
    <section id="best-selling-section">
        <div class="best-selling bg-main-primary">
            <div class="container">
                <div class="row m-0 p-0 py-5">
                    <div class="col-lg-3 col-md-6 col-sm-6 py-3">
                        <img src="{{ asset('images/best_selling.png')}}" width="100%" alt="">
                        <div
                            class="card-body bg-main-secondary border-0 rounded-top-front rounded-bottom-front text-center best-selling-tag">
                            <h3 class="font-weight-bold pb-0">BEST SELLING</h3>
                            <h6 class="font-weight-bold pt-0">Best of all time</h6>
                        </div>
                    </div>
                    @foreach($bestSelling as $best)
                        <div class="col-lg-3 col-md-6 col-sm-6 mt-2 mt-lg-0 d-flex justify-content-center align-items-center text-center">
                            <a href="{{route('singleproduct',$best->id)}}">
                                <div
                                    class="img-div bg-product-medium p-4 rounded-top-front rounded-bottom-front mx-auto">
                                    <img src="{{$best->image[0]->name}}" width="150" alt="">
                                </div>
                                <h5 class="best_price pt-3 pb-2 font-weight-bold text-white ">${{$best->price}}</h5>
                                <h5 class="best_name py-0 text-white ">{{$best->product_name}}</h5>
                                <h5 class="best_weight py-0 text-white ">{{$best->brand->brand_name}}</h5>
                                <button type="button"
                                        class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block mx-auto">
                                    Add to Cart
                                </button>
                            </a>
                        </div>
                    @endforeach
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
                <div class="row align-items-center mt-4">
                    @foreach ($discountedProducts as $discountedProduct)
                        <div class="col-md-3 col-sm-6" style="">
                            <div class="row d-flex justify-content-center text-center">
                                <div class="col-8 col-sm-10 col-md-12 col-lg-10 mt-2 mt-md-0">
                                    <div class="ribbon-wrapper ribbon-lg" style="margin-left: 15px">
                                        <div class="ribbon bg-main-secondary">
                                            {{$discountedProduct->discount}}%off
                                        </div>
                                    </div>
                                    <div
                                        class="img-div bg-product-medium rounded-top-front rounded-bottom-front mx-auto">
                                        <img src="{{$discountedProduct->image[0]->name}}" class="img-fluid my-3" alt="">
                                    </div>
                                    <h5 class="best_price pt-3 font-weight-bold text-main-danger">
                                        <s>was ${{$discountedProduct->price}}</s></h5>
                                    <h5 class="best_price font-weight-bold text-main-danger">
                                        ${{$discountedProduct->sale_price}}</h5>
                                    <h5 class="best_name py-0 text-dark">{{$discountedProduct->product_name}}</h5>
                                    <button type="button"
                                            class="mx-auto btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- first row -->
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
                                    <meta name="csrf-token" content="{{ csrf_token() }}"/>
                                    <div class="col-12 text-center">

                                        <div class="reviews-rating">
                                            <a href="#5" title="Give 5 stars" data-value="5">★</a>
                                            <a href="#4" title="Give 4 stars" data-value="4">★</a>
                                            <a href="#3" title="Give 3 stars" data-value="3">★</a>
                                            <a href="#2" title="Give 2 stars" data-value="2">★</a>
                                            <a href="#1" title="Give 1 star" data-value="1">★</a>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <textarea class="form-control" rows="7" id="review"
                                                  placeholder="Your Feedback"></textarea>
                                    </div>
                                    <div class="col-12 text-center">
                                        <input class="btn border-white text-white mt-3 px-4" type="submit"
                                               id="saveFeedback" value="Send">
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
                                                @foreach($reviewImage as $image)
                                                    <div class="item">

                                                        <img class="review-images"
                                                             src="{{$image->image}}"
                                                             alt="">
                                                    </div>
                                                @endforeach
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
                            <a type="button" href="/aboutus"
                               class="btn btn-white border text-white px-5 mt-2 d-block">
                                Read More
                            </a>
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
            $("a").click(function () {
                values = $(this).data('value'); // would be 5
            });
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $("#saveFeedback").click(function () {
                var review = $("#review").val();
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/saveFeedback',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, rating: values, feedback: review},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        $(".writeinfo").append(data.msg);
                    }
                });
            });
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
                navText: ['<i class="fas fa-chevron-left fa-4x" style="color: #b6b6b6"></i>', '<i class="fas fa-chevron-right fa-4x"  style="color: #b6b6b6"></i>'],
            }).on('changed.owl.carousel', syncPosition);

            newArrivalItems
                .on('initialized.owl.carousel', function () {
                    newArrivalItems.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    dots: false,
                    nav: true,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: 1, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: true
                        },
                        576: {
                            items: 2,
                        },

                        992: {
                            items: 3,
                        },

                        1200: {
                            items: 4,
                        }
                    },
                    navText: ['<i class="fas fa-chevron-left fa-4x" style="color: #b6b6b6"></i>', '<i class="fas fa-chevron-right fa-4x"  style="color: #b6b6b6"></i>'],
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


            /*Vertical Sidebar Carousel | Tiny Slider*/
            /*var slider = tns({
                "container": ".smindex-sidebar-carousel",
                "items": 3,
                "slideBy": 1,
                mouseDrag: true,
                preventScrollOnTouch: 'force',
                "swipeAngle": false,
                "speed": 400,
                "loop": true,
                "controls": true,
                "controlsPosition": "bottom",
                "controlsText": ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
                "responsive": {
                    "0": {
                        "items": 3
                    },
                    "576": {
                        "items": 4
                    },
                    "768": {
                        "items": 6
                    }
                },
            });*/
            /*------------------------*/
            /*var slider = tns({
                container: ".sidebar-vertical-carousel",
                "axis": "vertical",
                items: 9,
                "swipeAngle": false,
                "speed": 400,
                mouseDrag: true,
                preventScrollOnTouch: 'force',
                slideBy: 1,
                gutter: 12,
                nav: false,
                loop: true,
                autoplay: true,
                autoplayButtonOutput: false,
                controlsContainer: "#customize-controls",
                /!*"responsive": {
                    "0": {
                        "items": 5
                    },
                    "992": {
                        "items": 8
                    },
                    "1200": {
                        "items": 9
                    }

                },*!/
                rewind: true
            });*/

            /*Vertical Sidebar Carousel Ends*/

            var slider = tns({
                "container": ".catg-slider",
                gutter: 10,
                "items": 8,
                "axis": "vertical",
                "swipeAngle": false,
                "speed": 400,
                mouseDrag: true,
                slideBy: 1,
                nav: false,
                loop: true,
                autoplay: true,
                autoplayButtonOutput: false,
                controlsContainer: "#customize-controls",
            });
        });
    </script>
@stop
