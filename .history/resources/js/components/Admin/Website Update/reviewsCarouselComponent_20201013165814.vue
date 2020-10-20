<template>
  <div class="">
    <div class="row">
      <div class="col-md-4 col-sm-12">
        <el-card class="box-card">
          <div slot="header" class="">
            <span>Add Customer Reviews</span>
          </div>
          <div class="text item">
            <el-form
              :model="customerReviewsImageForm"
              :rules="customerReviewsImageFormRules"
              ref="customerReviewsImageForm"
              class="demo-ruleForm"
            >
              <div class="row d-flex justify-content-center">
                <el-form-item label="" prop="customerReviewImage">
                  <el-upload
                    action=""
                    ref="upload"
                    list-type="picture-card"
                    v-model="customerReviewsImageForm.customerReviewImage"
                    :on-preview="handlePictureCardPreview"
                    :on-remove="handleRemove"
                    :auto-upload="false"
                  >
                    <i class="el-icon-plus"></i>
                  </el-upload>
                </el-form-item>
              </div>
              <div class="row d-flex justify-content-center">
                <el-form-item>
                  <el-button
                    type="primary"
                    width="100%"
                    @click="saveImage('customerReviewsImageForm')"
                    >Save Image
                  </el-button>
                </el-form-item>
              </div>
            </el-form>
          </div>
        </el-card>
      </div>
      <div class="col-md-8 col-sm-12">
        <el-card class="box-card">
          <div class="text item">
            <div class="row">
              <div
                v-for="images in getReviewImage"
                :key="images.id"
                class="col-md-6 col-sm-12 mt-2"
              >
                <div class="demo-image__placeholder" style="position: relative">
                  <el-image :src="images.image"> </el-image>
                </div>
                <div
                  style="
                    position: absolute;
                    padding: 10px;
                    bottom: -3px;
                    right: 5px;
                  "
                >
                  <el-button-group>
                    <el-button
                      type="warning"
                      v-if="images.active == 0"
                      @click="setActive(images.id)"
                      size="mini"
                    >
                      <i class="fas fa-times"></i>
                    </el-button>
                    <el-button
                      type="success"
                      v-if="images.active == 1"
                      @click="setInActive(images.id)"
                      size="mini"
                    >
                      <i class="fas fa-check"></i>
                    </el-button>
                    <el-button
                      type="danger"
                      size="mini"
                      @click="deleteImage(images.id)"
                    >
                      <i class="fas fa-trash"></i>
                    </el-button>
                  </el-button-group>
                </div>
              </div>
            </div>
          </div>
        </el-card>
      </div>
    </div>

    <el-dialog :visible.sync="dialogVisible">
      <img width="100%" :src="dialogImageUrl" alt="" />
    </el-dialog>
  </div>
</template>

<script>
export default {
  name: "reviewsCarouselComponent",
  data() {
    return {
      getReviewImage: [],
      dialogImageUrl: "",
      dialogVisible: false,
      disabled: false,
      customerReviewsImageForm: {
        customerReviewImage: "",
      },
      customerReviewsImageFormRules: {},
    };
  },
  mounted() {
    this.fetchReview();
  },
  methods: {
    fetchReview() {
      axios.get("/api/getReviewImage", {}).then((response) => {
        this.getReviewImage = response.data.getReviewImage;
      });
    },
    handleRemove(file, fileList) {
      console.log(file, fileList);
    },
    handlePictureCardPreview(file) {
      this.dialogImageUrl = file.url;
      this.dialogVisible = true;
    },
    saveImage(customerReviewsImageForm) {
      this.$refs[customerReviewsImageForm].validate((valid) => {
        if (valid) {
          let file = this.$refs.upload.uploadFiles;
          console.log(file);
          let formData = new FormData();
          file.forEach((v, k) => {
            formData.append(`image[${k}]`, v.raw);
          });
          axios
            .post("/api/postReviewImage", formData, {
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
              this.fetchReview();
              this.$refs.upload.uploadFiles = [];
            })
            .catch((error) => {
              if (error.response.status == 422) {
                this.errors = error.response.data.errors;
              }
            });
        } else {
          console.log("error submit!!");
          return false;
        }
      });
    },
    setActive(id) {
      axios.patch("/api/activeReview/" + id).then((response) => {
        this.$notify({
          title: "Success",
          message: response.data.message,
          type: "success",
        });
        this.fetchReview();
      });
    },
    setInActive(id) {
      axios
        .patch("/api/inactiveReview/" + id)
        .then((response) => {
          this.$notify({
            title: "Success",
            message: response.data.message,
            type: "info",
          });
          this.fetchReview();
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
    },
    deleteImage(id) {
      this.$confirm("Are you sure to delete this item?")
        .then((_) => {
          axios
            .delete("/api/deleteReview/" + id)
            .then((response) => {
              this.$notify({
                title: "Success",
                message: response.data.message,
                type: "info",
              });
              this.fetchReview();
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
        })
        .catch((_) => {});
    },
  },
};
</script>

<style scoped>
</style>
