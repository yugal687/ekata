<template>
    <div class="">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-sm-12">
                <el-card class="box-card">
                    <div slot="header" class="">
                        <h2>Add Events</h2>
                    </div>
                    <el-form :model="eventForm" :rules="eventRules" ref="eventForm" :label-position="labelPosition"
                             class="demo-productForm">
                        <div class="row">
                            <div class="col-md-6">
                                <el-form-item label="Upload Thumbnail Image" prop="thumbnailImage">
                                    <el-upload class="upload-demo" action="" ref="upload"
                                               :on-preview="handlePreviewThumbnail" :on-remove="handleRemoveThumbnail"
                                               :on-change="handleChangeThumbnail" :auto-upload="false"
                                               :file-list="fileListThumbnail">
                                        <el-button size="" type="primary">Click to upload Image</el-button>
                                    </el-upload>
                                </el-form-item>
                            </div>
                            <div class="col-md-6">
                                <div class="block">
                                    <el-form-item label="Event Date" prop="eventDate">

                                        <el-date-picker v-model="eventForm.eventDate" type="daterange" align="right"
                                                        start-placeholder="Start Date" end-placeholder="End Date"
                                                        default-value="2010-10-01">
                                        </el-date-picker>
                                    </el-form-item>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <el-form-item label="Event Name" prop="eventName">
                                    <el-input placeholder="Place Event name" v-model="eventForm.eventName"
                                              style="width: 100%">
                                    </el-input>
                                </el-form-item>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <el-form-item label="Event Description" prop="desc">
                                    <vue-editor v-model="eventForm.desc"></vue-editor>
                                    <!--<div  v-model="serviceForm.details"></div>-->
                                </el-form-item>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <el-form-item class="mt-4">
                                        <el-button type="primary"
                                                   @click="saveEvent('eventForm')">Save
                                        </el-button>
                                    </el-form-item>
                                </div>
                            </div>
                        </div>
                    </el-form>
                </el-card>
            </div>


            <!--Table-->
            <div class="col-md-5 col-sm-12 mt-4 mt-md-0">
                <el-card class="box-card">
                    <el-table :data="tableData.filter(data => !search || data.title.toLowerCase().includes(search.toLowerCase())
                    || data.date.includes(search))" border max-height="470" style="width: 100%">
                        <el-table-column prop="title" label="Title">
                        </el-table-column>
                        <el-table-column prop="event_date" label="Event Date">
                        </el-table-column>
                        <el-table-column fixed="right" width="140" align="right">
                            <template slot="header" slot-scope="scope">
                                <el-input v-model="search" size="mini" placeholder="Type to search"/>
                            </template>
                            <template slot-scope="scope">
                                <el-button
                                    type="warning"
                                    v-if="scope.row.status==0"
                                    @click="setStatus(scope.row.id)"
                                    size="mini"
                                >
                                    <i class="fas fa-times"></i>
                                </el-button>
                                <el-button
                                    type="success"
                                    v-else
                                    @click="setStatus(scope.row.id)"
                                    size="mini"
                                >
                                    <i class="fas fa-check"></i>
                                </el-button>
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#serviceEditModal" @click="editEvent(scope.row.id)"><i
                                    class="fas fa-edit"></i></button>
                                <el-button size="mini" type="danger" icon="fas fa-trash"
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


    </div>
</template>

<script>
    import {
        VueEditor
    } from "vue2-editor";

    export default {
        name: "eventUpdate",
        components: {
            VueEditor
        },
        data() {
            return {
                labelPosition: 'top',
                fileListThumbnail: [],
                /*Table Data's*/
                tableData: [],
                editEvents: [],
                search: '',

                eventForm: {
                    eventName: '',
                    imageSelect: "",
                    desc: '',
                    eventDate: '',
                },
                eventRules: {
                    eventName: [
                        {required: true, message: 'Please input Event name', trigger: 'blur'},
                    ],
                    desc: [
                        {required: true, message: 'Please input Event Description', trigger: 'blur'},
                    ],
                    eventDate: [
                        {required: true, message: 'Please  Select the date.', trigger: 'blur'},
                    ]
                },
            }
        },
        methods: {
            fetchData() {
                axios.get('/api/event', {})
                    .then(response => {
                        this.tableData = response.data.events;
                    });
            },
            setStatus(id) {
                let formData=new FormData();
                formData.append('id',id);
                axios.post('/api/event-status', formData,{}).then(response => {
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
            editEvent(id) {
                this.editEvents = this.tableData.filter(tableData => tableData.id == id);
            },
            saveEditEvent() {
                axios.post('/api/update-event', {
                    editedEvent: this.editEvents
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
            deleteService(id) {
                this.$confirm('Are you sure to delete this item?')
                    .then(_ => {
                        axios.delete('/api/event/' + id)
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

            /*form*/
            saveEvent(formName) {
                this.$refs[formName].validate((valid) => {
                    console.log(this.$refs.upload.uploadFiles);

                    if (valid) {
                        let file = this.$refs.upload.uploadFiles;
                        let formData = new FormData();
                        file.forEach((v, k) => {
                            formData.append(`image[${k}]`, v.raw);
                        });
                        formData.append('title', this.eventForm.eventName);
                        formData.append('description', this.eventForm.desc);
                        formData.append('event_date', this.eventForm.eventDate);

                        axios.post('/api/event', formData, {
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
