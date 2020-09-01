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
                                        <el-form :model="websiteInfoForm" :rules="websiteInfoRules" ref="websiteInfoForm"
                                                 :label-position="labelPosition" class="">
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
                                                <el-input v-model="websiteInfoForm.optioanlContactNumber"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                            <el-form-item>
                                                <el-button type="primary"
                                                           style="width: 80%; margin: 15px 10% 0"
                                                           @click="submitForm('websiteInfoForm')">Save
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
                                <dl class="row">
                                    <dt class="col-sm-5">
                                        Email
                                    </dt>
                                    <dd class="col-sm-7">
                                        {{ email }}
                                    </dd>
                                    <dt class="col-sm-5">
                                        Contact Number
                                    </dt>
                                    <dd class="col-sm-7">
                                        {{ contactNumber }}
                                    </dd>
                                    <dt class="col-sm-5">
                                        Address
                                    </dt>
                                    <dd class="col-sm-7">
                                        {{ address }}
                                    </dd>
                                    <dt class="col-sm-5">
                                        Optional Email
                                    </dt>
                                    <dd class="col-sm-7">
                                        {{ optionalEmail }}
                                    </dd>
                                    <dt class="col-sm-5">
                                        Optional Contact Number
                                    </dt>
                                    <dd class="col-sm-7">
                                        {{ optionalContactNumber }}
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
    data(){
        return{
            labelPosition: 'top',
            websiteInfoForm: {
                email: '',
                contactNumber: '',
                address: '',
                optionalEmail: '',
                optionalContactNumber: '',
            },
            type: [],
            websiteInfoRules: {
                email: [
                    {required: true, message: 'Please input email address', trigger: 'blur'},
                    {type: 'email', message: 'Please input correct email address', trigger:['blur', 'change']}
                ],
                contactNumber: [
                    {required: true, message: 'Please input contact number', trigger: 'blur'},
                ],
                address: [
                    {required: true, message: 'Please input address', trigger: 'blur'},
                ]
            },
            email: 'email@gmail.com',
            optionalEmail: 'email@gmail.com',
            contactNumber: '1234567890',
            optionalContactNumber: '1234567890',
            address: 'A description list is perfect for defining terms',

        }
    },
    methods: {
        submitForm(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    alert('submit!');
                } else {
                    console.log('error submit!!');
                    return false;
                }
            });
        }
    }
}
</script>

<style scoped>

</style>
