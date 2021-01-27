<template>
    <div class="">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-sm-12">
                <el-card class="box-card">
                    <div slot="header" class="">
                        <h2><u>Vendor Setup</u></h2>
                    </div>
                    <el-form :model="vendorForm" :rules="vendorRules" ref="vendorForm" :label-position="labelPosition"
                             class="demo-productForm">

                        <div class="row">
                            <div class="col-md-8">
                                <el-form-item label="Vendor Name" prop="vendorName">
                                    <el-input placeholder="Place Vendor Name" v-model="vendorForm.vendorName"
                                              style="width: 100%">
                                    </el-input>
                                </el-form-item>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <el-form-item label="Vendor Email" prop="vendorEmail">
                                    <el-input placeholder="Place Vendor Email" v-model="vendorForm.vendorEmail"
                                              style="width: 100%">
                                    </el-input>
                                </el-form-item>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <el-form-item label="Vendor Address" prop="vendorAddress">
                                    <el-input placeholder="Place Vendor Address" v-model="vendorForm.vendorAddress"
                                              style="width: 100%">
                                    </el-input>
                                </el-form-item>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <el-form-item label="Vendor Contact" prop="vendorContact">
                                    <el-input placeholder="Place Vendor Contact" v-model="vendorForm.vendorContact"
                                              style="width: 100%">
                                    </el-input>
                                </el-form-item>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <el-form-item class="mt-4">
                                    <el-button type="primary"
                                               @click="saveVendor('vendorForm')">Save
                                    </el-button>
                                </el-form-item>
                            </div>

                        </div>
                    </el-form>
                </el-card>
            </div>


            <!--Table-->

            <div class="col-md-10 col-sm-12  mt-5 mt-md-5">
                <h3 class="text-center"><u>Table Details</u></h3>
                <el-card class="box-card">
                    <el-table :data="tableData.filter(data => !search || data.title.toLowerCase().includes(search.toLowerCase())
                    || data.date.includes(search))" border max-height="470" style="width: 100%">
                        <el-table-column prop="vendor_name" label="Vendor Name">
                        </el-table-column>
                        <el-table-column prop="email" label="Vendor Email">
                        </el-table-column>
                        <el-table-column prop="address" label="Vendor Address">
                        </el-table-column>
                        <el-table-column prop="contact" label="Vendor Contact">
                        </el-table-column>
                        <el-table-column fixed="right" width="140" align="right">
                            <template slot="header" slot-scope="scope">
                                <el-input v-model="search" size="mini" placeholder="Type to search"/>
                            </template>
                            <template slot-scope="scope">
                                <!--<el-button type="primary"
                                           size="mini"
                                           icon="fas fa-edit"
                                           @click="dialogFormVisible = true">
                                </el-button>-->
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#VendorEditModal" @click="editVendor(scope.row.id)"><i
                                    class="fas fa-edit"></i></button>
                                <el-button size="mini" type="danger" icon="fas fa-trash"
                                           @click="deleteVendor(scope.row.id)">
                                </el-button>
                            </template>
                        </el-table-column>
                    </el-table>
                </el-card>
            </div>
        </div>


        <!--Vendor Edit Dialog-->
        <div id="VendorEditModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Vendor Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" v-for="vendor in vendorFormEdit">
                        <el-form :model="vendorFormEdit[0]" ref="vendorFormEdit"
                                 :label-position="labelPosition" class="demo-categoryForm">
                            <div class="row">
                                <div class="col-md-8">
                                    <el-form-item label="Vendor Name" prop="vendor_name">
                                        <el-input placeholder="Place Vendor Name" v-model="vendor.vendor_name"
                                                  style="width: 100%">
                                        </el-input>
                                    </el-form-item>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <el-form-item label="Vendor Email" prop="email">
                                        <el-input placeholder="Place Vendor Email" v-model="vendor.email"
                                                  style="width: 100%">
                                        </el-input>
                                    </el-form-item>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <el-form-item label="Vendor Address" prop="address">
                                        <el-input placeholder="Place Vendor Address" v-model="vendor.address"
                                                  style="width: 100%">
                                        </el-input>
                                    </el-form-item>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <el-form-item label="Vendor Contact" prop="contact">
                                        <el-input placeholder="Place Vendor Contact" v-model="vendor.contact"
                                                  style="width: 100%">
                                        </el-input>
                                    </el-form-item>
                                </div>
                            </div>

                            <el-form-item class="mt-4">
                                <el-button type="warning"
                                           @click="saveEditVendor('vendorFormEdit')">Update
                                </el-button>
                            </el-form-item>
                        </el-form>
                    </div>
                </div>

            </div>
        </div>
        <!-- Modal -->


    </div>
</template>

<script>

    export default {
        name: "vendorSetupComponent",

        data() {
            return {
                labelPosition: 'top',

                /*Table Data's*/
                tableData: [],
                search: '',

                vendorForm: {
                    vendorName: '',
                    vendorEmail: '',
                    vendorAddress: '',
                    vendorContact: '',
                },
                vendorFormEdit: {
                    vendor_name: '',
                    email: '',
                    address: '',
                    contact: '',
                },
                vendorRules: {
                    vendorName: [
                        {required: true, message: 'Please input Vendor name', trigger: 'blur'},
                    ],
                    vendorEmail: [
                        {required: true, message: 'Please input Vendor email', trigger: 'blur'},
                        {type: 'email', message: 'Please input correct email address', trigger: ['blur', 'change']},
                    ],
                    vendorAddress: [
                        {required: true, message: 'Please input Vendor Address', trigger: 'blur'},
                    ],
                    vendorContact: [
                        {required: true, message: 'Please input Vendor Contact', trigger: 'blur'},
                    ],
                },
            }
        },
        methods: {
            fetchData() {
                axios.get('/api/vendor', {})
                    .then(response => {
                        this.tableData = response.data.vendors;
                    });
            },
            editVendor(id) {
                this.vendorFormEdit = this.tableData.filter(tableData => tableData.id == id);
                console.log(this.vendorFormEdit);

            },
            saveEditVendor() {
                let formData = new FormData();
                console.log(this.vendorFormEdit[0]);
                formData.append('vendor_name', this.vendorFormEdit[0].vendor_name);
                formData.append('id', this.vendorFormEdit[0].id);
                formData.append('email', this.vendorFormEdit[0].email);
                formData.append('address', this.vendorFormEdit[0].address);
                formData.append('contact', this.vendorFormEdit[0].contact);

                axios.post('/api/update-vendor',formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }

                }).then(response => {
                    this.$notify({
                        title: 'Success',
                        message: response.data.message,
                        type: 'success'
                    });
                    this.fetchData();
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
            },
            deleteVendor(id) {
                this.$confirm('Are you sure to delete this item?')
                    .then(_ => {
                        axios.delete('/api/vendor/' + id)
                            .then(response => {
                                this.$notify({
                                    title: 'Success',
                                    message: response.data.message,
                                    type: 'info'
                                });
                                this.fetchData();
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
                    .catch(_ => {
                    });
            },
            /*file list */
            handleRemoveThumbnail(file, fileListThumbnail) {
                console.log(file, fileListThumbnail);
            },
            handlePreviewThumbnail(file) {
                console.log(file);
            },
            handleChangeThumbnail(file, fileListThumbnail) {
                this.fileListThumbnail = fileListThumbnail.slice(-1);
            },

            /*form*/
            saveVendor(formName) {
                this.$refs[formName].validate((valid) => {
                    //console.log(this.$refs.upload.uploadFiles);

                    if (valid) {
                        let formData = new FormData();

                        formData.append('vendor_name', this.vendorForm.vendorName);
                        formData.append('email', this.vendorForm.vendorEmail);
                        formData.append('address', this.vendorForm.vendorAddress);
                        formData.append('contact', this.vendorForm.vendorContact);


                        axios.post('/api/vendor', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }

                        }).then(response => {
                            this.$notify({
                                title: 'Success',
                                message: response.data.message,
                                type: 'success'
                            });
                            this.fetchData();
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
                    } else {
                        console.log('error submit!!');
                        return false;
                    }
                });
            },


        },

        mounted() {
            this.fetchData();
        }
    }

</script>

<style scoped>

</style>
