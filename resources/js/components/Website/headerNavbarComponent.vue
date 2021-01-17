<template>
    <div class="">
        <div id="topNavbar">
            <nav class="navbar navbar-expand-md navbar-dark bg-main-primary">
                <a class="navbar-brand" href="#">
                </a>
                <div class="sm-user-checkout">
                    <a href="" class="user" id="droptrigger-sm">
                        <svg width="1.7em" height="1.7em" viewBox="0 0 16 16"
                             class="bi bi-person-bounding-box text-white mr-2 mt-1" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd"
                                  d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </a>
                    <div class="dropcontent-sm">
                        <ul class="list-group text-center" v-if="userDetail.role_id === 2">
                            <li class="list-group-item"><a href="/user/userdashboard">My
                                Account</a></li>
                            <li class="list-group-item"><a href="/">Logout</a></li>
                        </ul>
                        <ul class="list-group text-center" v-else-if="userDetail.role_id === 1">
                            <li class="list-group-item"><a href="/admin/dashboard">My
                                Account</a></li>
                            <li class="list-group-item"><a href="/">Logout</a></li>
                        </ul>
                        <ul class="list-group text-center" v-else>
                            <li class="list-group-item"><a href="/login">Sign In</a></li>
                            <li class="list-group-item"><a href="/register">Register</a>
                            </li>
                        </ul>
                    </div>
                    <a href="#" class="cart" data-toggle="modal" @click="openModal()" data-target="#cartModal">
                        <svg width="2em" height="2em" viewBox="0 0 16 16"
                             class="bi bi-cart4 text-white ml-2" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                        </svg>
                        <div class="cart-count rounded bg-main-secondary text-white"> {{ $store.state.cartCount }}</div>
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item px-2">
                            <a class="nav-link text-dark" href="/">Home <span
                                class="sr-only">(current)</span></a>
                        </li><li class="nav-item px-2">
                            <a class="nav-link text-dark" href="/products">All Products</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link text-dark" href="/services">Services</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link text-dark" href="/aboutus">About Us</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link text-dark" href="/events">Events</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link text-dark" href="/contact">Contact Us</a>
                        </li>
                    </ul>
                    <div class="nav-right container-mine lg-user-checkout">
                        <a href="#" class="user" id="droptrigger">
                            <svg width="1.7em" height="1.7em" viewBox="0 0 16 16"
                                 class="bi bi-person-bounding-box text-white mr-2 mt-1" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                                <path fill-rule="evenodd"
                                      d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </a>
                        <div class="dropcontent">
                            <ul class="list-group text-center" v-if="userDetail.role_id === 2">
                                <li class="list-group-item"><a href="/user/userdashboard">My
                                    Account</a></li>
                                <li class="list-group-item"><a href="/">Logout</a></li>
                            </ul>
                            <ul class="list-group text-center" v-else-if="userDetail.role_id === 1">
                                <li class="list-group-item"><a href="/admin/dashboard">My
                                    Account</a></li>
                                <li class="list-group-item"><a href="/">Logout</a></li>
                            </ul>
                            <ul class="list-group text-center" v-else>
                                <li class="list-group-item"><a href="/login">Sign In</a></li>
                                <li class="list-group-item"><a href="/register">Register</a>
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="cart" data-toggle="modal" @click="openModal()" data-target="#cartModal">
                            <svg width="2em" height="2em" viewBox="0 0 16 16"
                                 class="bi bi-cart4 text-white ml-2" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                            </svg>
                            <div class="cart-count rounded bg-main-secondary text-white">
                                {{ $store.state.cartCount }}
                            </div>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
export default {
    name: "headerNavbarComponent",
    data() {
        return {
            userDetail: {
                role_id: 0,
            }
        }
    },
    methods: {
        openModal() {
            this.$store.dispatch('fetchStoredProduct');
            this.$store.commit('totalPrice');
        }
    },
    mounted() {
        this.$store.getters.cartItemCount;
        axios.get('/api/getUser', {})
            .then(response => {
                if (response.data.userDetail) {
                    this.userDetail.role_id = response.data.userDetail.role_id;
                }
            });
    },
}
</script>K

<style scoped>
.dropcontent {
    visibility: hidden;
    width: 142px;
    position: absolute;
    right: 50px;
    top: 50px;
    z-index: 10002;
}
.dropcontent-sm {
    visibility: hidden;
    width: 142px;
    position: absolute;
    right: -10px;
    top: 35px;
    z-index: 10002;
}
.dropcontent li:hover, .dropcontent-sm li:hover {
    background: #dedbdb;
}
.dropcontent a, .dropcontent-sm a {
    color: #2b2b2b;
}
.open {
    visibility: visible;
}
.navbar-dark .navbar-toggler {
    color: rgba(255, 255, 255, 1);
    border-color: rgba(255, 255, 255, 0.6);
}
.navbar-toggler:active, .navbar-toggler:focus{
    outline: none;
}
</style>
