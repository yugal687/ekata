<template>
    <div class="">
        <el-card class="box-card" shadow="always">
            <div class="item">
                <el-table
                    border
                    max-height="470"
                    :data="tableData.filter(data => !search || data.name.toLowerCase().includes(search.toLowerCase())
                            || data.userID.toLowerCase().includes(search.toLowerCase())
                            || data.contactNumber.toLowerCase().includes(search.toLowerCase())
                            || data.email.toLowerCase().includes(search.toLowerCase())
                            || data.address.toLowerCase().includes(search.toLowerCase()))"
                            style="width: 100%">
                    <el-table-column
                        label="S.N."
                        prop="sn"
                        width="50">
                    </el-table-column>
                    <el-table-column
                        label="User ID"
                        width="120"
                        prop="userID">
                    </el-table-column>
                    <el-table-column
                        label="Full Name"
                        prop="name">
                    </el-table-column>
                    <el-table-column
                        label="Address"
                        prop="address">
                    </el-table-column>
                    <el-table-column
                        label="Email"
                        prop="email">
                    </el-table-column>
                    <el-table-column
                        label="Contact Number"
                        prop="contactNumber">
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
                            <!--<el-button
                                size="mini"
                                type="primary"
                                @click="viewProfile(scope.$index, scope.row)">View Profile
                            </el-button>-->
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
</template>

<script>
export default {
    name: "customerComponent",
    data() {
        return {
            tableData: [{
                sn: 1,
                userID: '2016-05-03',
                name: 'Tom',
                email: 'tom@gmail.com',
                address: 'No. 189, Grove St, Los Angeles',
                contactNumber: '1234567890',
            }, {
                sn: 2,
                userID: '2016-05-02',
                name: 'John',
                email: 'john@gmail.com',
                address: 'No. 189, Grove St, Los Angeles',
                contactNumber: '98765432',
            }, {
                sn: 3,
                userID: '2016-05-04',
                name: 'Morgan',
                email: 'morgan@gmail.com',
                address: 'No. 189, Grove St, Los Angeles',
                contactNumber: '34567887687',
            }, {
                sn: 4,
                userID: '2016-05-01',
                name: 'Jessy',
                email: 'jessy@gmail.com',
                address: 'No. 189, Grove St, Los Angeles',
                contactNumber: '12345678987654',
            },{
                sn: 1,
                userID: '2016-05-03',
                name: 'Tom',
                email: 'tom@gmail.com',
                address: 'No. 189, Grove St, Los Angeles',
                contactNumber: '1234567890',
            }, {
                sn: 2,
                userID: '2016-05-02',
                name: 'John',
                email: 'john@gmail.com',
                address: 'No. 189, Grove St, Los Angeles',
                contactNumber: '98765432',
            }, {
                sn: 3,
                userID: '2016-05-04',
                name: 'Morgan',
                email: 'morgan@gmail.com',
                address: 'No. 189, Grove St, Los Angeles',
                contactNumber: '34567887687',
            }, {
                sn: 4,
                userID: '2016-05-01',
                name: 'Jessy',
                email: 'jessy@gmail.com',
                address: 'No. 189, Grove St, Los Angeles',
                contactNumber: '12345678987654',
            }],
            search: '',
        }
    },
    methods: {
        /*handleEdit(index, row) {
            console.log(index, row);
        },*/
        handleDelete(index, row) {
            console.log(index, row);
        }
    },
}
</script>

<style scoped>

</style>
