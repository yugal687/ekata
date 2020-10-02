<template>
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-6">
                        <el-card class="box-card mx-sm-3">
                            <div slot="header" class="">
                                <span>Update Website Info</span>
                            </div>
                            <div class="text">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-12">
                                        <el-form :model="websiteInfoForm" :rules="websiteInfoRules"
                                                 ref="websiteInfoForm"
                                                 :label-position="labelPosition" v-if="WebsiteDetail.length <=0">
                                            <el-form-item label="Email" prop="email">
                                                <el-input v-model="websiteInfoForm.email"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                            <el-form-item label="Contact Number" prop="contactNumber">
                                                <el-input type="number" v-model="websiteInfoForm.contactNumber"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                            <el-form-item label="Address" prop="address">
                                                <el-input v-model="websiteInfoForm.address"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                            <el-form-item label="Email" prop="optionalEmail">
                                                <el-input v-model="websiteInfoForm.optionalEmail"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                            <el-form-item label="Contact Number" prop="optioanlContactNumber">
                                                <el-input type="number" v-model="websiteInfoForm.optionalContactNumber"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                            <el-form-item label="Additional Information"
                                                          prop="additionalInformation">
                                                <el-input
                                                    type="textarea"
                                                    v-model="websiteInfoForm.information"
                                                    :autosize="{ minRows: 3, maxRows: 4}"
                                                    placeholder="Please input additional Information"
                                                >
                                                </el-input>
                                            </el-form-item>
                                            <el-form-item>
                                                <el-button type="primary"
                                                           style="width: 80%; margin: 15px 10% 0"
                                                           @click="submitForm('websiteInfoForm')">Save
                                                </el-button>
                                            </el-form-item>
                                        </el-form>
                                        <el-form
                                            :label-position="labelPosition" v-if="WebsiteDetail.length >0">
                                            <el-form-item label="Email" prop="email">
                                                <el-input v-model="WebsiteDetail[0].email"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                            <el-form-item label="Contact Number">
                                                <el-input type="number" v-model="WebsiteDetail[0].contact_number"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                            <el-form-item label="Address">
                                                <el-input v-model="WebsiteDetail[0].address"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                            <el-form-item label="Email" prop="optionalEmail">
                                                <el-input v-model="WebsiteDetail[0].optional_email"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                            <el-form-item label="Contact Number">
                                                <el-input v-model="WebsiteDetail[0].optional_contact"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                            <el-form-item label="Additional Information">
                                                <el-input
                                                    type="textarea"
                                                    v-model="WebsiteDetail[0].additional_information"
                                                    :autosize="{ minRows: 3, maxRows: 4}"
                                                    placeholder="Please input additional Information"
                                                >
                                                </el-input>
                                            </el-form-item>
                                            <el-form-item>
                                                <el-button type="primary"
                                                           style="width: 80%; margin: 15px 10% 0"
                                                           @click="EditForm()">Save
                                                </el-button>
                                            </el-form-item>
                                        </el-form>

                                    </div>
                                </div>
                            </div>
                        </el-card>
                    </div>
                    <div class="col-md-6 mt-4 mt-md-0">
                        <el-card class="box-card mx-sm-3">
                            <div slot="header">
                                <span>Website Information</span>
                            </div>
                            <div class="text">
                                <dl class="row" v-for="details in WebsiteDetail">
                                    <dt class="col-sm-5">
                                        Email
                                    </dt>
                                    <dd class="col-sm-7">
                                        {{ details.email }}
                                    </dd>
                                    <dt class="col-sm-5">
                                        Contact Number
                                    </dt>
                                    <dd class="col-sm-7">
                                        {{ details.contact_number }}
                                    </dd>
                                    <dt class="col-sm-5">
                                        Address
                                    </dt>
                                    <dd class="col-sm-7">
                                        {{ details.address }}
                                    </dd>
                                    <dt class="col-sm-5">
                                        Optional Email
                                    </dt>
                                    <dd class="col-sm-7">
                                        {{ details.optional_email }}
                                    </dd>
                                    <dt class="col-sm-5">
                                        Optional Contact Number
                                    </dt>
                                    <dd class="col-sm-7">
                                        {{ details.optional_contact }}
                                    </dd>
                                    <dt class="col-sm-5">
                                        Addtional Information
                                    </dt>
                                    <dd class="col-sm-7">
                                        {{ details.additional_information }}
                                    </dd>
                                </dl>
                            </div>
                        </el-card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "websiteInfoComponent",
        data() {
            return {
                labelPosition: 'top',
                websiteInfoForm: {
                    email: '',
                    contactNumber: '',
                    address: '',
                    optionalEmail: '',
                    optionalContactNumber: '',
                    information: '',
                },
                type: [],
                websiteInfoRules: {
                    email: [
                        {required: true, message: 'Please input email address', trigger: 'blur'},
                        {type: 'email', message: 'Please input correct email address', trigger: ['blur', 'change']}
                    ],
                    contactNumber: [
                        {required: true, message: 'Please input contact number', trigger: 'blur'},
                    ],
                    address: [
                        {required: true, message: 'Please input address', trigger: 'blur'},
                    ],
                    optionalEmail: [
                        {type: 'email', message: 'Please input correct email address', trigger: ['blur', 'change']}
                    ]
                },
                WebsiteDetail: [],
            }
        },
        mounted() {
            this.fetchInfo();
        },
        methods: {
            fetchInfo() {
                axios.get('/api/getWebsiteDetail',{}).then(response=>{
                    this.WebsiteDetail = response.data.WebsiteDetail;
                });
            },
            submitForm(websiteInfoForm) {
                this.$refs[websiteInfoForm].validate((valid) => {
                    if (valid) {
                        let formData = new FormData();
                        formData.append('email', this.websiteInfoForm.email);
                        formData.append('contact_number', this.websiteInfoForm.contactNumber);
                        formData.append('address', this.websiteInfoForm.address);
                        formData.append('additional_information', this.websiteInfoForm.information);
                        formData.append('optional_email', this.websiteInfoForm.optionalEmail);
                        formData.append('optional_contact', this.websiteInfoForm.optionalContactNumber);

                        axios.post('/api/postWebsiteDetail', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }

                        }).then(response => {
                            this.$notify({
                                title: 'Success',
                                message: response.data.message,
                                type: 'success'
                            });
                            this.fetchInfo();

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
            EditForm() {
                axios.patch('/api/saveEditWebsiteDetail', {WebsiteDetail: this.WebsiteDetail})
                    .then(response => {
                        this.$notify({
                            title: 'Success',
                            message: response.data.message,
                            type: 'success'
                        });
                        this.fetchInfo();

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
