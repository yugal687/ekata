<template>
  <div class="">
    <div
      class="modal right fade"
      id="cartModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="cartModal"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="shopping-cart">
            <div class="shopping-cart-header">
              <i class="fa fa-shopping-cart cart-icon"></i
              ><span class="badge">
                {{ $store.state.cartCount }}
              </span>
              <button
                type="button"
                class="close text-danger"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!--end shopping-cart-header -->

            <ul class="shopping-cart-items">
              <li
                v-if="$store.state.storedLocalStorageProduct"
                class="clearfix"
                v-for="product in $store.state.storedLocalStorageProduct"
                :key="product.id"
              >
                <div class="row pb-2 align-items-center">
                  <div class="col-4" style="overflow: hidden">
                    <img
                      :src="product.product_image"
                      class="img-fluid"
                      width="80px"
                      height="100px"
                      alt=""
                    />
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <span class="item-name">{{ product.product_name }}</span>
                    </div>
                    <div class="row pb-1">
                      <span class="item-price font-weight-bold">{{
                        product.price
                      }}</span>
                    </div>
                    <div class="row pr-4">
                      <div class="col-xs-3 col-xs-offset-3">
                        <div class="form-group input-group-sm number-spinner">
                          <input
                            type="text"
                            class="form-control text-center"
                            disabled
                            :value="product.quantity"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-2">
                    <button
                      @click="removeProduct(product.product_id)"
                      class="btn btn-sm btn-danger"
                    >
                      <i class="fas fa-trash"></i>
                    </button>
                  </div>
                </div>
              </li>
              <span v-else>
                Your Cart is empty //make nice UX please front devs ;
              </span>
            </ul>
            <div class="row">
              <div class="col-12 text-right">
                <span class="lighter-text">Total:</span>
                <span class="main-color-text font-weight-bold">{{
                  $store.state.totalPrice
                }}</span>
              </div>
            </div>
            <!--end shopping-cart-header -->

            <a href="/billings" class="button" v-if="$store.state.cartCount > 0"
              >Checkout</a
            >
          </div>
          <!--end shopping-cart -->
        </div>
        <!--end container -->
      </div>
      <!-- modal-dialog -->
    </div>
    <!-- modal -->
  </div>
</template>

<script>
export default {
  name: "cartItemsComponent",
  //props: ['cartItemCount'],
  data() {
    return {
      product: [],
      cartItemCount: 0,
    };
  },
  methods: {
    countCartItem() {
      this.getLocalStorageItem().length;
    },
    removeProduct(productId) {
      this.$store.dispatch("removeSelectedCartItem", { productId: productId });
    },
  },
  computed: {
    cartItemsCount() {
      return this.$store.getters.cartItemCount();
    },
  },
};
</script>

<style scoped>
</style>
