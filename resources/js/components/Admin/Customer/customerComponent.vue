<template>
    <div class="">
        <el-card class="box-card" shadow="always">
            <div class="item">
                <el-table
                    border
                    max-height="470"
                    :data="tableData.filter(data => !search || data.first_name.toLowerCase().includes(search.toLowerCase())
                            || data.contact_number.toLowerCase().includes(search.toLowerCase())
                            || data.email.toLowerCase().includes(search.toLowerCase())
                            || data.address.toLowerCase().includes(search.toLowerCase()))"
                            style="width: 100%">
                    <el-table-column
                        label="S.N."
                        type="index"
                        width="50">
                    </el-table-column>
                    <el-table-column
                        label="Full Name"
                        prop="first_name">
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
                        prop="contact_number">
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
                                @click="handleDelete(scope.row.id)">Delete
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
            tableData: [],
            search: '',
        }
    },
    mounted(){
      this.fetchUser();
    },
    methods: {
        /*handleEdit(index, row) {
            console.log(index, row);
        },*/
        fetchUser(){
            axios.get('/api/allUsers',{}).then(response=>{
                this.tableData = response.data.allUsers
            });
        },
        handleDelete(id) {
            this.$confirm('Are you sure to delete this customer?')
                .then(_ => {
                    axios.delete('/api/deleteUser/' + id)
                        .then(response => {
                            this.$notify({
                                title: 'Success',
                                message: response.data.message,
                                type: 'info'
                            });
                            this.fetchUser();

                            /*alert(response.data.message);*/
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
                })
            .catch(_ => {});
        }
    },
}
</script>

<style scoped>

</style>
