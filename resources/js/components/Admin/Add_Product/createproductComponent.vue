<template>
    <div class="">
        <el-card class="box-card">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <el-form :model="productForm" :rules="productRules" ref="productForm"
                             :label-position="labelPosition" class="demo-productForm">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <el-form-item label="Select Image" prop="imageSelect">
                                    <el-upload
                                        action=""
                                        class="upload-demo"
                                        ref="upload"
                                        :auto-upload="false"
                                        :file-list="files"
                                        multiple>
                                        <el-button slot="trigger" size="small" type="primary">select file</el-button>
                                    </el-upload>
                                </el-form-item>
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <el-form-item label="Select Category" prop="categorySelect">
                                            <el-select clearable placeholder="Select Category"
                                                       filterable
                                                       v-model="productForm.categorySelect"
                                                       style="width: 100%">
                                                <el-option
                                                    v-for="item in getCategory"
                                                    :key="item.id"
                                                    :label="item.category_name"
                                                    :value="item.id">

                                                </el-option>
                                            </el-select>
                                        </el-form-item>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <el-form-item label="Select Sub-Category" prop="subcategorySelect">
                                            <el-select clearable placeholder="Select Sub-Category"
                                                       filterable
                                                       v-model="productForm.subcategorySelect"
                                                       style="width: 100%">
                                                <el-option
                                                    v-for="item in getSubCategory"
                                                    :key="item.id"
                                                    :label="item.category_name"
                                                    :value="item.id">
                                                </el-option>
                                            </el-select>
                                        </el-form-item>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <el-form-item label="Select Brand" prop="brandSelect">
                                            <el-select clearable placeholder="Select Brand"
                                                       filterable
                                                       v-model="productForm.brandSelect"
                                                       style="width: 100%">
                                                <el-option
                                                    v-for="item in getBrand"
                                                    :key="item.id"
                                                    :label="item.brand_name"
                                                    :value="item.id">
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
                                    <el-input placeholder="Place product name"
                                              v-model="productForm.productName"
                                              style="width: 100%;">
                                    </el-input>
                                </el-form-item>
                            </div>
                            <div class="col-md-3">
                                <el-form-item label="Quantity" prop="quantity">
                                    <el-input placeholder="Place quantity"
                                              v-model="productForm.quantity"
                                              style="width: 100%;">
                                    </el-input>
                                </el-form-item>
                            </div>
                            <div class="col-md-3">
                                <el-form-item label="Cost Price" prop="costPrice">
                                    <el-input placeholder="Place cost price"
                                              v-model="productForm.costPrice"
                                              style="width: 100%;">
                                    </el-input>
                                </el-form-item>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <el-form-item label="Selling Price" prop="sellingPrice">
                                    <el-input placeholder="Place selling price"
                                              v-model="productForm.sellingPrice"
                                              style="width: 100%">
                                    </el-input>
                                </el-form-item>
                            </div>
                            <div class="col-md-8">
                                <el-form-item label="Tags" prop="tags">
                                    <el-tag
                                        :key="tag"
                                        v-for="tag in dynamicTags"
                                        closable
                                        :disable-transitions="false"
                                        @close="handleClose(tag)">
                                        {{ tag }}
                                    </el-tag>
                                    <el-input
                                        class="input-new-tag"
                                        v-if="inputVisible"
                                        v-model="inputValue"
                                        ref="saveTagInput"
                                        size="mini"
                                        @keyup.enter.native="handleInputConfirm"
                                        @blur="handleInputConfirm"
                                    >
                                    </el-input>
                                    <el-button v-else class="button-new-tag" size="small" @click="showInput">+ New Tag
                                    </el-button>
                                </el-form-item>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <el-form-item label="Additional Information"
                                              prop="additionalInformation">
                                    <el-input
                                        type="textarea"
                                        v-model="productForm.additionalInformation"
                                        :autosize="{ minRows: 3, maxRows: 4}"
                                        placeholder="Please input additional Information"
                                    >
                                    </el-input>
                                </el-form-item>
                            </div>
                        </div>
                        <div class="row">
                            <el-form-item>
                                <el-button type="primary"
                                           style="width: 100%; margin: 15px 10% 0"
                                           @click="submitForm('productForm')"> Save
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
                files: [],
                getCategory: [],
                getSubCategory: [],
                getBrand: [],
                dynamicTags: [],
                inputVisible: false,
                inputValue: '',

                labelPosition: 'top',
                productForm: {
                    categorySelect: '',
                    subcategorySelect: '',
                    brandSelect: '',
                    imageSelect: '',
                    productName: '',
                    quantity: '',
                    costPrice: '',
                    sellingPrice: '',
                    additionalInformation: '',
                    type: [],
                },
                productRules: {
                    categorySelect: [
                        {required: true, message: 'Please select category', trigger: 'change'}
                    ],
                    subcategorySelect: [
                        {required: true, message: 'Please select subcategory', trigger: 'change'}
                    ],
                    brandSelect: [
                        {required: true, message: 'Please select brand', trigger: 'change'}
                    ],
                    productName: [
                        {required: true, message: 'Please input product name', trigger: 'blur'}
                    ],
                    quantity: [
                        {required: true, message: 'Please input quantity', trigger: 'blur'}
                    ],
                    costPrice: [
                        {required: true, message: 'Please input cost price', trigger: 'blur'}
                    ],
                    sellingPrice: [
                        {required: true, message: 'Please input cost price', trigger: 'blur'},
                    ],
                    additionalInformation: [
                        {required: true, message: 'Please input additional Information', trigger: 'blur'},
                    ]
                }
            }
        },
        mounted() {
            axios.get('/api/getCategories', {})
                .then(response => {
                    this.getCategory = response.data.getCategory;
                });
            axios.get('/api/getSubCategories', {})
                .then(response => {
                    this.getSubCategory = response.data.getSubCategory;
                });
            axios.get('/api/getBrand', {})
                .then(response => {
                    this.getBrand = response.data.getBrand;
                });
        },
        methods: {
            submitForm(formName) {



                    this.$refs[formName].validate((valid) => {
                        let tag = this.dynamicTags;
                        console.log(tag);
                        if (valid) {

                        let file = this.$refs.upload.uploadFiles;
                        console.log(file);
                        let formData = new FormData();
                        tag.forEach((v, k) => {
                            formData.append(`tag[${k}]`, v.raw);
                        });
                        file.forEach((v, k) => {
                            formData.append(`image[${k}]`, v.raw);
                        });

                        formData.append('category_id', this.productForm.categorySelect);
                        formData.append('brand_id', this.productForm.brandSelect);
                        formData.append('product_name', this.productForm.productName);
                        formData.append('price', this.productForm.costPrice);
                        formData.append('sale_price', this.productForm.sellingPrice);
                        formData.append('additional_information', this.productForm.additionalInformation);
                        formData.append('quantity', this.productForm.quantity);

                        axios.post('/api/addProduct', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }

                        }).then(response => {
                            alert(response.data.message);
                        }).catch(error => {
                            if (error.response.status == 422) {
                                this.errors = error.response.data.errors;
                            }
                        });
                    }
                else
                    {
                        console.log('error submit!!');
                        return false;
                    }
                }
            );
    },
    handleClose(tag)
    {
        this.dynamicTags.splice(this.dynamicTags.indexOf(tag), 1);
    }
    ,

    showInput()
    {
        this.inputVisible = true;
        this.$nextTick(_ => {
            this.$refs.saveTagInput.$refs.input.focus();
        });
    }
    ,

    handleInputConfirm()
    {
        let inputValue = this.inputValue;
        if (inputValue) {
            this.dynamicTags.push(inputValue);
        }
        this.inputVisible = false;
        this.inputValue = '';
    }
    }
    }
</script>

<style scoped>
    .el-tag + .el-tag {
        margin-left: 10px;
    }

    .button-new-tag {
        margin-left: 10px;
        height: 32px;
        line-height: 30px;
        padding-top: 0;
        padding-bottom: 0;
    }

    .input-new-tag {
        width: 90px;
        margin-left: 10px;
        vertical-align: bottom;
    }
</style>
