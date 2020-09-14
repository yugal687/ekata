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
                                        <input type="text" class="form-control"
                                               v-model="billingAddress.first_name"
                                               placeholder="* First Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control"
                                               v-model="billingAddress.last_name"

                                               placeholder="* Last Name">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control"
                                               v-model="billingAddress.address"

                                               placeholder="* Address">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control"
                                               v-model="billingAddress.suburb"

                                               placeholder="* Suburb">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <input type="text" class="form-control"
                                               v-model="billingAddress.state"

                                               placeholder="* State">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="value" class="form-control"
                                               v-model="billingAddress.postal_code"

                                               placeholder="* Postal Code ">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="email" class="form-control"
                                               v-model="billingAddress.email"
                                               placeholder="* E-mail">
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
                                            <input type="text"
                                                   v-model="shippingAddress.first_name"
                                                   class="form-control" id="firstname"
                                                   placeholder="* First Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" id="lastname"
                                                   v-model="shippingAddress.last_name"

                                                   placeholder="* Last Name">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control"
                                                   v-model="shippingAddress.address"

                                                   placeholder="* Address">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control"
                                                   v-model="shippingAddress.suburb"

                                                   placeholder="* Suburb ">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <input type="text" class="form-control" placeholder="* State">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="value" class="form-control"
                                                   v-model="shippingAddress.state"

                                                   placeholder="* Postal Code ">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <input type="email" class="form-control"
                                                   v-model="shippingAddress.email"

                                                   placeholder="* E-mail">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <input type="value" class="form-control"
                                                   v-model="shippingAddress.contact_number"
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
                                        <button type="button" class="btn btn-secondary" id="paypalCard">Paypal</button>
                                    </div>
                                </div>
                                <div class="creditCard" id="">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <input type="number" class="form-control"
                                                           v-model="stripeCard.card_number"
                                                           id="cardNumber"
                                                           autocomplete="cc-number"
                                                           placeholder="1234 5678 9012 3456">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control"
                                                           v-model="stripeCard.expiry_year"

                                                           id="expiryDate"
                                                           placeholder="MM/YY">
                                                </div>
                                                <div class='col-md-6 col-md-4 form-group expiration required'>
                                                    <label class='control-label'>Expiration Month</label>
                                                    <input class='form-control card-expiry-month'
                                                           v-model="stripeCard.expiry_month" placeholder='MM'
                                                           type='text'>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <input type="number"
                                                           v-model="stripeCard.cvv"
                                                           class="form-control" id="cvccvv"
                                                           placeholder="CVC / CVV">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control" id="cardHolderName"
                                                           placeholder="Card Holder Name">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <button type="button"
                                                        name="pay"
                                                        class="btn btn-success"
                                                        @click="payUsingStripe()"
                                                        value="Pay Now">
                                                    Pay Using Stripe
                                                </button>
                                            </div>
                                            <!-- <div class="row mt-3">
                                                 <input type="button" name="pay" class="pay action-button" value="Pay Now"/>
                                             </div>-->
                                        </div>
                                    </div>
                                </div>

                                <div class="paypalCard">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="col-md-8 mx-auto" ref="paypalButton">
                                            </div>


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
                                    <b>Order ID is <span class="text-main-primary">
                                        {{successMessage.order_number}}
                                    </span></b> <br/>
                                    <b>Shipping Address</b><br/>
                                    <p>Address-------{{successMessage.address}} <br/>
                                        Suburb Name ----- {{successMessage.suburb_name}}<br/>
                                        State ------ {{successMessage.state}}<br/>
                                        Postal Code ------ {{successMessage.postal_code}}<br/>
                                    </p>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-8 col-sm-12">
                                    <h4 class="pt-5" style="font-family:'Times New Roman'; color: #00000070;">HELP?
                                        CONTACT
                                        US:12345678</h4>
                                    <hr/>
                                    <div class="row pt-2">
                                        <div class="col-md-6">
                                            <h6><strong>SUB-TOTAL</strong></h6>
                                        </div>
                                        <div class="col-md-4">
                                            <b>: {{$store.state.totalPrice}}</b>
                                        </div>
                                    </div>

                                    <div class="row pt-3">
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
                                            <b>: {{granTotal}}</b>
                                        </div>
                                    </div>

                                    <div class="row mt-5 orders">
                                        <div class="col-md-12">
                                            <div>
                                                <h5><strong><u>Your Order Details</u></strong></h5>
                                                <ul class="px-3">
                                                    <li class="my-3"
                                                        v-for="product in $store.state.storedLocalStorageProduct">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <!--   <img style="width: 100%; height: auto"
                                                                        :src="product.image"
                                                                        src="/images/noodle.jpg">-->
                                                                <img style="width: 100%; height: auto"
                                                                     src="/images/noodle.jpg">
                                                            </div>


                                                            <div class="col-md-8">
                                                                <h5>{{product.product_name}}</h5>
                                                                <h6>Quantity: {{product.quantity}}</h6>
                                                                <h6>Price: {{product.price}}</h6>
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
        </div>
    </div>
</template>

<script>
    export default {
        name: "billingsComponent",
        props: ['successmessage'],
        data() {
            return {
                order_number: null,
                discountPrice: 0,
                shippingAddress: {
                    first_name: '',
                    last_name: '',
                    address: '',
                    suburb: '',
                    state: '',
                    postal_code: '',
                    email: '',
                    contact_number: ''
                },
                billingAddress: {
                    first_name: '',
                    last_name: '',
                    address: '',
                    suburb: '',
                    state: '',
                    postal_code: '',
                    email: '',
                    contact_number: ''
                },
                stripeCard: {
                    cvv: '',
                    expiry_year: '',
                    expiry_month: '',
                    card_number: '',
                },
                successMessage: {
                    order_number: '',
                    address: '',
                    suburb_name: '',
                    postal_code: '',
                },

            }
        },
        mounted() {
            this.$store.dispatch('fetchStoredProduct');
            this.$store.dispatch('totalPrice');
            this.userDetails();

            const script = document.createElement("script");
            script.src =
                "https://www.paypal.com/sdk/js?client-id=AUEz_HH72HWnBgf481P4ohkEayRqi7VaCjfeJV89ESgkgDwVgKg2mJKChEoFG6QVaGKReMPd8A5nmRr3";
            script.addEventListener("load", this.setLoaded);
            document.body.appendChild(script);
        },

        methods: {
            setLoaded() {
                let totalPrice = this.$store.state.totalPrice;
                window.paypal.Buttons({
                    createOrder: (data, actions) => {
                        // This function sets up the details of the transaction, including the amount and line item details.
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: totalPrice,
                                }
                            }]
                        });
                    },
                    onApprove: async (data, actions) => {
                        const order = actions.order.capture();
                        this.paypalCheckOut();
                    }
                }).render(this.$refs.paypalButton);
            },

            paypalCheckOut() {
                axios.post('api/paypalCheckOut', {
                    'orderItems': JSON.parse(localStorage.getItem('cart')),
                    'totalPrice': this.$store.state.totalPrice,
                    'shippingAddress': this.shippingAddress,
                    'billingAddress': this.billingAddress,
                }).then(resp => {
                    this.$store.dispatch('removeCartItems');
                });
            },
            userDetails() {
                axios.post('api/userBillingDetails').then(resp => {
                    let userBillingAddress = resp.data.userBillingDetails;
                    this.billingAddress.first_name = userBillingAddress.first_name;
                    this.billingAddress.last_name = userBillingAddress.last_name;
                    this.billingAddress.address = userBillingAddress.address;
                    this.billingAddress.suburb = userBillingAddress.suburb;
                    this.billingAddress.state = userBillingAddress.state;
                    this.billingAddress.postal_code = userBillingAddress.postal_code;
                    this.billingAddress.email = userBillingAddress.email;
                    this.billingAddress.contact_number = userBillingAddress.contact_number;
                }).catch(err => {
                    console.log(err.resp.message)
                });
            },

            submitOrderItems() {
                return false;
            },

            clearCart() {

            },

            //stripeCheckOut
            payUsingStripe() {
                axios.post('api/stripeCheckOut', {
                    'orderItems': JSON.parse(localStorage.getItem('cart')),
                    'card': this.stripeCard,
                    'totalPrice': this.$store.state.totalPrice,
                    'shippingAddress': this.shippingAddress,
                    'billingAddress': this.billingAddress,
                }).then(resp => {
                    if (resp.data.msg) {
                        this.$store.dispatch('removeCartItems');
                        this.successMessage.order_number = resp.data.invoice_id;
                        this.successMessage.address = resp.data.address;
                        this.successMessage.suburb_name = resp.data.suburb;
                        this.successMessage.postal_code = resp.data.postal_code;

                        $(".tab-pane").hide();
                        $("#step3").fadeIn(1000);
                        $('.progressbar-dots').removeClass('active');
                        $('.progressbar-dots:nth-child(3)').addClass('active');
                    }

                }).catch(err => {


                });

            }
            ,
        },

        computed: {
            granTotal() {
                return this.$store.state.totalPrice;
            }
        }
        ,

    }
</script>

<style scoped>

</style>
