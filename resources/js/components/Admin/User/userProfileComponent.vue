@extends('layouts.usermaster')

@section('content')
<template>
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-4">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <h2 class="font-weight-bold mb-3">{{userDetail.first_name}} {{userDetail.last_name}}</h2>

                        <div class=" mb-3">
                            <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                            <p class="text-muted">
                                {{userDetail.email}}
                            </p>

                            <hr>

                            <strong><i class="fas fa-phone mr-1"></i> Phone Number</strong>

                            <p class="text-muted">
                                {{userDetail.contact_number}}
                            </p>

                            <hr>

                            <strong><i class="fas fa-building mr-1"></i> Address</strong>
                            <p class="text-muted">
                                {{userDetail.address}}
                            </p>

                            <hr>

                            <strong><i class="fas fa-mail-bulk mr-1"></i> Postal Code</strong>
                            <p class="text-muted">
                                {{userDetail.postal_code}}
                            </p>

                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item "><a class="nav-link active" href="#updateprofile" data-toggle="tab">Update
                                Profile</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#updatepassowrd" data-toggle="tab">Update
                                Password</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">

                        <div class="tab-content">
                            <div class="tab-pane active" id="updateprofile">
                                <form class="form-horizontal">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="col-sm-12 col-form-label">First Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" v-model="userDetail.first_name"
                                                       placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-sm-12 col-form-label">Last Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" v-model="userDetail.last_name"
                                                       placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-12 col-form-label">Email</label>
                                            <div class="col-sm-12">
                                                <input type="email" class="form-control" v-model="userDetail.email"
                                                       placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-sm-12 col-form-label">Contact Number</label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control"
                                                       v-model="userDetail.contact_number"
                                                       placeholder="Contact Number">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-7">
                                            <label class="col-sm-12 col-form-label">Address</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" v-model="userDetail.address"
                                                       placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label
                                                class="col-sm-12 col-form-label">Suburb</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" v-model="userDetail.sub_urb"
                                                       placeholder="Suburb">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-7">
                                            <label class="col-sm-12 col-form-label">State</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" v-model="userDetail.state"
                                                       placeholder="State">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="col-sm-12 col-form-label">Postal Code</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" v-model="userDetail.postal_code"
                                                       placeholder="Postal Code">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class=" col-sm-12">
                                                <input type="button" value="Update" @click="UpdateProfile"
                                                       class="btn btn-warning">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="updatepassowrd">
                                <div v-if="errors" class="bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg">
                                    <div v-for="(v, k) in errors" :key="k">
                                        <p v-for="error in v" :key="error" class="text-sm">
                                            {{ error }}
                                        </p>
                                    </div>
                                </div>
                                <form class="form-horizontal">
                                    <div class="row d-flex justify-content-center">
                                        <div class="form-group col-md-8">
                                            <label class="col-sm-12 col-form-label">Current Password</label>
                                            <div class="col-sm-12">
                                                <input type="password" v-model="data.currentPassword" class="form-control"
                                                       placeholder="Current Password">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label class="col-sm-12 col-form-label">New Password</label>
                                            <div class="col-sm-12">
                                                <input type="password" v-model="data.newPassword" class="form-control"
                                                       placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label class="col-sm-12 col-form-label">Confirm Password</label>
                                            <div class="col-sm-12">
                                                <input type="password" v-model="data.confirmPassword" class="form-control"
                                                       placeholder="Confirm Password">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <div class=" col-sm-12">
                                                <input type="button" @click="updatePassword" value="Update" class="btn btn-warning">
                                                <a href="#" class="ml-2">Forget Password</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

</template>

<script>
    export default {
        name: "userProfileComponent",
        data() {
            return {
                userDetail: [],
                errors:null,
                data:[{
                    currentPassword:'',
                    newPassword:'',
                    confirmPassword:''
                }],

            }
        },
        mounted() {
           this.fetchUser();
        },
        methods: {
            fetchUser(){
                axios.get('/api/getUser', {})
                    .then(response => {
                        this.userDetail = response.data.userDetail;
                    });
            },
            updatePassword(){
                let formData = new FormData();
                formData.append('currentPassword', this.data.currentPassword);
                formData.append('newPassword', this.data.newPassword);
                formData.append('confirmPassword', this.data.confirmPassword);

                axios.post('/api/updatePassword', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }

                }).then(response => {
                    this.$notify({
                        title: 'Success',
                        message: response.data.message,
                        type: 'success'
                    });
                    this.fetchUser();
                    this.data=[];
                }).
                catch(error => {
                        this.errors = error.data.errors;
                    });
            },
            UpdateProfile() {
                let formData = new FormData();
                formData.append('userDetail', JSON.stringify(this.userDetail));
                axios.post('/api/saveEditProfile', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }

                }).then(response => {
                    this.$notify({
                        title: 'Success',
                        message: response.data.message,
                        type: 'success'
                    });
                    this.fetchUser();

                }).catch(error => {
                    if (error.response) {
                        this.$notify({
                            title: 'Error',
                            message: 'Error Input Data ',
                            type: 'error'
                        });
                        /*this.errors = error.response.data.errors;*/
                    }
                });
            }

        }
    }
</script>

<style scoped>

</style>
