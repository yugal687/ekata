let store = {
    state: {
        product: [],
        cart: [],
        cartCount: 0,
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
        incCartItem(state) {
            return state.cartCount++;
        },

    },
    actions: {
        incrementCartItem(context) {
            context.commit('incCartItem');
        }

    },

    getters: {
        cartItemCount(state) {
            return state.cartCount = JSON.parse(localStorage.getItem('cart')).length;

        },

    },


}

export default store;
