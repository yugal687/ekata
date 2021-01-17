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
                            type="index"
                            label="S.N."
                            width="60">
                        </el-table-column>
                        <el-table-column
                            prop="created_at"
                            label="Date">
                        </el-table-column>
                        <el-table-column
                            prop="order_number"
                            label="Order Number">
                        </el-table-column>

                        <el-table-column
                            prop="first_name"
                            label="User Name">
                        </el-table-column>
                        <el-table-column
                            prop="registered_user"
                            label="User Id">
                        </el-table-column>
                        <el-table-column
                            prop="total_price"
                            label="Total Price">
                        </el-table-column>
                        <el-table-column
                            label="Status"
                            prop="order_status">
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
                                           icon="fas fa-info"
                                           round
                                           @click="showDetails(scope.row.id)">
                                </el-button>
                                <el-button type="success"
                                           size="mini"
                                           icon="fas fa-check"
                                           round
                                           @click="orderDelivered(scope.row.id)">
                                </el-button>
                                <el-button
                                    size="mini"
                                    type="danger"
                                    icon="fas fa-times"
                                    round
                                    @click="handleDelete(scope.row.id)">
                                </el-button>
                            </template>
                        </el-table-column>
                    </el-table>
                </div>
            </el-card>
        </main>
        <main>
            <el-dialog id="PrintOrder" title="Buyer Orders" :visible.sync="dialogTableVisible">
               <!-- <el-table  v-for="data in gridData  ">
                   &lt;!&ndash; <el-table-column property="product.product_name" label="Product Name" width="150"></el-table-column>&ndash;&gt;
                    <el-table-column label="Quantity" width="200">{{data.order_details[0].quantity}}</el-table-column>
                    <el-table-column label="Price">{{data.order_details[0].price}}</el-table-column>
                    <el-table-column label="Discount">{{data.order_details[0].discount}}</el-table-column>
                </el-table>-->
                <table class="table" >
                    <thead>
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount</th>
                    </tr>
                    </thead>
                    <tbody v-for="data in gridData">
                    <tr v-for="item in data.items">
                        <th>{{item.product.product_name}}</th>
                        <td>{{item.quantity}}</td>
                        <td>{{item.price}}</td>
                        <td>{{item.discount}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Total Price</td>
                        <td>{{data.total_price}}</td>
                        <td></td>
                    </tr>
                    </tbody>
                   
                </table>
                <span slot="footer" class="dialog-footer">
                    <div class="row" v-for="data in gridData">
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4">
                                    Shipping Address
                                </dt>
                                <dd class="col-sm-8" >
                                    {{data.shipping_address}}
                                </dd>
                                <dt class="col-sm-4">
                                    City
                                </dt>
                                <dd class="col-sm-8">
                                    {{data.state}}
                                </dd>
                                <dt class="col-sm-4">
                                    Postal Code
                                </dt>
                                <dd class="col-sm-8">
                                    {{data.postal_code}}
                                </dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-sm-4">
                                    Optional Address
                                </dt>
                                <dd class="col-sm-8">
                                    {{data.shipping_address}}
                                </dd>
                                <dt class="col-sm-4">
                                    Email
                                </dt>
                                <dd class="col-sm-8">
                                    {{data.email}}
                                </dd>
                                <dt class="col-sm-4">
                                    Contact
                                </dt>
                                <dd class="col-sm-8" >
                                    {{data.contact_number}}
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
                //console.log(this.gridData[0]);
            },
            fetchOrder(){
                axios.get('/api/getOrderDetail', {}).then(response => {
                    this.orderDetailsTableData = response.data.orderlisted;
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
            },
            
    
        }
        
    }
    
</script>



<style scoped>

</style>
