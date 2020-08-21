<!--Website Header-->
@extends('layouts.website.header')
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
    <div class="container-fluid">
        <div class="row">
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
                <main class="p-5">
                    <div class="row pb-3">
                        <div class="col-12">
                            <div class="overlayImage">
                                <img
                                    src="{{ asset('images/Catagory_Page/Chinese-dry-spices-and-condiments-1024x620.jpg') }}"
                                    class="categoryBannerImage img-fluid" alt="">
                                <div class="overlayBackground"></div>
                                <div class="overlayText">Dry Goods</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-5">
                            <div class="top-title">
                                <h3 class="font-weight-bold d-inline bg-main-primary px-5 pb-1 rounded-top-front new-arrival-tag text-white">
                                    Rice
                                </h3>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3 mt-5 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium p-4 rounded-top-front rounded-bottom-front mx-auto">
                                        <img src="{{ asset('images/Product_pngs/Layer 25.png') }}" width="150" alt="">
                                    </div>
                                    <h5 class="best_price pt-3 font-weight-bold text-main-danger">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>
                                </div>
                                <div class="col-md-3 mt-5 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium p-4 rounded-top-front rounded-bottom-front mx-auto">
                                        <img src="{{ asset('images/Product_pngs/masala.png') }}" width="150" alt="">
                                    </div>
                                    <h5 class="best_price pt-3 font-weight-bold text-main-danger">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>
                                </div>
                                <div class="col-md-3 mt-5 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium p-4 rounded-top-front rounded-bottom-front mx-auto">
                                        <img src="{{ asset('images/Product_pngs/betan_rice.png') }}" width="150" alt="">
                                    </div>
                                    <h5 class="best_price pt-3 font-weight-bold text-main-danger">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>
                                </div>
                                <div class="col-md-3 mt-5 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium p-4 rounded-top-front rounded-bottom-front mx-auto">
                                        <img src="{{ asset('images/Product_pngs/dal.png') }}" width="150" alt="">
                                    </div>
                                    <h5 class="best_price pt-3 font-weight-bold text-main-danger">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-5">
                            <div class="top-title">
                                <h3 class="font-weight-bold d-inline bg-main-primary px-5 pb-1 rounded-top-front new-arrival-tag text-white">
                                    Nuts
                                </h3>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3 mt-5 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium p-4 rounded-top-front rounded-bottom-front mx-auto">
                                        <img src="{{ asset('images/Product_pngs/Pickle.png') }}" width="150" alt="">
                                    </div>
                                    <h5 class="best_price pt-3 font-weight-bold text-main-danger">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>
                                </div>
                                <div class="col-md-3 mt-5 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium p-4 rounded-top-front rounded-bottom-front mx-auto">
                                        <img src="{{ asset('images/Product_pngs/dal.png') }}" width="150" alt="">
                                    </div>
                                    <h5 class="best_price pt-3 font-weight-bold text-main-danger">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>
                                </div>
                                <div class="col-md-3 mt-5 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium p-4 rounded-top-front rounded-bottom-front mx-auto">
                                        <img src="{{ asset('images/Product_pngs/tea.png') }}" width="150" alt="">
                                    </div>
                                    <h5 class="best_price pt-3 font-weight-bold text-main-danger">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>
                                </div>
                                <div class="col-md-3 mt-5 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium p-4 rounded-top-front rounded-bottom-front mx-auto">
                                        <img src="{{ asset('images/Product_pngs/tumeric.png') }}" width="150" alt="">
                                    </div>
                                    <h5 class="best_price pt-3 font-weight-bold text-main-danger">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-5">
                            <div class="top-title">
                                <h3 class="font-weight-bold d-inline bg-main-primary px-5 pb-1 rounded-top-front new-arrival-tag text-white">
                                    Nuts
                                </h3>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3 mt-5 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium p-4 rounded-top-front rounded-bottom-front mx-auto">
                                        <img src="{{ asset('images/Product_pngs/Layer 25.png') }}" width="150" alt="">
                                    </div>
                                    <h5 class="best_price pt-3 font-weight-bold text-main-danger">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>
                                </div>
                                <div class="col-md-3 mt-5 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium p-4 rounded-top-front rounded-bottom-front mx-auto">
                                        <img src="{{ asset('images/Product_pngs/masala.png') }}" width="150" alt="">
                                    </div>
                                    <h5 class="best_price pt-3 font-weight-bold text-main-danger">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>
                                </div>
                                <div class="col-md-3 mt-5 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium p-4 rounded-top-front rounded-bottom-front mx-auto">
                                        <img src="{{ asset('images/Product_pngs/betan_rice.png') }}" width="150" alt="">
                                    </div>
                                    <h5 class="best_price pt-3 font-weight-bold text-main-danger">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>
                                </div>
                                <div class="col-md-3 mt-5 d-flex flex-column justify-centent-center align-items-center">
                                    <div
                                        class="img-div bg-product-medium p-4 rounded-top-front rounded-bottom-front mx-auto">
                                        <img src="{{ asset('images/Product_pngs/dal.png') }}" width="150" alt="">
                                    </div>
                                    <h5 class="best_price pt-3 font-weight-bold text-main-danger">$10.99</h5>
                                    <h5 class="best_name py-0 text-dark">Hello Product</h5>
                                    <h5 class="best_weight py-0 text-dark">500 gm</h5>
                                    <button type="button"
                                            class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

            </div>
        </div>
    </div>
@stop


@section('footer')
    <!--Extend Footer-->
    @extends('layouts.website.footer')
    <!--Footer Ends-->

@stop
