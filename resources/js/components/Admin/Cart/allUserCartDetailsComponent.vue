<template>
    <div class="">
        <main class="row d-flex justify-content-center">
            <div class="col-md-9 col-sm-12">
                <el-card class="box-card p-4" shadow="hover">
                    <div class="text item">

                        <el-table
                            :data="cartDetailsTableData.filter(data => !search || data.userName.toLowerCase().includes(search.toLowerCase())
                    || data.userId.includes(search)
                    || data.status.toLowerCase().includes(search.toLowerCase()))"
                            border
                            max-height="470"
                            style="width: 100%">
                            <el-table-column
                                prop="sn"
                                label="S.N."
                                width="60">
                            </el-table-column>
                            <el-table-column
                                prop="userId"
                                label="User Id">
                            </el-table-column>
                            <el-table-column
                                prop="userName"
                                label="User Name">
                            </el-table-column>
                            <el-table-column
                                prop="status"
                                label="Status">
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
                                               @click="dialogTableVisible  = true">Cart Products
                                    </el-button>
                                    <!--<el-button
                                        size="mini"
                                        type="danger"
                                        @click="handleDelete(scope.$index, scope.row)">Cancel
                                    </el-button>-->
                                </template>
                            </el-table-column>
                        </el-table>
                    </div>

                </el-card>
            </div>
        </main>
        <main>
            <el-dialog title="Cart Products" :visible.sync="dialogTableVisible">
                <el-table :data="gridData">
                    <el-table-column property="productName" label="Product Name" width="150"></el-table-column>
                    <el-table-column property="quantity" label="Quantity" width="200"></el-table-column>
                    <el-table-column property="price" label="Price"></el-table-column>
                    <el-table-column property="discount" label="Discount"></el-table-column>
                </el-table>
            </el-dialog>
        </main>
    </div>
</template>

<script>
export default {
    name: "allUserCartDetailsComponent",
    data() {
        return {
            /*Table Data's*/
            cartDetailsTableData: [{
                sn: 1,
                userId: '123-12',
                userName: 'Teddy',
                status: 'True'
            }, {
                sn: 2,
                userId: '123-1',
                userName: 'Tom',
                status: 'False'
            }, {
                sn: 3,
                userId: '123',
                userName: 'Teddy',
                status: 'True'
            }, {
                sn: 4,
                userId: '12',
                userName: 'Jerry',
                status: 'False'
            }, {
                sn: 5,
                userId: '123-12',
                userName: 'John',
                status: 'False'
            }, {
                sn: 6,
                userId: '123-12',
                userName: 'Tommy',
                status: 'False'
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
    },

}
</script>

<style scoped>

</style>
