<!-- website header -->
@extends('layouts.website.header')
<link href="{{ asset('css/smsidebarstyle.css')}}" rel="stylesheet"/>
<!-- website header ends -->


{{--<link rel="stylesheet" href="{{ asset('css/cate-carousel.css')}} ">--}}
@section('style')
    <style>
        .single-item-share a {
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
    @include('layouts.website.smsidebar')
    <div class="container-fluid">
        <!--main row-->
        <div class="row ">
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


                {{--Vue Component--}}
                <single-product-component></single-product-component>
                {{----}}
            </div>

        </div>
        <!--main row ends-->


    </div>
@stop

@section('scripts')
    <script>
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
