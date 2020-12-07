@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$countOrder}}</h3>

                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$countProduct}}<sup style="font-size: 20px"></sup></h3>

                        <p>Total Product</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$countUser}}</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <section class="col-md-8 connectedSortable">
                <!-- Orders Section -->
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Latest Orders</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0" style="max-height: 400px; overflow: hidden; display: block;">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Status</th>
                                    <th>User Name</th>
                                    <th>User Id</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orderlisted as $order)
                                    <tr>
                                        <td>{{$order->order_number}}</td>
                                        <td><span class="badge badge-success">{{$order->order_status}}</span>
                                        </td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                {{$order->first_name }} {{$order->last_name}}
                                            </div>
                                        </td>
                                        <td>{{$order->registered_user}}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix" style="display: block;">
                        <a href="/admin/order/orderdetails" class="btn btn-sm btn-secondary float-right">View All
                            Orders</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- Order Section Ends -->
            </section>
            <section class="col-md-4 connectedSortable">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recently Added Products</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0" style="max-height: 400px; overflow: hidden; display: block;">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            @foreach($recentProduct as $product)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="{{$product->image[0]->name}}" alt="Product Image" class="img-size-50">
                                    </div>
                                    <div class="product-info">
                                        <p href="#" class="product-title" style="margin-bottom: 0;">{{$product->product_name}}
                                            <span class="float-right">{{$product->price}}</span>
                                        </p>
                                        <span class="product-description">
                                            {{$product->category->category_name}}
                                        </span>
                                    </div>
                                </li>
                        @endforeach
                        <!-- /.item -->
                            <!-- /.item -->
                        </ul>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <a href="/admin/addproduct/products" class="uppercase">View All Products</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </section>
        </div>
    </div>

@stop
