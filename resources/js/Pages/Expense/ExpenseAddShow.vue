<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Expense</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Expense</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Expense Add & Show</h6>
                <form @submit.prevent="submit">
                <div class="form-layout">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Paid Form Account: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="expense_paid_form_account_id" v-model="form.expense_paid_form_account_id" data-placeholder="Choose Recipe Form Account">
                                    <option label="Choose Recipe Form Account"></option>
                                    <option v-for="data in account" :value="data.id" >{{ data.account_name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Paid To Account: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="expense_paid_to_account_id" v-model="form.expense_paid_to_account_id" data-placeholder="Choose Recipe To Account">
                                    <option label="Choose Recipe To Account"></option>
                                    <option v-for="data in account" :value="data.id" >{{ data.account_name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Expense Date: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="date" name="expense_date" v-model="form.expense_date"  placeholder="Enter Code">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Expense Amount: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="expense_amount" v-model="form.expense_amount" placeholder="Expense Amount">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Details: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="expense_details" v-model="form.expense_details" placeholder="Enter Details">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Select Employee: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="employee_id" v-model="form.employee_id" data-placeholder="Choose Employee">
                                    <option label="Choose Employee"></option>
                                    <option v-for="data in employee" :value="data.id" >{{ data.name }}</option>
                                </select>
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
                <h6 class="card-body-title">Expense List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Paid Form Account </th>
                            <th class="wd-15p">Paid To Account </th>
                            <th class="wd-15p">Code</th>
                            <th class="wd-15p">Amount</th>
                            <th class="wd-15p">Employee</th>
                            <th class="wd-15p">Date</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data,index) in expense">
                            <td>{{ index+1 }}</td>
                            <td>{{ data.expense_form_account.account_name }}</td>
                            <td>{{ data.expense_to_account.account_name }}</td>
                            <td>{{ data.expense_entry_code }}</td>
                            <td>{{ data.expense_amount }} Tk</td>
                            <td>{{ data.employee.name }}</td>
                            <td>{{ data.expense_date }}</td>
                            <td>
                                <Link class="btn btn-success" :href="route('admin.expense.edit',data.id)" style="text-align: end; color:white; margin-right: 2px;" >Edit</Link>
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
import AdminIndex from "@/Pages/AdminIndex";
import {Link} from "@inertiajs/inertia-vue3";
import Swal from "sweetalert2";
export default {
    name: "ExpenseAddShow",
    components: {AdminIndex,Link},
    props:{
        account:Object,
        employee:Object,
        expense:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                expense_paid_form_account_id:'',
                expense_paid_to_account_id:'',
                expense_date:'',
                expense_amount:'',
                expense_details:'',
                employee_id:'',
            })
        }
    },
    methods:{
        submit(){
            if(this.form.isDirty==true)
            {
                this.form.post(route('admin.expense.store'))
                this.form.reset();
                Swal.fire(
                    'Success!',
                    'You Expense Information Store Successfully!',
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
                    this.$inertia.delete('expense-delete/'+id);
                    Swal.fire(
                        'Deleted!',
                        'Your Supplier Information has been deleted.',
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
