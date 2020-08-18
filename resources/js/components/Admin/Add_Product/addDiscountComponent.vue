<template>
    <div class="">
        <div class="row">
            <div class="col-md-4">
                <el-card class="box-card">
                    <div slot="header" class="clearfix">
                        <span>Add Discount</span>
                        <!--<el-button style="float: right; padding: 3px 0" type="text">Operation button</el-button>-->
                    </div>
                    <div class="text item">
                        <div class="row d-flex justify-content-center">
                            <div class="col-12">
                                <el-form :model="discountForm" :rules="discountFormRules" ref="discountForm"
                                         :label-position="labelPosition" class="demo-discountForm">
                                    <el-form-item label="Select Category" prop="productSelect">
                                        <el-select clearable placeholder="Select Product"
                                                   filterable
                                                   v-model="discountForm.productSelect"
                                                   style="width: 100%">
                                            <el-option
                                                v-for="item in productSelectOptions"
                                                :key="item.value"
                                                :label="item.label"
                                                :value="item.value">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                    <el-form-item label="Selling Price" prop="sellingPrice">
                                        <el-input v-model="discountForm.sellingPrice"
                                                  class="sellingPrice"
                                                  style="width: 100%;">

                                        </el-input>
                                    </el-form-item>
                                    <el-form-item label="Discount Percentage" prop="discountPercentage">
                                        <el-input v-model="discountForm.discountPercentage"
                                                  class="discountPercentage"
                                                  style="width: 100%;">

                                        </el-input>
                                    </el-form-item>
                                    <el-form-item label="Selling Price After Discount" prop="sellingPriceAfterDiscount">
                                        <el-input v-model="discountForm.sellingPriceAfterDiscount"
                                                  class="sellingPriceAfterDiscount"
                                                  style="width: 100%;">
                                        </el-input>
                                    </el-form-item>
                                    <!--<div class="row">
                                        Qty:<input type='number' name='qty' id='qty' value='' /> <br/>
                                        Price:<input type='number' name='price' id='price' /> <br/>
                                        Total:<input type='number' name='total' id='total' /> <br/>
                                    </div>-->
                                    <el-form-item>
                                        <el-button type="primary"
                                                   style="width: 80%; margin: 15px 10% 0"
                                                   @click="submitForm('discountForm')">Save
                                        </el-button>
                                    </el-form-item>
                                </el-form>
                            </div>
                        </div>
                    </div>
                </el-card>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <el-card class="box-card" shadow="hover">
                            <div class="text item">
                                <el-table
                                    :data="discountTableData.filter(data => !search || data.productName.toLowerCase().includes(search.toLowerCase()))"
                                    border
                                    max-height="470"
                                    style="width: 100%">
                                    <el-table-column
                                        prop="sn"
                                        label="S.N."
                                        width="50">
                                    </el-table-column>
                                    <el-table-column
                                        prop="productName"
                                        label="Product Name"
                                        width="120">
                                    </el-table-column>
                                    <el-table-column
                                        prop="previousSellingPrice"
                                        label="Previous Selling Price"
                                        width="120">
                                    </el-table-column>
                                    <el-table-column
                                        prop="discountPercentage"
                                        label="Discount Percentage"
                                        width="120">
                                    </el-table-column>
                                    <el-table-column
                                        prop="sellingPriceAfterDiscount"
                                        label="Selling Price After Discount"
                                        width="120">
                                    </el-table-column>
                                    <el-table-column
                                        fixed="right"
                                        width="140"
                                        align="right">
                                        <template slot="header" slot-scope="scope">
                                            <el-input
                                                v-model="search"
                                                size="mini"
                                                placeholder="Type to search"/>
                                        </template>
                                        <template slot-scope="scope">
                                            <el-button type="primary"
                                                       icon="el-icon-edit"
                                                       size="mini"
                                                       @click="dialogVisible  = true"
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
        <!--Edit Modal-->
        <el-dialog title="Edit Discount Products"
                   :visible.sync="dialogVisible"
                    width= "30%">
            <el-form :model="discountForm" :rules="discountFormRules" ref="discountForm"
                     :label-position="labelPosition" class="demo-discountForm">
                <el-form-item label="Select Category" prop="productSelect">
                    <el-select clearable placeholder="Select Product"
                               filterable
                               v-model="discountForm.productSelect"
                               style="width: 100%">
                        <el-option
                            v-for="item in productSelectOptions"
                            :key="item.value"
                            :label="item.label"
                            :value="item.value">
                        </el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="Selling Price" prop="sellingPrice">
                    <el-input v-model="discountForm.sellingPrice"
                              class="sellingPrice"
                              style="width: 100%;">

                    </el-input>
                </el-form-item>
                <el-form-item label="Discount Percentage" prop="discountPercentage">
                    <el-input v-model="discountForm.discountPercentage"
                              class="discountPercentage"
                              style="width: 100%;">

                    </el-input>
                </el-form-item>
                <el-form-item label="Selling Price After Discount" prop="sellingPriceAfterDiscount">
                    <el-input v-model="discountForm.sellingPriceAfterDiscount"
                              class="sellingPriceAfterDiscount"
                              style="width: 100%;">
                    </el-input>
                </el-form-item>
                <!--<div class="row">
                    Qty:<input type='number' name='qty' id='qty' value='' /> <br/>
                    Price:<input type='number' name='price' id='price' /> <br/>
                    Total:<input type='number' name='total' id='total' /> <br/>
                </div>-->
                <el-form-item>
                    <el-button type="primary"
                               style="width: 80%; margin: 15px 10% 0"
                               @click="submitForm('discountForm')">Save
                    </el-button>
                </el-form-item>
            </el-form>
        </el-dialog>
    </div>
</template>

<script>
export default {
    name: "addDiscountComponent",
    data() {
        return {
            dialogVisible : false,
            labelPosition: 'top',
            productSelectOptions: [{
                value: 'Product - 1',
                label: 'Product - 1'
            }, {
                value: 'Product - 2',
                label: 'Product - 2'
            }, {
                value: 'Product - 3',
                label: 'Product - 3'
            }],
            discountForm: {
                productSelect: '',
                sellingPrice: '',
                discountPercentage: '',
                sellingPriceAfterDiscount: '',
            },
            discountFormRules: {
                productSelect: [
                    {required: true, message: 'Please select product', trigger: 'change'},
                ],
                discountPercentage: [
                    {required: true, message: 'Please place discount percentage', trigger: 'blur'},
                ],
            },
            /*Table Data's*/
            discountTableData: [{
                sn: 1,
                productName: 'Product - 1',
                previousSellingPrice: '1000',
                discountPercentage: '10',
                sellingPriceAfterDiscount: '900'
            }, {
                sn: 2,
                productName: 'Product - 2',
                previousSellingPrice: '2000',
                discountPercentage: '20',
                sellingPriceAfterDiscount: '1600'
            }, {
                sn: 3,
                productName: 'Product - 3',
                previousSellingPrice: '2000',
                discountPercentage: '20',
                sellingPriceAfterDiscount: '1600'
            }, {
                sn: 4,
                productName: 'Product - 4',
                previousSellingPrice: '2000',
                discountPercentage: '20',
                sellingPriceAfterDiscount: '1600'
            }, {
                sn: 5,
                productName: 'Product - 5',
                previousSellingPrice: '2000',
                discountPercentage: '20',
                sellingPriceAfterDiscount: '1600'
            }, {
                sn: 6,
                productName: 'Product - 6',
                previousSellingPrice: '2000',
                discountPercentage: '20',
                sellingPriceAfterDiscount: '1600'
            }],
            search: ''
        }
    },
    methods: {
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
        handleEdit(index, row) {
            console.log(index, row);
        },
        handleDelete(index, row) {
            console.log(index, row);
        }
    },
    mounted() {
        $(document).ready(function () {
            /*$('#qty, #price').on('input', function () {
                var qty = parseInt($('#qty').val());
                var price = parseFloat($('#price').val());
                $('#total').val((qty * price ? qty * price : 0).toFixed(2));
            });

                var price = $('.sellingPrice').val();
                alert(price);
                var discount = $('.discountPercentage').val();
                alert(discount);*/
        });
    }

}
</script>

<style scoped>
.text {
    font-size: 14px;
}

.item {
    margin-bottom: 18px;
}

.clearfix:before,
.clearfix:after {
    display: table;
    content: "";
}

.clearfix:after {
    clear: both
}
</style>
