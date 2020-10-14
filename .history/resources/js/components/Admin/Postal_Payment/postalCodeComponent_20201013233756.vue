<template>
  <div class="">
    <div class="row">
      <div class="col-md-5 col-sm-12">
        <div class="row d-flex justify-content-center">
          <div class="categoryBtn btn btn-primary">Add Category</div>
        </div>
        <div
          class="row box-card-slide category-div hidden"
          style="border-top: 3px solid blue"
        >
          <div class="box-header clearfix">
            <span>Add Postal Detail</span>
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
                  <div v-for="ecategory in editcategory">
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
      <div class="col-md-7 col-sm-12">
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
  name: "postalCodeComponents",
  data() {
    return {
      postalCodeForm: {
        postalCodeId: "",
        stateId: "",
        deliveryCharge: "",
      },
    };
  },
};
</script>