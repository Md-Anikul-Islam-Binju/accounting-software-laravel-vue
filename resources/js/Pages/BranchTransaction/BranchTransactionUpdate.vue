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
            <form @submit.prevent="update">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Branch Transaction Update</h6>
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
                            <button class="btn btn-info mg-r-5">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</template>

<script>
import AdminIndex from "@/Pages/AdminIndex";
export default {
    name: "BranchTransactionUpdate",
    components: {AdminIndex},
    props:{
        branch:Object,
        account:Object,
        branchTransaction:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                branch_id:this.branchTransaction.branch_id,
                branch_account_id:this.branchTransaction.branch_account_id,
                date:this.branchTransaction.date,
                account_id:this.branchTransaction.account_id,
                amount:this.branchTransaction.amount,
                details:this.branchTransaction.details,
            })
        }
    },

    methods:{
        update(){
            this.form.post(route('admin.branch.transaction.update',this.branchTransaction.id))
            this.form.reset();
        }
    },
}
</script>

<style scoped>

</style>
