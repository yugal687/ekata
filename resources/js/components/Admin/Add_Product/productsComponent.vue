<template>
    <div class="">
        <!--Client Information Table-->
        <div class="clients-wrapper">
            <el-table
                :data="getProduct.filter(data => !search || data.product_name.toLowerCase().includes(search.toLowerCase()) ||
                 data.category.category_name.toLowerCase().includes(search.toLowerCase()) ||
                 data.brand.brand_name.toLowerCase().includes(search.toLowerCase()))"
                max-height="600"
                style="width: 100%">
                <el-table-column>
                    <template slot="header" slot-scope="scope">
                        <el-input
                            clearable
                            prefix-icon="el-icon-search"
                            v-model="search"
                            placeholder="Type to search"/>
                    </template>
                    <el-table-column
                        label="S.N."
                        type="index">
                    </el-table-column>
                    <el-table-column
                        label="Product Name"
                        prop="product_name">
                    </el-table-column>
                    <el-table-column
                        label="Sub Category"
                        prop="category.category_name">
                    </el-table-column>
                    <el-table-column
                        label="Brand"
                        prop="brand.brand_name">
                    </el-table-column>
                    <el-table-column
                        label="Quantity"
                        prop="quantity">
                    </el-table-column>
                    <el-table-column
                        label="Price"
                        prop="price">
                    </el-table-column>
                    <el-table-column
                        label="Discounted Price"
                        prop="sale_price">
                    </el-table-column>
                </el-table-column>
                <el-table-column
                    fixed="right"
                    width="150"
                    label="Operations"
                    prop="operations">
                    <template slot-scope="scope">
                        <el-button
                            size="mini"
                            type="primary"
                            icon="el-icon-edit" circle
                            @click="openEditModal(scope.row.id)"></el-button>
                        <el-button
                            size="mini"
                            type="danger"
                            icon="el-icon-delete" circle
                            @click="handleDelete(scope.row.id)"></el-button>
                    </template>
                </el-table-column>
            </el-table>
        </div>

        <el-dialog title="Product Details"
                   :visible.sync="dialogVisible"
                   width="70%">
            <div class="row" v-if="editProduct.length > 0">
                <div class="col-md-4">
                    <el-card :body-style="{ padding: '0px' }">
                        <img style="width: 100%; height: 250px"
                             :src="editProduct[0].image[0].name"
                             class="image">
                        <div style="padding: 14px;">
                            <h3>{{ editProduct[0].product_name }}</h3>
                            <div class="bottom clearfix">
                                <h5> {{ editProduct[0].category.category_name }}</h5>
                                <p style="border-top: 1px solid #ebeef5; padding: 10px 0">
                                    {{ editProduct[0].additional_information }}
                                </p>
                            </div>
                        </div>
                    </el-card>
                </div>
                <div class="col-md-8 pt-md-0 pt-sm-3 pt-3">
                    <el-card class="box-card" shadow="hover">
                        <div slot="header" class="clearfix" style="">
                            <span>Product Information</span>
                        </div>
                        <div class="text item">
                            <!--Product Details-->
                            <!--<div class="productDetailsWrapper">
                                <el-form :rules="productRules" ref="editProduct" v-if="editProduct.length > 0"
                                         :label-position="labelPosition" class="demo-productForm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <el-form-item label="Category / Subcategory" prop="">
                                                <el-input disabled
                                                          v-model="editProduct[0].category.category_name"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-6">
                                            <el-form-item label="Brand" prop="">
                                                <el-input disabled
                                                          :value="editProduct[0].brand.brand_name"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <el-form-item label="Product" prop="product_name">
                                                <el-input disabled
                                                          :value="editProduct[0].product_name"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-6">
                                            <el-form-item label="Tags" prop="tags">
                                                <el-input disabled v-if="editProduct[0].tags.length > 0"
                                                          v-model="editProduct[0].tags[0].tags"
                                                          style="width: 100%;">
                                                </el-input>
                                                <el-input disabled v-if="editProduct[0].tags.length <= 0"
                                                          value="no tags"
                                                          style="width: 100%;">
                                                </el-input>

                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <el-form-item label="Quantity" prop="quantity">
                                                <el-input disabled
                                                          :value="editProduct[0].quantity"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-6">
                                            <el-form-item label="Price" prop="price">
                                                <el-input disabled
                                                          :value="editProduct[0].price"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <el-form-item label="Additional Information" prop="additional_information">
                                                <el-input type="textarea"
                                                          disabled
                                                          :value="editProduct[0].additional_information"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                    </div>
                                </el-form>
                            </div>-->
                            <!--Product Edit-->
                            <div class="productEditWrapper">
                                <el-form :model="productForm" :rules="productRules" ref="productForm"
                                         :label-position="labelPosition" class="demo-productForm"
                                         v-if="editProduct.length > 0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <el-form-item label="Select Image" prop="imageSelect">
                                                <el-upload
                                                    class="upload-demo"
                                                    ref="upload"
                                                    action=""
                                                    :auto-upload="false">
                                                    <el-button slot="trigger" size="small" type="primary">select file
                                                    </el-button>
                                                </el-upload>
                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">

                                            <!--<el-form-item label="Select Category">
                                                <el-select clearable placeholder="Select Category"
                                                           filterable
                                                           v-on:change="selectSubcategories()"
                                                           v-model="editProduct[0].category.category_name"
                                                           style="width: 100%">
                                                    <el-option
                                                        v-for="item in getCategory"
                                                        :key="item.id"
                                                        :label="item.category_name"
                                                        :value="item.category_name">
                                                    </el-option>
                                                </el-select>
                                            </el-form-item>-->
                                            <el-form-item label="Select Category">
                                                <select v-model="editedCategory.parent_category.category_name"
                                                        @change="selectSubcategories($event)">
                                                    <option :value="editedCategory.parent_category.category_name">
                                                        {{ editedCategory.parent_category.category_name }}
                                                    </option>
                                                    <option
                                                        v-for="item in getCategory"
                                                        :key="item.id"
                                                        :label="item.category_name"
                                                        :value="item.category_name">
                                                        {{ item.category_name }}
                                                    </option>
                                                    {{ editProduct[0].category.category_name }}
                                                </select>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <el-form-item label="Select Subategory">
                                                <select v-model="editedCategory.child_category.category_name">
                                                    <option :value="editedCategory.child_category.category_name">
                                                        {{ editedCategory.child_category.category_name }}
                                                    </option>
                                                    <option v-for="category in subCategory"
                                                            :value="category.category_name"
                                                            v-bind:key="category.id">
                                                        {{ category.category_name }}
                                                    </option>
                                                </select>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-6">
                                            <el-form-item label="Select Brand">
                                                <el-select clearable placeholder="Select Brand"
                                                           filterable
                                                           v-model="editProduct[0].brand.brand_name"
                                                           style="width: 100%">
                                                    <el-option
                                                        v-for="item in getBrand"
                                                        :key="item.id"
                                                        :label="item.brand_name"
                                                        :value="item.brand_name">
                                                    </el-option>
                                                </el-select>
                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <el-form-item label="Product Name">
                                                <el-input placeholder="Place product name"
                                                          v-model="editProduct[0].product_name"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-6">
                                            <el-form-item label="Tags">
                                                <el-select multiple v-if="editProduct[0].tags.length > 0"
                                                           v-model="inputTags"
                                                           :placeholder="editProduct[0].tags[0].tags">
                                                    <el-option
                                                        v-for="item in tagslist"
                                                        :key="item.id"
                                                        :label="item.tags"
                                                        :value="item.id">
                                                    </el-option>
                                                </el-select>
                                                <el-select multiple v-if="editProduct[0].tags.length <= 0"
                                                           v-model="inputTags"
                                                           placeholder="select tags">
                                                    <el-option
                                                        v-for="item in tagslist"
                                                        :key="item.id"
                                                        :label="item.tags"
                                                        :value="item.id">
                                                    </el-option>
                                                </el-select>

                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <el-form-item label="Quantity">
                                                <el-input placeholder="Place quantity"
                                                          v-model="editProduct[0].quantity"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-6">
                                            <el-form-item label="Cost Price">
                                                <el-input placeholder="Place cost price"
                                                          v-model="editProduct[0].price"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <el-form-item label="Additional Information">
                                                <el-input
                                                    type="textarea"
                                                    v-model="editProduct[0].additional_information"
                                                    :autosize="{ minRows: 3, maxRows: 4}"
                                                    placeholder="Please input additional Information"
                                                >
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <el-form-item>
                                            <el-button class="btn btn-warning"
                                                       style="width: 100%; margin: 15px 10% 0"
                                                       @click="submitForm('productForm')"> Update
                                            </el-button>
                                        </el-form-item>
                                    </div>
                                </el-form>
                            </div>
                        </div>
                    </el-card>
                </div>
            </div>
        </el-dialog>
    </div>
</template>

<script>
export default {
    name: "productsComponent",
    data() {
        return {
            dialogVisible: false,
            inputTags: [],
            subcategory_name: "",
            subCategory: [],
            editProduct: [],
            getProduct: [],
            search: '',
            dynamicTags: [],
            inputVisible: false,
            inputValue: '',
            editedCategory: {
                parent_category: {
                    id: '',
                    category_name: ''
                },
                child_category: {
                    id: '',
                    category_name: ''
                },
            },

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
            },
            productRules: {
                categorySelect: [
                    {required: true, message: 'Please select category', trigger: 'blur'}
                ],
                subcategorySelect: [
                    {required: true, message: 'Please select subcategory', trigger: 'blur'}
                ],
                brandSelect: [
                    {required: true, message: 'Please select brand', trigger: 'blur'}
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
            },
            getCategory: [],
            getSubCategory: [],
            getBrand: [],
            tagslist: []
        }
    },
    mounted() {
        this.fetchProduct();
    },
    methods: {
        selectSubcategories(event) {
            let categoryId = event.target.value;
            this.getCategory.filter((value, key) => {
                if (value.category_name == categoryId) {
                    this.subCategory = value.children;
                    this.editedCategory.child_category.category_name=' ';
                }
                /*console.log(this.subCategory);*/
            });
        },
        fetchProduct() {
            axios.get('/api/getProduct', {})
                .then(response => {
                    this.getProduct = response.data.getProduct;
                });
            axios.get('/api/getAllCategories', {})
                .then(response => {
                    this.getCategory = response.data.getCategory;
                });
            axios.get('/api/getBrand', {})
                .then(response => {
                    this.getBrand = response.data.getBrand;
                });
            axios.get('/api/getTag', {})
                .then(response => {
                    this.tagslist = response.data.tags;
                });
        },
        openEditModal(id) {
            this.dialogVisible = true;
            this.editProduct = this.getProduct.filter(getProduct => getProduct.id == id);
            console.log(this.editProduct);
            if (!this.editProduct[0].category.parent) {
                this.editedCategory.parent_category.category_name = this.editProduct[0].category.category_name;
                this.editedCategory.parent_category.id = this.editProduct[0].category.id;

                this.editedCategory.child_category.category_name = ' ';
                this.editedCategory.child_category.id = ' ';
            } else {
                this.editedCategory.parent_category.category_name = this.editProduct[0].category.parent.category_name;
                this.editedCategory.parent_category.id = this.editProduct[0].category.parent.id;
                this.editedCategory.child_category.category_name = this.editProduct[0].category.category_name;
                this.editedCategory.child_category.id = this.editProduct[0].category.id;
            }
        },
        /*openDetailsModal(id) {
            this.dialogVisible = true;
            this.editProduct = this.getProduct.filter(getProduct => getProduct.id == id);
            console.log(this.editProduct[0]);
        },*/

        /*Client Details---*/
        handleDelete(id) {
            this.$confirm('Are you sure to delete this item?')
                .then(_ => {
                    axios.delete('/api/deleteProduct/' + id)
                        .then(response => {
                            this.$notify({
                                title: 'Success',
                                message: response.data.message,
                                type: 'info'
                            });
                            this.fetchProduct();
                        }).catch(error => {
                        if (error.response) {
                            this.$notify({
                                title: 'Error',
                                message: 'Error Input Data ',
                                type: 'error'
                            });
                        }
                    });
                })
                .catch(_ => {
                });
        },
        /*Client Information Tab---*/
        /*Edit Datas*/
        submitForm(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    let tag = this.inputTags;
                    let file = this.$refs.upload.uploadFiles;
                    console.log(tag);
                    let formData = new FormData();
                    if (tag.length > 0) {
                        tag.forEach((v, k) => {
                            formData.append(`tag[${k}]`, v);
                        });
                    }
                    if (file.length > 0) {
                        file.forEach((v, k) => {
                            formData.append(`image[${k}]`, v.raw);
                        });
                    }
                    if (this.editedCategory.child_category.category_name === ' ') {
                        formData.append('category_name', this.editedCategory.parent_category.category_name);
                    } else {
                        formData.append('category_name', this.editedCategory.child_category.category_name);
                    }
                    formData.append('editedProduct', JSON.stringify(this.editProduct));
                    axios.post('/api/editProduct', formData, {
                        //  editedProduct : this.editProduct,
                    }).then(response => {
                        this.$notify({
                            title: 'Success',
                            message: response.data.message,
                            type: 'success'
                        });
                        this.dialogVisible = false;
                        this.fetchProduct();

                    });
                } else {
                    console.log('error submit!!');
                    return false;
                }
            });
        },

        /*Tags*/
        handleClose(tag) {
            this.dynamicTags.splice(this.dynamicTags.indexOf(tag), 1);
        },

        showInput() {
            this.inputVisible = true;
            this.$nextTick(_ => {
                this.$refs.saveTagInput.$refs.input.focus();
            });
        },

        handleInputConfirm() {
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
.hidden {
    display: none;
}


.el-tag + .el-tag {
    margin-left: 10px;
}


.clients-wrapper {
    border: 1px solid #ebebeb;
    border-radius: 5px;
    transition: .2s;
    margin: 20px;
    padding: 20px;
}

.clients-wrapper:hover {
    box-shadow: 0 0 8px 0 rgba(232, 237, 250, .6), 0 2px 4px 0 rgba(232, 237, 250, .6);
}

.clients-ques-ans h6 {
    font-size: 14px;
    line-height: 15px;
    font-weight: 700;
    color: #606266;
}

select {
    -webkit-appearance: none;
    background-color: #FFF;
    background-image: none;
    border-radius: 4px;
    border: 1px solid #DCDFE6;
    box-sizing: border-box;
    color: #606266;
    display: inline-block;
    font-size: inherit;
    height: 40px;
    line-height: 40px;
    outline: 0;
    padding: 0 15px;
    transition: border-color .2s cubic-bezier(.645, .045, .355, 1);
    width: 100%;
}

option {
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
</style>
