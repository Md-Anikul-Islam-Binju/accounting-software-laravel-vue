<template>
<AdminIndex />
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Branch</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Branch</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Branch Add & Show</h6>
                <form @submit.prevent="submit">
                <div class="form-layout">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Branch Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name" v-model="form.name" placeholder="Enter Branch Name">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Branch Title: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="title" v-model="form.title" placeholder="Enter Branch Title">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Branch Address: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="address" v-model="form.address" placeholder="Enter Branch Address">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" v-model="form.status" data-placeholder="Choose Status">
                                    <option label="Choose Status"></option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info mg-r-5">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Branch List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Branch name</th>
                            <th class="wd-15p">Branch Title</th>
                            <th class="wd-15p">Branch Address</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data, index) in branches">
                            <td>{{ index+1 }}</td>
                            <td>{{ data.name }}</td>
                            <td>{{ data.title }}</td>
                            <td>{{ data.address }}</td>
                            <td>{{ data.status==1? "Active":"Inactive" }}</td>
                            <td>
                                <Link class="btn btn-success" :href="route('admin.branch.edit',data.id)" style="text-align: end; color:white; margin-right: 2px;" >Edit</Link>
                                <Link class="btn btn-danger"   @click="destroy(data.id)"  style="text-align: end; color:white; margin-left: 2px;" >Delete</Link>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AdminIndex from "../AdminIndex";
import {Link} from "@inertiajs/inertia-vue3";
import Swal from "sweetalert2";
export default {
    name: "BranchAddShow",
    components: {AdminIndex,Link},
    props:{
        branches:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                name:'',
                title:'',
                address:'',
                status:''
            })
        }
    },
    methods:{
        // submit(){
        //     this.form.post(route('admin.branch.store'))
        //     this.form.reset();
        // },
        submit(){
            if(this.form.isDirty==true)
            {
                this.form.post(route('admin.branch.store'))
                this.form.reset();
                Swal.fire(
                    'Success!',
                    'You Branch Data Submit Successfully!',
                    'success'
                )
            }
            else {
                Swal.fire(
                    'Failed!',
                    'Something went wrong!',
                    'error'
                )
            }
        },

        // destroy: function (id) {
        //     if (confirm("Are you sure you want to delete this?")) {
        //         this.$inertia.delete('branch-delete/'+id);
        //     }
        // },
        destroy: function (id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You went to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.delete('branch-delete/'+id);
                    Swal.fire(
                        'Deleted!',
                        'Your branch has been deleted.',
                        'success'
                    )
                }
            })
        },
    },
}
</script>

<style scoped>

</style>
