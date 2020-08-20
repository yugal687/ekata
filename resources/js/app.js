/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';

import ElementUI from 'element-ui';
Vue.use(ElementUI);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-setup-component', require('./components/Admin/Setup/setupComponent.vue').default);
Vue.component('add-product-component', require('./components/Admin/Add_Product/createproductComponent.vue').default);
Vue.component('product-component', require('./components/Admin/Add_Product/productsComponent.vue').default);
/*Vue.component('add-product-component', require('./components/Admin/Add_Product/addProductComponent.vue').default);*/
Vue.component('products-component', require('./components/Admin/Add_Product/productsComponent.vue').default);
Vue.component('add-discount-component', require('./components/Admin/Add_Product/addDiscountComponent.vue').default);
Vue.component('order-details-component', require('./components/Admin/Order/orderDetailsComponent.vue').default);
Vue.component('shipping-details-component', require('./components/Admin/Order/shippingDetailsComponent.vue').default);
Vue.component('banner-image-component', require('./components/Admin/Banner_Image/bannerImageComponent.vue').default);
Vue.component('all-users-cart-details-component', require('./components/Admin/Cart/allUserCartDetailsComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
