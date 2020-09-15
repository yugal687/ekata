@extends('layouts.usermaster')

@section('style')
    <style>
        #allProductsModal .modal-body, #allOrdersModal .modal-body {
            height: 350px;
            overflow-y: scroll;
            margin: 20px;
        }
    </style>
@stop

@section('content')
    <div class="container-fluid">
        <!--- Summary -->
        <div class="row">
            <!-- /.col -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-lightblue">
                        <i class="fas fa-dollar-sign"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Amounts Paid</span>
                        <span class="info-box-number">@if(count($latestOrder))
                                {{$latestOrder[0]->order->total_price * count($latestOrder)}}
                        @else
                        0
                        @endif</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green">
                        <i class="fas fa-upload"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">Products Bought</span>
                        <span class="info-box-number">{{count($latestOrder)}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow">
                        <i class="fas fa-th-list text-white"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">Products On Order</span>
                        @if(count($latestOrder)>0)
                        <span class="info-box-number">{{count($latestOrder)}}</span>
                            @else
                            <span class="info-box-number">0</span>
                        @endif
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

        <div class="row d-flex justify-content-around">
            <!--Recently Bought Products-->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Products</h3>

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
                    <div class="card-body p-0" style="height: 280px; overflow: hidden;">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Item Name</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($latestOrder as $order)

                                    <tr>
                                        <td>
                                            <a>{{$order->order->order_number}}</a>
                                        </td>
                                        <td>{{$order->product->product_name}}</td>
                                        <td><span class="badge badge-warning">{{$order->order->order_status}}</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a"
                                                 data-height="20">{{$order->product->price}}</div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <a data-toggle="modal" data-target="#allProductsModal"
                           class="btn btn-sm btn-secondary text-white">View All Products</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
            <!--On Order Products -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    <!--- All Products Modal ---->
    <!-- Modal -->
    <div class="modal fade" id="allProductsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">All Bought Products</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Item Name</th>
                                <th>Status</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($latestOrder as $order)
                                <tr>
                                    <td>
                                        <a>{{$order->order->order_number}}</a>
                                    </td>
                                    <td>{{$order->product->product_name}}</td>
                                    <td><span class="badge badge-warning">{{$order->order->order_status}}</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a"
                                             data-height="20">{{$order->product->price}}</div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--- All Orders Modal ---->
    <!-- Modal -->
@stop
