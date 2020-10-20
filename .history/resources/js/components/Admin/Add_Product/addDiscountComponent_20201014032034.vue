<template>
  <div class="">
    <div class="row">
      <div class="col-md-4">
        <el-card class="box-card">
          <div slot="header" class="clearfix">
            <span>Add Discount</span>
          </div>
          <div class="text item">
            <div class="row d-flex justify-content-center">
              <div class="col-12">
                <el-form
                  :model="discountForm"
                  :rules="discountFormRules"
                  ref="discountForm"
                  :label-position="labelPosition"
                  class="demo-discountForm"
                >
                  <el-form-item label="Select Product" prop="productSelect">
                    <el-select
                      clearable
                      placeholder="Select Product"
                      filterable
                      v-model="discountForm.productSelect"
                      @change="onChange($event)"
                      style="width: 100%"
                    >
                      <el-option
                        v-for="item in getProduct"
                        :key="item.id"
                        :label="item.product_name"
                        :value="item.id"
                      >
                      </el-option>
                    </el-select>
                  </el-form-item>
                  <el-form-item label="Selling Price" prop="sellingPrice">
                    <el-select
                      v-model="discountForm.sellingPrice"
                      placeholder="Select"
                    >
                      <el-option
                        v-for="selectProdec in selectedProduct"
                        :label="selectProdec.price"
                        :key="selectProdec.id"
                        :value="selectProdec.price"
                        class="sellingPrice"
                        style="width: 100%"
                      >
                      </el-option>
                    </el-select>
                  </el-form-item>
                  <el-form-item
                    label="Discount Percentage"
                    prop="discountPercentage"
                  >
                    <el-input
                      v-model="discountForm.discountPercentage"
                      class="discountPercentage"
                      style="width: 100%"
                    >
                    </el-input>
                  </el-form-item>
                  <el-form-item
                    label="Selling Price After Discount"
                    prop="sellingPriceAfterDiscount"
                  >
                    <el-input
                      v-model="discountcalculate"
                      class="sellingPriceAfterDiscount"
                      :disabled="true"
                      style="width: 100%"
                    >
                    </el-input>
                  </el-form-item>
                  <el-form-item>
                    <el-button
                      type="primary"
                      style="width: 80%; margin: 15px 10% 0"
                      @click="submitForm('discountForm')"
                      >Save
                    </el-button>
                  </el-form-item>
                </el-form>
              </div>
            </div>
          </div>
        </el-card>
      </div>
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-12">
            <el-card class="box-card" shadow="hover">
              <div class="text item">
                <el-table
                  :data="
                    getDiscountedProduct.filter(
                      (data) =>
                        !search ||
                        data.product_name
                          .toLowerCase()
                          .includes(search.toLowerCase())
                    )
                  "
                  border
                  max-height="470"
                  style="width: 100%"
                >
                  <el-table-column type="index" label="S.N." width="50">
                  </el-table-column>
                  <el-table-column
                    prop="product_name"
                    label="Product Name"
                    width="120"
                  >
                  </el-table-column>
                  <el-table-column
                    prop="price"
                    label="Previous Selling Price"
                    width="120"
                  >
                  </el-table-column>
                  <el-table-column
                    prop="discount"
                    label="Discount Percentage"
                    width="120"
                  >
                  </el-table-column>
                  <el-table-column
                    prop="sale_price"
                    label="Selling Price After Discount"
                    width="120"
                  >
                  </el-table-column>
                  <el-table-column fixed="right" width="140" align="right">
                    <template slot="header" slot-scope="scope">
                      <el-input
                        v-model="search"
                        size="mini"
                        placeholder="Type to search"
                      />
                    </template>
                    <template slot-scope="scope">
                      <el-button
                        size="mini"
                        type="danger"
                        icon="el-icon-delete"
                        @click="handleDelete(scope.row.id)"
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
  name: "addDiscountComponent",
  data() {
    return {
      dialogVisible: false,
      editData: [],
      selectedProduct: [
        {
          price: "",
        },
      ],
      getDiscountedProduct: [],
      discountamount: "",
      getProduct: [],
      labelPosition: "top",
      productSelectOptions: [
        {
          value: "Product - 1",
          label: "Product - 1",
        },
        {
          value: "Product - 2",
          label: "Product - 2",
        },
        {
          value: "Product - 3",
          label: "Product - 3",
        },
      ],
      editDiscount: {
        productSelect: "",
        Price: "",
        discount: "",
        discountedPrice: "",
      },
      discountForm: {
        productSelect: "",
        sellingPrice: "",
        discountPercentage: "",
      },
      discountFormRules: {
        productSelect: [
          { required: true, message: "Please select product", trigger: "blur" },
        ],
        discountPercentage: [
          {
            required: true,
            message: "Please place discount percentage",
            trigger: "blur",
          },
        ],
      },
      /*Table Data's*/
      search: "",
    };
  },
  methods: {
    fetchDiscountedProduct() {
      axios.get("/api/getDiscountedProduct", {}).then((response) => {
        this.getDiscountedProduct = response.data.getDiscountedProduct;
      });
      axios.get("/api/getProduct", {}).then((response) => {
        this.getProduct = response.data.getProduct;
      });
    },
    onChange(event) {
      console.log(this.discountForm.productSelect);
      this.selectedProduct = this.getProduct.filter(
        (getProduct) => getProduct.id == this.discountForm.productSelect
      );
    },
    submitForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          let formData = new FormData();
          formData.append("discount", this.discountForm.discountPercentage);
          formData.append("sale_price", this.discountcalculate);
          formData.append("id", this.discountForm.productSelect);
          axios
            .post("/api/addDiscount", formData, {
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
              this.fetchDiscountedProduct();
              this.discountForm = {};
            })
            .catch((error) => {
              if (error.response) {
                this.$notify({
                  title: "Error",
                  message: "Error Input Data ",
                  type: "error",
                });
              }
            });
        } else {
          console.log("error submit!!");
          return false;
        }
      });
    },
    handleDelete(id) {
      this.$confirm("Are you sure to delete this item?")
        .then((_) => {
          axios.patch("/api/deleteDiscount/" + id, {}).then((response) => {
            this.$notify({
              title: "Success",
              message: response.data.message,
              type: "info",
            });
            this.fetchDiscountedProduct();
          });
        })
        .catch((_) => {});
    },
  },
  computed: {
    discountcalculate() {
      console.log(this.discountForm.sellingPrice);
      this.discountamount =
        (this.discountForm.discountPercentage *
          this.discountForm.sellingPrice) /
        100;
      console.log(this.discountamount);
      return this.discountForm.sellingPrice - this.discountamount;
    },
  },
  mounted() {
    this.fetchDiscountedProduct();
  },
};
</script>

<style scoped>
.text {
  font-size: 14px;
}

.item {
  margin-bottom: 18px;
}

.clearfix:before,
.clearfix:after {
  display: table;
  content: "";
}

.clearfix:after {
  clear: both;
}
</style>
