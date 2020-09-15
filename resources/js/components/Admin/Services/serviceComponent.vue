<template>
    <div class="">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7 col-sm-12">
                <el-card class="box-card">
                    <div slot="header" class="">
                        Add Service
                    </div>
                    <div class="text">
                        <el-form :model="serviceForm" :rules="serviceFormRules" ref="serviceForm"
                                 :label-position="labelPosition" class="demo-categoryForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <el-form-item label="Service Title" prop="title">
                                        <el-input v-model="serviceForm.title"
                                                  style="width: 100%;">
                                        </el-input>
                                    </el-form-item>
                                </div>
                                <div class="col-md-6">
                                    <el-form-item label="Posted Period" prop="date">
                                        <el-date-picker
                                            v-model="serviceForm.date"
                                            type="date"
                                            placeholder="Pick a month">
                                        </el-date-picker>
                                    </el-form-item>
                                </div>
                            </div>
                            <el-form-item label="Service Description" prop="details">
                                <vue-editor v-model="serviceForm.details"></vue-editor>
                                <!--<div  v-model="serviceForm.details"></div>-->
                            </el-form-item>
                            <el-form-item class="mt-4">
                                <el-button type="primary"
                                           @click="saveService('serviceForm')">Save
                                </el-button>
                            </el-form-item>
                        </el-form>
                    </div>
                </el-card>
            </div>
            <div class="col-md-5 col-sm-12 mt-4 mt-md-0">
                <el-card class="box-card">
                    <el-table
                        :data="tableData.filter(data => !search || data.title.toLowerCase().includes(search.toLowerCase())
                    || data.date.includes(search))"
                        border
                        max-height="470"
                        style="width: 100%">
                        <el-table-column
                            prop="title"
                            label="Title">
                        </el-table-column>
                        <el-table-column
                            prop="date"
                            label="Posted Time">
                        </el-table-column>
                        <el-table-column
                            fixed="right"
                            width="140"
                            align="right">
                            <template slot="header" slot-scope="scope">
                                <el-input
                                    v-model="search"
                                    size="mini"
                                    placeholder="Type to search"/>
                            </template>
                            <template slot-scope="scope">
                                <!--<el-button type="primary"
                                           size="mini"
                                           icon="fas fa-edit"
                                           @click="dialogFormVisible = true">
                                </el-button>-->
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#serviceEditModal" @click="singleService(scope.row.id)"><i class="fas fa-edit"></i> </button>
                                <el-button
                                    size="mini"
                                    type="danger"
                                    icon="fas fa-trash"
                                    @click="deleteService(scope.row.id)">
                                </el-button>
                            </template>
                        </el-table-column>
                    </el-table>
                </el-card>
            </div>
        </div>


        <!--Services Edit Dialog-->
        <!-- Modal -->
        <div id="serviceEditModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" v-if="serviceEdit.length >0">
                        <el-form :model="serviceFormEdit" ref="serviceFormEdit"
                                 :label-position="labelPosition" class="demo-categoryForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <el-form-item label="Service Title">
                                        <el-input v-model="serviceEdit[0].title"
                                                  style="width: 100%;">
                                        </el-input>
                                    </el-form-item>
                                </div>
                                <div class="col-md-6">
                                    <el-form-item label="Posted Period">
                                        <el-date-picker
                                            v-model="serviceEdit[0].date"
                                            type="date"
                                            placeholder="Pick a month">
                                        </el-date-picker>
                                    </el-form-item>
                                </div>
                            </div>
                            <el-form-item label="Service Description" prop="details">
                                <vue-editor v-model="serviceEdit[0].details"></vue-editor>
                                <!--<div  v-model="serviceForm.details"></div>-->
                            </el-form-item>
                            <el-form-item class="mt-4">
                                <el-button type="warning"
                                           @click="updateService('serviceFormEdit')">Update
                                </el-button>
                            </el-form-item>
                        </el-form>
                    </div>
                </div>

            </div>
        </div>


    </div>
</template>

<script>
    import { VueEditor } from "vue2-editor";
    export default {
        name: "serviceComponent",
        components: {
            VueEditor
        },
        data() {
            return {
                labelPosition: 'top',
                date: '',
                dialogFormVisible: false,
                serviceForm: {
                    title: '',
                    date: '',
                    details: '',
                },
                serviceEdit: [],
                serviceFormEdit:{},
                serviceFormRules: {
                    title: [
                        {required: true, message: 'Please input title', trigger: 'blur'},
                    ],
                    date: [
                        {required: true, message: 'Please select date', trigger: 'blur'},
                    ]
                },
                /*Table Data's*/
                tableData: [],
                search: '',
            }
        },
        methods: {
            singleService(id){
                this.serviceEdit = this.tableData.filter(tableData => tableData.id == id);
            },
            saveService(formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        let formData = new FormData();
                        formData.append('title',this.serviceForm.title);
                        formData.append('date',this.serviceForm.date.toDateString());
                        formData.append('details',this.serviceForm.details);
                        axios.post('/api/saveService',formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }

                        }).then(response => {
                            this.$notify({
                                title: 'Success',
                                message: response.data.message,
                                type: 'success'
                            });
                            this.serviceForm={};
                            this.fetchService();

                        }).catch(error => {
                            if (error.response.status == 422) {
                                this.errors = error.response.data.errors;
                            }
                        });
                    } else {
                        console.log('error submit!!');
                        return false;
                    }
                });
            },
            updateService(formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        axios.patch('/api/saveEditService', {
                            editService: this.serviceEdit
                        }).then(response => {
                            this.$notify({
                                title: 'Success',
                                message: response.data.message,
                                type: 'success'
                            });
                            this.fetchService();

                        });
                    } else {
                        console.log('error submit!!');
                        return false;
                    }
                });
            },
            deleteService(id) {
                this.$confirm('Are you sure to delete this customer?')
                    .then(_ => {
                        axios.delete('/api/deleteService/' + id)
                            .then(response => {
                                this.$notify({
                                    title: 'Success',
                                    message: response.data.message,
                                    type: 'info'
                                });
                                this.fetchService();

                            });
                    })
                .catch(_ => {});
            },
            fetchService(){
                axios.get('/api/getService', {})
                    .then(response => {
                        this.tableData = response.data.service;
                    });
            }
        },

        mounted() {
            this.fetchService();
        }
    }
</script>

<style scoped>

</style>
