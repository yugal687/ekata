<template>
  <div>
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div class="row d-flex justify-content-center">
          <div class="categoryBtn btn btn-primary">Add Postal's Detail</div>
        </div>
        <div
          class="row box-card-slide category-div hidden"
          style="border-top: 3px solid blue"
        >
          <div class="box-header clearfix">
            <span>Add Postal's Detail</span>
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
                      action="https://jsonplaceholder.typicode.com/posts/"
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
                      action="https://jsonplaceholder.typicode.com/posts/"
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
      stateForm: {
        stateName: "",
      },
      state: [],

      isEditPostalCode: "",
    };
  },
};
</script>

<style scoped>
.container-fluid .row {
  margin-left: 0;
  margin-right: 0;
}

/* .hidden {
  display: none;
} */

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
