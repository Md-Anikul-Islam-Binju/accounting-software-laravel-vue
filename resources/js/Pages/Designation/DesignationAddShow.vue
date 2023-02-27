<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Designation</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Designation</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Designation Add & Show</h6>
                <form @submit.prevent="submit">
                    <div class="form-layout">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Designation Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="name"  v-model="form.name" placeholder="Enter Designation Name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" v-model="form.status"  data-placeholder="Choose Status">
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
                <h6 class="card-body-title">Designation List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Designation name</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data, index) in designation">
                            <td>{{ index+1 }}</td>
                            <td>{{ data.name }}</td>
                            <td>{{ data.status==1? "Active":"Inactive" }}</td>
                            <td>
                                <Link class="btn btn-success" :href="route('admin.designation.edit',data.id)" style="text-align: end; color:white; margin-right: 2px;" >Edit</Link>
                                <Link class="btn btn-danger"  @click="destroy(data.id)" style="text-align: end; color:white; margin-left: 2px;" >Delete</Link>

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
import AdminIndex from "@/Pages/AdminIndex";
import {Link} from "@inertiajs/inertia-vue3";
import Swal from "sweetalert2";
export default {
    name: "DesignationAddShow",
    components: {AdminIndex,Link},
    props:{
        designation:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                name:'',
                status:''
            })
        }
    },
    methods:{
        // submit(){
        //     this.form.post(route('admin.designation.store'))
        //     this.form.reset();
        // },
        submit(){
            if(this.form.isDirty==true)
            {
                this.form.post(route('admin.designation.store'))
                this.form.reset();
                Swal.fire(
                    'Success!',
                    'You designation Data Submit Successfully!',
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
        //         this.$inertia.delete('designation-delete/'+id);
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
                    this.$inertia.delete('designation-delete/'+id);
                    Swal.fire(
                        'Deleted!',
                        'Your designation has been deleted.',
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
