<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ekata Convenience Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    @yield('style')
    <style>
        .el-dialog {
            position: relative;
            margin: 0 auto 50px;
            border-radius: 2px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .3);
            box-sizing: border-box;
            /*width: inherit;*/
        }

        .content-wrapper {
            background-color: #fff;
            padding: 20px 0;
        }

        .el-form--label-top .el-form-item__label {
            padding: 0;
        }

        label {
            margin-bottom: 0 !important;
        }

        /*form.el-form.demo-categoryForm.el-form--label-top {
            width: 90%;
        }*/
        .el-form-item {
            margin-bottom: 10px !important;
        }

        .el-button:focus {
            outline: none;
        }

        /*.el-form-item:last-child {
            margin-bottom: 30px !important;
        }*/
        /*.el-button{
            margin-top: 20px;
        }*/

    </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div id="app">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Go to Website</a>
                </li>
            </ul>


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->first_name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
            @endguest
            <!-- Authentication Links -->

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="https://pngimg.com/uploads/amazon/amazon_PNG11.png" alt="AdminLTE Logo"
                     class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <br/>
                <span class="brand-text font-weight-light">Ekata Convenience Store</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->first_name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2 mb-5">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!--- Nav items starts here -->
                        <li class="nav-item">
                            <a href="/admin/dashboard" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/user/users" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Users
                                    <span class="right badge badge-danger">Latest</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/customer/customers" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Customers
                                    <span class="right badge badge-danger">Latest</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-tools"></i>
                                <p>
                                    Setup
                                    <i class="fas fa-angle-left right"></i>
                                </p>

                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/setup/index" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Category / Subcategory </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/setup/brands" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Brand  </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/setup/tags" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Tags  </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{--<li class="nav-item">
                            <a href="/admin/setup/index" class="nav-link">
                                <i class="fas fa-tools"></i>
                                <p> Setup </p>
                            </a>
                        </li>--}}
                        <li class="nav-item">
                            <a href="/admin/banner/bannerimage" class="nav-link">
                                <i class="fas fa-images"></i>
                                <p>
                                    Banner Image
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fab fa-product-hunt"></i>
                                <p>
                                    Products
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/addproduct/index" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Products</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/addproduct/products" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Product Details</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/addproduct/discount" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Discount</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/order/orderdetails" class="nav-link">
                                <i class="fas fa-project-diagram"></i>
                                <p>
                                    Orders Details
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fab fa-weebly"></i>
                                <p>
                                    Website Update
                                    <i class="fas fa-angle-left right"></i>
                                </p>

                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/websiteupdate/websiteinfo" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Website Info </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/services/" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Services </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/websiteupdate/reviewscarousel" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Reviews Carousel </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/websiteupdate/customersfeedback" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Customers Feedback </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/websiteupdate/enquiries" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Customer Enquiries </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong><i class="fa fa-copyright" aria-hidden="true"></i>
                    Copyright &copy; 2020. All rights reserved. Designed by <a href="#"> Soft tech Multimedia</a>
            </strong>
            <div class="float-right d-none d-sm-inline-block">
                <p><i class="fa fa-copyright" aria-hidden="true"></i> <a href="#">Terms of use</a> | <a href="#">Privacy Policy</a></p>
            </div>
        </footer>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
</div>
<!--JS-->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(function () {
        /** add active class and stay opened when selected */
        var url = window.location;

        // for sidebar menu entirely but not cover treeview
        $('ul.nav-sidebar a').filter(function () {
            return this.href == url;
        }).addClass('active');

        // for treeview
        $('ul.nav-treeview a').filter(function () {
            return this.href == url;
        }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
    });
</script>

@yield('scripts')
</body>
</html>
