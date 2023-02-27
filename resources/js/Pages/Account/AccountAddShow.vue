<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Account</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Account</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Account Add & Show</h6>
                <form @submit.prevent="submit">
                <div class="form-layout">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Account Code: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="account_code" v-model="form.account_code" placeholder="Enter Account Code">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Account Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="account_name" v-model="form.account_name"  placeholder="Enter Account Name">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Account Type: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="account_type" v-model="form.account_type" data-placeholder="Choose Account Type" id="account-method">
                                    <option label="Choose Account Type"></option>
                                    <option value="1">Debtor</option>
                                    <option value="2">Creditor</option>
                                    <option value="3">Bank Account</option>
                                    <option value="4">Cash In Hand</option>
                                    <option value="5">Capital</option>
                                    <option value="6">Indirect Expense</option>
                                    <option value="7">Indirect Income</option>
                                    <option value="8">Fix Asset</option>
                                    <option value="9">Loan</option>
                                    <option value="10">Investment</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Balance: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="account_balance" v-model="form.account_balance" placeholder="Enter Balance">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Account Open Date: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="date" name="account_open_date" v-model="form.account_open_date" placeholder="Enter Account Account Open Date">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Account Status: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="status" v-model="form.status" data-placeholder="Choose Status">
                                    <option label="Choose Status"></option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <b style="color:red;">If You Select Bank Account then Please Fill up this input</b>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Account Number: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="number" name="bank_account_number" v-model="form.bank_account_number" placeholder="Enter Account Number">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Branch Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="bank_account_branch" v-model="form.bank_account_branch" placeholder="Enter Branch Name">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Account Type: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="bank_account_type" v-model="form.bank_account_type" placeholder="Enter Account Type">
                            </div>
                        </div>
                    </div>

                    <b style="color:red;">If You Select Debtor, Creditor  then Please Fill up this input</b>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="address" v-model="form.address" placeholder="Enter Address(Debtor, Creditor)">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Phone Number: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="number" name="phone" v-model="form.phone" placeholder="Enter Phone Number(Debtor, Creditor)">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Location: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="location_id" v-model="form.location_id" data-placeholder="Choose Location">
                                    <option label="Choose Location"></option>
                                    <option v-for="data in location" :value="data.id" >{{ data.name }}</option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="email" v-model="form.email" placeholder="Enter Email(Debtor, Creditor)">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Credit Limit: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="credit_limit" v-model="form.credit_limit" placeholder="Enter Credit Limit(Debtor)">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Party Type: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="party_type" v-model="form.party_type" data-placeholder="Choose Party Type">
                                    <option label="Choose Party Type(Debtor)"></option>
                                    <option value="1">Retailer</option>
                                    <option value="2">Whole Sale</option>
                                    <option value="3">Distributor</option>
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
                <h6 class="card-body-title">Account List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Account Code</th>
                            <th class="wd-15p">Account Name</th>
                            <th class="wd-15p">Account Type</th>
                            <th class="wd-15p">Balance</th>
                            <th class="wd-15p">Account Open Date</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr  v-for="(data, index) in account">
                            <td>{{ index+1 }}</td>
                            <td>{{ data.account_code }}</td>
                            <td>{{ data.account_name }}</td>
                            <td>
                                <div v-if="data.account_type==1">Debtor</div>
                                <div v-if="data.account_type==2">Creditor</div>
                                <div v-if="data.account_type==3">Bank Account</div>
                                <div v-if="data.account_type==4">Cash In Hand</div>
                                <div v-if="data.account_type==5">Capital</div>
                                <div v-if="data.account_type==6">Indirect Expense</div>
                                <div v-if="data.account_type==7">Indirect Income</div>
                                <div v-if="data.account_type==8">Fix Asset</div>
                                <div v-if="data.account_type==9">Loan</div>
                                <div v-if="data.account_type==10">Investment</div>
                            </td>
                            <td>{{ data.account_balance }}</td>
                            <td>{{ data.account_open_date }}</td>
                            <td>{{ data.status==1? "Active":"Inactive" }}</td>
                            <td>
                                <Link class="btn btn-success" :href="route('admin.account.edit',data.id)" >Edit</Link>
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
    name: "AccountAddShow",
    components: {AdminIndex,Link},
    props:{
        location:Object,
        account:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                account_code:'',
                account_name:'',
                account_type:'',
                account_balance:'',
                account_open_date:'',
                bank_account_number:'',
                bank_account_branch:'',
                bank_account_type:'',
                address:'',
                phone:'',
                location_id:'',
                email:'',
                credit_limit:'',
                party_type:'',
                status:'',
            })
        }
    },

    methods:{
        submit(){
            if(this.form.isDirty==true)
            {
                this.form.post(route('admin.account.store'))
                this.form.reset();
                Swal.fire(
                    'Success!',
                    'You Account Submit Successfully!',
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
                    this.$inertia.delete('account-delete/'+id);
                    Swal.fire(
                        'Deleted!',
                        'Your Account has been deleted.',
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
