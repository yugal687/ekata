<template>
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row box-card-slide tag-div" style="border-top: 3px solid yellow">
                            <div class="row d-flex justify-content-center mt-3">
                                <div class="tagBtn btn btn-warning">Add Tags</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-12">
                                            <el-form :model="tagForm" :rules="tagRules" ref="tagForm"
                                                     :label-position="labelPosition" class="demo-tagForm">
                                                <el-form-item label="Tag Name" prop="name">
                                                    <el-input v-model="tagForm.name"
                                                              style="width: 100%;">
                                                    </el-input>
                                                </el-form-item>
                                                <el-form-item>
                                                    <el-button type="primary"
                                                               style="width: 80%; margin: 15px 10% 0"
                                                               @click="submitTag('tagForm')">Create
                                                    </el-button>
                                                </el-form-item>
                                            </el-form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <el-card div class="box-card">
                            <div class="row mt-3">
                                <div class="col-12">
                                    <el-card class="box-card" shadow="hover">
                                        <div class="text item">
                                            <el-table
                                                :data="tags.filter(data => !tagSearch || data.tags.toLowerCase().includes(tagSearch.toLowerCase()))"
                                                border
                                                max-height="470"
                                                style="width: 100%">
                                                <el-table-column
                                                    type="index"
                                                    label="S.N."
                                                    width="50">
                                                </el-table-column>
                                                <el-table-column
                                                    prop="tags"
                                                    label="Tag Name">
                                                </el-table-column>
                                                <el-table-column
                                                    fixed="right"
                                                    align="right">
                                                    <template slot="header" slot-scope="scope">
                                                        <el-input
                                                            v-model="tagSearch"
                                                            size="mini"
                                                            placeholder="Type to search"/>
                                                    </template>
                                                    <template slot-scope="scope">
                                                        <el-button type="primary"
                                                                   icon="el-icon-edit"
                                                                   size="mini"
                                                                   data-target=".bd-tag-modal-lg"
                                                                   data-toggle="modal"
                                                                   @click="editTag(scope.row.id)"
                                                                   circle></el-button>
                                                        <el-button
                                                            size="mini"
                                                            type="danger"
                                                            icon="el-icon-delete"
                                                            @click="deleteTag(scope.row.id)"
                                                            circle></el-button>
                                                    </template>
                                                </el-table-column>
                                            </el-table>
                                        </div>
                                    </el-card>
                                </div>
                            </div>
                        </el-card>
                    </div>
                </div>


                <div class="modal fade bd-tag-modal-lg" tabindex="-1" role="dialog"
                     aria-labelledby="myLargeModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                Edit Tag
                                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div v-if="edit" class="alert alert-success alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div v-for="etag in editTags">
                                        <el-form :model="etag"
                                                 :label-position="labelPosition" class="demo-tagForm">
                                            <el-form-item label="Tag Name" prop="tags">
                                                <el-input v-model="etag.tags"
                                                          style="width: 100%;">
                                                </el-input>
                                            </el-form-item>
                                            <el-form-item>
                                                <el-button type="primary"
                                                           style="width: 80%; margin: 15px 10% 0"
                                                           @click="saveEditTag">Create
                                                </el-button>
                                            </el-form-item>
                                        </el-form>

                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "tagsSetupComponent",
    data() {
        return {
            labelPosition: 'top',
            edit: false,
            tags: [],
            editTags: [],
            tagForm: {
                name: '',
            },
            tagRules: {
                name: [
                    {required: true, message: 'Please input tag name', trigger: 'blur'},
                ]
            },
            /*Table Datas*/
            tagTableData: [{
                sn: 1,
                tagName: 'Tom'
            }, {
                sn: 2,
                tagName: 'Tom Cat'
            }],
            tagSearch: '',
        }
    },
    mounted() {
        this.fetchTag();
    },
    methods: {
        fetchTag() {
            axios.get('/api/getTag', {})
                .then(response => {
                    this.tags = response.data.tags;
                });
        },
        editTag(id) {
            this.editTags = this.tags.filter(tags => tags.id == id);
        },
        saveEditTag() {
            axios.post('/api/saveEditTag', {
                editTag: this.editTags
            }).then(response => {
                this.$notify({
                    title: 'Success',
                    message: response.data.message,
                    type: 'success'
                });
                this.fetchTag();
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
        deleteTag(id) {
            this.$confirm('Are you sure to delete this item?')
                .then(_ => {
                    axios.delete('/api/deleteTag/' + id)
                        .then(response => {
                            this.$notify({
                                title: 'Success',
                                message: response.data.message,
                                type: 'info'
                            });
                            this.fetchTag();
                        }).catch(error => {
                        if (error.response) {
                            this.$notify({
                                title: 'Error',
                                message: 'Error Input Data ',
                                type: 'error'
                            });
                        }
                    });
                })
                .catch(_ => {
                });
        },
        submitTag(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    let formData = new FormData();
                    formData.append('tags', this.tagForm.name);
                    axios.post('/api/postTags', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }

                    }).then(response => {
                        this.$notify({
                            title: 'Success',
                            message: response.data.message,
                            type: 'success'
                        });
                        this.tagForm = {};
                        this.fetchTag();
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
                } else {
                    console.log('error submit!!');
                    return false;
                }
            });
        },

        handleEdit(index, row) {
            console.log(index, row);
        },
        handleDelete(index, row) {
            console.log(index, row);
        }
    },

}
</script>

<style scoped>
.container-fluid .row {
    margin-left: 0;
    margin-right: 0;
}

.box-card-slide {
    border: 1px solid #EBEEF5;
    background-color: #FFF;
    color: #303133;
    border-radius: 4px;
    overflow: hidden;
    box-shadow: 0 2px 12px 0 rgba(0, 0, 0, .1);
}

.box-card-slide .box-header {
    padding: 18px 20px;
    border-bottom: 1px solid #EBEEF5;
    box-sizing: border-box;
}

.box-card-slide .box-body {
    padding: 20px;
}
</style>
