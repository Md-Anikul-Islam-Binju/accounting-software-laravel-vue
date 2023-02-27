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
                <form @submit.prevent="update">
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
                            <button type="submit" class="btn btn-info mg-r-5">Update</button>
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
    name: "AccountUpdate",
    components: {AdminIndex},

    props:{
        location:Object,
        account:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                account_code:this.account.account_code,
                account_name:this.account.account_name,
                account_type:this.account.account_type,
                account_balance:this.account.account_balance,
                account_open_date:this.account.account_open_date,
                bank_account_number:this.account.bank_account_number,
                bank_account_branch:this.account.bank_account_branch,
                bank_account_type:this.account.bank_account_type,
                address:this.account.address,
                phone:this.account.phone,
                location_id:this.account.location_id,
                email:this.account.email,
                credit_limit:this.account.credit_limit,
                party_type:this.account.party_type,
                status:this.account.status,
            })
        }
    },

    methods:{
        update(){
            this.form.post(route('admin.account.update',this.account.id))
            this.form.reset();
        }
    },
}
</script>

<style scoped>

</style>
