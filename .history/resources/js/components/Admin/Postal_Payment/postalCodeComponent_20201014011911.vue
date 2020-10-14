<template>
  <div>
    <div class="row">
      <!-- state detail input -->
      <div class="col-md-6 col-sm-12">
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
            <el-card class="box-card" shadow="hover">
              <div class="text item">
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
                  <el-table-column type="index" label="S.N." width="50">
                  </el-table-column>
                  <el-table-column prop="stateName" label="State Name">
                  </el-table-column>
                  <el-table-column fixed="right" align="right">
                    <template slot="header" slot-scope="scope">
                      <el-input
                        v-model="stateSearch"
                        size="mini"
                        placeholder="Type to search"
                      />
                    </template>
                    <template slot-scope="scope">
                      <el-button
                        type="primary"
                        icon="el-icon-edit"
                        size="mini"
                        data-target=".bd-example-modal-lg"
                        data-toggle="modal"
                        @click="editState(scope.row.id)"
                        circle
                      ></el-button>
                      <el-button
                        size="mini"
                        type="danger"
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
      <div class="col-md-6 col-sm-12">
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
        <!-- <div class="row mt-3">
          <div class="col-12">
            <el-card class="box-card" shadow="hover">
              <div class="text item">
                <el-table
                  :data="
                    getSubCategory.filter(
                      (data) =>
                        !subcategorySearch ||
                        data.category_name
                          .toLowerCase()
                          .includes(subcategorySearch.toLowerCase())
                    )
                  "
                  border
                  max-height="470"
                  style="width: 100%"
                >
                  <el-table-column type="index" label="S.N." width="50">
                  </el-table-column>
                  <el-table-column
                    prop="category_name"
                    label="Subcategory Name"
                  >
                  </el-table-column>
                  <el-table-column
                    prop="parent.category_name"
                    label="Category Name"
                  >
                  </el-table-column>
                  <el-table-column fixed="right" align="right">
                    <template slot="header" slot-scope="scope">
                      <el-input
                        v-model="subcategorySearch"
                        size="mini"
                        placeholder="Type to search"
                      />
                    </template>
                    <template slot-scope="scope">
                      <el-button
                        type="primary"
                        icon="el-icon-edit"
                        size="mini"
                        data-target=".bd-postalDetail-modal-lg"
                        data-toggle="modal"
                        @click="editPostal(scope.row.id)"
                        circle
                      ></el-button>
                      <el-button
                        size="mini"
                        type="danger"
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
        </div> -->
        <!-- <div
          class="modal fade bd-postalDetail-modal-lg"
          tabindex="-1"
          role="dialog"
          aria-labelledby="myLargeModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header bg-info">
                Edit Sub-Category
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
                  <div class="col-md-12">
                    <div
                      v-if="edit"
                      class="alert alert-success alert-dismissible fade show"
                      role="alert"
                    >
                      <button
                        type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-label="Close"
                      >
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </div>
                  <div v-for="esubcategory in editsubCategory">
                    <el-form
                      :model="categoryForm"
                      ref="categoryForm"
                      :label-position="labelPosition"
                      class="demo-categoryForm"
                    >
                      <el-form-item label="Category Name" prop="name">
                        <el-input
                          v-model="esubcategory.category_name"
                          style="width: 100%"
                        >
                        </el-input>
                      </el-form-item>
                      <el-form-item label="Category Name" prop="name">
                        <el-select
                          clearable
                          placeholder="Select Category"
                          filterable
                          v-model="esubcategory.parent.category_name"
                          style="width: 100%"
                        >
                          <el-option
                            v-for="item in getCategory"
                            :key="item.id"
                            data-target=".bd-postalDetail-modal-lg"
                            data-toggle="modal"
                            :label="item.category_name"
                            :value="item.id"
                          >
                          </el-option>
                        </el-select>
                      </el-form-item>
                      <el-form-item>
                        <el-button
                          type="primary"
                          style="width: 80%; margin: 15px 10% 0"
                          @click="saveEditSubCategory"
                          >Create
                        </el-button>
                      </el-form-item>
                    </el-form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
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
      postalCodeForm: {
        postalCode: "",
        stateId: "",
        deliveryCharge: "",
      },
      stateForm: {
        stateName: "",
      },
      postalDetailForm: {
        postalCode: "",
        DeliveryCharge: "",
        selectState: "",
      },
      state: [],
      isEditPostalCode: "",

      stateSearch: "",
      postalSearch: "",

      //   rule definition
      stateRules: {
        stateName: [
          {
            required: true,
            message: "Please input state name.",
            trigger: "blur",
          },
        ],
      },

      postalDetailRules: {
        postalCode: [
          {
            required: true,
            message: "please input valid PostCode.",
            trigger: blur,
          },
        ],

        deliveryCharge: [
          {
            required: true,
            message: "Please input delivery charge.",
            trigger: blur,
          },
        ],

        selectState: [
          {
            required: true,
            message: "Please select state name.",
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

    editState() {},
    deleteState() {},

    submitSubCategory(subcategoryForm) {
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
            .post("/api/addsubcategory", formdata, {
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
              this.subcategoryForm = {};
              this.fetchCategory();
            })
            .catch((error) => {
              if (error.response.status == 422) {
                this.$notify({
                  title: "Error",
                  message: error.response.data.message,
                  type: "error",
                });
                /*this.errors = error.response.data.errors;*/
              }
            });
        } else {
          console.log("error submit!!");
          return false;
        }
      });
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
