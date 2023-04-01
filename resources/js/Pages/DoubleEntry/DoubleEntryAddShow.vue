<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Double Entry</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Double Entry</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Double Entry Add & Show</h6>
                <form @submit.prevent="submit">
                <div class="form-layout">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Account: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="account_id" v-model="form.account_id" data-placeholder="Choose Account">
                                    <option label="Choose Account"></option>
                                    <option v-for="data in account" :value="data.id" >{{ data.account_name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Date: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="date" name="date" v-model="form.date" placeholder="Enter Date">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Debit Amount: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="debit_amount" v-model="form.debit_amount" placeholder="Enter Debit Amount">
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Credit Amount: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="credit_amount" v-model="form.credit_amount" placeholder="Enter Credit Amount">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Details: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="details" v-model="form.details" placeholder="Enter Details">
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
                <h6 class="card-body-title">Double Entry List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Journal Code</th>
                            <th class="wd-15p">Account Name</th>
                            <th class="wd-15p">Credit</th>
                            <th class="wd-15p">Deviate</th>
                            <th class="wd-15p">Date</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data, index) in doubleEntry">
                            <td>{{ index+1 }}</td>
                            <td>{{ data.code }}</td>
                            <td>{{ data.account.account_name }}</td>
                            <td>{{ data.credit_amount }}</td>
                            <td>{{ data.debit_amount }}</td>
                            <td>{{ data.date }}</td>
                            <td>
                                <Link class="btn btn-success" :href="route('admin.double.entry.edit',data.id)">Edit</Link>
                                <Link class="btn btn-danger"   @click="destroy(data.id)">Delete</Link>
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
    name: "DoubleEntryAddShow",
    components: {AdminIndex,Link},
    props:{
        account:Object,
        doubleEntry:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                account_id:'',
                date:'',
                debit_amount:'',
                credit_amount:'',
                details:'',
            })
        }
    },
    methods:{
        submit(){
            if(this.form.isDirty==true)
            {
                this.form.post(route('admin.double.entry.store'))
                this.form.reset();
                Swal.fire(
                    'Success!',
                    'You Double Entry Data Submit Successfully!',
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
                    this.$inertia.delete('double-entry-delete/'+id);
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
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
