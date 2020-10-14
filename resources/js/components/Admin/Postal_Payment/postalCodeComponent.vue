<template>
    <div>
        <div class="row">
            <!-- state detail input -->
            <div class="col-md-5 col-sm-12 border-right border-dark">
                <section>
                    <div class="row d-flex justify-content-center mb-4">
                        <div class="stateBtn btn btn-primary mr-2">Add State's List</div>
                        <div class="showState btn btn-primary">Show State's List</div>
                    </div>
                    <div
                        class="row box-card-slide state-div hidden"
                        style="border-top: 3px solid blue">
                        <div class="box-header clearfix">
                            <div class="">
                                <span>Add State's List</span>
                                <el-button
                                    class="closeStateBtn"
                                    style="float: right; padding: 3px 0"
                                    type="text"
                                >Close
                                </el-button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-12">
                                    <el-form
                                        :model="stateForm"
                                        :rules="stateRules"
                                        ref="stateForm"
                                        :label-position="labelPosition"
                                        class="demo-stateForm"
                                    >
                                        <el-form-item label="State Name" prop="stateName">
                                            <el-input v-model="stateForm.stateName" style="width: 100%">
                                            </el-input>
                                        </el-form-item>
                                        <el-form-item>
                                            <el-button
                                                type="primary"
                                                style="width: 80%; margin: 15px 10% 0"
                                                @click="submitState('stateForm')"
                                            >Save
                                            </el-button>
                                        </el-form-item>
                                    </el-form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- data tables  -->
                    <div class="row box-card-slide mt-3 show-states hidden">
                        <div class="col-12">
                            <div class="box-header clearfix">
                                <div class="">
                                    <span>State's List</span>
                                    <el-button
                                        class="closeStateListBtn"
                                        style="float: right; padding: 3px 0"
                                        type="text"
                                    >Close
                                    </el-button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="box-body">
                                <div class="">
                                    <el-card class="box-card border-dark m-0 p-0" shadow="hover">
                                        <div class="text item m-0 p-0">
                                            <el-table :data="state"
                                                border
                                                max-height="470"
                                                style="width: 100%"
                                            >
                                                <el-table-column
                                                    type="index"
                                                    label="S.N."
                                                    label-class-name="text-white bg-dark"
                                                    width="50"
                                                >
                                                </el-table-column>
                                                <el-table-column
                                                    prop="state"
                                                    label-class-name="text-white bg-dark"
                                                    label="State Name"
                                                >
                                                </el-table-column>
                                                <el-table-column
                                                    fixed="right"
                                                    label-class-name="text-white bg-dark"
                                                    align="right"
                                                >
                                                    <template slot="header" slot-scope="scope">
                                                        <el-input
                                                            v-model="stateSearch"
                                                            size="mini"
                                                            placeholder="Search Here..."
                                                        />
                                                    </template>
                                                    <template slot-scope="scope">
                                                        <el-button
                                                            type="primary"
                                                            icon="el-icon-edit"
                                                            size="mini"
                                                            data-target=".bd-example-modal-lg"
                                                            data-toggle="modal"
                                                            title="Edit"
                                                            class="editStateModal"
                                                            @click="editState(scope.row.id)"
                                                            circle
                                                        ></el-button>
                                                        <el-button
                                                            size="mini"
                                                            type="danger"
                                                            title="Delete"
                                                            icon="el-icon-delete"
                                                            @click="deleteState(scope.row.id)"
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
                    </div>
                </section>
                <hr/>
                <section>
                    <div class="row d-flex justify-content-center mt-4">
                        <div class="postalBtn btn btn-primary mr-2">Add Postal Codes</div>
                        <div class="showPostal btn btn-primary">Show Postal Codes</div>
                    </div>
                    <div
                        class="row box-card-slide postal-div hidden"
                        style="border-top: 3px solid blue"
                    >
                        <div class="box-header clearfix">
                            <div class="">
                                <span>Add Postal Codes</span>
                                <el-button
                                    class="closePostalBtn"
                                    style="float: right; padding: 3px 0"
                                    type="text"
                                >Close
                                </el-button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-12">
                                    <el-form
                                        :model="postalForm"
                                        :rules="postalRules"
                                        ref="postalForm"
                                        :label-position="labelPosition"
                                        class="demo-postalForm"
                                    >
                                        <el-form-item label="PostalAddress" prop="stateName">
                                            <el-input v-model="postalForm.postalCode" style="width: 100%">
                                            </el-input>
                                        </el-form-item>
                                        <el-form-item>
                                            <el-button
                                                type="primary"
                                                style="width: 80%; margin: 15px 10% 0"
                                                @click="submitPostal('postalForm')"
                                            >Save
                                            </el-button>
                                        </el-form-item>
                                    </el-form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data tables  -->
                    <div class="row box-card-slide mt-3 show-postals hidden">
                        <div class="col-12">
                            <div class="box-header clearfix">
                                <div class="">
                                    <span>Postal's List</span>
                                    <el-button
                                        class="closePostalListBtn"
                                        style="float: right; padding: 3px 0"
                                        type="text"
                                    >Close
                                    </el-button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="box-body">
                                <div class="">
                                    <el-card class="box-card border-dark m-0 p-0" shadow="hover">
                                        <div class="text item m-0 p-0">
                                            <el-table
                                                :data="
                    postal.filter(
                      (data) =>
                        !stateSearch ||
                        data.stateName
                          .toLowerCase()
                          .includes(stateSearch.toLowerCase())
                    )
                  "
                                                border
                                                max-height="470"
                                                style="width: 100%"
                                            >
                                                <el-table-column
                                                    type="index"
                                                    label="S.N."
                                                    label-class-name="text-white bg-dark"
                                                    width="50"
                                                >
                                                </el-table-column>
                                                <el-table-column
                                                    prop="postal_code"
                                                    label-class-name="text-white bg-dark"
                                                    label="Postal Code"
                                                >
                                                </el-table-column>
                                                <el-table-column
                                                    fixed="right"
                                                    label-class-name="text-white bg-dark"
                                                    align="right"
                                                >
                                                    <template slot="header" slot-scope="scope">
                                                        <el-input
                                                            v-model="stateSearch"
                                                            size="mini"
                                                            placeholder="Search Here..."
                                                        />
                                                    </template>
                                                    <template slot-scope="scope">
                                                        <el-button
                                                            type="primary"
                                                            icon="el-icon-edit"
                                                            size="mini"
                                                            data-target=".bd-example-modal-lg"
                                                            data-toggle="modal"
                                                            title="Edit"
                                                            class="editStateModal"
                                                            @click="editState(scope.row.id)"
                                                            circle
                                                        ></el-button>
                                                        <el-button
                                                            size="mini"
                                                            type="danger"
                                                            title="Delete"
                                                            icon="el-icon-delete"
                                                            @click="deletePostal(scope.row.id)"
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
                    </div>
                </section>
            </div>
            <!-- postal details input-->
            <div class="col-md-7 col-sm-12 border-left border-dark">
                <div class="row d-flex justify-content-center">
                    <div class="postalDetailBtn btn btn-success">
                        Add Postal's Detail & Delivery Charge
                    </div>
                </div>
                <div
                    class="row box-card-slide postalDetail-div hidden"
                    style="border-top: 3px solid green"
                >
                    <div class="box-header clearfix">
                        <span>Add Postal & Delivery Charge</span>
                        <el-button
                            class="closePostalDetailBtn"
                            style="float: right; padding: 3px 0"
                            type="text"
                        >Close
                        </el-button>
                    </div>
                    <div class="box-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-12">
                                <el-form
                                    :model="postalDetailForm"
                                    :rules="postalDetailRules"
                                    ref="postalDetailForm"
                                    :label-position="labelPosition"
                                    class="demo-postalDetailForm"
                                >
                                    <el-form-item label="Select State" prop="selectState">
                                        <el-select
                                            clearable
                                            placeholder="Please select State Name."
                                            filterable
                                            v-model="postalDetailForm.selectState"
                                            style="width: 100%"
                                        >
                                            <el-option
                                                v-for="item in state"
                                                :key="item.id"
                                                data-target=".bd-postalDetail-modal-lg"
                                                data-toggle="modal"
                                                :label="item.state"
                                                :value="item.id"
                                            >
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                    <el-form-item label="Postal Code" prop="postalCode">
                                        <el-select
                                            clearable
                                            placeholder="Please select State Name."
                                            filterable
                                            v-model="postalDetailForm.postalCode"
                                            style="width: 100%"
                                        >
                                            <el-option
                                                v-for="item in postal"
                                                :key="item.id"
                                                data-target=".bd-postalDetail-modal-lg"
                                                data-toggle="modal"
                                                :label="item.postal_code"
                                                :value="item.id"
                                            >
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                    <el-form-item label="Delivery Charge" prop="deliveryCharge">
                                        <el-input
                                            v-model="postalDetailForm.deliveryCharge"
                                            placeholder="Please input delivery charge."
                                            style="width: 100%"
                                        >
                                        </el-input>
                                    </el-form-item>
                                    <el-form-item>
                                        <el-button
                                            type="primary"
                                            style="width: 80%; margin: 15px 10% 0"
                                            @click="submitPostalDetail('postalDetailForm')"
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
                                    :data="
                    delivery.filter(
                      (data) =>
                        !postalSearch ||
                        data.postalCode
                          .toLowerCase()
                          .includes(postalSearch.toLowerCase())
                    )
                  "
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
                                        prop="state.state"
                                        label-class-name="text-white bg-dark"
                                        label="State"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                        prop="post_code.postal_code"
                                        label-class-name="text-white bg-dark"
                                        label="Postal Code"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                        prop="delivery_charge"
                                        label-class-name="text-white bg-dark"
                                        label="Delivery Charge"
                                    >
                                    </el-table-column>
                                    <el-table-column
                                        fixed="right"
                                        label-class-name="text-white bg-dark"
                                        align="right"
                                    >
                                        <template slot="header" slot-scope="scope">
                                            <el-input
                                                v-model="postalSearch"
                                                size="mini"
                                                placeholder="Search Here..."
                                            />
                                        </template>
                                        <template slot-scope="scope">
                                            <el-button
                                                type="primary"
                                                icon="el-icon-edit"
                                                size="mini"
                                                class="editPostalModal"
                                                data-target=".bd-postalDetail-modal-lg"
                                                data-toggle="modal"
                                                @click="editPostalDetail(scope.row.id)"
                                                circle
                                            ></el-button>
                                            <el-button
                                                size="mini"
                                                type="danger"
                                                icon="el-icon-delete"
                                                @click="deletePostalDetail(scope.row.id)"
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
        </div>
    </div>
</template>

<script>
    export default {
        name: "postalCodeComponents",
        data() {
            return {
                labelPosition: "top",
                stateForm: {
                    stateName: "",
                },
                postalForm: {
                    postalCode: "",
                },
                postalDetailForm: {
                    postalCode: "",
                    deliveryCharge: "",
                    selectState: "",
                },
                state: [],
                postal: [],
                delivery:[],
                isEditPostalCode: "",

                stateSearch: "",
                postalSearch: "",

                //   rule definition
                stateRules: {
                    stateName: [
                        {
                            required: true,
                            message: "Please input state name",
                            trigger: "blur",
                        },
                    ],
                },
                postalRules: {
                    postalCode: [
                        {
                            required: true,
                            message: "please input postal code",
                            trigger: "blur",
                        }
                    ]
                },

                postalDetailRules: {
                    postalCode: [
                        {
                            required: true,
                            message: "please input valid Postcode.",
                            trigger: blur,
                        },
                    ],

                    deliveryCharge: [
                        {
                            required: true,
                            message: "Please input Delivery Charge.",
                            trigger: blur,
                        },
                    ],

                    selectState: [
                        {
                            required: true,
                            message: "Please select State Name.",
                            trigger: blur,
                        },
                    ],
                },
            };
        },

        mounted() {
            this.fetchState();
            this.fetchPostal();
            this.fetchpostalDetail();
            $(document).ready(function () {
                $(".stateBtn").click(function () {
                    $(".state-div").slideToggle("slow");
                });
                $(".showState").click(function () {
                    $(".show-states").slideToggle("slow");
                });
                $(".closeStateBtn").click(function () {
                    $(".state-div").slideToggle("slow");
                });
                $(".closeStateListBtn").click(function () {
                    $(".show-states").slideToggle("slow");
                });
                $(".postalBtn").click(function () {
                    $(".postal-div").slideToggle("slow");
                });
                $(".closePostalBtn").click(function () {
                    $(".postal-div").slideToggle("slow");
                });


                $(".postalDetailBtn").click(function () {
                    $(".postalDetail-div").slideToggle("slow");
                });
                $(".closePostalDetailBtn").click(function () {
                    $(".postalDetail-div").slideToggle("slow");
                });
                $(".showPostal").click(function () {
                    $(".show-postals").slideToggle("slow");
                });
                $(".closePostalListBtn").click(function () {
                    $(".show-postals").slideToggle("slow");
                });
            });
        },

        methods: {
            fetchState() {
                axios.get("/api/state", {}).then((response) => {
                    this.state = response.data.state;
                });
            },
            fetchPostal() {
                axios.get("/api/postal", {}).then((response) => {
                    this.postal = response.data.postal;
                });
            },
            fetchpostalDetail() {
                axios.get("/api/deliveryAddress", {}).then((response) => {
                    this.delivery = response.data.delivery;
                });
            },

            submitState(stateForm) {
                this.$refs[stateForm].validate((valid) => {
                    if (valid) {
                        let formData = new FormData();

                        formData.append("state", this.stateForm.stateName);

                        axios.post("/api/state", formData, {
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
                                this.stateForm = {};
                                this.fetchState();
                                this.fetchPostal();
                                this.fetchpostalDetail();
                            })
                            .catch((error) => {
                                if (error.response) {
                                    this.$notify({
                                        title: "Error",
                                        message: "Error In Input Data ",
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
            submitPostal(postalForm) {
                this.$refs[postalForm].validate((valid) => {
                    if (valid) {
                        let formData = new FormData();

                        formData.append("postal_code", this.postalForm.postalCode);

                        axios.post("/api/postal", formData, {
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
                                this.postalForm = {};
                                this.fetchState();
                                this.fetchPostal();
                                this.fetchpostalDetail();
                            })
                            .catch((error) => {
                                if (error.response) {
                                    this.$notify({
                                        title: "Error",
                                        message: "Error In Input Data ",
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
            clearStateForm() {
                this.stateForm.stateName = "";
            },

            editState() {
                $(".editStateModal").click(function () {
                    $(".state-div").slideToggle("slow");
                });
            },
            deleteState(id) {
                this.$confirm("Are you sure to delete this State?")
                    .then((_) => {
                        axios.delete("/api/state/" + id).then((response) => {
                            this.$notify({
                                title: "Success",
                                message: response.data.message,
                                type: "info",
                            });
                            this.fetchState();
                            this.fetchPostal();
                            this.fetchpostalDetail();
                        });
                    })
                    .catch((_) => {
                    });
            },
            deletePostal(id) {
                this.$confirm("Are you sure to delete this State?")
                    .then((_) => {
                        axios.delete("/api/postal/" + id).then((response) => {
                            this.$notify({
                                title: "Success",
                                message: response.data.message,
                                type: "info",
                            });
                            this.fetchState();
                            this.fetchPostal();
                            this.fetchpostalDetail();
                        });
                    })
                    .catch((_) => {
                    });
            },

            // Submit Postal Detail
            submitPostalDetail(postalDetailForm) {
                this.$refs[postalDetailForm].validate((valid) => {
                    if (valid) {
                        let formdata = new FormData();
                        formdata.append("state_id", this.postalDetailForm.selectState);
                        formdata.append("postal_code_id", this.postalDetailForm.postalCode);
                        formdata.append("delivery_charge",this.postalDetailForm.deliveryCharge);
                        axios.post("/api/deliveryAddress", formdata, {
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
                                this.postalDetailForm = {};
                                this.fetchState();
                                this.fetchPostal();
                                this.fetchpostalDetail();
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

            // edit Postal Detail
            editPostalDetail() {
                $(".editPostalModal").click(function () {
                    $(".postalDetail-div").slideToggle("slow");
                });
            },

            // Delete Postal Detail
            deletePostalDetail(id) {
                this.$confirm("Are you sure to delete this Postal Details?")
                    .then((_) => {
                        axios.delete("/api/deliveryAddress/" + id).then((response) => {
                            this.$notify({
                                title: "Success",
                                message: response.data.message,
                                type: "info",
                            });
                            this.fetchState();
                            this.fetchPostal();
                            this.fetchpostalDetail();
                        });
                    })
                    .catch((_) => {
                    });
            },

            clearPostalForm() {
                this.postalDetailForm.selectState = "";
                this.postalDetailForm.postalCode = "";
                this.postalDetailForm.deliveryCharge = "";
            },
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
