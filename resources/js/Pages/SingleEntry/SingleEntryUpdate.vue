<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Single Entry</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Single Entry</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Single Entry Update</h6>
                <form @submit.prevent="update">
                    <div class="form-layout">

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Form Account: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="form_account_id" v-model="form.form_account_id" data-placeholder="Choose Form Account">
                                        <option label="Choose Form Account"></option>
                                        <option v-for="data in account" :value="data.id" >{{ data.account_name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">To Account: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="to_account_id" v-model="form.to_account_id" data-placeholder="Choose To Account">
                                        <option label="Choose To Account"></option>
                                        <option v-for="data in account" :value="data.id" >{{ data.account_name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Entry Date: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="date" name="entry_date" v-model="form.entry_date"  placeholder="Enter Entry Date">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Transaction Amount: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="transaction_amount"  v-model="form.transaction_amount"  placeholder="Enter Transaction Amount">
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
    name: "SingleEntryUpdate",
    components: {AdminIndex},
    props:{
        account:Object,
        singleEntry:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                form_account_id:this.singleEntry.form_account_id,
                to_account_id:this.singleEntry.to_account_id,
                entry_date:this.singleEntry.entry_date,
                transaction_amount:this.singleEntry.transaction_amount,
                details:this.singleEntry.details,
            })
        }
    },

    methods:{
        update(){
            this.form.post(route('admin.single.entry.update',this.singleEntry.id))
            this.form.reset();
        }
    },
}
</script>

<style scoped>

</style>
