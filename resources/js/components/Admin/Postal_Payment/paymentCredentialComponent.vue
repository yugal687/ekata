<template>
    <div>
        <div class="col-md-12 col-sm-12">
            <div class="row d-flex justify-content-center">
                <div class="payCredBtn btn btn-success">Add Payment Credentials</div>
            </div>
            <div
                class="row box-card-slide payCred-div hidden"
                style="border-top: 3px solid green"
            >
                <div class="box-header clearfix">
                    <span>Add Payment Credentials</span>
                    <el-button
                        class="closePaymentCredencialBtn"
                        style="float: right; padding: 3px 0"
                        type="text"
                    >Close
                    </el-button>
                </div>
                <div class="box-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12">
                            <el-form
                                :model="paymentCredentialForm"
                                :rules="paymentCredencialRules"
                                ref="paymentCredentialForm"
                                :label-position="labelPosition"
                                class="demo-paymentCredentialForm"
                            >
                                <el-form-item label="Select Payment Type" prop="paymentType">
                                    <el-select
                                        clearable
                                        placeholder="Please select Payment Type."
                                        filterable
                                        v-model="paymentCredentialForm.paymentType"
                                        style="width: 100%"
                                    >
                                        <el-option
                                            v-for="type in payType"
                                            :key="type.value"
                                            data-target=".bd-paymentCredential-modal-lg"
                                            data-toggle="modal"
                                            :label="type.value"
                                            :value="type.value"
                                        >
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                                <el-form-item label="Secret Key" prop="secretKey">
                                    <el-input
                                        v-model="paymentCredentialForm.secretKey"
                                        placeholder="Please input Secret Key."
                                        style="width: 100%"
                                    >
                                    </el-input>
                                </el-form-item>
                                <el-form-item label="API Key/ Client-Id" prop="apiKey">
                                    <el-input
                                        v-model="paymentCredentialForm.apiKey"
                                        placeholder="Please input API Key/Client Id."
                                        style="width: 100%"
                                    >
                                    </el-input>
                                </el-form-item>
                                <el-form-item>
                                    <el-button
                                        type="primary"
                                        style="width: 80%; margin: 15px 10% 0"
                                        @click="submitpaymentCredential('paymentCredentialForm')"
                                    >Save
                                    </el-button>
                                </el-form-item>
                            </el-form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <el-card class="box-card border-dark" shadow="hover">
                        <div class="text item">
                            <el-table
                                :data="payCred.filter((data)=>!payCredSearch || data.payment_type.toLowerCase().includes(payCredSearch.toLowerCase())
                                || data.secret_key.toLowerCase().includes(payCredSearch.toLowerCase())
                                || data.api_key.toLowerCase().includes(payCredSearch.toLowerCase())) "
                                border
                                max-height="470"
                                style="width: 100%"
                            >
                                <el-table-column
                                    type="index"
                                    label-class-name="text-white bg-dark"
                                    label="S.N."
                                    width="50"
                                >
                                </el-table-column>
                                <el-table-column
                                    prop="payment_type"
                                    label-class-name="text-white bg-dark"
                                    label="Payment Type"
                                >
                                </el-table-column>
                                <el-table-column
                                    prop="secret_key"
                                    label-class-name="text-white bg-dark"
                                    label="Secret Key"
                                >
                                </el-table-column>
                                <el-table-column
                                    prop="api_key"
                                    label-class-name="text-white bg-dark"
                                    label="API Key"
                                >
                                </el-table-column>
                                <el-table-column
                                    fixed="right"
                                    label-class-name="text-white bg-dark"
                                    align="right"
                                >
                                    <template slot="header" slot-scope="scope">
                                        <el-input
                                            v-model="payCredSearch"
                                            size="mini"
                                            placeholder="Search Here..."
                                        />
                                    </template>
                                    <template slot-scope="scope">
                                        <el-button
                                            type="primary"
                                            icon="el-icon-edit"
                                            title="Edit"
                                            size="mini"
                                            class=""
                                            data-target=".bd-payment-credentials-modal-lg"
                                            data-toggle="modal"
                                            @click="editpayCred(scope.row.id)"
                                            circle
                                        ></el-button>
                                        <el-button
                                            size="mini"
                                            type="danger"
                                            title="Delete"
                                            icon="el-icon-delete"
                                            @click="deletepayCred(scope.row.id)"
                                            circle
                                        ></el-button>
                                    </template>
                                </el-table-column>
                            </el-table>
                        </div>
                    </el-card>
                </div>
            </div>
        </div>

        <!--Payment Credentials Edit Modal Start Here-->
        <div
            class="modal fade bd-payment-credentials-modal-lg"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myLargeModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        Edit Payment Credentials:
                        <button
                            type="button"
                            class="close text-danger"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <el-form
                                    :model="editedPayment[0]"
                                    :rules="paymentEditCredencialRules"
                                    ref="paymentEditCredentialForm"
                                    :label-position="labelPosition"
                                    class="demo-paymentEditCredentialForm"
                                >
                                    <div class="" v-for="item in editedPayment">
                                        <el-form-item label="Select Payment Type" prop="payment_type">
                                            <el-select
                                                clearable
                                                placeholder="Please select Payment Type"
                                                filterable
                                                v-model="item.payment_type"
                                                style="width: 100%"
                                            >
                                                <el-option
                                                    v-for="type in payType"
                                                    :key="type.value"
                                                    data-target=".bd-paymentCredential-modal-lg"
                                                    data-toggle="modal"
                                                    :label="type.value"
                                                    :value="type.value"
                                                >
                                                </el-option>
                                            </el-select>
                                        </el-form-item>
                                        <el-form-item label="Secret Key" prop="secret_key">
                                            <el-input
                                                v-model="item.secret_key"
                                                placeholder="Please input Secret Key."
                                                style="width: 100%"
                                            >
                                            </el-input>
                                        </el-form-item>
                                        <el-form-item label="API Key" prop="api_key">
                                            <el-input
                                                v-model="item.api_key"
                                                placeholder="Please input API Key."
                                                style="width: 100%"
                                            >
                                            </el-input>
                                        </el-form-item>
                                        <el-form-item>
                                            <el-button
                                                type="primary"
                                                style="width: 80%; margin: 15px 10% 0"
                                                @click="savepaymentEditCredential('paymentEditCredentialForm')"
                                            >Save
                                            </el-button>
                                        </el-form-item>
                                    </div>
                                </el-form>
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
        name: "postalCodeComponents",
        data() {
            return {
                payType: [{
                    value: "Mastercard",
                },
                    {
                        value: "Paypal"
                    }],
                labelPosition: "top",
                paymentCredentialForm: {
                    paymentType: "",
                    secretKey: "",
                    apiKey: "",
                },
                payCred: [],
                payCredSearch: "",
                editedPayment: [],
                // validation rules
                paymentCredencialRules: {
                    paymentType: [
                        {
                            required: true,
                            message: "Please Select Payment Type",
                            trigger: "blur",
                        },
                    ],
                    secretKey: [
                        {
                            required: true,
                            message: "Please input Secrect Key",
                            trigger: "blur",
                        },
                    ],
                    apiKey: [
                        {required: true, message: "Please input API key", trigger: "blur"},
                    ],
                },
                paymentEditCredencialRules: {
                    payment_type: [
                        {
                            required: true,
                            message: "Please Select Payment Type",
                            trigger: "blur",
                        },
                    ],
                    secret_key: [
                        {
                            required: true,
                            message: "Please input Secrect Key",
                            trigger: "blur",
                        },
                    ],
                    api_key: [
                        {required: true, message: "Please input API key", trigger: "blur"},
                    ],
                },
            };
        },

        mounted() {
            this.fetchPaymentCredential();
            $(document).ready(function () {
                $(".payCredBtn").click(function () {
                    $(".payCred-div").slideToggle("slow");
                });

                $(".closePaymentCredencialBtn").click(function () {
                    $(".payCred-div").slideToggle("slow");
                });
            });
        },

        methods: {
            fetchPaymentCredential() {
                axios.get("/api/paymentCredentials", {}).then((response) => {
                    this.payCred = response.data.credentials;
                });
            },

            submitpaymentCredential(paymentCredentialForm) {
                this.$refs[paymentCredentialForm].validate((valid) => {
                    if (valid) {
                        let formdata = new FormData();
                        formdata.append("payment_type", this.paymentCredentialForm.paymentType);
                        formdata.append("secret_key", this.paymentCredentialForm.secretKey);
                        formdata.append("api_key", this.paymentCredentialForm.apiKey);
                        axios.post("/api/paymentCredentials", formdata, {
                            headers: {
                                "Content-Type": "multipart/form-data",
                            },
                        })
                            .then((response) => {
                                this.$notify({
                                    title: "Success",
                                    message: response.data.message,
                                    type: "success",
                                });
                                this.paymentCredentialForm = {};
                                this.fetchPaymentCredential();
                            })
                            .catch((error) => {
                                if (error.response.status == 422) {
                                    this.$notify({
                                        title: "Error",
                                        message: error.response.data.message,
                                        type: "error",
                                    });
                                }
                            });
                    } else {
                        console.log("error in submit!!");
                        return false;
                    }
                });
            },
            editpayCred(id) {
                $(".editpayCredBtn").click(function () {
                    $(".payCred-div").slideToggle("slow");
                });
                this.editedPayment = this.payCred.filter(payCred => (payCred.id == id));
            },
            deletepayCred(id) {
                this.$confirm("Are you sure to delete this Items?")
                    .then((_) => {
                        axios.delete("/api/paymentCredentials/" + id).then((response) => {
                            this.$notify({
                                title: "Success",
                                message: response.data.message,
                                type: "info",
                            });
                            this.paymentCredentialForm = {};
                            this.fetchPaymentCredential();
                        });
                    })
                    .catch((_) => {
                    });
            },
            savepaymentEditCredential(paymentEditCredentialForm) {
                this.$refs[paymentEditCredentialForm].validate((valid) => {
                    if (valid) {
                        let formData = new FormData;
                        formData.append("payment_type", this.editedPayment[0].payment_type);
                        console.log(this.editedPayment[0].payment_type);
                        formData.append("secret_key", this.editedPayment[0].secret_key);
                        formData.append("api_key", this.editedPayment[0].api_key);
                        formData.append("id", this.editedPayment[0].id);
                        axios.post("/api/editpaymentCredentials", formData).then((response) => {
                            this.$notify({
                                title: "Success",
                                message: response.data.message,
                                type: "success",
                            });
                            this.paymentCredentialForm = {};
                            this.fetchPaymentCredential();
                        }).catch((error) => {
                            if (error.response.status == 422) {
                                this.$notify({
                                    title: "Error",
                                    message: error.response.data.message,
                                    type: "error",
                                });
                            }
                        });
                    }
                });
            }
        },
    };
</script>
<style scoped>
    .container-fluid .row {
        margin-left: 0;
        margin-right: 0;
    }

    .hidden {
        display: none;
    }

    .box-card-slide {
        margin-top: 20px;
        border: 1px solid #ebeef5;
        background-color: #fff;
        color: #303133;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.1);
    }

    .box-card-slide .box-header {
        padding: 18px 20px;
        border-bottom: 1px solid #ebeef5;
        box-sizing: border-box;
    }

    .box-card-slide .box-body {
        padding: 20px;
    }
</style>
