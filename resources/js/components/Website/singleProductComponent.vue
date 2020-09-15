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
                <h6>Category: {{product[0].category.category_name}}</h6>
                <h6>Avilibility: <span class="text-danger">In Stock</span></h6>
            </div>
            <div class="pt-4">
                <h6>Price</h6>
                <h4 class="font-weight-bold text-danger">{{checkedPrice}}</h4>

            </div>
            <div class="pt-4">
                <h6>Quantity</h6>
                <div class="row">
                    <div class="col-8">
                        <div class="input-group input-group number-spinner">
				                                <span class="input-group-prepend">
					                                    <button class="btn bg-main-secondary text-white"
                                                                @click="decrementQuantity()"
                                                                data-dir="dwn">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                </span>
                            <input type="number"
                                   v-model="quantity"
                                   @keyup="incDecQuantity()"
                                   class="form-control text-center"
                            >
                            <span class="input-group-append">
                                                    <button class="btn bg-main-secondary text-white"
                                                            @click="incrementQuantity()"
                                                            data-dir="up">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
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
                                          text-white px-5 mt-2 d-block">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
            <div class="pt-5 pl-5">
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
            </div>

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
                checkedPrice: 0,
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

                let storedCart = JSON.parse(localStorage.getItem('cart'));
                this.$store.commit('addToCart', cart);
                /*alert('sucesfully added to cart');*/
                this.$notify({
                    title: 'Success',
                    message: 'This item is successfully added to cart',
                    type: 'success'
                });
            },
            totalPrice() {
                return this.checkedPrice = this.quantity * this.checkedPrice;
            },

            incrementQuantity() {
                if (!this.product[0].quantity > 0) {
                    alert('sorry! this product is out of stock');
                    return false;
                }
                this.quantity++;
                return this.totalPrice();

            },
            decrementQuantity() {
                this.quantity--;
                if (this.quantity < 1) {
                    this.quantity++;
                    alert('Sorry! you need to select at least 1');
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
        },

        mounted() {
// console.log(this.product);
            this.$store.commit('setProduct', this.product);
            if (this.product[0].sale_price) {
                return this.checkedPrice = this.product[0].sale_price;
            } else {
                return this.checkedPrice = this.product[0].price;
            }

        }

    }
</script>

<style scoped>

</style>
