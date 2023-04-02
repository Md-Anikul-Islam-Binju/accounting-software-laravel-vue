<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Customer</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Customer</h5>
            </div>

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Customer Add & Show</h6>
                <form @submit.prevent="submit">
                <div class="form-layout">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Form Debit Account: <span class="tx-danger">*</span></label>
                                <select name="form_account_id" v-model="form.form_account_id" class="form-control select2" data-placeholder="Choose Form Debit Account">
                                    <option label="Choose Form Debit Account"></option>
                                    <option v-for="data in account" :value="data.id" >{{ data.account_name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">To Account: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="to_account_id"  v-model="form.to_account_id" data-placeholder="Choose Account">
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
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Amount: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="amount"  v-model="form.amount" placeholder="Enter Amount">
                            </div>
                        </div>

                        <div class="col-lg-6">
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
                <h6 class="card-body-title">Customer List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Form Debit Account </th>
                            <th class="wd-15p">To Account </th>
                            <th class="wd-15p">Code</th>
                            <th class="wd-15p">Amount</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data, index) in customer">
                            <td>{{ index+1 }}</td>
                            <td>{{ data.form_account.account_name }}</td>
                            <td>{{ data.to_account.account_name }}</td>
                            <td>{{ data.code }}</td>
                            <td>{{data.amount}} Taka</td>
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
    name: "CustomerAddShow",
    components: {AdminIndex,Link},
    props:{
        account:Object,
        customer:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                form_account_id:'',
                to_account_id:'',
                date:'',
                amount:'',
                details:'',

            })
        }
    },
    methods:{
        submit(){
            if(this.form.isDirty==true)
            {
                this.form.post(route('admin.customer.store'))
                this.form.reset();
                Swal.fire(
                    'Success!',
                    'You Customer Data Submit Successfully!',
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
                    this.$inertia.delete('customer-delete/'+id);
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
