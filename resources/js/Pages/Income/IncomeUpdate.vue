<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Income</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Income</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Income Update</h6>
                <form @submit.prevent="update">
                    <div class="form-layout">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Recipe Form Account: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="recipe_form_account_id" v-model="form.recipe_form_account_id" data-placeholder="Choose Recipe Form Account">
                                        <option label="Choose Recipe Form Account"></option>
                                        <option v-for="data in account" :value="data.id" >{{ data.account_name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Recipe To Account: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="recipe_to_account_id" v-model="form.recipe_to_account_id" data-placeholder="Choose Recipe To Account">
                                        <option label="Choose Recipe To Account"></option>
                                        <option v-for="data in account" :value="data.id" >{{ data.account_name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Income Date: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="date" name="income_date" v-model="form.income_date"  placeholder="Enter Income Date">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Income Amount: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="income_amount" v-model="form.income_amount" placeholder="Enter Income Amount">
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
    name: "IncomeUpdate",
    components: {AdminIndex},
    props:{
        account:Object,
        income:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                recipe_form_account_id:this.income.recipe_form_account_id,
                recipe_to_account_id:this.income.recipe_to_account_id,
                income_date:this.income.income_date,
                income_amount:this.income.income_amount,
                details:this.income.details,
            })
        }
    },

    methods:{
        update(){
            this.form.post(route('admin.income.update',this.income.id))
            this.form.reset();
        }
    },
}
</script>

<style scoped>

</style>
