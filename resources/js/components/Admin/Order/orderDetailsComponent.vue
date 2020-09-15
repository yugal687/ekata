<template>
    <div class="">
        <main class="orderDetailsTable">
            <el-card class="box-card" shadow="hover">
                <div class="text item">
                    <el-table
                        ref="multipleTable"
                        :data="orderDetailsTableData.filter(data => !search || data.user.first_name.toLowerCase().includes(search.toLowerCase())
                    || data.date.includes(search)
                    || data.order.order_number.includes(search))"
                        border
                        max-height="470"
                        style="width: 100%">
                        <el-table-column
                            type="selection"
                            width="55">
                        </el-table-column>
                        <el-table-column
                            type="index"
                            label="S.N."
                            width="60">
                        </el-table-column>
                        <el-table-column
                            prop="date"
                            label="Date">
                        </el-table-column>
                        <el-table-column
                            prop="order.order_number"
                            label="Order Number">
                        </el-table-column>

                        <el-table-column
                            prop="user.first_name"
                            label="User Name">
                        </el-table-column>
                        <el-table-column
                            prop="order.total_price"
                            label="Total Price">
                        </el-table-column>
                        <el-table-column
                            label="Status"
                            prop="order.order_status">
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
                                           @click="showDetails(scope.row.id)">Details
                                </el-button>
                                <el-button type="primary"
                                           size="mini"
                                           @click="orderDelivered(scope.row.id)">Delivered
                                </el-button>
                                <el-button
                                    size="mini"
                                    type="danger"
                                    @click="handleDelete(scope.row.id)">Cancel
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
                    <el-table-column property="product.product_name" label="Product Name" width="150"></el-table-column>
                    <el-table-column property="quantity" label="Quantity" width="200"></el-table-column>
                    <el-table-column property="price" label="Price"></el-table-column>
                    <el-table-column property="discount" label="Discount"></el-table-column>
                </el-table>
                <span slot="footer" class="dialog-footer" :data="gridData">
                    <div class="row">
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4">
                                    Address
                                </dt>
                                <dd class="col-sm-8" property="user.address">
                                </dd>
                                <dt class="col-sm-4">
                                    City
                                </dt>
                                <dd class="col-sm-8" property="user.state">
                                </dd>
                                <dt class="col-sm-4">
                                    Postal Code
                                </dt>
                                <dd class="col-sm-8" property="user.postal_code">
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4">
                                    Optional Address
                                </dt>
                                <dd class="col-sm-8" property="order.shipping_address">
                                </dd>
                                <dt class="col-sm-4">
                                    Email
                                </dt>
                                <dd class="col-sm-8" property="user.email">
                                </dd>
                                <dt class="col-sm-4">
                                    Contact
                                </dt>
                                <dd class="col-sm-8" property="user.contact_number">
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
                orderDetailsTableData: [],
                multipleSelection: [],
                search: '',
                dialogTableVisible: false,
                gridData: [],
            }
        },
        mounted() {
           this.fetchOrder();
        },
        methods: {
            showDetails(id) {
                this.dialogTableVisible = true;
                this.gridData = this.orderDetailsTableData.filter(orderDetailsTableData => (orderDetailsTableData.id == id));
                console.log(this.gridData);
            },
            fetchOrder(){
                axios.get('/api/getOrderDetail', {}).then(response => {
                    this.orderDetailsTableData = response.data.order
                });
            },
            orderDelivered(id) {
                axios.patch('/api/setDelivered/'+id, {})
                    .then(response => {
                        this.$notify({
                            title: 'Success',
                            message: response.data.message,
                            type: 'success'
                        });
                        this.fetchOrder();
                    }).catch(error => {
                    if (error.response) {
                        this.$notify({
                            title: 'Error',
                            message: 'Error Input Data ',
                            type: 'error'
                        });
                        /*this.errors = error.response.data.errors;*/
                    }
                });
            },
            handleDelete(id){
                axios.delete('/api/deleteOrder/'+id)
                    .then(response => {
                        this.$notify({
                            title: 'Success',
                            message: response.data.message,
                            type: 'info'
                        });
                        this.fetchOrder();
                    }).catch(error => {
                    if (error.response) {
                        this.$notify({
                            title: 'Error',
                            message: 'Error Input Data ',
                            type: 'error'
                        });
                        /*this.errors = error.response.data.errors;*/
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>
