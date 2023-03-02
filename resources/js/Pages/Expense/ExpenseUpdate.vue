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
                <h6 class="card-body-title">Expense Update</h6>
                <form @submit.prevent="update">
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
                            <button class="btn btn-info mg-r-5">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</template>

<script>
import AdminIndex from "@/Pages/AdminIndex";
export default {
    name: "ExpenseUpdate",
    components: {AdminIndex},
    props:{
        account:Object,
        employee:Object,
        expense:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                expense_paid_form_account_id:this.expense.expense_paid_form_account_id,
                expense_paid_to_account_id:this.expense.expense_paid_to_account_id,
                expense_date:this.expense.expense_date,
                expense_amount:this.expense.expense_amount,
                employee_id:this.expense.employee_id,
                expense_details:this.expense.expense_details,
            })
        }
    },
    methods:{
        update(){
            this.form.post(route('admin.expense.update',this.expense.id))
            this.form.reset();
        }
    },
}
</script>

<style scoped>

</style>
