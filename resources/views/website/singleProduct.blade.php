<!-- website header -->
@extends('layouts.website.header')
<!-- website header ends -->


<link rel="stylesheet" href="{{ asset('css/cate-carousel.css')}} ">
<link rel="stylesheet" href="{{ asset('css/ratestar.css')}} ">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('style')
<style>
    /* sidebar owl-carousel vertical slider */
    .hero-sidebar{
        width: 100%;
        height: 150vh;
        position: relative;
    }
    .owl-carousel{
        width: 135vh;
        transform: rotate(90deg);
        position: absolute;
        left: -149%;
        top: 44%;
    }
    .owl-carousel .item{
        width: 100%;
        height: 100px;
        transform: rotate(-90deg);
    }

    div.owl-carousel .owl-nav .owl-prev{
        display: none;
    }
    div.owl-carousel .owl-nav .owl-next{
        text-align: center;
        font-size:10px;
        position: absolute;
        color: #000000;
        bottom: 33%;
        right: -25px;
    }

    .owl-carousel .item{
        width: 100% ;
    }


    .carousel-item{
        height: auto;
    }

    .carousel-inner img {
        width: 100%;
        height: 100%;
    }

    #custCarousel .carousel-indicators {
        position: static;

    }

    #custCarousel .carousel-indicators>li {
        width: 100px
    }

    #custCarousel .carousel-indicators li img {
        display: block;
        opacity: 0.5;
        margin-top: 30px;
    }

    #custCarousel .carousel-indicators li.active img {
        opacity: 1
    }

    #custCarousel .carousel-indicators li:hover img {
        opacity: 0.75
    }

    .carousel-item img {
        width: 80%
    }
</style>
@stop

@section('content')
<div class="container-fluid">
    {{--<div class="row">


        <div class="col-md-10 bg-cate-sec">

        </div>

    </div>--}}

    <!--main row-->
    <div class="row ">
          {{--<!--accordion starts-->
              <div class="col-md-2 container-mine-3 bg-cate-sec">


              </div>
        <!--accordian ends-->--}}
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
           <div class="row">
               <div class="col-md-7 mt-5 ml-5">
                 <div id="custCarousel" class="carousel slide bg-cate-sec " data-ride="carousel" align="center">
                    <!-- slides -->
                     <div class="col-md-4 carousel-inner ">
                          <div class="carousel-item active mt-3 mb-3">
                              <img src="{{ asset('images/category/basmati_rice/Basmati_rice.png') }}">
                          </div>
                          <div class="carousel-item mt-3 mb-3">
                              <img src="{{ asset('images/category/basmati_rice/Basmati_rice.png') }}">
                          </div>
                          <div class="carousel-item mt-3 mb-3">
                              <img src="{{ asset('images/category/basmati_rice/Basmati_rice.png') }}">
                          </div>
                     </div>
                     <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> <!-- Thumbnails -->
                     <ol class="carousel-indicators list-inline">
                         <li class="list-inline-item active">
                             <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#custCarousel">
                                 <img src="{{ asset('/images/category/basmati_rice/Basmati_rice.png') }}" >
                             </a>
                         </li>
                         <li class="list-inline-item">
                             <a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel">
                                 <img src="{{ asset('/images/category/basmati_rice/Basmati_rice.png') }}" >
                             </a>
                         </li>
                         <li class="list-inline-item">
                             <a id="carousel-selector-2" data-slide-to="2" data-target="#custCarousel">
                                 <img src="{{ asset('/images/category/basmati_rice/Basmati_rice.png') }}" >
                             </a>
                         </li>
                     </ol>
                     <!-- Left right -->


                 </div>
               </div>

                <div class="col-md-4 mt-5 ml-2">

                   <h4>Devaya Riz Basmati Rice </h4>
                       <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                       </div>

                    <h6>Category: Dry Goods</h6>

                </div>
           </div>
            <section id="special-section">
                <div class="container pt-2">
                    <div class="row  pt-3 my-5">
                        <div class="col-md-3">
                            <h6 class="text-center">Recently Viewed Items</h6>
                        </div>

                        <div class="col-md-9">
                            <hr style="border-top: 1px solid">
                        </div>
                        <!-- <div class="container"> -->
                        <!-- <div class="special-content"> -->

                        <!-- first row -->
                        <div class="row m-0 p-0 mb-4">
                            <!-- col-item-start -->
                            <div class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                                <div class="img-div bg-product-medium p-2 rounded-top-front rounded-bottom-front mx-auto bg-cate-sec">
                                    <img src="{{asset('images/best_selling.png')}}" width="150" alt="">
                                </div>

                                <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                                <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                <button type="button" class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">Add to Cart</button>

                                <!-- col-item-end -->
                            </div>
                            <!-- col-item-start -->
                            <div class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                                <div class="img-div bg-product-medium p-2 rounded-top-front rounded-bottom-front bg-cate-sec mx-auto">
                                    <img src="{{asset('images/best_selling.png')}}" width="150" alt="">
                                </div>

                                <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                                <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                <button type="button" class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">Add to Cart</button>

                                <!-- website footer -->
                                <!-- col-item-end -->
                            </div>
                            <!-- col-item-start -->
                            <div class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                                <div class="img-div bg-product-medium p-2 bg-cate-sec rounded-top-front rounded-bottom-front mx-auto">
                                    <img src="{{asset('images/best_selling.png')}}" width="150" alt="">
                                </div>

                                <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                                <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                <button type="button" class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">Add to Cart</button>

                                <!-- col-item-end -->
                            </div>
                            <!-- col-item-start -->
                            <div class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                                <div class="img-div bg-product-medium bg-cate-sec p-2 rounded-top-front rounded-bottom-front mx-auto">
                                    <img src="{{asset('images/best_selling.png')}}" width="150" alt="">
                                </div>

                                <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                                <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                <button type="button" class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">Add to Cart</button>

                                <!-- col-item-end -->
                            </div>
                            <div class="container mt-5">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h6 class="text-center">Recommended for you</h6>
                                    </div>

                                    <div class="col-md-9">
                                        <hr style="border-top: 1px solid">
                                    </div>
                                </div>
                            </div>


                            <!-- col-item-start -->
                            <div class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                                <div class="img-div bg-product-medium p-2 bg-cate-sec rounded-top-front rounded-bottom-front mx-auto">
                                    <img src="{{asset('images/best_selling.png')}}" width="150" alt="">
                                </div>

                                <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                                <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                <button type="button" class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">Add to Cart</button>

                                <!-- col-item-end -->
                            </div>
                            <!-- col-item-start -->
                            <div class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                                <div class="img-div bg-product-medium bg-cate-sec p-2 rounded-top-front rounded-bottom-front mx-auto">
                                    <img src="{{asset('images/best_selling.png')}}" width="150" alt="">
                                </div>

                                <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                                <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                <button type="button" class="btn bg-main-primary bg-cate-sec rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">Add to Cart</button>

                                <!-- col-item-end -->
                            </div>
                            <!-- col-item-start -->
                            <div class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                                <div class="img-div bg-product-medium p-2 rounded-top-front rounded-bottom-front bg-cate-sec mx-auto">
                                    <img src="{{asset('images/best_selling.png')}}" width="150" alt="">
                                </div>

                                <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                                <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                <button type="button" class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">Add to Cart</button>

                                <!-- col-item-end -->
                            </div>
                            <!-- col-item-start -->
                            <div class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                                <div class="img-div bg-product-medium p-2 bg-cate-sec rounded-top-front rounded-bottom-front bg-cate-sec mx-auto">
                                    <img src="{{asset('images/best_selling.png')}}" width="150" alt="">
                                </div>

                                <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                                <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                <button type="button" class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">Add to Cart</button>

                                <!-- col-item-end -->
                            </div>
                        </div>
                        <!-- second row -->
                    </div>
                </div>
            </section>
            <!-- special section ends here -->

        </div>

    </div>
    <!--main row ends-->


</div>
@stop
{{--@include('layouts.website.footer')--}}


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
