<template>
<AdminIndex />
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">User Profile</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>User Profile</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">User Profile Add & Show</h6>
                <form @submit.prevent="submit">
                <div class="form-layout">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name" v-model="form.name" placeholder="Enter User Name">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="email" v-model="form.email" placeholder="Enter User email">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Branch: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="branch_id" v-model="form.branch_id" data-placeholder="Select Branch">
                                    <option label="Select Branch"></option>
                                    <option v-for="data in branches" :value="data.id" >{{ data.name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">User Role: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="role" v-model="form.role" data-placeholder="Select Role">
                                    <option label="Select Role"></option>
                                    <option value="2">Admin</option>
                                    <option value="3">User</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="password" name="password" v-model="form.password"  placeholder="Enter Password">
                            </div>
                        </div>
                    </div>

                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">User Profile List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Email</th>
                            <th class="wd-15p">Branch</th>
                            <th class="wd-15p">Role</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data, index) in users">
                            <td>{{ index+1 }}</td>
                            <td>{{ data.name }}</td>
                            <td>{{ data.email }}</td>
                            <td>{{ data.branch.name }}</td>
                            <td>
                                <dib v-if="data.role==2">Admin</dib>
                                <dib v-if="data.role==3">User</dib>
                            </td>
                            <td>
                                <Link class="btn btn-success" :href="route('admin.user.edit',data.id)" style="text-align: end; color:white; margin-right: 2px;" >Edit</Link>
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
    name: "UserProfileAddShow",
    components: {AdminIndex,Link},
    props:{
        branches:Object,
        users:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                name:'',
                email:'',
                branch_id:'',
                role:'',
                password:''
            })
        }
    },
    methods:{
        // submit(){
        //     this.form.post(route('admin.user.store'))
        //     this.form.reset();
        // },
        submit(){
            if(this.form.isDirty==true)
            {
                this.form.post(route('admin.user.store'))
                this.form.reset();
                Swal.fire(
                    'Success!',
                    'You User Data Submit Successfully!',
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
        //         this.$inertia.delete('user-delete/'+id);
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
                    this.$inertia.delete('user-delete/'+id);
                    Swal.fire(
                        'Deleted!',
                        'Your user has been deleted.',
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
