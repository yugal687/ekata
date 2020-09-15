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
                                type="index"
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
                                prop="number"
                                width="200">
                            </el-table-column>
                            <el-table-column
                                label="Enquiry"
                                prop="description">
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
                                        type="danger"
                                        @click="handleDelete(scope.row.id)">Delete
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
                tableData: [],
                search: '',
            }
        },
        mounted(){
         this.fetchEnquiry();
        },
        methods: {
            fetchEnquiry(){
                axios.get('/api/getEnquiries',{}).then(response=>{
                    this.tableData = response.data.enquiries;
                });
            },
            handleDelete(id){
                this.$confirm('Are you sure to delete this item?')
                    .then(_ => {
                        axios.delete('/api/deleteEnquiry/' + id).then(response => {
                            this.$notify({
                                title: 'Success',
                                message: response.data.message,
                                type: 'info'
                            });
                            this.fetchEnquiry();
                        });
                    })
                .catch(_ => {});
            }
        }
    }
</script>

<style scoped>

</style>
