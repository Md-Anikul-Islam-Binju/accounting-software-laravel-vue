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
                <h6 class="card-body-title">Double Entry Update</h6>
                <form @submit.prevent="update">
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
    name: "DoubleEntryUpdate",
    components: {AdminIndex},
    props:{
        account:Object,
        doubleEntry:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                account_id:this.doubleEntry.account_id,
                date:this.doubleEntry.date,
                debit_amount:this.doubleEntry.debit_amount,
                credit_amount:this.doubleEntry.credit_amount,
                details:this.doubleEntry.details,
            })
        }
    },

    methods:{
        update(){
            this.form.post(route('admin.double.entry.update',this.doubleEntry.id))
            this.form.reset();
        }
    },
}
</script>

<style scoped>

</style>
