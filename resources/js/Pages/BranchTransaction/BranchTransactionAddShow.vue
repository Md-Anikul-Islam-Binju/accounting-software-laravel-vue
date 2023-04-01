<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Branch Transaction</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Branch Transaction</h5>
            </div>
            <form @submit.prevent="submit">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Branch Transaction Add & Show</h6>
                <div class="form-layout">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">To Branch Name: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="branch_id" v-model="form.branch_id" data-placeholder="Choose To Branch Name">
                                    <option label="Choose To Branch Name"></option>
                                    <option v-for="data in branch" :value="data.id" >{{ data.name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Branch Account: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="branch_account_id" v-model="form.branch_account_id" data-placeholder="Choose Branch Account">
                                    <option label="Choose Branch Account"></option>
                                    <option v-for="data in account" :value="data.id" >{{ data.account_name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Date: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="date" name="date" v-model="form.date"  placeholder="Enter date">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Form Account: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="account_id" v-model="form.account_id"  data-placeholder="Choose Form Account">
                                    <option label="Choose Form Account"></option>
                                    <option v-for="data in account" :value="data.id" >{{ data.account_name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Amount: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="amount" v-model="form.amount" placeholder="Enter Amount">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Details: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="details" v-model="form.details"  placeholder="Enter Details">
                            </div>
                        </div>
                    </div>


                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5">Submit</button>
                    </div>
                </div>
            </div>
            </form>
        </div>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Branch Transaction List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Code</th>
                            <th class="wd-15p">Branch Name </th>
                            <th class="wd-15p">Branch Account </th>
                            <th class="wd-15p">Form Account</th>
                            <th class="wd-15p">Details</th>
                            <th class="wd-15p">Date</th>
                            <th class="wd-15p">Amount</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data, index) in branchTransaction">
                            <td>{{ index+1 }}</td>
                            <td>{{ data.code }}</td>
                            <td>{{ data.branch.name }}</td>
                            <td>{{ data.to_account ? data.to_account.account_name:'' }}</td>
                            <td>{{ data.form_account ? data.form_account.account_name:'' }}</td>
                            <td>{{ data.details }}</td>
                            <td>{{ data.date }}</td>
                            <td>{{ data.amount }}</td>
                            <td>
                                <Link class="btn btn-success" :href="route('admin.branch.transaction.edit',data.id)">Edit</Link>
                                <Link class="btn btn-danger"  @click="destroy(data.id)"  >Delete</Link>
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
    name: "BranchTransactionAddShow",
    components: {AdminIndex,Link},
    props:{
        branch:Object,
        account:Object,
        branchTransaction:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                branch_id:'',
                branch_account_id:'',
                date:'',
                account_id:'',
                amount:'',
                details:'',
            })
        }
    },
    methods:{
        submit(){
            if(this.form.isDirty==true)
            {
                this.form.post(route('admin.branch.transaction.store'))
                this.form.reset();
                Swal.fire(
                    'Success!',
                    'You Branch Transaction Data Submit Successfully!',
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
                    this.$inertia.delete('branch-transaction-delete/'+id);
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        },
    },

    mounted() {
        console.log(this.branchTransaction)
    }
}
</script>

<style scoped>

</style>
