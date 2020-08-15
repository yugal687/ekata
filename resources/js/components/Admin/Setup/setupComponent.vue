<template>
    <div class="">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="row d-flex justify-content-center">
                    <el-button plain class="categoryBtn">Add Category</el-button>
                </div>
                <div class="row box-card-slide category-div hidden" style="border-top: 3px solid blue">
                    <div class="box-header clearfix">
                        <span>Add Category</span>
                        <el-button class="closeCategoryBtn" style="float: right; padding: 3px 0" type="text">Close
                        </el-button>
                    </div>
                    <div class="box-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-12">
                                <el-form :model="categoryForm" :rules="categoryRules" ref="categoryForm"
                                         :label-position="labelPosition" class="demo-categoryForm">
                                    <el-form-item label="Category Name" prop="name">
                                        <el-input v-model="categoryForm.name"
                                                  style="width: 100%;">

                                        </el-input>
                                    </el-form-item>
                                    <el-form-item>
                                        <el-button type="primary"
                                                   style="width: 80%; margin: 15px 10% 0"
                                                   @click="submitCategory('categoryForm')">Create
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
                                    :data="categorytableData.filter(data => !categorySearch || data.categoryName.toLowerCase().includes(categorySearch.toLowerCase()))"
                                    border
                                    max-height="470"
                                    style="width: 100%">
                                    <el-table-column
                                        prop="sn"
                                        label="S.N."
                                        width="50">
                                    </el-table-column>
                                    <el-table-column
                                        prop="categoryName"
                                        label="Category Name"
                                        width="120">
                                    </el-table-column>
                                    <el-table-column
                                        fixed="right"
                                        width="100"
                                        align="right">
                                        <template slot="header" slot-scope="scope">
                                            <el-input
                                                v-model="categorySearch"
                                                size="mini"
                                                placeholder="Type to search"/>
                                        </template>
                                        <template slot-scope="scope">
                                            <el-button type="primary"
                                                       icon="el-icon-edit"
                                                       size="mini"
                                                       @click="handleEdit(scope.$index, scope.row)"
                                                       circle></el-button>
                                            <el-button
                                                size="mini"
                                                type="danger"
                                                icon="el-icon-delete"
                                                @click="handleDelete(scope.$index, scope.row)"
                                                circle></el-button>
                                        </template>
                                    </el-table-column>
                                </el-table>
                            </div>
                        </el-card>
                    </div>
                </div>

            </div>
            <div class="col-md-4 col-sm-12">
                <div class="row d-flex justify-content-center">
                    <el-button plain class="subcategoryBtn">Add Sub-Category</el-button>
                </div>
                <div class="row box-card-slide subcategory-div hidden" style="border-top: 3px solid green">
                    <div class="box-header clearfix">
                        <span>Add Sub-Category</span>
                        <el-button class="clodeSubcategoryBtn" style="float: right; padding: 3px 0" type="text">Close
                        </el-button>
                    </div>
                    <div class="box-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-12">
                                <el-form :model="subcategoryForm" :rules="subcategoryRules" ref="subcategoryForm"
                                         :label-position="labelPosition" class="demo-subcategoryForm">
                                    <el-form-item label="Select Category" prop="categorySelect">
                                        <el-select clearable placeholder="Select Category"
                                                   filterable
                                                   v-model="subcategoryForm.categorySelect"
                                                   style="width: 100%">
                                            <el-option
                                                v-for="item in categorySelectOptions"
                                                :key="item.value"
                                                :label="item.label"
                                                :value="item.value">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                    <el-form-item label="Sub Category Name" prop="name">
                                        <el-input v-model="subcategoryForm.name"
                                                  style="width: 100%;">

                                        </el-input>
                                    </el-form-item>
                                    <el-form-item>
                                        <el-button type="primary"
                                                   style="width: 80%; margin: 15px 10% 0"
                                                   @click="submitForm('subcategoryForm')">Create
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
                                    :data="subcategorytableData.filter(data => !subcategorySearch || data.subcategoryName.toLowerCase().includes(subcategorySearch.toLowerCase())
                                            || data.categoryName.toLowerCase().includes(subcategorySearch.toLowerCase()))"
                                    border
                                    max-height="470"
                                    style="width: 100%">
                                    <el-table-column
                                        prop="sn"
                                        label="S.N."
                                        width="50">
                                    </el-table-column>
                                    <el-table-column
                                        prop="subcategoryName"
                                        label="Subcategory Name"
                                        width="120">
                                    </el-table-column>
                                    <el-table-column
                                        prop="categoryName"
                                        label="Category Name"
                                        width="120">
                                    </el-table-column>
                                    <el-table-column
                                        fixed="right"
                                        width="100"
                                        align="right">
                                        <template slot="header" slot-scope="scope">
                                            <el-input
                                                v-model="subcategorySearch"
                                                size="mini"
                                                placeholder="Type to search"/>
                                        </template>
                                        <template slot-scope="scope">
                                            <el-button type="primary"
                                                       icon="el-icon-edit"
                                                       size="mini"
                                                       @click="handleEdit(scope.$index, scope.row)"
                                                       circle></el-button>
                                            <el-button
                                                size="mini"
                                                type="danger"
                                                icon="el-icon-delete"
                                                @click="handleDelete(scope.$index, scope.row)"
                                                circle></el-button>
                                        </template>
                                    </el-table-column>
                                </el-table>
                            </div>
                        </el-card>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="row d-flex justify-content-center">
                    <el-button plain class="brandBtn">Add Brand</el-button>
                </div>
                <div class="row box-card-slide brand-div hidden" style="border-top: 3px solid red">
                    <div class="box-header clearfix">
                        <span>Add Brands</span>
                        <el-button class="closeBrandBtn" style="float: right; padding: 3px 0" type="text">Close
                        </el-button>
                    </div>
                    <div class="box-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-12">
                                <el-form :model="brandForm" :rules="brandRules" ref="brandForm"
                                         :label-position="labelPosition" class="demo-brandForm">
                                    <el-form-item label="Brand Name" prop="name">
                                        <el-input v-model="brandForm.name"
                                                  style="width: 100%;">
                                        </el-input>
                                    </el-form-item>
                                    <el-form-item>
                                        <el-button type="primary"
                                                   style="width: 80%; margin: 15px 10% 0"
                                                   @click="submitBrand('brandForm')">Create
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
                                    :data="brandtableData.filter(data => !brandSearch || data.brandName.toLowerCase().includes(brandSearch.toLowerCase()))"
                                    border
                                    max-height="470"
                                    style="width: 100%">
                                    <el-table-column
                                        prop="sn"
                                        label="S.N."
                                        width="50">
                                    </el-table-column>
                                    <el-table-column
                                        prop="brandName"
                                        label="Brand Name"
                                        width="120">
                                    </el-table-column>
                                    <el-table-column
                                        fixed="right"
                                        width="100"
                                        align="right">
                                        <template slot="header" slot-scope="scope">
                                            <el-input
                                                v-model="brandSearch"
                                                size="mini"
                                                placeholder="Type to search"/>
                                        </template>
                                        <template slot-scope="scope">
                                            <el-button type="primary"
                                                       icon="el-icon-edit"
                                                       size="mini"
                                                       @click="handleEdit(scope.$index, scope.row)"
                                                       circle></el-button>
                                            <el-button
                                                size="mini"
                                                type="danger"
                                                icon="el-icon-delete"
                                                @click="handleDelete(scope.$index, scope.row)"
                                                circle></el-button>
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
        name: "setupComponent",
        data() {
            return {
                labelPosition: 'top',
                categorySelectOptions: [{
                    value: 'Category - 1',
                    label: 'Category - 1'
                }, {
                    value: 'Category - 2',
                    label: 'Category - 2'
                }, {
                    value: 'Category - 3',
                    label: 'Category - 3'
                }],
                categoryForm: {
                    name: '',
                },
                subcategoryForm: {
                    categorySelect: '',
                    name: '',
                },
                brandForm: {
                    name: '',
                },
                categoryRules: {
                    name: [
                        {required: true, message: 'Please input category name', trigger: 'blur'},
                    ]
                },
                subcategoryRules: {
                    categorySelect: [
                        {required: true, message: 'Please select category', trigger: 'change'},
                    ],
                    name: [
                        {required: true, message: 'Please input sub-category name', trigger: 'blur'},
                    ]
                },
                brandRules: {
                    name: [
                        {required: true, message: 'Please input brand name', trigger: 'blur'},
                    ]
                },
                /*Table Data's*/
                categorytableData: [{
                    sn: 1,
                    categoryName: 'Tom',
                }, {
                    sn: 2,
                    categoryName: 'Tom Cat',
                }],
                /*Table Data's*/
                subcategorytableData: [{
                    sn: 1,
                    categoryName: 'Tom',
                    subcategoryName: 'Subcat One'
                }, {
                    sn: 2,
                    categoryName: 'Tom Cat',
                    subcategoryName: 'Subcat Two'
                }],
                /*Table Data's*/
                brandtableData: [{
                    sn: 1,
                    brandName: 'Tom'
                }, {
                    sn: 2,
                    brandName: 'Tom Cat'
                }],
                categorySearch: '',
                subcategorySearch: '',
                brandSearch: '',
            };
        },
        methods:{
            submitCategory(categoryForm) {
                this.$refs[categoryForm].validate((valid) => {
                    if (valid) {


                        let formdata = new FormData();
                        formdata.append('category_name', this.categoryForm.name);


                        axios.post('/api/postCategory', formdata, {
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
                    } else {
                        console.log('error submit!!');
                        return false;
                    }
                });
            },

            submitBrand(brandForm) {
                this.$refs[brandForm].validate((valid) => {
                    if (valid) {


                        let formdata = new FormData();
                        formdata.append('brand_name', this.brandForm.name);


                        axios.post('/api/postbrand', formdata, {
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
                    } else {
                        console.log('error submit!!');
                        return false;
                    }
                });
            },
            handleEdit(index, row) {
                console.log(index, row);
            },
            handleDelete(index, row) {
                console.log(index, row);
            }
        },
        mounted() {
            $(document).ready(function () {
                $(".categoryBtn").click(function () {
                    $(".category-div").slideToggle("slow");
                });
                $(".subcategoryBtn").click(function () {
                    $(".subcategory-div").slideToggle("slow");
                });
                $(".brandBtn").click(function () {
                    $(".brand-div").slideToggle("slow");
                });
                $('.closeCategoryBtn').click(function () {
                    $(".category-div").slideToggle("slow");
                });
                $('.clodeSubcategoryBtn').click(function () {
                    $(".subcategory-div").slideToggle("slow");
                });
                $('.closeBrandBtn').click(function () {
                    $(".brand-div").slideToggle("slow");
                });
            });
        }
    }
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
        border: 1px solid #EBEEF5;
        background-color: #FFF;
        color: #303133;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 2px 12px 0 rgba(0, 0, 0, .1);
    }

    .box-card-slide .box-header {
        padding: 18px 20px;
        border-bottom: 1px solid #EBEEF5;
        box-sizing: border-box;
    }

    .box-card-slide .box-body {
        padding: 20px;
    }
</style>
