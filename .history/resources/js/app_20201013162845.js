/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';

import ElementUI from 'element-ui';
import locale from 'element-ui/lib/locale/lang/en'
Vue.use(ElementUI, { locale });


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
import Vuex from 'vuex';

Vue.use(Vuex);


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('user-component', require('./components/Admin/User/userComponent.vue').default);
Vue.component('user-profile-component', require('./components/Admin/User/userProfileComponent.vue').default);
Vue.component('customer-component', require('./components/Admin/Customer/customerComponent.vue').default);
/*Setup*/
Vue.component('category-subcategory-setup-component', require('./components/Admin/Setup/setupComponent.vue').default);
Vue.component('brands-setup-component', require('./components/Admin/Setup/brandSetupComponent.vue').default);
Vue.component('tags-setup-component', require('./components/Admin/Setup/tagsSetupComponent.vue').default);
/*Products*/
Vue.component('add-product-component', require('./components/Admin/Add_Product/createproductComponent.vue').default);
Vue.component('product-component', require('./components/Admin/Add_Product/productsComponent.vue').default);
/*Vue.component('add-product-component', require('./components/Admin/Add_Product/addProductComponent.vue').default);*/
Vue.component('products-component', require('./components/Admin/Add_Product/productsComponent.vue').default);
Vue.component('add-discount-component', require('./components/Admin/Add_Product/addDiscountComponent.vue').default);
/*Orders*/
Vue.component('order-details-component', require('./components/Admin/Order/orderDetailsComponent.vue').default);
Vue.component('banner-image-component', require('./components/Admin/Banner_Image/bannerImageComponent.vue').default);
/*Website_Update*/
Vue.component('website-info-component', require('./components/Admin/Website Update/websiteInfoComponent.vue').default);
Vue.component('enquiries-component', require('./components/Admin/Website Update/enquiriesComponent.vue').default);
Vue.component('reviews-carousel-component', require('./components/Admin/Website Update/reviewsCarouselComponent.vue').default);
Vue.component('customers-feedback-component', require('./components/Admin/Website Update/customersFeedbackComponent.vue').default);
/*Services Pages*/
Vue.component('services-component', require('./components/Admin/Services/serviceComponent.vue').default);


/*Website Pages*/
Vue.component('single-product-component', require('./components/Website/singleProductComponent.vue').default);
Vue.component('cart-items-component', require('./components/Website/cartItemsComponent.vue').default);
Vue.component('billing-component', require('./components/Website/billingsComponent.vue').default);
Vue.component('header-navbar-component', require('./components/Website/headerNavbarComponent.vue').default);

// Postal Code and Payment Credential
Vue.component('postal-code-component', require('./components/Admin/Postal_Payment/postalCodeComponent.vue').default);
Vue.component('payment-credential-component', require('./components/Admin/Postal_Payment/paymentCredentialComponent.vue').default);


import storeData from './store/store';

const store = new Vuex.Store(
    storeData
);


const app = new Vue({
    el: '#app',
    store,
});
