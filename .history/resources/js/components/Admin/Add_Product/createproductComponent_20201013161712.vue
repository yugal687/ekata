<template>
  <div class="">
    <el-card class="box-card">
      <div class="row d-flex justify-content-center">
        <div class="col-md-10">
          <div class="row">
            <div v-if="errors.length" style="color: red; margin-bottom: 0">
              <ul>
                <li v-for="error in errors" :key="error.id">{{ error }}</li>
              </ul>
            </div>
          </div>
          <el-form
            :model="productForm"
            :rules="productRules"
            ref="productForm"
            :label-position="labelPosition"
            class="demo-productForm"
          >
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <div class="row">
                  <div class="col-md-4 col-sm-12">
                    <!--<el-form-item label="* Select Category" prop="categorySelect">-->
                    <label><span>*</span> Select Category</label>
                    <select
                      v-model="productForm.categorySelect"
                      @change="selectSubcategories($event)"
                      class="select-css"
                    >
                      <option value="" disabled selected class="placeholder">
                        Select Category
                      </option>
                      <option
                        value=""
                        v-for="item in getCategory"
                        :key="item.id"
                        v-bind:value="item.id"
                        v-bind:key="item.id"
                      >
                        {{ item.category_name }}
                      </option>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <el-form-item
                      label="Select Subcategory"
                      prop="subcategorySelect"
                    >
                      <select v-model="productForm.subcategorySelect">
                        <option value="" disabled selected hidden>
                          Select Subcategory
                        </option>
                        <option
                          value=""
                          v-for="category in subCategory"
                          :value="category.id"
                          v-bind:key="category.id"
                        >
                          {{ category.category_name }}
                        </option>
                      </select>
                    </el-form-item>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <el-form-item label="Select Brand" prop="brandSelect">
                      <el-select
                        clearable
                        placeholder="Select Brand"
                        filterable
                        v-model="productForm.brandSelect"
                        style="width: 100%"
                      >
                        <el-option
                          v-for="item in getBrand"
                          :key="item.id"
                          :label="item.brand_name"
                          :value="item.id"
                        >
                        </el-option>
                      </el-select>
                    </el-form-item>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <el-form-item label="Product Name" prop="productName">
                  <el-input
                    placeholder="Place product name"
                    v-model="productForm.productName"
                    style="width: 100%"
                  >
                  </el-input>
                </el-form-item>
              </div>
              <div class="col-md-6">
                <el-form-item label="Quantity" prop="quantity">
                  <el-input
                    placeholder="Place quantity"
                    v-model.number="productForm.quantity"
                    style="width: 100%"
                  >
                  </el-input>
                </el-form-item>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <el-form-item label="Price" prop="costPrice">
                  <el-input
                    placeholder="Place price"
                    v-model.number="productForm.costPrice"
                    type="number"
                    style="width: 100%"
                  >
                  </el-input>
                </el-form-item>
              </div>
              <div class="col-md-4">
                <el-form-item label="Tags" prop="tagsSelect">
                  <el-select
                    v-model="tagsSelect"
                    multiple
                    placeholder="Select Tags"
                  >
                    <el-option
                      v-for="item in tags"
                      :key="item.id"
                      :label="item.tags"
                      :value="item.id"
                    >
                    </el-option>
                  </el-select>
                </el-form-item>
              </div>
              <div class="col-md-4">
                <el-form-item label="Select Image" prop="imageSelect">
                  <el-upload
                    action=""
                    class="upload-demo"
                    ref="upload"
                    :auto-upload="false"
                    :file-list="files"
                    multiple
                  >
                    <el-button slot="trigger" size="small" type="primary"
                      >select file</el-button
                    >
                  </el-upload>
                </el-form-item>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <el-form-item
                  label="Additional Information"
                  prop="additionalInformation"
                >
                  <el-input
                    type="textarea"
                    v-model="productForm.additionalInformation"
                    :autosize="{ minRows: 3, maxRows: 4 }"
                    placeholder="Please input additional Information"
                  >
                  </el-input>
                </el-form-item>
              </div>
            </div>
            <div class="row">
              <el-form-item>
                <el-button
                  type="primary"
                  style="width: 100%; margin: 15px 10% 0"
                  @click="submitForm('productForm')"
                >
                  Save
                </el-button>
              </el-form-item>
            </div>
          </el-form>
        </div>
      </div>
    </el-card>
  </div>
</template>

<script>
export default {
  name: "createproductComponent",
  data() {
    return {
      errors: [],
      files: [],
      tags: [],
      getCategory: [],
      getSubCategory: [],
      getBrand: [],
      subCategory: [],
      dynamicTags: [],
      inputVisible: false,
      inputValue: "",

      labelPosition: "top",
      tagsSelect: "",
      productForm: {
        categorySelect: "",
        subcategorySelect: "",
        brandSelect: "",
        imageSelect: "",
        productName: "",
        quantity: "",
        costPrice: "",
        additionalInformation: "",
        type: [],
      },
      productRules: {
        brandSelect: [
          { required: true, message: "Please select brand", trigger: "blur" },
        ],
        productName: [
          {
            required: true,
            message: "Please input product name",
            trigger: "blur",
          },
        ],
        quantity: [
          { required: true, message: "Please input quantity", trigger: "blur" },
          {
            type: "number",
            message: "Quantity must be a number",
            trigger: "blur",
          },
        ],
        costPrice: [
          {
            required: true,
            type: "number",
            message: "Please input valid price",
            trigger: "blur",
          },
        ],
        additionalInformation: [
          {
            required: true,
            message: "Please input additional Information",
            trigger: "blur",
          },
        ],
      },
    };
  },
  mounted() {
    axios.get("/api/getAllCategories", {}).then((response) => {
      this.getCategory = response.data.getCategory;
    });
    axios.get("/api/getSubCategories", {}).then((response) => {
      this.getSubCategory = response.data.getSubCategory;
    });
    axios.get("/api/getBrand", {}).then((response) => {
      this.getBrand = response.data.getBrand;
    });
    axios.get("/api/getTag", {}).then((response) => {
      this.tags = response.data.tags;
    });
  },
  methods: {
    selectSubcategories(event) {
      let categoryId = event.target.value;
      this.getCategory.filter((value, key) => {
        if (value.id == categoryId) {
          this.subCategory = value.children;
        }
        console.log(this.subCategory);
      });
    },
    submitForm(formName) {
      this.errors = [];
      if (this.productForm.categorySelect === "") {
        this.errors.push("Please select category");
      }
      this.$refs[formName].validate((valid) => {
        if (valid) {
          let tag = this.tagsSelect;
          console.log(tag);
          let file = this.$refs.upload.uploadFiles;
          console.log(file);
          let formData = new FormData();
          tag.forEach((v, k) => {
            formData.append(`tag[${k}]`, v);
          });
          file.forEach((v, k) => {
            formData.append(`image[${k}]`, v.raw);
          });
          if (this.productForm.subcategorySelect) {
            formData.append("category_id", this.productForm.subcategorySelect);
          } else {
            formData.append("category_id", this.productForm.categorySelect);
          }
          console.log(this.productForm.subcategorySelect);
          console.log(this.productForm.categorySelect);
          formData.append("brand_id", this.productForm.brandSelect);
          formData.append("product_name", this.productForm.productName);
          formData.append("price", this.productForm.costPrice);
          formData.append(
            "additional_information",
            this.productForm.additionalInformation
          );
          formData.append("quantity", this.productForm.quantity);

          axios
            .post("/api/addProduct", formData, {
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
              this.productForm = {};
              this.productForm.categorySelect = "";
              this.productForm.subcategorySelect = "";
            })
            .catch((error) => {
              if (error.response) {
                this.$notify({
                  title: "Error",
                  message: "Error Input Data ",
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
select {
  -webkit-appearance: none;
  background-color: #fff;
  background-image: none;
  border-radius: 4px;
  border: 1px solid #dcdfe6;
  box-sizing: border-box;
  color: #606266;
  display: inline-block;
  font-size: inherit;
  height: 40px;
  line-height: 40px;
  outline: 0;
  padding: 0 15px;
  transition: border-color 0.2s cubic-bezier(0.645, 0.045, 0.355, 1);
  width: 100%;
}

.select-css option {
  font-size: 14px;
  padding: 0 20px;
  position: relative;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  color: #606266;
  height: 34px;
  line-height: 34px;
  box-sizing: border-box;
  cursor: pointer;
}
label {
  text-align: right;
  vertical-align: middle;
  float: left;
  font-size: 14px;
  color: #606266;
  line-height: 40px;
  padding: 0 12px 0 0;
  box-sizing: border-box;
}
label span {
  color: rgba(255, 0, 0, 0.6);
}
</style>
