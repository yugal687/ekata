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
                                            type="month"
                                            placeholder="Pick a month">
                                        </el-date-picker>
                                    </el-form-item>
                                </div>
                            </div>
                            <el-form-item label="Service Description" prop="details">
                                <el-input v-model="serviceForm.details"
                                          id="summernote">
                                </el-input>
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
                    || data.postedMonth.includes(search))"
                        border
                        max-height="470"
                        style="width: 100%">
                        <el-table-column
                            prop="title"
                            label="Title">
                        </el-table-column>
                        <el-table-column
                            prop="postedMonth"
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
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#serviceEditModal"><i class="fas fa-edit"></i> </button>
                                <el-button
                                    size="mini"
                                    type="danger"
                                    icon="fas fa-trash"
                                    @click="handleDelete(scope.$index, scope.row)">
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
                    <div class="modal-body">
                        <el-form :model="serviceFormEdit" :rules="serviceFormEditRules" ref="serviceFormEdit"
                                 :label-position="labelPosition" class="demo-categoryForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <el-form-item label="Service Title" prop="title">
                                        <el-input v-model="serviceFormEdit.title"
                                                  style="width: 100%;">
                                        </el-input>
                                    </el-form-item>
                                </div>
                                <div class="col-md-6">
                                    <el-form-item label="Posted Period" prop="date">
                                        <el-date-picker
                                            v-model="serviceFormEdit.date"
                                            type="month"
                                            placeholder="Pick a month">
                                        </el-date-picker>
                                    </el-form-item>
                                </div>
                            </div>
                            <el-form-item label="Service Description" prop="details">
                                <el-input v-model="serviceFormEdit.details"
                                          id="summernoteEdit">
                                </el-input>
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
    export default {
        name: "serviceComponent",

        data() {
            return {
                labelPosition: 'top',
                monthYear: '',
                dialogFormVisible: false,
                serviceForm: {
                    title: '',
                    date: '',
                    details: '',
                },
                serviceFormEdit: {
                    title: '',
                    date: '',
                    details: '',
                },
                serviceFormRules: {
                    title: [
                        {required: true, message: 'Please input title', trigger: 'change'},
                    ],
                    date: [
                        {required: true, message: 'Please select date', trigger: 'change'},
                    ]
                },
                serviceFormEditRules: {
                    title: [
                        {required: true, message: 'Please input title', trigger: 'change'},
                    ],
                    date: [
                        {required: true, message: 'Please select date', trigger: 'change'},
                    ]
                },
                /*Table Data's*/
                tableData: [{
                    title: 'Title One',
                    postedMonth: '2020-02'
                }, {
                    title: 'Title Two',
                    postedMonth: '2020-03'
                }, {
                    title: 'Title Three',
                    postedMonth: '2020-03'
                }, {
                    title: 'Title Four',
                    postedMonth: '2020-04'
                }, {
                    title: 'Title Five',
                    postedMonth: '2020-04'
                }],
                search: '',
            }
        },
        methods: {
            saveService(formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        alert('submit!');
                    } else {
                        console.log('error submit!!');
                        return false;
                    }
                });
            },
            updateService(formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        alert('submit!');
                    } else {
                        console.log('error submit!!');
                        return false;
                    }
                });
            }
        },

        mounted() {

        }
    }
</script>

<style scoped>

</style>
