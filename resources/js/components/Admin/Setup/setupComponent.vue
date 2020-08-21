<template>
    <div class="">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="row d-flex justify-content-center">
                    <div class="categoryBtn btn btn-primary">Add Category</div>
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
                                    :data="getCategory.filter(data => !categorySearch || data.category_name.toLowerCase().includes(categorySearch.toLowerCase()))"
                                    border
                                    max-height="470"
                                    style="width: 100%">
                                    <el-table-column
                                        type="index"
                                        label="S.N."
                                        width="50">
                                    </el-table-column>
                                    <el-table-column
                                        prop="category_name"
                                        label="Category Name">
                                    </el-table-column>
                                    <el-table-column
                                        fixed="right"
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
                                                       data-target=".bd-example-modal-lg"
                                                       data-toggle="modal"
                                                       @click="editCategory(scope.row.id)"
                                                       circle></el-button>
                                            <el-button
                                                size="mini"
                                                type="danger"
                                                icon="el-icon-delete"
                                                @click="deleteCategory(scope.row.id)"
                                                circle></el-button>
                                        </template>
                                    </el-table-column>
                                </el-table>
                            </div>
                        </el-card>
                    </div>
                </div>

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                     aria-labelledby="myLargeModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                Edit Category
                                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div v-if="edit" class="alert alert-success alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div v-for="ecategory in editcategory">

                                        <el-form :model="categoryForm" :rules="categoryRules" ref="categoryForm"
                                                 :label-position="labelPosition" class="demo-categoryForm">
                                            <el-form-item label="Category Name" prop="name">
                                                <el-input v-model="ecategory.category_name"
                                                          style="width: 100%;">

                                                </el-input>
                                            </el-form-item>
                                            <el-form-item>
                                                <el-button type="primary"
                                                           style="width: 80%; margin: 15px 10% 0"
                                                           @click="saveEditCategory">Create
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
                                                v-for="item in getCategory"
                                                :key="item.id"
                                                data-target=".bd-subcategory-modal-lg"
                                                data-toggle="modal"
                                                :label="item.category_name"
                                                :value="item.id">
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
                                                   @click="submitSubCategory">Create
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
                                    :data="getSubCategory.filter(data => !subcategorySearch || data.category_name.toLowerCase().includes(subcategorySearch.toLowerCase())
                                            || data.categoryName.toLowerCase().includes(subcategorySearch.toLowerCase()))"
                                    border
                                    max-height="470"
                                    style="width: 100%">
                                    <el-table-column
                                        type="index"
                                        label="S.N."
                                        width="50">
                                    </el-table-column>
                                    <el-table-column
                                        prop="category_name"
                                        label="Subcategory Name">
                                    </el-table-column>
                                    <el-table-column
                                        prop="parent_id"
                                        label="Category Name">
                                    </el-table-column>
                                    <el-table-column
                                        fixed="right"
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
                                                       data-target=".bd-subcategory-modal-lg"
                                                       data-toggle="modal"
                                                       @click="editSubCategory(scope.row.id)"
                                                       circle></el-button>
                                            <el-button
                                                size="mini"
                                                type="danger"
                                                icon="el-icon-delete"
                                                @click="deleteCategory(scope.row.id)"
                                                circle></el-button>
                                        </template>
                                    </el-table-column>
                                </el-table>
                            </div>
                        </el-card>
                    </div>
                </div>
                <div class="modal fade bd-subcategory-modal-lg" tabindex="-1" role="dialog"
                     aria-labelledby="myLargeModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                Edit Sub-Category
                                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div v-if="edit" class="alert alert-success alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div v-for="esubcategory in editsubCategory">

                                        <el-form :model="categoryForm" :rules="categoryRules" ref="categoryForm"
                                                 :label-position="labelPosition" class="demo-categoryForm">
                                            <el-form-item label="Category Name" prop="name">
                                                <el-input v-model="esubcategory.category_name"
                                                          style="width: 100%;">

                                                </el-input>
                                            </el-form-item>
                                            <el-form-item label="Category Name" prop="name">
                                                <el-input v-model="esubcategory.parent_id"
                                                          style="width: 100%;">

                                                </el-input>
                                            </el-form-item>
                                            <el-form-item>
                                                <el-button type="primary"
                                                           style="width: 80%; margin: 15px 10% 0"
                                                           @click="saveEditSubCategory">Create
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
        <hr class="mt-4 mb-4"/>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="row d-flex justify-content-center">
                    <div class="brandBtn btn btn-danger">Add Brand</div>
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
                                    :data="getBrand.filter(data => !brandSearch || data.brand_name.toLowerCase().includes(brandSearch.toLowerCase()))"
                                    border
                                    max-height="470"
                                    style="width: 100%">
                                    <el-table-column
                                        type="index"
                                        label="S.N."
                                        width="50">
                                    </el-table-column>
                                    <el-table-column
                                        prop="brand_name"
                                        label="Brand Name">
                                    </el-table-column>
                                    <el-table-column
                                        fixed="right"
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
                                                       data-target=".bd-brand-modal-lg"
                                                       data-toggle="modal"
                                                       @click="editBrand(scope.row.id)"
                                                       circle></el-button>
                                            <el-button
                                                size="mini"
                                                type="danger"
                                                icon="el-icon-delete"
                                                @click="deleteBrand(scope.row.id)"
                                                circle></el-button>
                                        </template>
                                    </el-table-column>
                                </el-table>
                            </div>
                        </el-card>

                    </div>
                </div>
                <div class="modal fade bd-brand-modal-lg" tabindex="-1" role="dialog"
                     aria-labelledby="myLargeModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                Edit Brand
                                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div v-if="edit" class="alert alert-success alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div v-for="ebrand in editBrands">

                                        <el-form :model="brandForm" :rules="brandRules"
                                                 :label-position="labelPosition" class="demo-brandForm">
                                            <el-form-item label="Brand Name" prop="name">
                                                <el-input v-model="ebrand.brand_name"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                            <el-form-item>
                                                <el-button type="primary"
                                                           style="width: 80%; margin: 15px 10% 0"
                                                           @click="saveEditBrand">Create
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
                    <div class="tagBtn btn btn-warning">Add Tags</div>
                </div>
                <div class="row box-card-slide tag-div hidden" style="border-top: 3px solid yellow">
                    <div class="box-header clearfix">
                        <span>Add Tags</span>
                        <el-button class="closeTagBtn" style="float: right; padding: 3px 0" type="text">Close
                        </el-button>
                    </div>
                    <div class="box-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-12">
                                <el-form :model="tagForm" :rules="tagRules" ref="brandForm"
                                         :label-position="labelPosition" class="demo-brandForm">
                                    <el-form-item label="Tag Name" prop="name">
                                        <el-input v-model="tagForm.name"
                                                  style="width: 100%;">
                                        </el-input>
                                    </el-form-item>
                                    <el-form-item>
                                        <el-button type="primary"
                                                   style="width: 80%; margin: 15px 10% 0"
                                                   @click="submitTag">Create
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
                                    :data="tags.filter(data => !tagSearch || data.tags.toLowerCase().includes(tagSearch.toLowerCase()))"
                                    border
                                    max-height="470"
                                    style="width: 100%">
                                    <el-table-column
                                        type="index"
                                        label="S.N."
                                        width="50">
                                    </el-table-column>
                                    <el-table-column
                                        prop="tags"
                                        label="Tag Name">
                                    </el-table-column>
                                    <el-table-column
                                        fixed="right"
                                        align="right">
                                        <template slot="header" slot-scope="scope">
                                            <el-input
                                                v-model="tagSearch"
                                                size="mini"
                                                placeholder="Type to search"/>
                                        </template>
                                        <template slot-scope="scope">
                                            <el-button type="primary"
                                                       icon="el-icon-edit"
                                                       size="mini"
                                                       data-target=".bd-tag-modal-lg"
                                                       data-toggle="modal"
                                                       @click="editTag(scope.row.id)"
                                                       circle></el-button>
                                            <el-button
                                                size="mini"
                                                type="danger"
                                                icon="el-icon-delete"
                                                @click="deleteTag(scope.row.id)"
                                                circle></el-button>
                                        </template>
                                    </el-table-column>
                                </el-table>
                            </div>
                        </el-card>
                    </div>
                </div>
                <div class="modal fade bd-tag-modal-lg" tabindex="-1" role="dialog"
                     aria-labelledby="myLargeModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                Edit Tag
                                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div v-if="edit" class="alert alert-success alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div v-for="etag in editTags">
                                        <el-form :model="tagForm" :rules="tagRules"
                                                 :label-position="labelPosition" class="demo-tagForm">
                                            <el-form-item label="Tag Name" prop="name">
                                                <el-input v-model="etag.tags"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                            <el-form-item>
                                                <el-button type="primary"
                                                           style="width: 80%; margin: 15px 10% 0"
                                                           @click="saveEditTag">Create
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
                edit: false,
                tags:[],
                editcategory:[],
                editTags:[],
                editBrands:[],
                editsubCategory:[],
                labelPosition: 'top',
                getCategory:[],
                getBrand:[],
                getSubCategory:[],
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
                tagForm: {
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
                tagRules: {
                    name: [
                        {required: true, message: 'Please input tag name', trigger: 'blur'},
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
                /*Table Datas*/
                tagTableData: [{
                    sn: 1,
                    tagName: 'Tom'
                },{
                    sn: 2,
                    tagName: 'Tom Cat'
                }],
                categorySearch: '',
                subcategorySearch: '',
                brandSearch: '',
                tagSearch: '',
            };
        },
        methods:{
            editCategory(id){
                this.editcategory = this.getCategory.filter(getCategory=> getCategory.id == id);
            },
            editSubCategory(id){
                this.editsubCategory = this.getSubCategory.filter(getSubCategory=>getSubCategory.id == id);
            },
            editTag(id){
                this.editTags = this.tags.filter(tags=>tags.id == id);
            },
            editBrand(id){
              this.editBrands = this.getBrand.filter(getBrand=>getBrand.id == id);
            },
            saveEditCategory(){
                axios.post('/api/saveEditCategory',{
                    editCategory:this.editcategory
                }).then(response=>{
                    alert(response.data.message);
                });
            },
            saveEditSubCategory(){
                axios.post('/api/saveEditCategory',{
                    editCategory:this.editsubCategory
                }).then(response=>{
                    alert(response.data.message);
                });
            },
            saveEditBrand(){
              axios.post('/api/saveEditBrand',{
                  editBrand:this.editBrands
              }).then(response=>{
                 alert(response.data.message);
              });
            },
            saveEditTag(){
              axios.post('/api/saveEditTag',{
                  editTag:this.editTags
              }).then(response=>{
                 alert(response.data.message);
              });
            },
            deleteCategory(id){
                axios.delete('/api/deleteCategory/'+id)
                    .then(response=>{
                        alert(response.data.message);
                    });
            },
            deleteBrand(id){
                axios.delete('/api/deleteBrand/'+id)
                    .then(response=>{
                        alert(response.data.message);
                    });
            },
            deleteTag(id){
              axios.delete('/api/deleteTag/'+id)
                  .then(response=>{
                     alert(response.data.message);
                  });
            },
            submitSubCategory(){
                let formdata = new FormData();
                formdata.append('category_name',this.subcategoryForm.name);
                formdata.append('parent_id',this.subcategoryForm.categorySelect);
                axios.post('/api/addsubcategory',formdata,{
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
            },
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
            },

            submitTag(tagForm){
                        let formData = new FormData();
                        formData.append('tags',this.tagForm.name);
                        axios.post('/api/postTags',formData,{
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
            },

            handleEdit(index, row) {
                console.log(index, row);
            },
            handleDelete(index, row) {
                console.log(index, row);
            }
        },
        mounted() {
            axios.get('/api/getCategories',{})
                .then(response=>{
                    this.getCategory = response.data.getCategory;
                });
            axios.get('/api/getSubCategories',{})
                .then(response=>{
                    this.getSubCategory = response.data.getSubCategory;
                });
            axios.get('/api/getBrand',{})
                .then(response=>{
                    this.getBrand = response.data.getBrand;
                });
            axios.get('/api/getTag',{})
                .then(response=>{
                    this.tags = response.data.tags;
                });
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
                $(".tagBtn").click(function () {
                    $(".tag-div").slideToggle("slow");
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
                $('.closeTagBtn').click(function () {
                    $(".tag-div").slideToggle("slow");
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
