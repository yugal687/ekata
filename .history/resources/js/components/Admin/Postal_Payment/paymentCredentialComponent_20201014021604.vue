<template>
  <div>
    <div class="col-md-7 col-sm-12 border-left border-dark">
      <div class="row d-flex justify-content-center">
        <div class="postalDetailBtn btn btn-success">
          Add Payment Credentials
        </div>
      </div>
      <div
        class="row box-card-slide postalDetail-div hidden"
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
</template>

<script>
export default {
  name: "postalCodeComponents",
  data() {
    return {
      labelPosition: "top",
      paymentCredentialForm: {
        paymentType: "",
        secretKey: "",
        apiKey: "",
      },

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
          { required: true, message: "Please input API key", trigger: "blur" },
        ],
      },
    };
  },
};
</script>