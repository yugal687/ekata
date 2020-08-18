<template>
    <div class="">
        <main>
            <el-table
                :data="tableData.filter(data => !search || data.userName.toLowerCase().includes(search.toLowerCase())
                    || data.userId.includes(search))"
                style="width: 100%">
                <el-table-column type="expand">
                    <template slot-scope="props">
                        <div class="row">
                            <div class="col-4">
                                <p>Address: {{ props.row.address }}</p>
                                <p>Optional Address: {{ props.row.state }}</p>
                                <p>Address: {{ props.row.city }}</p>
                            </div>
                            <div class="col-8">
                                <p>Contact Number: {{ props.row.contactNumber }}</p>
                                <p>Email: {{ props.row.email }}</p>
                                <p>Postal Code: {{ props.row.zip }}</p>
                            </div>
                        </div>
                    </template>
                </el-table-column>
                <el-table-column
                    label="User Id"
                    prop="userId">
                </el-table-column>
                <el-table-column
                    label="User Name"
                    prop="userName">
                </el-table-column>
                <el-table-column
                    fixed="right"
                    align="right">
                    <template slot="header" slot-scope="scope">
                        <el-input
                            v-model="search"
                            size="mini"
                            placeholder="Type to search"/>
                    </template>
                </el-table-column>
            </el-table>
        </main>
    </div>
</template>

<script>
export default {
    name: "shippingDetails",
    data() {
        return {
            tableData: [{
                userId: '20098',
                userName: 'Tommy',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036',
                contactNumber: '1234567890',
                email: 'tom98@gmail.com'
            }, {
                userId: '2009889',
                userName: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036',
                contactNumber: '1234567890',
                email: 'tom98@gmail.com'
            }, {
                userId: '20098',
                userName: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036',
                contactNumber: '1234567890',
                email: 'tom98@gmail.com'
            }, {
                userId: '20098',
                userName: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036',
                contactNumber: '1234567890',
                email: 'tom98@gmail.com'
            }, {
                userId: '20098',
                userName: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036',
                contactNumber: '1234567890',
                email: 'tom98@gmail.com'
            }, {
                userId: '20098',
                userName: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036',
                contactNumber: '1234567890',
                email: 'tom98@gmail.com'
            }, {
                userId: '20098',
                userName: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036',
                contactNumber: '1234567890',
                email: 'tom98@gmail.com'
            }],
            search: '',
        }
    }
}
</script>

<style scoped>

</style>
