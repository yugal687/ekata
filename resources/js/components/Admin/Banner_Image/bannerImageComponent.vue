<template>
    <div class="">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <el-card class="box-card">
                    <div slot="header">
                        <span>Add Banner Image</span>
                    </div>
                    <div class="text item">
                        <el-form :model="bannerImageForm" :rules="bannerImageFormRules" ref="bannerImageForm"
                                 class="demo-ruleForm">
                            <div class="row d-flex justify-content-center">
                                <el-form-item label="" prop="bannerImage">
                                    <el-upload
                                        action="#"
                                        list-type="picture-card"
                                        v-model="bannerImageForm.bannerImage"
                                        :on-preview="handlePictureCardPreview"
                                        :on-remove="handleRemove"
                                        :auto-upload="false">
                                        <i class="el-icon-plus"></i>
                                    </el-upload>
                                </el-form-item>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <el-form-item>
                                    <el-button type="primary"
                                               width="100%"
                                               @click="saveImage('bannerImageForm')">Save Image
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
                            <div v-for="images in image" :key="images" class="col-md-6 col-sm-12 mt-2">
                                <div class="demo-image__placeholder" style="position: relative;">
                                    <el-image
                                        :src="images"
                                        :preview-src-list="image">
                                    </el-image>
                                </div>
                                <div style="position: absolute; padding: 10px; bottom: -3px; right: 5px;">
                                    <el-button-group>
                                        <el-button type="success"
                                                   v-if=""
                                                   @click="toggle(images.id)"
                                                   size="mini">
                                            <i class="fas fa-check"></i>
                                        </el-button>
                                        <el-button type="warning"
                                                   v-if=""
                                                   @click="toggle(images.id)"
                                                   size="mini">
                                            <i class="fas fa-times"></i>
                                        </el-button>
                                        <el-button type="danger"
                                                   size="mini"
                                                   @click="deleteImage(images.id)">
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
            <img width="100%"
                 :src="dialogImageUrl" alt="">
        </el-dialog>
    </div>
</template>

<script>
export default {
    name: "bannerImageComponent",
    data() {
        return {
            image: [
                'https://fuss10.elemecdn.com/a/3f/3302e58f9a181d2509f3dc0fa68b0jpeg.jpeg',
                'https://fuss10.elemecdn.com/1/34/19aa98b1fcb2781c4fba33d850549jpeg.jpeg',
                'https://fuss10.elemecdn.com/0/6f/e35ff375812e6b0020b6b4e8f9583jpeg.jpeg',
                'https://fuss10.elemecdn.com/9/bb/e27858e973f5d7d3904835f46abbdjpeg.jpeg',
                'https://fuss10.elemecdn.com/d/e6/c4d93a3805b3ce3f323f7974e6f78jpeg.jpeg',
                'https://fuss10.elemecdn.com/3/28/bbf893f792f03a54408b3b7a7ebf0jpeg.jpeg',
                'https://fuss10.elemecdn.com/2/11/6535bcfb26e4c79b48ddde44f4b6fjpeg.jpeg'
            ],
            dialogImageUrl: '',
            dialogVisible: false,
            disabled: false,
            bannerImageForm: {
                bannerImage: ''
            },
            bannerImageFormRules: {

            },
        };
    },
    methods: {
        handleRemove(file, fileList) {
            console.log(file, fileList);
        },
        handlePictureCardPreview(file) {
            this.dialogImageUrl = file.url;
            this.dialogVisible = true;
        },
        saveImage(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    alert('submit!');
                } else {
                    console.log('error submit!!');
                    return false;
                }
            });
        },
        toggle: function (id) {

        },
        deleteImage(id) {

        },
    }
}
</script>

<style scoped>

</style>
