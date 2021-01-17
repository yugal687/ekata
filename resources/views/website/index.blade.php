<!-- website header -->
@extends('layouts.website.header')
<!-- website header ends -->

@section('style')
<link rel="stylesheet" href="{{ asset('css/indexpage.css')}}">
<style>
    .card {
        box-shadow: none !important;
    }

    section.hero-section {
    width: 100vw;
    overflow: hidden;
}
</style>
@stop

@section('content')
{{--FeedBack Message--}}
<div class='success-box' id="success_box">
    <img alt='tick image' width='32'
        src='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0MjYuNjY3IDQyNi42NjciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQyNi42NjcgNDI2LjY2NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiM2QUMyNTk7IiBkPSJNMjEzLjMzMywwQzk1LjUxOCwwLDAsOTUuNTE0LDAsMjEzLjMzM3M5NS41MTgsMjEzLjMzMywyMTMuMzMzLDIxMy4zMzMgIGMxMTcuODI4LDAsMjEzLjMzMy05NS41MTQsMjEzLjMzMy0yMTMuMzMzUzMzMS4xNTcsMCwyMTMuMzMzLDB6IE0xNzQuMTk5LDMyMi45MThsLTkzLjkzNS05My45MzFsMzEuMzA5LTMxLjMwOWw2Mi42MjYsNjIuNjIyICBsMTQwLjg5NC0xNDAuODk4bDMxLjMwOSwzMS4zMDlMMTc0LjE5OSwzMjIuOTE4eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K' />
    <div class='text-message'></div>
    <i class="fas fa-times close-feedback"></i>
</div>
{{--Feedback Message Ends--}}

<section>
    <div class="">
        <div class="col-md-12 py-4">
            @include('layouts.website.smindexsidebar')
        </div>
    </div>
</section>

<section class="hero-section">
    <div class="">
        <div class="row">
            <!-- sidebar slider section starts here -->
            <!-- <div class="col-lg-2 col-md-12 bg-main-primary rounded-bottom-right d-lg-block d-none mb-4">
            <div class="row">
                <div class="col-12 bg-main-secondary">
                    <div class="cate">
                        <h3 class="text-center text-dark mt-2 category-font">CATEGORY</h3>
                    </div>
                </div>
            </div>
            <div class="row index-sidebar-section">
                <div class="col-12 mx-auto" style="max-width: 90%;">
                    {{--Include Sidebar Here--}}
                    @include('layouts.website.indexsidebar')
                </div>
            </div>
        </div> -->

            <!-- sidebar slider section ends here -->
            <div class="col-lg-12 col-md-12">
                <!-- banner section starts here -->
                <div class="banner-area">
                    <div id="banner-image-carousel" class="owl-carousel owl-theme">
                        @foreach($bannerImage as $images)
                        <div class="item"><img src="{{ $images->image }}" alt=""></div>
                        @endforeach
                    </div>
                </div>
                <!-- banner section ends here -->

            </div>
            <!-- banner section ends here -->
        </div>
    </div>
</section>
<!-- hero section ends here -->


<!-- clearence section starts here -->
<section id="clearence_section" class="container">
    <div class="row  mt-5 mx-0">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-header ">
                    <!-- <h2 class="text-center  heading-font mb-0" style="color:#d47a19">FLASH DEALS</h2> -->
                    <div class="row  mt-5 mb-4">
            <div class="col-md-12">
                <div class="top-title">
                    <h3 class="d-inline bg-main-primary px-3 rounded-top-front heading-font text-white">
                        Flash Deals
                    </h3>
                </div>
            </div>
        </div>
                </div>

                <div class="card-body  rounded-bottom-front card-bdy ">

                    <div id="clearence_carousel" class="owl-carousel owl-theme">
                        @foreach ($clearanceProducts as $discountedProduct)

                        <div class="item text-center rounded-top-front rounded-bottom-front">
                            <div class="row d-flex justify-content-center">
                            <div class="col-md-12">
                                <a
                                    href="{{ route('singleproduct',[$discountedProduct->id,$discountedProduct->product_name ])}}">
                                    <div class="col-12">
                                        <div
                                            class="img-div bg-product-medium-2 rounded-top-front rounded-bottom-front mx-auto">
                                            <div class="ribbon-wrapper ribbon-lg">
                                                <div class="ribbon bg-main-primary text-dark discount-font"
                                                    style="padding: 0.2rem 0px;background-color: #EEE753">
                                                    clearance
                                                </div>
                                            </div>
                                            <img src="{{$discountedProduct->image[0]->name}}" width="" alt="">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <h5 class="pt-3 font-weight-bold text-main-danger">
                                            <s> was {{$discountedProduct->price}}</s></h5>
                                        <h5 class="product-price font-weight-bold text-main-danger">
                                            ${{$discountedProduct->sale_price}}</h5>
                                        <h5 class="py-0 text-dark">{{$discountedProduct->product_name}}</h5>
                                        <h5 class="brand-name py-0 text-dark">{{$discountedProduct->brand->brand_name}}
                                        </h5>
                                        <button type="button"
                                            class="btn bg-btn rounded-top-front-btn rounded-bottom-front-btn border text-white mt-2 d-block mx-auto w-100">
                                            Add to Cart
                                        </button>
                                    </div>
                                </a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
<!-- clearence section ends here -->

<div class="new_arrival_section1">
    <div class="container-mine">
        <div class="row  mt-5 mb-4">
            <div class="col-md-12">
                <div class="top-title">
                    <h3 class="d-inline bg-main-primary px-3 rounded-top-front heading-font text-white">
                        NEW ARRIVALS
                    </h3>
                </div>
            </div>
        </div>
        <div class="container-mine-3">
            <div id="new_arrival_carousel_item" class="owl-carousel owl-theme m-0 p-0">
                @foreach($latestProduct as $lastproduct)
                <div class="item">
                    <div class="">
                        <div class="row  my-4">

                            <div class="col-md-6">
                                <div
                                    class="px-5 image-container text-center bg-product-medium rounded-top-front rounded-bottom-front">
                                    <img src="{{$lastproduct->image[0]->name}}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 mt-md-0 mt-3 new-arrival-item-details">
                                <div class="">
                                    <div class="row mb-3 mt-3">
                                        <div class="col-lg-5 col-sm-4 col-12">
                                            <h5 class="text-dark font-weight-bold">Product
                                                Name<span>:</span></h5>
                                        </div>
                                        <div class="col-lg-7 col-sm-8 col-12">
                                            <a href="{{ route('singleproduct',$lastproduct->id)}}">
                                                <!-- product name here -->
                                                <h5 class="text-dark">{{$lastproduct->product_name}}</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-5 col-sm-4 col-12">
                                            <h5 class="text-dark font-weight-bold">Category<span>:</span></h5>
                                        </div>
                                        <div class="col-lg-7 col-sm-8 col-12">
                                            <h5 class="">{{$lastproduct->category->category_name}}</h5>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-5 col-sm-4 col-12">
                                            <h5 class="text-dark font-weight-bold">
                                                Description<span>:</span></h5>
                                        </div>
                                        <div class="col-lg-7 col-sm-8 col-12">
                                            <h5 class="" style="text-align: justify">
                                                {{$lastproduct->additional_information}}</h5>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-5 col-sm-4 col-12">
                                            <h5 class="text-dark font-weight-bold">Price<span>:</span></h5>
                                        </div>
                                        <div class="col-lg-7 col-sm-8 col-12">
                                            <h5 class="text-main-danger font-weight-bold">
                                                $ {{$lastproduct->price}}</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ route('singleproduct',[$lastproduct->id,$lastproduct->product_name]) }}"
                                                type="button"
                                                class="btn bg-btn btn-lg btn-block font-weight-bold text-white rounded-top-front-btn rounded-bottom-front-btn" >
                                                Add to Cart
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <section id="general-slider" class="bg-product-light mt-md-5">
        <div class="container-mine">
            <div class="bg-product-light card-bdy px-4">
                <div id="new_items" class="owl-carousel owl-theme px-4">
                    @foreach($latestProduct as $lastproduct)
                    <div class="item text-center d-flex justify-content-center align-items-center">

                        <div class="new_items_img">
                            <div class="row m-3">
                                <div class="col-12 bg-product-medium rounded-top-front rounded-bottom-front">

                                    <img src="{{$lastproduct->image[0]->name}}" class="img-fluid" alt="">
                                </div>
                                <div class="col-12 mt-4 mb-2">
                                    <h5>{{$lastproduct->product_name}}</h5>
                                </div>
                            </div>
                        </div>
                        <br />
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
        <div class="container-mine pb-5">
            <div class="row m-0 py-2 px-4">
                <div class="col-lg-3 col-md-6 col-sm-6 pt-5">
                    <img src="{{ asset('images/Homepage/Best_selling.png')}}" width="100%" alt="">
                    <div class=" border-0 rounded-top-front rounded-bottom-front text-center best-selling-tag"
                        style="background-color: #EEE753">
                        <h2 class="heading-font pb-0">BEST SELLING</h2>
                        <h5 class="pt-0">Best of all time</h5>
                    </div>
                </div>
                @foreach($bestSelling as $best)
                <div class="col-lg-3 col-md-6 col-sm-6 pt-5 text-center">
                    <a href="{{route('singleproduct',[$best->id,$best->product_name])}}">
                        <div class="img-div bg-product-medium p-4 rounded-top-front rounded-bottom-front mx-auto">
                            <img src="{{$best->image[0]->name}}" class="img-fluid" alt="">
                        </div>
                        <h5 class="product-price pt-3 font-weight-bold text-white ">${{$best->price}}</h5>
                        <h5 class=" text-white ">{{$best->product_name}}</h5>
                        <h5 class="brand-name text-white ">{{$best->brand->brand_name}}</h5>
                        <button type="button"
                            class="btn bg-btn rounded-top-front-btn rounded-bottom-front-btn border text-white mt-4 d-block mx-auto"
                            style="width: 80%">
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



<!--Todays Special-->
@if(count($todayspecial)>0)
            @if(count($todayspecial[0]->product)>0)
            
<section id="clearence_section" class="container">
    <div class="row  mt-5 mx-0">
        <div class="col-md-12">
        @foreach($todayspecial as $category)
            <div class="card border-0">
            <div class="col-md-12 mt-5">
                <div class="top-title">
                    <h3 class="d-inline bg-main-primary px-5 rounded-top-front heading-font text-white">
                    {{$category->tags}}</h3>
                </div>
            </div>

                <div class="card-body  rounded-bottom-front card-bdy ">

                    <div id="todaySpecials" class="owl-carousel ">
                    @foreach ($category->product as $discountedProduct)

                        <div class="item text-center rounded-top-front rounded-bottom-front">
                            <div class="row d-flex">
                              <div class="col-md-12">
                                <a
                                    href="{{ route('singleproduct',[$discountedProduct->id,$discountedProduct->product_name ])}}">
                                    <div class="col-12">
                                        <div
                                            class="img-div bg-product-medium-2 rounded-top-front rounded-bottom-front mx-auto">
                                            <!-- <div class="ribbon-wrapper ribbon-lg">
                                                <div class="ribbon  text-dark discount-font"
                                                    style="padding: 0.2rem 0px; background-color: #EEE753">
                                                    {{$discountedProduct->discount}}%off
                                                </div>
                                            </div> -->
                                            <img src="{{$discountedProduct->image[0]->name}}" width="" alt="">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <h5 class="pt-3 font-weight-bold text-main-danger">
                                            <s> was {{$discountedProduct->price}}</s></h5>
                                        <h5 class="product-price font-weight-bold text-main-danger">
                                            ${{$discountedProduct->sale_price}}</h5>
                                        <h5 class="py-0 text-dark">{{$discountedProduct->product_name}}</h5>
                                        <h5 class="brand-name py-0 text-dark">{{$discountedProduct->brand->brand_name}}
                                        </h5>
                                        <button type="button"
                                            class="btn bg-btn rounded-top-front-btn rounded-bottom-front-btn border text-white mt-2 d-block mx-auto w-100">
                                            Add to Cart
                                        </button>
                                    </div>
                                </a>
                                </div>
                            </div>
                            
                        </div>
                        @endforeach

                    </div>

                </div>

            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endif
<!-- Today Special Ends-->

<!--Weekly Special-->
@if(count($weeklyspecial)>0)
            @if(count($weeklyspecial[0]->product)>0)
            
<section id="clearence_section" class="container">
    <div class="row  mt-5 mx-0">
        <div class="col-md-12">
        @foreach($weeklyspecial as $category)
            <div class="card border-0">
            <div class="col-md-12 mt-5">
                <div class="top-title">
                    <h3 class="d-inline bg-main-primary px-5 rounded-top-front heading-font text-white">
                    {{$category->tags}}</h3>
                </div>
            </div>


                <div class="card-body  rounded-bottom-front card-bdy ">

                    <div id="weeklySpecials" class="owl-carousel ">
                    @foreach ($category->product as $discountedProduct)
                        <div class="item text-center rounded-top-front rounded-bottom-front">
                            <div class="row d-flex">
                              <div class="col-md-12">
                                <a
                                    href="{{ route('singleproduct',[$discountedProduct->id,$discountedProduct->product_name ])}}">
                                    <div class="col-12">
                                        <div
                                            class="img-div bg-product-medium-2 rounded-top-front rounded-bottom-front mx-auto">
                                            <!-- <div class="ribbon-wrapper ribbon-lg">
                                                <div class="ribbon bg-main-primary text-dark discount-font"
                                                    style="padding: 0.2rem 0px; background-color: #EEE753">
                                                    {{$discountedProduct->discount}}%off
                                                </div>
                                            </div> -->
                                            <img src="{{$discountedProduct->image[0]->name}}" width="" alt="">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <h5 class="pt-3 font-weight-bold text-main-danger">
                                            <s> was {{$discountedProduct->price}}</s></h5>
                                        <h5 class="product-price font-weight-bold text-main-danger">
                                            ${{$discountedProduct->sale_price}}</h5>
                                        <h5 class="py-0 text-dark">{{$discountedProduct->product_name}}</h5>
                                        <h5 class="brand-name py-0 text-dark">{{$discountedProduct->brand->brand_name}}
                                        </h5>
                                        <button type="button"
                                            class="btn bg-btn rounded-top-front-btn rounded-bottom-front-btn border text-white mt-2 d-block mx-auto w-100">
                                            Add to Cart
                                        </button>
                                    </div>
                                </a>
                                </div>
                            </div>
                            
                        </div>
                        @endforeach

                    </div>

                </div>

            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endif
<!--weekly special ends-->

<!-- special section ends here -->

<!-- reviews and signup section starts here -->
<section id="reviews-signup-section mt-5">
    <div class="section-bar bg-main-secondary mt-5"></div>
    <div class="container-mine">
        <div class="row m-0 p-0 w-100">
            <div class="col-md-12 col-lg-7">
                <div class="reviews bg-main-primary rounded-top-front rounded-bottom-front pt-4 pb-0">
                    <div class="circle-1"></div>
                    <div class="circle-2"></div>
                    <h3 class="heading-font text-center bg-main-primary mb-3 py-3 text-white">REVIEWS</h3>
                    <div class="row m-0 p-0 text-white" style="font-family: serif">
                        <div class="col-md-7">
                            <div class="row mx-2">
                                <div class="col-12 text-center">
                                    <h5 class="">Give us your reviews</h5>
                                </div>
                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                                <!-- Rating Stars Box -->

                                <div class='col-12 rating-widget text-center mt-2'>
                                    <!-- Rating Stars Box -->
                                    <div class='rating-stars text-center'>
                                        <ul id='stars'>
                                            <li class='star' title='Poor' data-value='1'>
                                                <i class='fas fa-star fa-fw'></i>
                                            </li>
                                            <li class='star' title='Fair' data-value='2'>
                                                <i class='fas fa-star fa-fw'></i>
                                            </li>
                                            <li class='star' title='Good' data-value='3'>
                                                <i class='fas fa-star fa-fw'></i>
                                            </li>
                                            <li class='star' title='Excellent' data-value='4'>
                                                <i class='fas fa-star fa-fw'></i>
                                            </li>
                                            <li class='star' title='WOW!!!' data-value='5'>
                                                <i class='fas fa-star fa-fw'></i>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="7" id="review" placeholder="Your Feedback"
                                        required></textarea>
                                </div>
                                <div class="col-12 text-center">
                                    <input class="btn border-white bg-btn text-white mt-4 px-4" type="submit"
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

                                                <img class="review-images" src="{{$image->image}}" alt="">
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
            <div class="col-md-12 col-lg-5 ">
                <div class="signup bg-main-primary rounded-top-front rounded-bottom-front py-4">
                    <div class="circle-3"></div>
                    <div class="circle-4"></div>
                    <h3 class="heading-font text-white text-center">ENQUIRY FORM</h3>
                    <div class="container px-5">
                        <form action="{{url("saveEnquiry")}}" method="post">
                            {{csrf_field()}}
                            <input class="form-control mt-4" type="text" name="firstname" placeholder="Name" required>
                            <input class="form-control mt-3" type="email" name="email" placeholder="E-mail" required>
                            <input class="form-control mt-3" type="number" name="phone" placeholder="Phone No."
                                required>
                            <textarea class="form-control mt-3" rows="5" name="description" placeholder="Description"
                                required></textarea>
                            <div class="row mt-4">
                                <div class="col-12 text-center">
                                    <button class="btn border-white bg-btn text-white px-3"
                                        type="submit">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- reviews and signup section ends here -->
<!-- About Us Section -->
<section id="about-section">
    <div class="container-fluid bg-main-secondary">
        <div class="container-mine-4 py-5">
            <div class="row py-4">
                <div class="col-md-7 about-us-img">
                    <img src="{{ asset('images/Rice_Page/Parliament-Gold-Rice__37939.1566787289.jpg') }}" width=""
                        height="" class="img-fluid" alt="">
                </div>
                <div class="col-md-5">
                    <div class="row text-center mt-2">
                        <div class="col-12">
                            <h3 class="text-white heading-font">ABOUT US</h3>
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
                            class="btn btn-white border text-white px-5 mt-2 d-block rounded-top-front-btn rounded-bottom-front-btn">
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
<script src="{{ asset('js/indexpage.js') }}"></script>
<script>
    $(document).ready(function () {

        $("#owl-demo").owlCarousel({
            nav: true,
            dots: false,
            loop: true,
            autoplay: true,
            autoplayTimeout:3000,
            itemsDesktop: [1000, 5], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 3], // betweem 900px and 601px
            itemsTablet: [600, 2], //2 items between 600 and 0;
            itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
            navText: [
                '<i class=" text-dark fa fa-chevron-left fa-2x" style="color: #b6b6b6" aria-hidden="true"></i>',
                '<i class="text-dark fa fa-chevron-right fa-2x" style="color: #b6b6b6" aria-hidden="true"></i>'
            ],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2
                },

                600: {
                    items: 3
                },

                1024: {
                    items: 9
                },

                1366: {
                    items: 9
                }
            }
        });


    });

</script>
@stop
