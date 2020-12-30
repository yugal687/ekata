let store = {
    state: {
        product: [],
        cart: [],
        cartCount: 0,
        totalPrice: 0,
        storedLocalStorageProduct: [],
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
                console.log(state.storedLocalStorageProduct);
                 let totalPrice = state.storedLocalStorageProduct.reduce((acc, val) => {
                    return acc + parseFloat(val.price);
                }, 0);
                
            return state.totalPrice = totalPrice.toFixed(2);
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
        removeLocalStorageAndStateCartItems(state) {
            localStorage.removeItem('cart');
            state.cartCount = 0;
            state.totalPrice = 0;
        },
        removeCartItems(state, {productId}) {
            let storedCartItems = state.storedLocalStorageProduct;
            storedCartItems.forEach((val, key) => {
                if (val.product_id == productId) {
                    storedCartItems.splice(key, 1);
                }
            });
            state.cartCount--;
            localStorage.setItem('cart', JSON.stringify(storedCartItems));
            this.dispatch('totalPrice');
        }
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
        },
        removeCartItems({commit}) {
            return commit('removeLocalStorageAndStateCartItems');
        },
        removeSelectedCartItem({commit}, {productId}) {
            return commit('removeCartItems', {productId});

        }

    },

    getters: {
        cartItemCount(state) {
            let item = JSON.parse(localStorage.getItem('cart'));
            if (!item) {
                return state.cartCount = 0;
            }
            return state.cartCount = item.length;

        }
    },
}

export default store;
