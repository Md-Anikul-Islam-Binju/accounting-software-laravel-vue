<template>
    <AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Salary Payment</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Salary Payment</h5>
            </div>
            <form @submit.prevent="submit">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Salary Payment Add & Show</h6>
                <div class="form-layout">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Payment Type: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="payment_type" v-model="form.payment_type" data-placeholder="Choose Payment Type">
                                    <option label="Choose Payment Type"></option>
                                    <option value="Basic Salary">Basic Salary</option>
                                    <option value="Advance Salary">Advance Salary</option>
                                    <option value="Overtime">Overtime</option>
                                    <option value="Commission">Commission</option>
                                    <option value="Bonus">Bonus</option>
                                    <option value="Deduction">Deduction</option>
                                    <option value="Conveyance">Conveyance</option>
                                    <option value="TA">TA</option>
                                    <option value="DA">DA</option>
                                    <option value="MA">MA</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Payment Form Account: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="form_account_id" v-model="form.form_account_id" data-placeholder="Choose Payment Form Account">
                                    <option label="Choose Payment Form Account"></option>
                                    <option v-for="data in account" :value="data.id" >{{ data.account_name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Payment To Employee: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="to_employee_id" v-model="form.to_employee_id" data-placeholder="Choose Payment To Employee Account">
                                    <option label="Choose Payment To Employee"></option>
                                    <option v-for="data in employee" :value="data.id" >{{ data.name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Select Year: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="year" v-model="form.year" data-placeholder="Choose Year">
                                    <option label="Choose Year"></option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Select Month: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="month" v-model="form.month" data-placeholder="Choose Month">
                                    <option label="Choose Month"></option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Date: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="date" name="date" v-model="form.date"  placeholder="Enter Date">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Select Salary Account: <span class="tx-danger">*</span></label>
                                <select name="salary_account_id" v-model="form.salary_account_id" class="form-control select2"   data-placeholder="Choose Salary Account">
                                    <option label="Choose Salary Account"></option>
                                    <option v-for="data in account" :value="data.id" >{{ data.account_name }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Payment Amount: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="amount" v-model="form.amount"  placeholder="Enter Payment Amount">
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
            </div>
            </form>
        </div>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Salary Payment List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Type</th>
                            <th class="wd-15p">Form Account</th>
                            <th class="wd-15p">To Employee</th>
                            <th class="wd-15p">Amount</th>
                            <th class="wd-15p">Date</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data, index) in salaryPayment">
                            <td>{{ index+1 }}</td>
                            <td>{{ data.payment_type }}</td>
                            <td>{{ data.account.account_name }}</td>
                            <td>{{ data.employee.name }}</td>
                            <td>{{ data.amount }}</td>
                            <td>{{ data.date }}</td>
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
    name: "SalaryPaymentAddShow",
    components: {AdminIndex,Link},
    props:{
        account:Object,
        employee:Object,
        salaryPayment:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                payment_type:'',
                form_account_id:'',
                to_employee_id:'',
                year:'',
                month:'',
                date:'',
                salary_account_id:'',
                amount:'',
                details:'',
            })
        }
    },
    methods:{
        submit(){
            if(this.form.isDirty==true)
            {
                this.form.post(route('admin.salary.payment.store'))
                this.form.reset();
                Swal.fire(
                    'Success!',
                    'You Salary Payment Data Submit Successfully!',
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
                    this.$inertia.delete('salary-payment-delete/'+id);
                    Swal.fire(
                        'Deleted!',
                        'Your data has been deleted.',
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
