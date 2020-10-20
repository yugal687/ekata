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
                    v-model="paymentCredentialForm.paymentType"
                    style="width: 100%"
                  >
                    <el-option
                      v-for="type in paymentType"
                      :key="type.id"
                      data-target=".bd-paymentCredential-modal-lg"
                      data-toggle="modal"
                      :label="type[0]"
                      :value="type.id"
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
                <el-form-item label="API Key" prop="apiKey">
                  <el-input
                    v-model="paymentCredentialForm.apiKey"
                    placeholder="Please input API Key."
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
                :data="
                  payCred.filter(
                    (data) =>
                      !payCredSearch ||
                      data.paymentType
                        .toLowerCase()
                        .includes(payCredSearch.toLowerCase())
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
                  prop="paymentType"
                  label-class-name="text-white bg-dark"
                  label="Payment Type"
                >
                </el-table-column>
                <el-table-column
                  prop="SecretKey"
                  label-class-name="text-white bg-dark"
                  label="Secret Key"
                >
                </el-table-column>
                <el-table-column
                  prop="apiKey"
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
                      size="mini"
                      class="editPostalModal"
                      data-target=".bd-payCredSearch-modal-lg"
                      data-toggle="modal"
                      @click="editpayCred(scope.row.id)"
                      circle
                    ></el-button>
                    <el-button
                      size="mini"
                      type="danger"
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
      paymentType: [],
      payCred: [],
      payCredSearch: "",

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

  mounted: {
    fetchPaymentCredential() {},
  },

  methods: {
    fetchPaymentCredential() {
      axios.get("/api/paymentCredential", {}).then((response) => {
        this.payCred = response.data.payCred;
      });
    },
  },
};
</script>