<template>
    <div class="">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <el-card class="box-card">
                    <div slot="header" class="">
                        Customers Feedback
                    </div>
                    <div class="text">
                        <el-table
                            border
                            max-height="470"
                            :data="tableData.filter(data => !search || data.userID.toLowerCase().includes(search.toLowerCase())
                                    || data.userName.toLowerCase().includes(search.toLowerCase()))"
                            style="width: 100%">
                            <el-table-column
                                label="S.N."
                                type="index"
                                width="50">
                            </el-table-column>
                            <el-table-column
                                label="User Name"
                                prop="user.first_name"
                                width="160">
                            </el-table-column>
                            <el-table-column
                                label="Rating"
                                prop="star"
                                width="100">
                            </el-table-column>
                            <el-table-column
                                label="Feedback"
                                prop="feedback">
                            </el-table-column>
                            <el-table-column
                                fixed="right"
                                align="right"
                                width="160">
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
        name: "customersFeedbackComponent",
        data() {
            return {
                tableData: [],
                search: '',
            }
        },
        mounted() {
            this.fetchFeedback();
        },
        methods: {
            fetchFeedback(){
                axios.get('/api/fetchFeedback', {}).then(response => {
                    this.tableData = response.data.feedback
                });
            },
            handleDelete(id) {
                this.$confirm('Are you sure to delete this item?')
                    .then(_ => {
                        axios.delete('/api/deleteFeedback/' + id).then(response => {
                            this.$notify({
                                title: 'Success',
                                message: response.data.message,
                                type: 'info'
                            });
                            this.fetchFeedback();

                        });
                    })
                .catch(_ => {});
            }
        }
    }
</script>

<style scoped>

</style>
