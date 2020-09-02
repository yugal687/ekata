<template>
    <div class="">
        <div class="modal right fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="shopping-cart">
                        <div class="shopping-cart-header">
                            <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">3</span>
                            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--end shopping-cart-header -->

                        <ul class="shopping-cart-items">
                            <li class="clearfix">
                                <div class="row pb-2 align-items-center">
                                    <div class="col-4" style="overflow: hidden">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg"
                                             class="img-fluid" width="80px" height="100px"
                                             alt=""/>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <span class="item-name">Sony DSC-RX100M III</span>
                                        </div>
                                        <div class="row pb-1">
                                            <span class="item-price font-weight-bold">$849.99</span>
                                        </div>

                                        <!--<div class="row">
                                            <span class="item-quantity">Quantity:</span>
                                        </div>-->

                                        <div class="row pr-4">
                                            <div class="col-xs-3 col-xs-offset-3">
                                                <div class="input-group input-group-sm number-spinner">
				                                <span class="input-group-prepend">
					                                    <button class="btn bg-main-secondary text-white" data-dir="dwn">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                </span>
                                                    <input type="text" class="form-control text-center" value="1">
                                                    <span class="input-group-append">
                                                    <button class="btn bg-main-secondary text-white" data-dir="up">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
				                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <a href="#" class="">
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <li class="clearfix">
                                <div class="row pb-2 align-items-center">
                                    <div class="col-4" style="overflow: hidden">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg"
                                             class="img-fluid" width="80px" height="100px"
                                             alt=""/>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <span class="item-name">Sony DSC-RX100M III</span>
                                        </div>
                                        <div class="row pb-1">
                                            <span class="item-price font-weight-bold">$849.99</span>
                                        </div>
                                        <!--<div class="row">
                                            <span class="item-quantity">Quantity:</span>
                                        </div>-->
                                        <div class="row pr-4">
                                            <div class="col-xs-3 col-xs-offset-3">
                                                <div class="input-group input-group-sm number-spinner">
				                                <span class="input-group-prepend">
					                                    <button class="btn bg-main-secondary text-white" data-dir="dwn">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                </span>
                                                    <input type="text" class="form-control text-center" value="1">
                                                    <span class="input-group-append">
                                                    <button class="btn bg-main-secondary text-white" data-dir="up">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
				                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <a href="#" class="">
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <li class="clearfix">
                                <div class="row pb-2 align-items-center">
                                    <div class="col-4" style="overflow: hidden">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/cart-item1.jpg"
                                             class="img-fluid" width="80px" height="100px"
                                             alt=""/>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <span class="item-name">Sony DSC-RX100M III</span>
                                        </div>
                                        <div class="row pb-1">
                                            <span class="item-price font-weight-bold">$849.99</span>
                                        </div>

                                        <!--<div class="row">
                                            <span class="item-quantity">Quantity:</span>
                                        </div>-->

                                        <div class="row pr-4">
                                            <div class="col-xs-3 col-xs-offset-3">
                                                <div class="input-group input-group-sm number-spinner">
				                                <span class="input-group-prepend">
					                                    <button class="btn bg-main-secondary text-white" data-dir="dwn">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                </span>
                                                    <input type="text" class="form-control text-center" value="1">
                                                    <span class="input-group-append">
                                                    <button class="btn bg-main-secondary text-white" data-dir="up">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
				                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <a href="#" class="">
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div class="row">
                            <div class="col-12 text-right">
                                <span class="lighter-text">Total:</span>
                                <span class="main-color-text font-weight-bold">$2,229.97</span>
                            </div>
                        </div> <!--end shopping-cart-header -->


                        <a href="/billings" class="button">Checkout</a>
                    </div> <!--end shopping-cart -->
                </div> <!--end container -->
            </div><!-- modal-dialog -->
        </div><!-- modal -->
    </div>
</template>

<script>
    export default {
        name: "cartItemsComponent"
    }
</script>

<style scoped>

</style>
