<template>
    <div class="">
        <div class="container testing-section" style="">
            <div class="row mb-2">
                <div class="col-md-12">
                    <h1 class="text-center align-items-center justify-content-center"
                        style="font-family:'Times New Roman'">
                        Payment And Shipping</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <form action="" id="shipping-payment-form">
                        <div class="progress-wrap">
                            <div class="line-progress-bar">
                                <div class="line"></div>
                                <ul class="checkout-bar">
                                    <li class="progressbar-dots active"><span>step 1</span></li>
                                    <li class="progressbar-dots"><span>step 2</span></li>
                                    <li class="progressbar-dots"><span>step 3</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-content mt-4" id="main-form">
                            <div class="tab-pane" id="step1">
                                <h2 class="fs-title">Billing / Shipping Address</h2>
                                <h3 class="fs-subtitle">Please Fill Up Billing Address</h3>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="* First Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="* Last Name">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="* Address">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="* Suburb">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control" placeholder="* State">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="value" class="form-control" placeholder="* Postal Code ">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="email" class="form-control" placeholder="* E-mail">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="value" class="form-control" placeholder="* Contact Number">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-1">
                                        <input type="checkbox" id="toggleShippingAddress" class="form-check-input">
                                    </div>
                                    <div class="col-10 text-left">
                                        <label class="form-check-label" for="toggleShippingAddress">Check if shipping
                                            address is different than billing address</label>
                                    </div>
                                </div>
                                <div class="shipping-address-form mt-3">
                                    <h3 class="fs-subtitle">Please Fill Up Shipping Address</h3>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" id="firstname"
                                                   placeholder="* First Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" id="lastname"
                                                   placeholder="* Last Name">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control"
                                                   placeholder="* Address">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control"
                                                   placeholder="* Suburb ">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <input type="text" class="form-control" placeholder="* State">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="value" class="form-control"
                                                   placeholder="* Postal Code ">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <input type="email" class="form-control"
                                                   placeholder="* E-mail">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <input type="value" class="form-control"
                                                   placeholder="* Contact Number">
                                        </div>
                                    </div>
                                </div>

                                <input type="button" name="next" class="next action-button" value="Proceed to Payment"/>

                                <!--<input type="button" name="next" class="next-btn next-btn1" value="Next"/>-->

                            </div>
                            <div class="tab-pane" id="step2">
                                <h2 class="fs-title">Payment Information</h2>
                                <h3 class="fs-subtitle">Please Fill Up Payment Information</h3>
                                <div class="row mb-3">
                                    <div class="col-12 text-left">
                                        <button type="button" class="btn btn-primary" id="creditCard">Credit Card
                                        </button>
                                        <button type="button" class="btn btn-secondary" id="paypal">Paypal</button>
                                    </div>
                                </div>
                                <div class="creditCard" id="">
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <input type="number" class="form-control" id="cardNumber"
                                                           placeholder="1234 5678 9012 3456">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="date" class="form-control" id="expiryDate"
                                                           placeholder="MM/YY">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="number" class="form-control" id="cvccvv"
                                                           placeholder="CVC / CVV">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control" id="cardHolderName"
                                                           placeholder="Card Holder Name">
                                                </div>
                                            </div>
                                            <!-- <div class="row mt-3">
                                                 <input type="button" name="pay" class="pay action-button" value="Pay Now"/>
                                             </div>-->
                                        </div>
                                    </div>
                                </div>

                                <div class="paypal">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mt-3" id="paypal-button"></div>
                                        </div>
                                    </div>
                                </div>

                                <input type="button" name="previous" class="prev action-button-previous mt-5"
                                       value="Previous"/>
                                <input type="button" name="pay" class="pay action-button" value="Pay Now"/>
                                <!--<input type="button" name="next" class="next action-button" value="Next"/>-->
                            </div>
                            <div class="tab-pane" id="step3">
                                <h4 style="font-size: 18px"><i class="fas fa-check-circle text-success"
                                                               style="font-size: 22px"></i> Congratulations! Your order
                                    was successfully placed</h4>
                                <div class="order-items text-left mt-3 ml-5" style="border-bottom: 1px solid #2b2b2b40">
                                    <b>Order ID is <span class="text-main-primary"> 123456 </span></b> <br/>
                                    <b>Shipping Address</b><br/>
                                    <p>Address------- <br/>
                                        Suburb Name -----<br/>
                                        State ------<br/>
                                        Postal Code ------<br/>
                                        Contact Number ------</p>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-md-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 col-sm-12">
                            <h4 class="pt-5" style="font-family:'Times New Roman'; color: #00000070;">
                                PRODUCT DETAILS
                            </h4>
                            <hr/>
                            <div class="row pt-2">
                                <div class="col-md-6">
                                    <h6><strong>SUB-TOTAL</strong></h6>
                                </div>
                                <div class="col-md-4">
                                    <b>: $9.99</b>
                                </div>
                            </div>
                            <div class="row pt-1">
                                <div class="col-md-6">
                                    <h6><strong>DISCOUNT</strong></h6>
                                </div>
                                <div class="col-md-4">
                                    <b>: $0.99</b>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6><strong>ESTIMATED TOTAL</strong></h6>
                                </div>
                                <div class="col-md-4">
                                    <b>: $9.00</b>
                                </div>
                            </div>

                            <div class="row mt-5 orders">
                                <div class="col-md-12">
                                    <div>
                                        <h5><strong><u>Your Order Details</u></strong></h5>
                                        <ul class="px-3">
                                            <li class="my-3" >
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img style="width: 100%; height: auto"
                                                             src="/images/noodle.jpg">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h5>Item Name</h5>
                                                        <h6>Quantity: 1</h6>
                                                        <h6>Price: $1</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img style="width: 100%; height: auto"
                                                             src="/images/noodle.jpg">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h5>Item Name</h5>
                                                        <h6>Quantity: 1</h6>
                                                        <h6>Price: $1</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img style="width: 100%; height: auto"
                                                             src="/images/noodle.jpg">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h5>Item Name</h5>
                                                        <h6>Quantity: 1</h6>
                                                        <h6>Price: $1</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img style="width: 100%; height: auto"
                                                             src="/images/noodle.jpg">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h5>Item Name</h5>
                                                        <h6>Quantity: 1</h6>
                                                        <h6>Price: $1</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img style="width: 100%; height: auto"
                                                             src="/images/noodle.jpg">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h5>Item Name</h5>
                                                        <h6>Quantity: 1</h6>
                                                        <h6>Price: $1</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img style="width: 100%; height: auto"
                                                             src="/images/noodle.jpg">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h5>Item Name</h5>
                                                        <h6>Quantity: 1</h6>
                                                        <h6>Price: $1</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img style="width: 100%; height: auto"
                                                             src="/images/noodle.jpg">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h5>Item Name</h5>
                                                        <h6>Quantity: 1</h6>
                                                        <h6>Price: $1</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img style="width: 100%; height: auto"
                                                             src="/images/noodle.jpg">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h5>Item Name</h5>
                                                        <h6>Quantity: 1</h6>
                                                        <h6>Price: $1</h6>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</template>

<script>
    export default {
        name: "billingsComponent",
    }
</script>

<style scoped>
    .modal-body {
        padding: 0;
    }

    .modal-content, .modal-body, #login-card {
        max-width: 350px;
        border-radius: 25px;
        margin: auto;
    }

</style>
