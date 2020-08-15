<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ekata Convenience Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--JS-->
    <script src="{{ asset('js/app.js') }}" defer></script>
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
            box-shadow: 0 1px 3px rgba(0,0,0,.3);
            box-sizing: border-box;
            width: 70% !important;
        }

        .content-wrapper{
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
        .el-form-item{
            margin-bottom: 10px !important;
        }
        .el-button:focus{
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
                    <a href="#" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                           aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

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
                            {{ Auth::user()->name }} <span class="caret"></span>
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
                <img src="https://pngimg.com/uploads/amazon/amazon_PNG11.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <br/>
                <span class="brand-text font-weight-light">Ekata Convenience Store</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRBNFUwQmH640OafdOvh-eIPRcB9ZeIBbYfew&usqp=CAU" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/dashboard" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Admin Dashboard</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/userdashboard" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User Dashboard</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/users" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Users
                                    <span class="right badge badge-danger">Latest</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/setup/index" class="nav-link">
                                <i class="fas fa-tools"></i>
                                <p> Setup </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="" class="nav-link">
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
                            </ul>
                        </li>

                        {{--<li class="nav-item has-treeview">
                            <a href="" class="nav-link">
                                <i class="fas fa-tools"></i>
                                <p>
                                    Setup
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Category Setup</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Subcategory Setup</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Brand Setup</p>
                                    </a>
                                </li>
                            </ul>
                        </li>--}}

                        {{--<li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Users
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/clientinfo" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Clients Information</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/clientexpenses" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Client Expenses</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/clientspayment" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Clients Payment</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/addingpackage" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Adding Package to Client</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/terminateclient" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Terminate Client</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Organizational Transaction
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/organizationalexpenses" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Organizational Expenses</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/donationamount" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Donation Amount</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Admin Setup
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/packagesetup" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Setup Packages</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/expensestypesetup" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Setup Expenses Type</p>
                                    </a>
                                </li>
                            </ul>
                        </li>--}}
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
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.3
            </div>
        </footer>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
</div>
<script>
    /*$.widget.bridge('uibutton', $.ui.button)*/
</script>

@yield('scripts')
</body>
</html>
