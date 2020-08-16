<template>
    <div class="">
        <!--Client Information Table-->
        <div class="clients-wrapper">
            <el-table
                :data="tableData.filter(data => !search || data.product_name.toLowerCase().includes(search.toLowerCase()) ||
                 data.category.toLowerCase().includes(search.toLowerCase()) ||
                 data.brand.toLowerCase().includes(search.toLowerCase()))"
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
                        prop="sn">
                    </el-table-column>
                    <el-table-column
                        label="Product Name"
                        prop="product_name">
                    </el-table-column>
                    <el-table-column
                        label="Category"
                        prop="category">
                    </el-table-column>
                    <el-table-column
                        label="Brand"
                        prop="brand">
                    </el-table-column>
                    <el-table-column
                        label="Quantity"
                        prop="quantity">
                    </el-table-column>
                    <el-table-column
                        label="Cost Price"
                        prop="cost_price">
                    </el-table-column>
                    <el-table-column
                        label="Selling Price"
                        prop="selling_price"
                    >
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
                            type="success"
                            icon="el-icon-info" circle
                            @click="dialogVisible = true"></el-button>
                        <el-button
                            size="mini"
                            type="primary"
                            icon="el-icon-edit" circle
                            @click="dialogVisible = true"></el-button>
                        <el-button
                            size="mini"
                            type="danger"
                            icon="el-icon-delete" circle
                            @click="handleDelete(scope.$index, scope.row)"></el-button>
                    </template>
                </el-table-column>
            </el-table>
        </div>

        <el-dialog title="Product Details" :visible.sync="dialogVisible">
            <div class="row">
                <div class="col-md-4">
                    <el-card :body-style="{ padding: '0px' }">
                        <img style="width: 100%; height: 250px"
                             src="https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png"
                             class="image">
                        <div style="padding: 14px;">
                            <h3>Product Name</h3>
                            <div class="bottom clearfix">
                                <h5> $....</h5>
                                <p style="border-top: 1px solid #ebeef5; padding: 10px 0">
                                    fdtrfgvcjg kjdsjkfsd kjsdfsdfks skjdffnsdf skjdfnsdkf sjdjkfnsdf sodlfnsdlf
                                    slldkjnsds sdljnsld sldjns sodjfhns osdjfsldkfs
                                </p>
                            </div>
                        </div>
                    </el-card>
                </div>
                <div class="col-md-8 pt-md-0 pt-sm-3 pt-3">
                    <el-card class="box-card" shadow="hover">
                        <div slot="header" class="clearfix" style="">
                            <span>Product Information</span>
                            <el-button class="editProductDetailsBtn"
                                       @click="openEditModal"
                                       style="float: right; padding: 3px 0" type="text">
                                Edit
                            </el-button>
                            <el-button class="detailsProductDetailsBtn hidden"
                                       @click="openDetailsModal"
                                       style="float: right; padding: 3px 0"
                                       type="text">Details
                            </el-button>
                        </div>
                        <div class="text item">
                            <!--Product Details-->
                            <div class="productDetailsWrapper">
                                <el-form :model="productForm" :rules="productRules" ref="productForm"
                                         :label-position="labelPosition" class="demo-productForm">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <el-form-item label="Category" prop="">
                                                <el-input disabled
                                                          value="Category Name"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-4">
                                            <el-form-item label="Sub-Category" prop="">
                                                <el-input disabled
                                                          value="Sub-Category Name"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-4">
                                            <el-form-item label="Brand" prop="">
                                                <el-input disabled
                                                          value="Brand Name"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <el-form-item label="Product" prop="">
                                                <el-input disabled
                                                          value="Product Name"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-6">
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
                                                <el-button v-else class="button-new-tag" size="small"
                                                           @click="showInput">+ New Tag
                                                </el-button>
                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <el-form-item label="Quantity" prop="">
                                                <el-input disabled
                                                          value="Product Quantiy"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-4">
                                            <el-form-item label="Cost Price" prop="">
                                                <el-input disabled
                                                          value="Cost Price"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-4">
                                            <el-form-item label="Selling Price" prop="">
                                                <el-input disabled
                                                          value="Selling Price"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <el-form-item label="Additional Information" prop="">
                                                <el-input type="textarea"
                                                          disabled
                                                          value="djalkandkfasbddfjfkasdblaskdjasmbd askdnalsmd"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                    </div>
                                </el-form>
                            </div>
                            <!--Product Edit-->
                            <div class="productEditWrapper hidden">
                                <el-form :model="productForm" :rules="productRules" ref="productForm"
                                         :label-position="labelPosition" class="demo-productForm">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <el-form-item label="Select Image" prop="imageSelect">
                                                <el-upload
                                                    class="upload-demo"
                                                    ref="upload"
                                                    action="https://jsonplaceholder.typicode.com/posts/"
                                                    :auto-upload="false">
                                                    <el-button slot="trigger" size="small" type="primary">select file
                                                    </el-button>
                                                </el-upload>
                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <el-form-item label="Select Category" prop="categorySelect">
                                                <el-select clearable placeholder="Select Category"
                                                           filterable
                                                           v-model="productForm.categorySelect"
                                                           style="width: 100%">
                                                    <el-option
                                                        v-for="item in categorySelectOptions"
                                                        :key="item.value"
                                                        :label="item.label"
                                                        :value="item.value">
                                                    </el-option>
                                                </el-select>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-4">
                                            <el-form-item label="Select Sub-Category" prop="subcategorySelect">
                                                <el-select clearable placeholder="Select Sub-Category"
                                                           filterable
                                                           v-model="productForm.subcategorySelect"
                                                           style="width: 100%">
                                                    <el-option
                                                        v-for="item in subcategorySelectOptions"
                                                        :key="item.value"
                                                        :label="item.label"
                                                        :value="item.value">
                                                    </el-option>
                                                </el-select>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-4">
                                            <el-form-item label="Select Brand" prop="brandSelect">
                                                <el-select clearable placeholder="Select Brand"
                                                           filterable
                                                           v-model="productForm.brandSelect"
                                                           style="width: 100%">
                                                    <el-option
                                                        v-for="item in brandSelectOptions"
                                                        :key="item.value"
                                                        :label="item.label" bb bbb
                                                        :value="item.value">
                                                    </el-option>
                                                </el-select>
                                            </el-form-item>
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
                                        <div class="col-md-6">
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
                                                <el-button v-else class="button-new-tag" size="small"
                                                           @click="showInput">+ New Tag
                                                </el-button>
                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <el-form-item label="Quantity" prop="quantity">
                                                <el-input placeholder="Place quantity"
                                                          v-model="productForm.quantity"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-4">
                                            <el-form-item label="Cost Price" prop="costPrice">
                                                <el-input placeholder="Place cost price"
                                                          v-model="productForm.costPrice"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-4">
                                            <el-form-item label="Selling Price" prop="sellingPrice">
                                                <el-input placeholder="Place selling price"
                                                          v-model="productForm.sellingPrice"
                                                          style="width: 100%">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
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
                                            <el-button type="warning"
                                                       style="width: 100%; margin: 15px 10% 0"
                                                       @click="submitForm('productForm')"> Edit
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

        <div class="information-wrapper">
            <!--<div class="row">
                <div class="col-md-4">
                    <el-card :body-style="{ padding: '0px' }">
                        <img style="width: 100%; height: 300px"
                             src="https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png"
                             class="image">
                        <div style="padding: 14px;">
                            <h3>Product Name</h3>
                            <div class="bottom clearfix">
                                <h5> $....</h5>
                                <p style="border-top: 1px solid #ebeef5; padding: 10px 0">
                                    fdtrfgvcjg kjdsjkfsd kjsdfsdfks skjdffnsdf skjdfnsdkf sjdjkfnsdf sodlfnsdlf
                                    slldkjnsds sdljnsld sldjns sodjfhns osdjfsldkfs
                                </p>
                            </div>
                        </div>
                    </el-card>
                </div>
                <div class="col-md-8 pt-md-0 pt-sm-3 pt-3">
                    <el-card class="box-card" shadow="hover">
                        <div slot="header" class="clearfix" style="">
                            <span>Product Information</span>
                            <el-button class="editProductDetailsBtn" style="float: right; padding: 3px 0" type="text">
                                Edit
                            </el-button>
                            <el-button class="detailsProductDetailsBtn hidden" style="float: right; padding: 3px 0"
                                       type="text">Details
                            </el-button>
                        </div>
                        <div class="text item">
                            &lt;!&ndash;Product Details&ndash;&gt;
                            <div class="productDetailsWrapper">
                                <el-form :model="productForm" :rules="productRules" ref="productForm"
                                         :label-position="labelPosition" class="demo-productForm">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <el-form-item label="Category" prop="">
                                                <el-input disabled
                                                          value="Category Name"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-4">
                                            <el-form-item label="Sub-Category" prop="">
                                                <el-input disabled
                                                          value="Sub-Category Name"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-4">
                                            <el-form-item label="Brand" prop="">
                                                <el-input disabled
                                                          value="Brand Name"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <el-form-item label="Product" prop="">
                                                <el-input disabled
                                                          value="Product Name"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-6">
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
                                                <el-button v-else class="button-new-tag" size="small"
                                                           @click="showInput">+ New Tag
                                                </el-button>
                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <el-form-item label="Quantity" prop="">
                                                <el-input disabled
                                                          value="Product Quantiy"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-4">
                                            <el-form-item label="Cost Price" prop="">
                                                <el-input disabled
                                                          value="Cost Price"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-4">
                                            <el-form-item label="Selling Price" prop="">
                                                <el-input disabled
                                                          value="Selling Price"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <el-form-item label="Additional Information" prop="">
                                                <el-input type="textarea"
                                                          disabled
                                                          value="djalkandkfasbddfjfkasdblaskdjasmbd askdnalsmd"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                    </div>
                                </el-form>
                            </div>
                            &lt;!&ndash;Product Edit&ndash;&gt;
                            <div class="productEditWrapper hidden">
                                <el-form :model="productForm" :rules="productRules" ref="productForm"
                                         :label-position="labelPosition" class="demo-productForm">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <el-form-item label="Select Image" prop="imageSelect">
                                                <el-upload
                                                    class="upload-demo"
                                                    ref="upload"
                                                    action="https://jsonplaceholder.typicode.com/posts/"
                                                    :auto-upload="false">
                                                    <el-button slot="trigger" size="small" type="primary">select file
                                                    </el-button>
                                                </el-upload>
                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <el-form-item label="Select Category" prop="categorySelect">
                                                <el-select clearable placeholder="Select Category"
                                                           filterable
                                                           v-model="productForm.categorySelect"
                                                           style="width: 100%">
                                                    <el-option
                                                        v-for="item in categorySelectOptions"
                                                        :key="item.value"
                                                        :label="item.label"
                                                        :value="item.value">
                                                    </el-option>
                                                </el-select>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-4">
                                            <el-form-item label="Select Sub-Category" prop="subcategorySelect">
                                                <el-select clearable placeholder="Select Sub-Category"
                                                           filterable
                                                           v-model="productForm.subcategorySelect"
                                                           style="width: 100%">
                                                    <el-option
                                                        v-for="item in subcategorySelectOptions"
                                                        :key="item.value"
                                                        :label="item.label"
                                                        :value="item.value">
                                                    </el-option>
                                                </el-select>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-4">
                                            <el-form-item label="Select Brand" prop="brandSelect">
                                                <el-select clearable placeholder="Select Brand"
                                                           filterable
                                                           v-model="productForm.brandSelect"
                                                           style="width: 100%">
                                                    <el-option
                                                        v-for="item in brandSelectOptions"
                                                        :key="item.value"
                                                        :label="item.label" bb bbb
                                                        :value="item.value">
                                                    </el-option>
                                                </el-select>
                                            </el-form-item>
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
                                        <div class="col-md-6">
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
                                                <el-button v-else class="button-new-tag" size="small"
                                                           @click="showInput">+ New Tag
                                                </el-button>
                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <el-form-item label="Quantity" prop="quantity">
                                                <el-input placeholder="Place quantity"
                                                          v-model="productForm.quantity"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-4">
                                            <el-form-item label="Cost Price" prop="costPrice">
                                                <el-input placeholder="Place cost price"
                                                          v-model="productForm.costPrice"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                        <div class="col-md-4">
                                            <el-form-item label="Selling Price" prop="sellingPrice">
                                                <el-input placeholder="Place selling price"
                                                          v-model="productForm.sellingPrice"
                                                          style="width: 100%">
                                                </el-input>
                                            </el-form-item>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
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
                                            <el-button type="warning"
                                                       style="width: 100%; margin: 15px 10% 0"
                                                       @click="submitForm('productForm')"> Edit
                                            </el-button>
                                        </el-form-item>
                                    </div>
                                </el-form>
                            </div>
                        </div>
                    </el-card>
                </div>
            </div>-->
        </div>
    </div>
</template>

<script>
export default {
    name: "productsComponent",
    data() {
        return {
            dialogVisible: false,
            tableData: [{
                sn: '1',
                product_name: 'Product One',
                category: 'Category One',
                brand: 'Brand One',
                quantity: '22',
                cost_price: '$1234',
                selling_price: '$12345'
            }, {
                sn: '2',
                product_name: 'Product Two',
                category: 'Category Two',
                brand: 'Brand Two',
                quantity: '22',
                cost_price: '$1234',
                selling_price: '$12345'
            }, {
                sn: '3',
                product_name: 'Product Three',
                category: 'Category Three',
                brand: 'Brand Three',
                quantity: '22',
                cost_price: '$1234',
                selling_price: '$12345'
            }, {
                sn: '4',
                product_name: 'Product Four',
                category: 'Category Four',
                brand: 'Brand Four',
                quantity: '22',
                cost_price: '$1234',
                selling_price: '$12345'
            }, {
                sn: '5',
                product_name: 'Product Five',
                category: 'Category Five',
                brand: 'Brand Five',
                quantity: '22',
                cost_price: '$1234',
                selling_price: '$12345'
            }],
            search: '',
            dynamicTags: [],
            inputVisible: false,
            inputValue: '',

            labelPosition: 'top',
            categorySelectOptions: [{
                value: 'Category - 1',
                label: 'Category - 1'
            }, {
                value: 'Category - 2',
                label: 'Category - 2'
            }],
            subcategorySelectOptions: [{
                value: 'Sub-Category - 1',
                label: 'Sub-Category - 1'
            }, {
                value: 'Sub-Category - 2',
                label: 'Sub-Category - 2'
            }],
            brandSelectOptions: [{
                value: 'Brand - 1',
                label: 'Brand - 1'
            }, {
                value: 'Brand - 2',
                label: 'Brand - 2'
            }],
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

    },
    methods: {
        openEditModal() {
            $(".productEditWrapper").slideToggle("slow");
            $(".productDetailsWrapper").slideToggle("slow");
            $(".detailsProductDetailsBtn").toggle("slow");
            $(".editProductDetailsBtn").toggle("slow");
        },
        openDetailsModal() {
            $(".productEditWrapper").slideToggle("slow");
            $(".productDetailsWrapper").slideToggle("slow");
            $(".detailsProductDetailsBtn").toggle("slow");
            $(".editProductDetailsBtn").toggle("slow");
        },

        /*Client Details---*/
        handleEdit(index, row) {
            console.log(index, row);
        },
        handleDelete(index, row) {
            console.log(index, row);
        },
        /*Client Information Tab---*/
        handleClick(tab, event) {
            console.log(tab, event);
        },

        /*Edit Datas*/
        submitForm(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    alert('submit!');
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


.clients-wrapper {
    border: 1px solid #ebebeb;
    border-radius: 5px;
    transition: .2s;
    margin: 20px;
    padding: 20px;
}

.information-wrapper {
    /*border: 1px solid #ebebeb;*/
    /*border-radius: 5px;*/
    /*transition: .2s;*/
    margin: 10px;
    /*padding: 10px;*/
}

/*th.gutter {
    padding: 0 !important;
}*/

.clients-wrapper:hover {
    box-shadow: 0 0 8px 0 rgba(232, 237, 250, .6), 0 2px 4px 0 rgba(232, 237, 250, .6);
}

.clients-ques-ans h6 {
    font-size: 14px;
    line-height: 15px;
    font-weight: 700;
    color: #606266;
}
</style>
