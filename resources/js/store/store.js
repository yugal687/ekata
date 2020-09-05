let store = {
    state: {
        product: [],
        cart: [],
        cartCount: 0,
        storedLocalStorageProduct: [],
        totalPrice: 0,
    },

    mutations: {
        setProduct(state, product) {
            state.product = product
        },

        addToCart(state, cart) {
            state.cart.push(cart);
            let storedCart = JSON.parse(localStorage.getItem('cart'));
            if (storedCart) {
                let productId = state.product[0].id;
                let storedProduct = storedCart.find(cart => {
                    return cart.product_id == productId;
                });
                if (!storedProduct) {
                    storedCart.push(cart);
                    localStorage.setItem('cart', JSON.stringify(storedCart));
                    this.dispatch('incrementCartItem');
                    return false;
                }
                storedProduct.quantity = cart.quantity;
                storedProduct.price = cart.price;
                storedCart.forEach((val, key) => {
                    if (val.product_id == storedProduct.product_id) {
                        storedCart.splice(key, 1);
                    }
                });
                storedCart.push(storedProduct);
                localStorage.setItem('cart', JSON.stringify(storedCart));
                return false;
            }
            localStorage.setItem('cart', JSON.stringify(state.cart));
            this.dispatch('incrementCartItem');
        },
        totalPrice(state) {
            let product = this.commit('fetchStoredProduct');
            if (state.storedLocalStorageProduct) {
                return state.totalPrice = state.storedLocalStorageProduct.reduce((acc, val) => {
                    return acc + val.price;
                }, 0);
            }
            return false;

        },
        incCartItem(state) {
            return state.cartCount++;
        },
        decCartItem(state) {
            return state.cartCount--;
        },
        fetchStoredProduct(state) {
            state.storedLocalStorageProduct = JSON.parse(localStorage.getItem('cart'));
        },
    },


    actions: {
        incrementCartItem(context) {
            context.commit('incCartItem');
        },

        fetchStoredProduct(context) {
            context.commit('fetchStoredProduct')
        },
        totalPrice({commit}) {
            return commit('totalPrice');
        }
    },

    getters: {
        cartItemCount(state) {
            return state.cartCount = JSON.parse(localStorage.getItem('cart')).length;
        },
    },

}

export default store;
