<template>
  <div>
    <div class="row">
      <!-- state detail input -->
      <div class="col-md-5 col-sm-12 border-right border-dark">
        <div class="row d-flex justify-content-center">
          <div class="stateBtn btn btn-primary">Add State's List</div>
        </div>
        <div
          class="row box-card-slide state-div hidden"
          style="border-top: 3px solid blue"
        >
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
        <div class="row mt-3">
          <div class="col-12">
            <el-card class="box-card border-dark m-0 p-0" shadow="hover">
              <div class="text item m-0 p-0">
                <el-table
                  :data="
                    state.filter(
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
                    prop="stateName"
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
      <!-- postal details input-->
      <div class="col-md-7 col-sm-12 border-left border-dark">
        <div class="row d-flex justify-content-center">
          <div class="postalDetailBtn btn btn-success">
            Add Postal's Detail & Delivery Chanrge
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
                        :label="item.stateName"
                        :value="item.id"
                      >
                      </el-option>
                    </el-select>
                  </el-form-item>
                  <el-form-item label="Postal Code" prop="postalCode">
                    <el-input
                      v-model="postalDetailForm.postalCode"
                      placeholder="Please input PostCode."
                      style="width: 100%"
                    >
                    </el-input>
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
                    postal.filter(
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
                    prop="parent.selectState"
                    label-class-name="text-white bg-dark"
                    label="State"
                  >
                  </el-table-column>
                  <el-table-column
                    prop="postalCode"
                    label-class-name="text-white bg-dark"
                    label="Postal Code"
                  >
                  </el-table-column>
                  <el-table-column
                    prop="deliveryCharge"
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
      postalDetailForm: {
        postalCode: "",
        deliveryCharge: "",
        selectState: "",
      },
      state: [
        {
          stateName: "New York",
        },
      ],
      postal: [
        {
          postalCode: "123",
          deliveryCharge: "200",
          selectState: "hello",
        },
      ],
      isEditPostalCode: "",

      stateSearch: "",
      postalSearch: "",

      //   rule definition
      stateRules: {
        stateName: [
          {
            required: true,
            message: "Please input State Name.",
            trigger: "blur",
          },
        ],
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
    $(document).ready(function () {
      $(".stateBtn").click(function () {
        $(".state-div").slideToggle("slow");
      });

      $(".closeStateBtn").click(function () {
        $(".state-div").slideToggle("slow");
      });

      $(".postalDetailBtn").click(function () {
        $(".postalDetail-div").slideToggle("slow");
      });

      $(".closePostalDetailBtn").click(function () {
        $(".postalDetail-div").slideToggle("slow");
      });
    });
  },

  methods: {
    fetchState() {
      axios.get("/api/state", {}).then((response) => {
        this.state = response.data.state;
      });
    },
    fetchpostalDetail() {
      axios.get("/api/postalDetail", {}).then((response) => {
        this.postal = response.data.postal;
      });
    },

    submitState(stateForm) {
      this.$refs[stateForm].validate((valid) => {
        if (valid) {
          let formData = new FormData();

          formData.append("state_name", this.stateForm.stateName);

          axios
            .post("/api/saveState", formData, {
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
              clearStateForm();
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
    deleteState() {
      this.$confirm("Are you sure to delete this State?")
        .then((_) => {
          axios.delete("/api/state/" + id).then((response) => {
            this.$notify({
              title: "Success",
              message: response.data.message,
              type: "info",
            });
            this.fetchState();
          });
        })
        .catch((_) => {});
    },

    // Submit Postal Detail
    submitPostalDetail(postalDetailForm) {
      this.$refs[postalDetailForm].validate((valid) => {
        if (valid) {
          let formdata = new FormData();
          formdata.append("parent_id", this.postalDetailForm.selectState);
          formdata.append("postal_code", this.postalDetailForm.postalCode);
          formdata.append(
            "delivery_charge",
            this.postalDetailForm.deliveryCharge
          );
          axios
            .post("/api/postalDetail", formdata, {
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
              this.fetchpostalDetail();
              this.clearPostalForm();
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
    deletePostalDetail() {
      this.$confirm("Are you sure to delete this Postal Details?")
        .then((_) => {
          axios.delete("/api/postalDetail/" + id).then((response) => {
            this.$notify({
              title: "Success",
              message: response.data.message,
              type: "info",
            });
            this.fetchpostalDetail();
          });
        })
        .catch((_) => {});
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
