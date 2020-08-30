<template>
    <div class="">
        <main class="orderDetailsTable">
            <el-card class="box-card" shadow="hover">
                <div class="text item">
                    <el-table
                        :data="orderDetailsTableData.filter(data => !search || data.buyerName.toLowerCase().includes(search.toLowerCase())
                    || data.date.includes(search)
                    || data.userId.includes(search)
                    || data.orderNumber.includes(search))"
                        border
                        max-height="470"
                        style="width: 100%">
                        <el-table-column
                            prop="sn"
                            label="S.N."
                            width="60">
                        </el-table-column>
                        <el-table-column
                            prop="date"
                            label="Date">
                        </el-table-column>
                        <el-table-column
                            prop="orderNumber"
                            label="Order Number">
                        </el-table-column>
                        <el-table-column
                            prop="userId"
                            label="User Id">
                        </el-table-column>
                        <el-table-column
                            prop="buyerName"
                            label="User Name">
                        </el-table-column>
                        <el-table-column
                            prop="totalPrice"
                            label="Total Price">
                        </el-table-column>
                        <el-table-column
                            fixed="right"
                            width="180"
                            align="right">
                            <template slot="header" slot-scope="scope">
                                <el-input
                                    v-model="search"
                                    size="mini"
                                    placeholder="Type to search"/>
                            </template>
                            <template slot-scope="scope">
                                <el-button type="primary"
                                           size="mini"
                                           @click="dialogTableVisible  = true">Details
                                </el-button>
                                <el-button
                                    size="mini"
                                    type="danger"
                                    @click="handleDelete(scope.$index, scope.row)">Cancel
                                </el-button>
                            </template>
                        </el-table-column>
                    </el-table>
                </div>
            </el-card>
        </main>
        <main>
            <el-dialog title="Buyer Orders" :visible.sync="dialogTableVisible">
                <el-table :data="gridData">
                    <el-table-column property="productName" label="Product Name" width="150"></el-table-column>
                    <el-table-column property="quantity" label="Quantity" width="200"></el-table-column>
                    <el-table-column property="price" label="Price"></el-table-column>
                    <el-table-column property="discount" label="Discount"></el-table-column>
                </el-table>
                <span slot="footer" class="dialog-footer">
                    <div class="row" >
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4">
                                    Address
                                </dt>
                                <dd class="col-sm-8">
                                    {{address}}
                                </dd>
                                <dt class="col-sm-4">
                                    City
                                </dt>
                                <dd class="col-sm-8">
                                    {{city}}
                                </dd>
                                <dt class="col-sm-4">
                                    Postal Code
                                </dt>
                                <dd class="col-sm-8">
                                    {{postalCode}}
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4">
                                    Optional Address
                                </dt>
                                <dd class="col-sm-8">
                                    {{optionalAddress}}
                                </dd>
                                <dt class="col-sm-4">
                                    Email
                                </dt>
                                <dd class="col-sm-8">
                                    {{email}}
                                </dd>
                                <dt class="col-sm-4">
                                    Contact
                                </dt>
                                <dd class="col-sm-8">
                                    {{contact}}
                                </dd>
                                </dl>
                        </div>
                    </div>
                </span>
            </el-dialog>
        </main>
    </div>
</template>

<script>
export default {
    name: "orderDetailsComponent",
    data() {
        return {
            address: 'A description list is perfect for defining terms',
            city: 'San Fransisco',
            postalCode: '4325',
            optionalAddress: 'A description list is perfect',
            email: 'email@gmail.com',
            contact: '1234567890',
            /*Table Data's*/
            orderDetailsTableData: [{
                sn: 1,
                date: '2020-12-23',
                orderNumber: '2121',
                userId: '123-12',
                buyerName: 'Teddy',
                totalPrice: '9000'
            }, {
                sn: 2,
                date: '2020-12-23',
                orderNumber: '121',
                userId: '123-1',
                buyerName: 'Tom',
                totalPrice: '5000'
            }, {
                sn: 3,
                date: '2019-12-23',
                orderNumber: '121',
                userId: '123',
                buyerName: 'Teddy',
                totalPrice: '4000'
            }, {
                sn: 4,
                date: '2017-12-23',
                orderNumber: '212',
                userId: '12',
                buyerName: 'Jerry',
                totalPrice: '90000'
            }, {
                sn: 5,
                date: '2018-12-23',
                orderNumber: '111',
                userId: '123-12',
                buyerName: 'John',
                totalPrice: '2000'
            }, {
                sn: 6,
                date: '2020-12-24',
                orderNumber: '1090',
                userId: '123-12',
                buyerName: 'Tommy',
                totalPrice: '3000'
            }],
            search: '',
            dialogTableVisible: false,
            gridData: [{
                productName: 'Rice',
                quantity: '23',
                price: '1234',
                discount: '34'
            }, {
                productName: 'Milk',
                quantity: '23',
                price: '1234',
                discount: '34'
            }, {
                productName: 'Chocolate',
                quantity: '23',
                price: '1234',
                discount: '34'
            }, {
                productName: 'Coffee',
                quantity: '23',
                price: '1234',
                discount: '34'
            }],
        }
    }
}
</script>

<style scoped>

</style>
