<template>
    <div class="">
        <main>
            <div class="card">
                <div class="card-header">
                    <div class="row float-right pr-4">
                        <a class="btn btn-primary mx-2" href="/adminregister">
                            <i class="fas fa-user-plus"></i> Add User
                        </a>
                        <!--<a class="btn btn-primary mx-2" href="/login">
                            <i class="fas fa-user"></i> User Sign In
                        </a>-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div v-for="userDetail in userDetails" class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                    User Profile
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b>{{ userDetail.first_name }} &nbsp; {{userDetail.last_name}}</b></h2>
                                            <!--<p class="text-muted text-sm"><b>Email: </b> {{ userDetail.email }} </p>-->
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small mt-2">
                                                    <span class="fa-li">
                                                        <i class="fas fa-lg fa-envelope"></i>
                                                    </span>
                                                    Email: {{ userDetail.email }}
                                                </li>
                                                <li class="small mt-2"><span class="fa-li">
                                            <i class="fas fa-lg fa-phone"></i></span>
                                                    Phone : {{ userDetail.contact_number }}
                                                </li>
                                                <li class="small mt-2"><span class="fa-li">
                                            <i class="fas fa-lg fa-building"></i></span>
                                                    Address: {{ userDetail.address }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img
                                                src="https://cdn1.vectorstock.com/i/1000x1000/66/60/avatar-business-man-graphic-vector-9646660.jpg"
                                                style="height: 100px; width: 100px" alt="" class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <button type="submit" @click="onDelete(userDetail.id)" class="btn btn-sm btn-primary">Delete User</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </main>
    </div>
</template>

<script>
    export default {
        name: "userComponent",
        components: {},
        data() {
            return {
                search: '',
                userDetails: []
            };
        },
        mounted() {
            axios.get('/allAdmins', {})
                .then(response => {
                    this.userDetails = response.data.allAdmins;
                });
        },
        methods:{
            onDelete(id){
                this.$confirm('Are you sure to delete this item?')
                    .then(_ => {
                        axios.delete('/api/deleteUser/' + id)
                            .then(response => {
                                this.$notify({
                                    title: 'Success',
                                    message: response.data.message,
                                    type: 'info'
                                });

                            }).catch(error => {
                            if (error.response) {
                                this.$notify({
                                    title: 'Error',
                                    message: 'Error Input Data ',
                                    type: 'error'
                                });
                            }
                        });
                    })
                .catch(_ => {});
            }
        }
    }
</script>

<style scoped>
    .time {
        font-size: 13px;
        color: #999;
    }

    .bottom {
        margin-top: 13px;
        line-height: 12px;
    }

    .button {
        padding: 0;
        float: right;
    }

    .image {
        width: 100%;
        display: block;
    }

    .clearfix:before,
    .clearfix:after {
        display: table;
        content: "";
    }

    .clearfix:after {
        clear: both
    }

    .lead {
        font-size: 1.125rem;
        font-weight: 300;
    }

    element.style {
        height: 120px;
        width: 120px;
    }
</style>
