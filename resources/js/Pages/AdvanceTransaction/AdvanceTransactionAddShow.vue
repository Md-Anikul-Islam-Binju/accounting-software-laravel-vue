<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Advance Transaction</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Advance Transaction</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Advance Transaction Add & Show</h6>
                <form @submit.prevent="submit">
                <div class="form-layout">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Transaction Type: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="transaction_type" v-model="form.transaction_type" data-placeholder="Choose Transaction Type">
                                    <option label="Choose Transaction Type"></option>
                                    <option value="1">Payment</option>
                                    <option value="2">Received</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Account Selection: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="account_id" v-model="form.account_id" data-placeholder="Choose Debtor/Creditor Account">
                                    <option label="Choose Debtor/Creditor Account"></option>
                                    <option v-for="data in account" :value="data.id" >{{ data.account_name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Transaction Account Type: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="transaction_account_type" v-model="form.transaction_account_type" data-placeholder="Choose Transaction Account Type">
                                    <option label="Choose Transaction Account Type"></option>
                                    <option value="1">Debtor</option>
                                    <option value="2">Creditor</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Amount: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="amount" v-model="form.amount" placeholder="Enter Amount">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Details: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="details" v-model="form.details" placeholder="Enter Details">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Date: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="date" name="date" v-model="form.date" placeholder="Enter Date">
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
                <h6 class="card-body-title">Advance Transaction List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Account Name</th>
                            <th class="wd-15p">Transaction Type</th>
                            <th class="wd-15p">Amount</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data, index) in advanceTransaction">
                            <td>{{ index+1 }}</td>
                            <td>{{data.account.account_name}}</td>
                            <td>
                                <div v-if="data.transaction_type==1">Payment</div>
                                <div v-if="data.transaction_type==2">Received</div>
                            </td>
                            <td>{{ data.amount }}</td>
                            <td>
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
    name: "AdvanceTransactionAddShow",
    components: {AdminIndex,Link},
    props:{
        account:Object,
        advanceTransaction:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                transaction_type:'',
                account_id:'',
                transaction_account_type:'',
                amount:'',
                details:'',
                date:'',
            })
        }
    },
    methods:{
        submit(){
            if(this.form.isDirty==true)
            {
                this.form.post(route('admin.advance.transaction.store'))
                this.form.reset();
                Swal.fire(
                    'Success!',
                    'You Advance Transaction Data Submit Successfully!',
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
                    this.$inertia.delete('advance-transaction-delete/'+id);
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
