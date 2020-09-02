<template>
    <div class="">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-sm-12">
                <el-card class="box-card" shadow="always">
                    <div slot="header">
                        Customers Enquiries
                    </div>
                    <div class="text">
                        <el-table
                            border
                            max-height="470"
                            :data="tableData.filter(data => !search || data.name.toLowerCase().includes(search.toLowerCase())
                                    || data.email.toLowerCase().includes(search.toLowerCase()))"
                            style="width: 100%">
                            <el-table-column
                                label="S.N."
                                prop="sn"
                                width="50">
                            </el-table-column>
                            <el-table-column
                                label="Full Name"
                                prop="name"
                                width="160">
                            </el-table-column>
                            <el-table-column
                                label="Email"
                                prop="email"
                                width="200">
                            </el-table-column>
                            <el-table-column
                                label="Contact Number"
                                prop="contactNumber"
                                width="200">
                            </el-table-column>
                            <el-table-column
                                label="Enquiry"
                                prop="enquiry">
                            </el-table-column>
                            <el-table-column
                                fixed="right"
                                width="200"
                                align="right">
                                <template slot="header" slot-scope="scope">
                                    <el-input
                                        v-model="search"
                                        size="mini"
                                        placeholder="Type to search"/>
                                </template>
                                <template slot-scope="scope">
                                    <el-button
                                        size="mini"
                                        type="primary"
                                        icon="fas fa-reply"
                                        @click="handleReply(scope.$index, scope.row)">
                                        <a class="text-white" href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to=someone@example.com" target="_blank">
                                            &nbsp; Reply
                                        </a>
                                    </el-button>
                                    <el-button
                                        size="mini"
                                        type="danger"
                                        @click="handleDelete(scope.$index, scope.row)">Delete
                                    </el-button>
                                </template>
                            </el-table-column>
                        </el-table>
                    </div>
                </el-card>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "enquiriesComponent",
        data(){
            return{
                tableData: [{
                    sn: 1,
                    name: 'Tom Reddy',
                    email: 'tom2121@gmail.com',
                    enquiry: 'No. 189, Grove St, Los Angeles',
                    contactNumber: '1234567890',
                }, {
                    sn: 2,
                    name: 'John',
                    email: 'john@gmail.com',
                    enquiry: 'No. 189, Grove St, Los Angeles',
                    contactNumber: '98765432',
                }, {
                    sn: 3,
                    name: 'Morgan',
                    email: 'morgan@gmail.com',
                    enquiry: 'No. 189, Grove St, Los Angeles',
                    contactNumber: '34567887687',
                }, {
                    sn: 4,
                    name: 'Jessy',
                    email: 'jessy@gmail.com',
                    enquiry: 'No. 189, Grove St, Los Angeles',
                    contactNumber: '12345678987654',
                },{
                    sn: 1,
                    name: 'Tom',
                    email: 'tom@gmail.com',
                    enquiry: 'No. 189, Grove St, Los Angeles',
                    contactNumber: '1234567890',
                }, {
                    sn: 2,
                    name: 'John',
                    email: 'john@gmail.com',
                    enquiry: 'No. 189, Grove St, Los Angeles',
                    contactNumber: '98765432',
                }, {
                    sn: 3,
                    name: 'Morgan',
                    email: 'morgan@gmail.com',
                    enquiry: 'No. 189, Grove St, Los Angeles',
                    contactNumber: '34567887687',
                }, {
                    sn: 4,
                    name: 'Jessy',
                    email: 'jessy@gmail.com',
                    enquiry: 'No. 189, Grove St, Los Angeles',
                    contactNumber: '12345678987654',
                }],
                search: '',
            }
        },
        methods: {
            handleReply() {

            },
            handleEdit(){

            }
        }
    }
</script>

<style scoped>

</style>
