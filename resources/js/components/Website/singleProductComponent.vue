<template>
    <div class="">
        <main class="p-5">
            <div class="row">
                <div class="col-md-8">
                    <div id="single-item-carousel">
                        <div id="sync1" class="owl-carousel owl-theme">
                            <div class="item" v-for="productImage in product[0].image"
                                 :key="productImage.id">
                                <img :src="productImage.name"
                                     class="img-fluid" alt="">
                            </div>
                            <!--<div class="item">
                                <img src="images/category/basmati_rice/Layer 5.png"
                                     class="img-fluid" alt="">
                            </div>
                            <div class="item">
                                <img
                                    src="images/category/basmati_rice/raw-basmati-rice-500x500.png"
                                    class="img-fluid" alt="">
                            </div>
                            -->

                        </div>

                        <!--<div id="sync2" class="owl-carousel owl-theme">
                            <div class="item">
                                <img src="images/category/basmati_rice/Basmati_rice.png" alt="">

                            </div>
                            <div class="item">
                                <img src="images/category/basmati_rice/Layer 5.png" alt="">
                            </div>
                            <div class="item">
                                <img
                                    src="images/category/basmati_rice/raw-basmati-rice-500x500.png"
                                    alt="">
                            </div>
                        </div>

                        -->

                    </div>
                </div>

                <div class="col-md-4 pl-3">
                    <div>
                        <h4 class="font-weight-bold">Devaya Riz Basmati Rice </h4>
                        <h6>Category: Dry Goods</h6>
                        <h6>Avilibility: <span class="text-danger">In Stock</span></h6>
                    </div>
                    <div class="pt-4">
                        <h6>Price</h6>
                        <h4 class="font-weight-bold text-danger">{{price}}</h4>
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
            <section id="special-section">
                <div class="container mt-5 pt-2">
                    <div class="row">
                        <div class="col-md-3">
                            <h4 class="text-center font-weight-bold">Recently Viewed Items</h4>
                        </div>

                        <div class="col-md-9">
                            <hr style="border-top: 1px solid">
                        </div>
                    </div>
                    <!-- <div class="container"> -->
                    <!-- <div class="special-content"> -->

                    <!-- first row -->
                    <div class="row m-0 p-0">
                        <!-- col-item-start -->
                        <div
                            class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                            <div
                                class="img-div bg-product-medium p-2 rounded-top-front rounded-bottom-front mx-auto bg-cate-sec">
                                <img src="" alt="">
                            </div>

                            <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                            <h5 class="best_name py-0 text-dark">Hello Product</h5>
                            <h5 class="best_weight py-0 text-dark">500 gm</h5>
                            <button type="button"
                                    class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                Add to Cart
                            </button>

                            <!-- col-item-end -->
                        </div>
                        <!-- col-item-start -->
                        <div
                            class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                            <div
                                class="img-div bg-product-medium p-2 rounded-top-front rounded-bottom-front bg-cate-sec mx-auto">
                                <img src="" alt="">
                            </div>

                            <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                            <h5 class="best_name py-0 text-dark">Hello Product</h5>
                            <h5 class="best_weight py-0 text-dark">500 gm</h5>
                            <button type="button"
                                    class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                Add to Cart
                            </button>

                            <!-- website footer -->
                            <!-- col-item-end -->
                        </div>
                        <!-- col-item-start -->
                        <div
                            class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                            <div
                                class="img-div bg-product-medium p-2 bg-cate-sec rounded-top-front rounded-bottom-front mx-auto">
                                <img src="" class="img-fluid"
                                     alt="">

                            </div>

                            <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                            <h5 class="best_name py-0 text-dark">Hello Product</h5>
                            <h5 class="best_weight py-0 text-dark">500 gm</h5>
                            <button type="button"
                                    class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                Add to Cart
                            </button>

                            <!-- col-item-end -->
                        </div>
                        <!-- col-item-start -->
                        <div
                            class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                            <div
                                class="img-div bg-product-medium bg-cate-sec p-2 rounded-top-front rounded-bottom-front mx-auto">
                                <img src="" alt="">
                            </div>

                            <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                            <h5 class="best_name py-0 text-dark">Hello Product</h5>
                            <h5 class="best_weight py-0 text-dark">500 gm</h5>
                            <button type="button"
                                    class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                Add to Cart
                            </button>

                            <!-- col-item-end -->
                        </div>
                    </div>
                    <!-- second row -->
                    <div class="row">
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4 class="text-center font-weight-bold">Recommended for you</h4>
                                </div>

                                <div class="col-md-9">
                                    <hr style="border-top: 1px solid">
                                </div>
                            </div>
                        </div>


                        <!-- col-item-start -->
                        <div
                            class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                            <div
                                class="img-div bg-product-medium p-2 bg-cate-sec rounded-top-front rounded-bottom-front mx-auto">
                                <img src="" alt="">
                            </div>

                            <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                            <h5 class="best_name py-0 text-dark">Hello Product</h5>
                            <h5 class="best_weight py-0 text-dark">500 gm</h5>
                            <button type="button"
                                    class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                Add to Cart
                            </button>

                            <!-- col-item-end -->
                        </div>
                        <!-- col-item-start -->
                        <div
                            class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                            <div
                                class="img-div bg-product-medium bg-cate-sec p-2 rounded-top-front rounded-bottom-front mx-auto">
                                <img src="" alt="">
                            </div>

                            <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                            <h5 class="best_name py-0 text-dark">Hello Product</h5>
                            <h5 class="best_weight py-0 text-dark">500 gm</h5>
                            <button type="button"
                                    class="btn bg-main-primary bg-cate-sec rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                Add to Cart
                            </button>

                            <!-- col-item-end -->
                        </div>
                        <!-- col-item-start -->
                        <div
                            class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                            <div
                                class="img-div bg-product-medium p-2 rounded-top-front rounded-bottom-front bg-cate-sec mx-auto">
                                <img src="" alt="">
                            </div>

                            <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                            <h5 class="best_name py-0 text-dark">Hello Product</h5>
                            <h5 class="best_weight py-0 text-dark">500 gm</h5>
                            <button type="button"
                                    class="btn bg-main-primary rounded-top-front rounded-bottom-front border text-white px-5 mt-2 d-block">
                                Add to Cart
                            </button>

                            <!-- col-item-end -->
                        </div>
                        <!-- col-item-start -->
                        <div
                            class="col-md-3 mt-5 pt-3 d-flex flex-column justify-centent-center align-items-center">
                            <div
                                class="img-div bg-product-medium p-2 bg-cate-sec rounded-top-front rounded-bottom-front bg-cate-sec mx-auto">
                                <img src="" alt="">
                            </div>

                            <h5 class="best_price font-weight-bold mt-3 text-main-primary">$10.99</h5>
                            <h5 class="best_name py-0 text-dark">Hello Product</h5>
                            <h5 class="best_weight py-0 text-dark">500 gm</h5>
                            <button type="button"
                                    class="btn bg-main-primary
                                     rounded-top-front
                                     rounded-bottom-front
                                     border
                                     text-white
                                     px-5 mt-2 d-block"
                            >
                                Add to Cart
                            </button>

                            <!-- col-item-end -->
                        </div>
                    </div>
                    <!-- second row -->
                </div>
            </section>
            <!-- special section ends here -->
        </main>
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
                    'price': this.price,
                    'product_image': this.product[0].image[0].name,
                    'product_name': this.product[0].product_name,
                };
                let storedCart = JSON.parse(localStorage.getItem('cart'));
                this.$store.commit('addToCart', cart);
            },
            totalPrice() {
                return this.price = this.quantity * this.product[0].price;
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
            this.price = this.product[0].price;
            this.$store.commit('setProduct', this.product);
        }

    }
</script>

<style scoped>

</style>
