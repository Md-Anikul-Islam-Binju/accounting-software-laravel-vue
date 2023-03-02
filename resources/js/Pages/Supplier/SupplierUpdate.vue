<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Supplier</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Supplier</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Supplier Update</h6>
                <form @submit.prevent="update">
                    <div class="form-layout">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">To Account: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="supplier_to_account" v-model="form.supplier_to_account_id" data-placeholder="Choose To Account">
                                        <option label="Choose To Account"></option>
                                        <option v-for="data in account" :value="data.id" >{{ data.account_name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Form Account: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="supplier_form_account_id" v-model="form.supplier_form_account_id" data-placeholder="Choose Form Account">
                                        <option label="Choose Form Account"></option>
                                        <option v-for="data in account" :value="data.id" >{{ data.account_name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Amount: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="supplier_amount" v-model="form.supplier_amount" placeholder="Enter Amount">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Date: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="date" name="supplier_date" v-model="form.supplier_date" placeholder="Enter Date">
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
    name: "SupplierUpdate",
    components: {AdminIndex},
    props:{
        account:Object,
        supplier:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                supplier_to_account_id:this.supplier.supplier_to_account_id,
                supplier_form_account_id:this.supplier.supplier_form_account_id,
                supplier_amount:this.supplier.supplier_amount,
                supplier_date:this.supplier.supplier_date,
                details:this.supplier.details,
                supplier_entry_code:this.supplier.supplier_entry_code,
            })
        }
    },
    methods:{
        update(){
            this.form.post(route('admin.supplier.update',this.supplier.id))
            this.form.reset();
        }
    },
}
</script>

<style scoped>

</style>
