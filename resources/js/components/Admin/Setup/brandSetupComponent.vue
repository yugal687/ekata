<template>
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row box-card-slide brand-div" style="border-top: 3px solid red">
                            <div class="row d-flex justify-content-center mt-3">
                                <div class="brandBtn btn btn-danger">Add Brand</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-12">
                                            <el-form :model="brandForm" :rules="brandRules" ref="brandForm"
                                                     :label-position="labelPosition" class="demo-brandForm">
                                                <el-form-item label="Brand Name" prop="name">
                                                    <el-input v-model="brandForm.name"
                                                              style="width: 100%;">
                                                    </el-input>
                                                </el-form-item>
                                                <el-form-item>
                                                    <el-button type="primary"
                                                               style="width: 80%; margin: 15px 10% 0"
                                                               @click="submitBrand('brandForm')">Create
                                                    </el-button>
                                                </el-form-item>
                                            </el-form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <el-card class="box-card" shadow="always">
                            <div class="text">
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <el-card class="box-card" shadow="hover">
                                            <div class="text item">
                                                <el-table
                                                    :data="getBrand.filter(data => !brandSearch || data.brand_name.toLowerCase().includes(brandSearch.toLowerCase()))"
                                                    border
                                                    max-height="470"
                                                    style="width: 100%">
                                                    <el-table-column
                                                        type="index"
                                                        label="S.N."
                                                        width="50">
                                                    </el-table-column>
                                                    <el-table-column
                                                        prop="brand_name"
                                                        label="Brand Name">
                                                    </el-table-column>
                                                    <el-table-column
                                                        fixed="right"
                                                        align="right">
                                                        <template slot="header" slot-scope="scope">
                                                            <el-input
                                                                v-model="brandSearch"
                                                                size="mini"
                                                                placeholder="Type to search"/>
                                                        </template>
                                                        <template slot-scope="scope">
                                                            <el-button type="primary"
                                                                       icon="el-icon-edit"
                                                                       size="mini"
                                                                       data-target=".bd-brand-modal-lg"
                                                                       data-toggle="modal"
                                                                       @click="editBrand(scope.row.id)"
                                                                       circle></el-button>
                                                            <el-button
                                                                size="mini"
                                                                type="danger"
                                                                icon="el-icon-delete"
                                                                @click="deleteBrand(scope.row.id)"
                                                                circle></el-button>
                                                        </template>
                                                    </el-table-column>
                                                </el-table>
                                            </div>
                                        </el-card>

                                    </div>
                                </div>
                            </div>
                        </el-card>
                    </div>
                </div>
                <div class="modal fade bd-brand-modal-lg" tabindex="-1" role="dialog"
                     aria-labelledby="myLargeModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                Edit Brand
                                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div v-if="edit" class="alert alert-success alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div v-for="ebrand in editBrands">

                                        <el-form :model="brandForm"
                                                 :label-position="labelPosition" class="demo-brandForm">
                                            <el-form-item label="Brand Name">
                                                <el-input v-model="ebrand.brand_name"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                            <el-form-item>
                                                <el-button type="primary"
                                                           style="width: 80%; margin: 15px 10% 0"
                                                           @click="saveEditBrand">Create
                                                </el-button>
                                            </el-form-item>
                                        </el-form>


                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "brandSetupComponent",
    data() {
        return {
            edit: false,
            getBrand: [],
            editBrands: [],
            labelPosition: 'top',
            brandForm: {
                name: '',
            },
            brandRules: {
                name: [
                    {required: true, message: 'Please input brand name', trigger: 'blur'},
                ]
            },
            /*Table Data's*/
            brandtableData: [{
                sn: 1,
                brandName: 'Tom'
            }, {
                sn: 2,
                brandName: 'Tom Cat'
            }],
            brandSearch: '',
        }
    },
    mounted() {
        this.getRequest();
    },
    methods: {
        getRequest() {
            axios.get('/api/getBrand', {})
                .then(response => {
                    this.getBrand = response.data.getBrand;
                });
        },
        editBrand(id) {
            this.editBrands = this.getBrand.filter(getBrand => getBrand.id == id);
        },
        saveEditBrand() {
            axios.post('/api/saveEditBrand', {
                editBrand: this.editBrands
            }).then(response => {
                this.$notify({
                    title: 'Success',
                    message: response.data.message,
                    type: 'success'
                });
                this.getRequest();
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
        deleteBrand(id) {
            this.$confirm('Are you sure to delete this item?')
                .then(_ => {
                    axios.delete('/api/deleteBrand/' + id)
                        .then(response => {
                            this.$notify({
                                title: 'Success',
                                message: response.data.message,
                                type: 'info'
                            });
                            this.getRequest();

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
                })
                .catch(_ => {
                });
        },
        submitBrand(brandForm) {
            this.$refs[brandForm].validate((valid) => {
                if (valid) {
                    let formdata = new FormData();
                    formdata.append('brand_name', this.brandForm.name);


                    axios.post('/api/postbrand', formdata, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }

                    }).then(response => {
                        this.$notify({
                            title: 'Success',
                            message: response.data.message,
                            type: 'success'
                        });
                        this.brandForm = {};
                        this.getRequest();

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
        handleEdit(index, row) {
            console.log(index, row);
        },
        handleDelete(index, row) {
            console.log(index, row);
        }
    }
}
</script>

<style scoped>
.container-fluid .row {
    margin-left: 0;
    margin-right: 0;
}

/*.hidden {
    display: none;
}*/

.box-card-slide {
    border: 1px solid #EBEEF5;
    background-color: #FFF;
    color: #303133;
    border-radius: 4px;
    overflow: hidden;
    box-shadow: 0 2px 12px 0 rgba(0, 0, 0, .1);
}

.box-card-slide .box-header {
    padding: 18px 20px;
    border-bottom: 1px solid #EBEEF5;
    box-sizing: border-box;
}

.box-card-slide .box-body {
    padding: 20px;
}
</style>
