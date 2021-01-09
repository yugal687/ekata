<template>
    <div class="row">
        <div class="col-md-8">
            <div id="single-item-carousel">
                <div id="sync1" class="owl-carousel owl-theme">
                    <div class="item" v-for="productImage in product[0].image" :key="productImage.id">
                        <img :src="productImage.name"
                             class="img-fluid" alt="">
                    </div>
                </div>

                <div id="sync2" class="owl-carousel owl-theme">
                    <div class="item" v-for="productImage in product[0].image" :key="productImage.id">
                        <img :src="productImage.name" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 pl-3">
            <div>
                <h4 class="font-weight-bold">{{product[0].product_name}} </h4>
                <h6>Category: <span class="font-weight-normal">{{product[0].category.category_name}}</span></h6>
                <h6>Availability: <span class="text-danger font-weight-normal">In Stock</span></h6>
            </div>
            <div class="pt-4">
                <h6>Price</h6>
                <h3 class="font-weight-bold text-danger">${{checkedPrice}}</h3>
                <h6 class="mt-3">Description</h6>
                <h6 class="text-justify description-text">{{product[0].additional_information}}</h6>

            </div>
            <div class="pt-4">
                <h6>Quantity</h6>
                <div class="row">
                    <div class="col-8">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <button @click="decrementQuantity()" class="btn bg-main-secondary text-white font-weight-bold">&nbsp; - &nbsp;</button>
                            </span>
                                <input class="form-control text-center"  @keyup="incDecQuantity()" v-model="quantity">
                            <span class="input-group-append">
                                <button @click="incrementQuantity()" class="btn bg-main-secondary text-white font-weight-bold">&nbsp; + &nbsp;</button>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="pt-4">
                <div class="row">
                    <div class="col-8">
                        <button type="button"
                                @click="addToCart()"
                                class="btn btn-large
                                         bg-main-primary
                                         border
                                          text-white px-5 mt-2 d-block" style="background-color:  #94943a">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
            <!--<div class="pt-5 pl-5">
                <div class="row align-items-center">
                    <h6 class="single-item-share">
                        Share:
                        <span>
                                            <a href="#">
                                                <i class="fab fa-facebook-f fa-2x px-2"></i>
                                            </a>
                                        </span>
                        <span>
                                            <a href="#">
                                                <i class="fab fa-instagram fa-2x px-2"></i>
                                            </a>
                                        </span>
                        <span>
                                            <a href="#">
                                                <i class="fab fa-twitter fa-2x px-2"></i>
                                            </a>
                                        </span>
                    </h6>
                </div>
            </div>-->

        </div>
    </div>

</template>

<script>
    export default {
        name: "singleProductComponent",
        props: ['product'],
        data() {
            return {
                cart: [],
                quantity: 1,
                price: 0,
                cartItemCount: 0,
                checkedPrice: this.checkPrice(),
            }
        },
        methods: {
            removeProduct() {
                return false;
            },
            addToCart() {
                let cart = {
                    'product_id': this.product[0].id,
                    'quantity': this.quantity,
                    'price': this.checkedPrice,
                    'product_image': this.product[0].image[0].name,
                    'product_name': this.product[0].product_name,
                };
                if (this.quantity < 1) {
                    this.quantity = 1;
                    this.checkedPrice = this.checkPrice();
                    this.$notify({
                        title: 'Error',
                        message: 'Sorry! you need to select at least 1',
                        type: 'error'
                    });
                    return false;
                }

                let storedCart = JSON.parse(localStorage.getItem('cart'));
                this.$store.commit('addToCart', cart);
                this.$notify({
                    title: 'Success',
                    message: 'This item is added to cart.',
                    type: 'success'
                });
            },
            totalPrice() {
                this.checkPrice();
//                alert(this.quantity);

                return this.checkedPrice = (this.quantity * this.checkedPrice).toFixed(2);
            },

            incrementQuantity() {
                this.quantity++;
                if (!this.product[0].quantity > 0) {
                    this.$notify({
                        title: 'Info',
                        message: 'Sorry! this product is out of stock',
                        type: 'info'
                    });
                    return false;
                }
                return this.totalPrice();

            },
            decrementQuantity() {
                this.quantity--;
                if (this.quantity < 1) {
                    this.quantity++;
                    this.$notify({
                        title: 'Error',
                        message: 'Sorry! you need to select at least 1',
                        type: 'error'
                    });
                    return false;
                }
                this.totalPrice();
            },
            incDecQuantity() {
                this.totalPrice();
            },

            getLocalStorageItem() {
                return JSON.parse(localStorage.getItem('cart'));
            },
            checkPrice() {
                if (this.product[0].sale_price) {
                    return this.checkedPrice = this.product[0].sale_price;
                } else {
                    return this.checkedPrice = this.product[0].price;
                }
            }
        },

        mounted() {
            // console.log(this.product);
            this.$store.commit('setProduct', this.product);

        }

    }
</script>

<style scoped>
    h6{
        font-weight: bold;
    }
    h6.description-text{
        font-weight: normal;
    }
</style>
