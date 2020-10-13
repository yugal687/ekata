<template>
  <div class="">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div class="row d-flex justify-content-center">
          <div class="categoryBtn btn btn-primary">Add Category</div>
        </div>
        <div
          class="row box-card-slide category-div hidden"
          style="border-top: 3px solid blue"
        >
          <div class="box-header clearfix">
            <span>Add Category</span>
            <el-button
              class="closeCategoryBtn"
              style="float: right; padding: 3px 0"
              type="text"
              >Close
            </el-button>
          </div>
          <div class="box-body">
            <div class="row d-flex justify-content-center">
              <div class="col-12">
                <el-form
                  :model="categoryForm"
                  :rules="categoryRules"
                  ref="categoryForm"
                  :label-position="labelPosition"
                  class="demo-categoryForm"
                >
                  <el-form-item label="Upload Header Image" prop="headerImage">
                    <el-upload
                      class="upload-demo"
                      action=""
                      ref="upload"
                      :on-preview="handlePreviewHeader"
                      :on-remove="handleRemoveHeader"
                      :on-change="handleChangeHeader"
                      :auto-upload="false"
                      :file-list="fileListHeader"
                    >
                      <el-button size="" type="primary"
                        >Click to upload</el-button
                      >
                      <span slot="tip" class="el-upload__tip"
                        >&nbsp; We prefer header image to be of high quality
                      </span>
                    </el-upload>
                  </el-form-item>
                  <el-form-item
                    label="Upload Thumbnail Image"
                    prop="thumbnailImage"
                  >
                    <el-upload
                      class="upload-demo"
                      action=""
                      ref="upload"
                      :on-preview="handlePreviewThumbnail"
                      :on-remove="handleRemoveThumbnail"
                      :on-change="handleChangeThumbnail"
                      :auto-upload="false"
                      :file-list="fileListThumbnail"
                    >
                      <el-button size="" type="primary"
                        >Click to upload</el-button
                      >
                    </el-upload>
                  </el-form-item>
                  <el-form-item label="Category Name" prop="name">
                    <el-input v-model="categoryForm.name" style="width: 100%">
                    </el-input>
                  </el-form-item>
                  <el-form-item>
                    <el-button
                      type="primary"
                      style="width: 80%; margin: 15px 10% 0"
                      @click="submitCategory('categoryForm')"
                      >Create
                    </el-button>
                  </el-form-item>
                </el-form>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12">
            <el-card class="box-card" shadow="hover">
              <div class="text item">
                <el-table
                  :data="
                    getCategory.filter(
                      (data) =>
                        !categorySearch ||
                        data.category_name
                          .toLowerCase()
                          .includes(categorySearch.toLowerCase())
                    )
                  "
                  border
                  max-height="470"
                  style="width: 100%"
                >
                  <el-table-column type="index" label="S.N." width="50">
                  </el-table-column>
                  <el-table-column prop="category_name" label="Category Name">
                  </el-table-column>
                  <el-table-column fixed="right" align="right">
                    <template slot="header" slot-scope="scope">
                      <el-input
                        v-model="categorySearch"
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
                        @click="editCategory(scope.row.id)"
                        circle
                      ></el-button>
                      <el-button
                        size="mini"
                        type="danger"
                        icon="el-icon-delete"
                        @click="deleteCategory(scope.row.id)"
                        circle
                      ></el-button>
                    </template>
                  </el-table-column>
                </el-table>
              </div>
            </el-card>
          </div>
        </div>

        <div
          class="modal fade bd-example-modal-lg"
          tabindex="-1"
          role="dialog"
          aria-labelledby="myLargeModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header bg-info">
                Edit Category
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
                  <div v-for="ecategory in editcategory" :key="ecategory">
                    <el-form
                      :model="categoryForm"
                      ref="categoryForm"
                      :label-position="labelPosition"
                      class="demo-categoryForm"
                    >
                      <el-form-item label="Category Name" prop="name">
                        <el-input
                          v-model="ecategory.category_name"
                          style="width: 100%"
                        >
                        </el-input>
                      </el-form-item>
                      <el-form-item>
                        <el-button
                          type="primary"
                          style="width: 80%; margin: 15px 10% 0"
                          @click="saveEditCategory"
                          >Create
                        </el-button>
                      </el-form-item>
                    </el-form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-12">
        <div class="row d-flex justify-content-center">
          <div class="subcategoryBtn btn btn-success">Add Sub-Category</div>
        </div>
        <div
          class="row box-card-slide subcategory-div hidden"
          style="border-top: 3px solid green"
        >
          <div class="box-header clearfix">
            <span>Add Sub-Category</span>
            <el-button
              class="clodeSubcategoryBtn"
              style="float: right; padding: 3px 0"
              type="text"
              >Close
            </el-button>
          </div>
          <div class="box-body">
            <div class="row d-flex justify-content-center">
              <div class="col-12">
                <el-form
                  :model="subcategoryForm"
                  :rules="subcategoryRules"
                  ref="subcategoryForm"
                  :label-position="labelPosition"
                  class="demo-subcategoryForm"
                >
                  <el-form-item label="Select Category" prop="categorySelect">
                    <el-select
                      clearable
                      placeholder="Select Category"
                      filterable
                      v-model="subcategoryForm.categorySelect"
                      style="width: 100%"
                    >
                      <el-option
                        v-for="item in getCategory"
                        :key="item.id"
                        data-target=".bd-subcategory-modal-lg"
                        data-toggle="modal"
                        :label="item.category_name"
                        :value="item.id"
                      >
                      </el-option>
                    </el-select>
                  </el-form-item>
                  <el-form-item label="Sub Category Name" prop="name">
                    <el-input
                      v-model="subcategoryForm.name"
                      style="width: 100%"
                    >
                    </el-input>
                  </el-form-item>
                  <el-form-item>
                    <el-button
                      type="primary"
                      style="width: 80%; margin: 15px 10% 0"
                      @click="submitSubCategory('subcategoryForm')"
                      >Create
                    </el-button>
                  </el-form-item>
                </el-form>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3">
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
                        data-target=".bd-subcategory-modal-lg"
                        data-toggle="modal"
                        @click="editSubCategory(scope.row.id)"
                        circle
                      ></el-button>
                      <el-button
                        size="mini"
                        type="danger"
                        icon="el-icon-delete"
                        @click="deleteCategory(scope.row.id)"
                        circle
                      ></el-button>
                    </template>
                  </el-table-column>
                </el-table>
              </div>
            </el-card>
          </div>
        </div>
        <div
          class="modal fade bd-subcategory-modal-lg"
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
                  <div
                    v-for="esubcategory in editsubCategory"
                    :key="esubcategory.id"
                  >
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
                            data-target=".bd-subcategory-modal-lg"
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
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "setupComponent",
  data() {
    return {
      /*Confitmation Dialog*/
      confirmDeleteCategory: false,
      /*-------------*/

      fileListHeader: [],
      fileListThumbnail: [],
      edit: false,
      editcategory: [],
      editsubCategory: [],
      labelPosition: "top",
      getCategory: [],
      getBrand: [],
      getSubCategory: [],
      categoryForm: {
        name: "",
      },
      subcategoryForm: {
        categorySelect: "",
        name: "",
      },
      brandForm: {
        name: "",
      },
      tagForm: {
        name: "",
      },
      categoryRules: {
        name: [
          {
            required: true,
            message: "Please input category name",
            trigger: "blur",
          },
        ],
      },
      subcategoryRules: {
        categorySelect: [
          {
            required: true,
            message: "Please select category",
            trigger: "blur",
          },
        ],
        name: [
          {
            required: true,
            message: "Please input sub-category name",
            trigger: "blur",
          },
        ],
      },

      categorySearch: "",
      subcategorySearch: "",
    };
  },
  methods: {
    handleRemoveHeader(file, fileListHeader) {
      console.log(file, fileListHeader);
    },
    handlePreviewHeader(file) {
      console.log(file);
    },
    handleChangeHeader(file, fileListHeader) {
      this.fileListHeader = fileListHeader.slice(-1);
    },
    handleRemoveThumbnail(file, fileListThumbnail) {
      console.log(file, fileListThumbnail);
    },
    handlePreviewThumbnail(file) {
      console.log(file);
    },
    handleChangeThumbnail(file, fileListThumbnail) {
      this.fileListThumbnail = fileListThumbnail.slice(-1);
    },
    /*---------*/
    editCategory(id) {
      this.editcategory = this.getCategory.filter(
        (getCategory) => getCategory.id == id
      );
    },
    editSubCategory(id) {
      this.editsubCategory = this.getSubCategory.filter(
        (getSubCategory) => getSubCategory.id == id
      );
    },
    saveEditCategory() {
      axios
        .post("/api/saveEditCategory", {
          editCategory: this.editcategory,
        })
        .then((response) => {
          this.$notify({
            title: "Success",
            message: response.data.message,
            type: "success",
          });
          this.fetchCategory();
        });
    },
    saveEditSubCategory() {
      axios
        .post("/api/saveEditCategory", {
          editCategory: this.editsubCategory,
        })
        .then((response) => {
          this.$notify({
            title: "Success",
            message: response.data.message,
            type: "success",
          });
          this.fetchCategory();
        });
    },
    deleteCategory(id) {
      this.$confirm("Are you sure to delete this item?")
        .then((_) => {
          axios.delete("/api/deleteCategory/" + id).then((response) => {
            this.$notify({
              title: "Success",
              message: response.data.message,
              type: "info",
            });
            this.fetchCategory();
          });
        })
        .catch((_) => {});
    },
    submitSubCategory(subcategoryForm) {
      this.$refs[subcategoryForm].validate((valid) => {
        if (valid) {
          let formdata = new FormData();
          formdata.append("category_name", this.subcategoryForm.name);
          formdata.append("parent_id", this.subcategoryForm.categorySelect);
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
              }
            });
        } else {
          console.log("error submit!!");
          return false;
        }
      });
    },
    submitCategory(categoryForm) {
      this.$refs[categoryForm].validate((valid) => {
        console.log(this.fileListThumbnail);
        if (valid) {
          let bannerCategory = this.fileListHeader;
          let thumbnailCategory = this.fileListThumbnail;
          let formData = new FormData();
          bannerCategory.forEach((v, k) => {
            formData.append(`bannerCategory[${k}]`, v.raw);
          });
          thumbnailCategory.forEach((v, k) => {
            formData.append(`thumbnailCategory[${k}]`, v.raw);
          });

          formData.append("category_name", this.categoryForm.name);

          axios
            .post("/api/postCategory", formData, {
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
              this.categoryForm = {};
              this.$refs.upload.uploadFiles = {};
              this.$refs.upload.uploadFiles = {};
              this.fetchCategory();
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
    fetchCategory() {
      axios.get("/api/getCategories", {}).then((response) => {
        this.getCategory = response.data.getCategory;
      });
      axios.get("/api/getSubCategories", {}).then((response) => {
        this.getSubCategory = response.data.getSubCategory;
      });
    },
  },
  mounted() {
    this.fetchCategory();
    $(document).ready(function () {
      $(".categoryBtn").click(function () {
        $(".category-div").slideToggle("slow");
      });
      $(".subcategoryBtn").click(function () {
        $(".subcategory-div").slideToggle("slow");
      });
      $(".closeCategoryBtn").click(function () {
        $(".category-div").slideToggle("slow");
      });
      $(".clodeSubcategoryBtn").click(function () {
        $(".subcategory-div").slideToggle("slow");
      });
    });
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
