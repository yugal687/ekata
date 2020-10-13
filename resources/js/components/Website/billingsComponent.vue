<template>
    <div class="container-fluid border-bottom">
        <div class="container testing-section" style="">
            <div class="row mb-2">
                <div class="col-md-12">
                    <h1 class="text-center align-items-center justify-content-center heading-font">
                        Payment And Shipping
                    </h1>
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
                                <div id="shp-address-form">
                                    <div class="billing-address-form">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control"
                                                       v-model="billingAddress.first_name"
                                                       placeholder="* First Name"
                                                       id="first_name_billing">
                                                <p id="p1_billing"></p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control"
                                                       v-model="billingAddress.last_name"
                                                       placeholder="* Last Name"
                                                       id="last_name_billing">
                                                <p id="p2_billing"></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control"
                                                       v-model="billingAddress.address"
                                                       placeholder="* Address"
                                                       id="address_billing">
                                                <p id="p3_billing"></p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control"
                                                       v-model="billingAddress.suburb"
                                                       name="sub_urb"
                                                       placeholder="* Suburb"
                                                       id="suburb_billing">
                                                <p id="p4_billing"></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <input type="text" class="form-control"
                                                       v-model="billingAddress.state"
                                                       name="state"
                                                       placeholder="NSW"
                                                       id="state_billing"
                                                       disabled>
                                                <p id="p8_billing"></p>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="value" class="form-control"
                                                       v-model="billingAddress.postal_code"
                                                       name="postal_code"
                                                       placeholder="* Postal Code"
                                                       id="postal_code_billing">
                                                <p id="p5_billing"></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <input type="email" class="form-control"
                                                       v-model="billingAddress.email"
                                                       name="email"
                                                       placeholder="* E-mail"
                                                       id="email_billing">
                                                <p id="p6_billing"></p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <input type="number" class="form-control" placeholder="* Contact Number"
                                                       name="contact_number"
                                                       v-model="billingAddress.contact_number"
                                                       id="contact_number_billing">
                                                <p id="p7_billing"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-1">
                                        <input type="checkbox" id="toggleShippingAddress" class="form-check-input">
                                    </div>
                                    <div class="col-10 text-left">
                                        <label class="form-check-label" for="toggleShippingAddress">Check if
                                            shipping
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
                                                   name="fname"
                                                   placeholder="* First Name">
                                            <div id="p1"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" id="lastname"
                                                   name="lname"
                                                   v-model="shippingAddress.last_name"

                                                   placeholder="* Last Name">
                                            <div id="p2"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control"
                                                   v-model="shippingAddress.address"
                                                   id="address"
                                                   placeholder="* Address">
                                            <div id="p3"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control"
                                                   v-model="shippingAddress.suburb"
                                                   id="suburb"
                                                   placeholder="* Suburb ">
                                            <div id="p4"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <input type="text" class="form-control"
                                                   v-model="NSW" placeholder="NSW"
                                                   id="state"
                                                   disabled>
                                            <div id="p8"></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="number" class="form-control"
                                                   v-model="shippingAddress.postal_code"
                                                   id="postal_code"
                                                   placeholder="* Postal Code ">
                                            <div id="p5"></div>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <input type="email" class="form-control"
                                                   v-model="shippingAddress.email"
                                                   id="email"
                                                   placeholder="* E-mail" required>
                                            <div id="p6"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <input type="number" class="form-control"
                                                   v-model="shippingAddress.contact_number"
                                                   id="contact_number"
                                                   placeholder="* Contact Number">
                                            <div id="p7"></div>
                                        </div>
                                    </div>
                                </div>
                                <input type="button" name="next" class="next action-button"
                                       value="Proceed to Payment"/>

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
                                        <div class="col-md-12 stripe-error-msg" v-if="errorMessage.length>0">
                                            {{ errorMessage }}
                                        </div>
                                        <div class="col-12">
                                            <div class="form-row">
                                                <div class=" col-md-12">
                                                    <label>Card Number</label>
                                                    <input class="form-control"
                                                           v-model="stripeCard.card_number"
                                                           id="cardNumber"
                                                           v-on:keyup="addSpace"
                                                           autocomplete="cc-number"
                                                           maxlength="19"
                                                           placeholder="1234 1234 1234 1234">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-8 padding-x-null-exp">
                                                    <input type="text" class="form-control"
                                                           v-model="stripeCard.expiry_date"
                                                           id="expiryDate"
                                                           v-on:keyup="addHyphen"
                                                           placeholder="MM / YY"
                                                           maxlength="7">
                                                    <p id="cardNumberError"></p>
                                                    <p id="expiryDateError"></p>
                                                </div>

                                                <div class="col-md-4  padding-x-null-cvv">
                                                    <input v-model="stripeCard.cvv"
                                                           class="form-control" id="cvccvv"
                                                           placeholder="CVC / CVV"
                                                           maxlength="3">
                                                    <p id="cvccvvError"></p>
                                                </div>
                                            </div>
                                            <div class="form-row mt-2">
                                                <label>Card Holder Name</label>
                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control" id="cardHolderName"
                                                           placeholder="Card Holder Name">
                                                    <p id="cardHolderNameError"></p>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <button type="button"
                                                        name="pay"
                                                        class="btn action-button text-white m-auto stripe-payment-btn"
                                                        @click="payUsingStripe()"
                                                        value="Pay Now">
                                                    Pay Now
                                                </button>
                                            </div>
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
                            </div>
                            <div class="tab-pane" id="step3">
                                <h4 style=""><i class="fas fa-check-circle text-success fa-4x"></i></h4>
                                <div class="order-items text-left mt-3 ml-5">
                                    <b>Order ID is <span class="text-main-primary">
                                        {{ successMessage.order_number }}
                                    </span></b> <br/>
                                    <b>Shipping Address</b><br/>
                                    <div class="row">
                                        <div class="col-6">Address:</div>
                                        <div class="col-6">{{ successMessage.address }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">Suburb Name:</div>
                                        <div class="col-6">{{ successMessage.suburb_name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">State:</div>
                                        <div class="col-6">{{ successMessage.state }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">Postal Code:</div>
                                        <div class="col-6">{{ successMessage.postal_code }}</div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-md-5 billings-info-section">
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-10 col-sm-12">
                                    <h5 class="pt-3 font-weight-bold text-gray" v-if="webDetail[0]">Need Help? Contact Us:
                                        <a :href="`tel:+${ webDetail[0].contact_number }`">{{webDetail[0].contact_number}}</a>
                                    </h5>
                                    <hr/>
                                    <div class="row pt-2">
                                        <div class="col-12">
                                            <h6><strong>TOTAL : &nbsp;{{ $store.state.totalPrice }}</strong></h6>
                                        </div>
                                    </div>

                                    <div class="row mt-4 orders">
                                        <div class="col-md-12">
                                            <div>
                                                <h5 class="font-weight-bold text-gray">Your Order Details</h5>
                                                <hr/>
                                                <ul class="px-2">
                                                    <li class="my-3"
                                                        v-for="product in $store.state.storedLocalStorageProduct">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img style="width: 100%; height: auto"
                                                                     :src="product.product_image">
                                                            </div>


                                                            <div class="col-md-8">
                                                                <h5 class="mb-2 font-weight-bold">{{ product.product_name }}</h5>
                                                                <h6><span class="font-weight-bold">Quantity: </span>{{ product.quantity }}</h6>
                                                                <h6 class=""><span class="font-weight-bold">Price: </span>{{ product.price }}</h6>
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
    data() {
        return {
            NSW: 'NSW',
            order_number: null,
            webDetail:[],
            discountPrice: 0,
            shippingAddress: {
                first_name: '',
                last_name: '',
                address: '',
                suburb: '',
                state: "NSW",
                postal_code: '',
                email: '',
                contact_number: ''
            },
            billingAddress: {
                first_name: '',
                last_name: '',
                address: '',
                suburb: '',
                state: "NSW",
                postal_code: '',
                email: '',
                contact_number: ''
            },
            stripeCard: {
                expiry_date: '',
                cvv: '',
                expiry_year: '',
                expiry_month: '',
                card_number: '',
            },
            successMessage: {
                message: '',
                order_number: '',
                address: '',
                suburb_name: '',
                postal_code: '',
            },
            errorMessage: '',

        }
    },
    mounted() {
        this.$store.dispatch('fetchStoredProduct');
        this.$store.dispatch('totalPrice');
        this.userDetails();

        const script = document.createElement("script");
        script.src =
            "https://www.paypal.com/sdk/js?client-id=AUEz_HH72HWnBgf481P4ohkEayRqi7VaCjfeJV89ESgkgDwVgKg2mJKChEoFG6QVaGKReMPd8A5nmRr3&currency=AUD&disable-funding=credit,card";
        script.addEventListener("load", this.setLoaded);
        document.body.appendChild(script);
        axios.get('/api/getWebsiteDetail').then(response=>{
           this.webDetail= response.data.WebsiteDetail
        });
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
                if (resp.data.successMsg) {
                    this.$store.dispatch('removeCartItems');
                    this.successMessage.message = resp.data.msg;
                    this.successMessage.order_number = resp.data.invoice_id;
                    this.successMessage.address = resp.data.address;
                    this.successMessage.state = resp.data.state;
                    this.successMessage.suburb_name = resp.data.suburb;
                    this.successMessage.postal_code = resp.data.postal_code;
                    $(".tab-pane").hide();
                    $("#step3").fadeIn(1000);
                    $('.progressbar-dots').removeClass('active');
                    $('.progressbar-dots:nth-child(3)').addClass('active');
                }
                if (resp.data.errorMsg) {
                    this.errorMessage = resp.data.errorMsg;
                }

            });
        },
        userDetails() {
            axios.post('api/userBillingDetails').then(resp => {
                let userBillingAddress = resp.data.userBillingDetails;
                this.billingAddress.first_name = userBillingAddress.first_name;
                this.billingAddress.last_name = userBillingAddress.last_name;
                this.billingAddress.address = userBillingAddress.address;
                this.billingAddress.suburb = userBillingAddress.suburb;
                this.billingAddress.state = "NSW";
                this.billingAddress.postal_code = userBillingAddress.postal_code;
                this.billingAddress.email = userBillingAddress.email;
                this.billingAddress.contact_number = userBillingAddress.contact_number;
            }).catch(err => {
            });
        },

        submitOrderItems() {
            return false;
        },
        addSpace(event) {
            let ele = this.stripeCard.card_number;
            ele = ele.split(' ').join('');
            let finalVal1 = ele.match(/.{1,4}/g).join(' ');
            this.stripeCard.card_number = finalVal1;
        },
        addHyphen(event) {
            let ele = this.stripeCard.expiry_date;
            ele = ele.split(' / ').join('');
            let finalVal = ele.match(/.{1,2}/gi).join(' / ');
            this.stripeCard.expiry_date = finalVal;
        },

        //stripeCheckOut
        payUsingStripe() {
            var cardNumber = $("#cardNumber").val();
            var expiryDate = $("#expiryDate").val();
            var cvccvv = $("#cvccvv").val();
            var cardHolderName = $("#cardHolderName").val();
            $('input').on("keypress", function () {
                if (cardNumber.length !== null) {
                    $("#cardNumberError").text("");
                }
                if (expiryDate.length !== null) {
                    $("#expiryDateError").text("");
                }
                if (cvccvv.length !== null) {
                    $("#cvccvvError").text("");
                }
                if (cardHolderName.length !== null) {
                    $("#cardHolderNameError").text("");
                }
            });

            if (cardNumber.length == "") {
                $("#cardNumberError").text("Please fill up your card number");
                $("#cardNumberError").focus();
                return false;
            }
            if (expiryDate.length == "") {
                $("#expiryDateError").text("Please fill up your expiry date");
                $("#expiryDateError").focus();
                return false;
            }
            if (cvccvv.length == "") {
                $("#cvccvvError").text("Please fill up your CVC / CVV number");
                $("#cvccvvError").focus();
                return false;
            }
            if (cardHolderName.length == "") {
                $("#cardHolderNameError").text("Please fill up your card holder name");
                $("#cardHolderNameError").focus();
                return false;
            }
            this.errorMessage = '';
            //get expiry year month stored on expiry_year && change the card detail;
            let expiryYearDate = this.stripeCard.expiry_date.split(' / ')
            console.log(expiryYearDate);
            this.stripeCard.card_number = this.stripeCard.card_number.split(' ').join('');
            console.log(this.stripeCard.card_number);
            this.stripeCard.expiry_month = expiryYearDate[0];
            this.stripeCard.expiry_year = expiryYearDate[1];
            axios.post('api/stripeCheckOut', {
                'orderItems': JSON.parse(localStorage.getItem('cart')),
                'card': this.stripeCard,
                'totalPrice': this.$store.state.totalPrice,
                'shippingAddress': this.shippingAddress,
                'billingAddress': this.billingAddress,
            }).then(resp => {
                if (resp.data.error) {
                    this.errorMessage = resp.data.error.message;
                    console.log(this.errorMessage);
                } else if (resp.data.msg) {
                    this.$store.dispatch('removeCartItems');
                    this.successMessage.order_number = resp.data.invoice_id;
                    this.successMessage.address = resp.data.address;
                    this.successMessage.suburb_name = resp.data.suburb;
                    this.successMessage.postal_code = resp.data.postal_code;
                    this.successMessage.state = resp.data.state;
                    $(".tab-pane").hide();
                    $("#step3").fadeIn(1000);
                    $('.progressbar-dots').removeClass('active');
                    $('.progressbar-dots:nth-child(3)').addClass('active');
                }
            }).catch(err => {
            });
        }
        ,
    }
    ,

    computed: {
        granTotal() {
            return this.$store.state.totalPrice;
        }
    }
    ,

}
</script>

<style scoped>
hr {
    margin-top: 0.3rem;
}

#p1, #p2, #p3, #p4, #p5, #p6, #p7, #p1_billing, #p2_billing, #p3_billing, #p4_billing, #p5_billing, #p6_billing, #p7_billing, #cardNumberError, #expiryDateError, #expiryMonthError, #cvccvvError, #cardHolderNameError {
    font-family: 'Lato', sans-serif;
    font-size: 12px;
    color: #FF0000;
    margin-bottom: 0;
    float: left;
}

.error {
    color: red;
}

.stripe-error-msg {
    padding: 15px;
    background-color: #ffbaba;
    color: red;
    margin-bottom: 15px;
}

.creditCard input {
    border-radius: 5px;
}

.creditCard label {
    float: left;
}

input#cardNumber {
    border-top-right-radius: 8px;
    border-top-left-radius: 8px;
}

input#expiryDate {
    border-bottom-left-radius: 8px;
}

input#cvccvv {
    border-bottom-right-radius: 8px;
}

input#cardHolderName {
    border-radius: 8px;
}

.form-row > .padding-x-null-exp {
    padding-right: 0;
}

.form-row > .padding-x-null-cvv {
    padding-left: 0;
}

.billings-info-section {
    margin-top: 75px;
}
.orders img{
    border-radius: 4px;
}
</style>
