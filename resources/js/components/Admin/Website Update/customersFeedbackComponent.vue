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
                            prop="sn"
                            width="50">
                        </el-table-column>
                        <el-table-column
                            label="User ID"
                            prop="userID"
                            width="160">
                        </el-table-column>
                        <el-table-column
                            label="User Name"
                            prop="userName"
                            width="160">
                        </el-table-column>
                        <el-table-column
                            label="Rating"
                            prop="rating"
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
        name: "customersFeedbackComponent",
        data(){
            return{
                tableData: [{
                    sn: 1,
                    userID: '123-122',
                    userName: 'tom',
                    rating: '1',
                    feedback: 'Lorem Ipsum to do the task',
                }, {
                    sn: 2,
                    userID: '1222',
                    userName: 'teddy',
                    rating: '1',
                    feedback: 'Lorem Ipsum to do the task',
                }, {
                    sn: 3,
                    userID: '12322',
                    userName: 'john',
                    rating: '3',
                    feedback: 'Lorem Ipsum to do the task',
                }, {
                    sn: 4,
                    userID: '23-122',
                    userName: 'harish',
                    rating: '5',
                    feedback: 'Lorem Ipsum to do the task',
                },{
                    sn: 1,
                    userID: '123-122',
                    userName: 'akon',
                    rating: '1',
                    feedback: 'Lorem Ipsum to do the task',
                }],
                search: '',
            }
        },
        methods: {
            handleDelete(){

            }
        }
    }
</script>

<style scoped>

</style>
