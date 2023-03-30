<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Transfer</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Transfer</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Transfer Add</h6>
                <form @submit.prevent="submit">
                <div class="form-layout">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Item: <span class="tx-danger">*</span></label>
                                <select class="form-control" name="item_id" v-model="form.item_id" data-placeholder="Choose Item">
                                    <option label="Choose Item"></option>
                                    <option v-for="data in items" :value="data.id" >{{ data.item_name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Qty: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="qty" v-model="form.qty" placeholder="Enter Qty">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Rate: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="rate" v-model="form.rate"  placeholder="Enter Rate">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Branch Name: <span class="tx-danger">*</span></label>
                                <select class="form-control" name="branch_id" v-model="form.branch_id" data-placeholder="Choose Status">
                                    <option label="Choose Status"></option>
                                    <option v-for="data in branch" :value="data.id" >{{ data.name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Sub Total: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="sub_total" v-model="form.sub_total"  placeholder="Enter Sub Total">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Transfer Cost: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="transfer_cost" v-model="form.transfer_cost"  placeholder="Enter Transfer Cost">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Total: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="total" v-model="form.total"  placeholder="Enter Total">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Grand Total: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="grand_total" v-model="form.grand_total"  placeholder="Enter Grand Total">
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
    </div>
</template>

<script>
import AdminIndex from "@/Pages/AdminIndex";
import Swal from "sweetalert2";
export default {
    name: "TransferAdd",
    components: {AdminIndex},
    props:{
        items:Object,
        branch:Object,

    },
    data(){
        return{
            form:this.$inertia.form({
                item_id:'',
                branch_id:'',
                qty:'',
                rate:'',
                total:'',
                sub_total:'',
                transfer_cost:'',
                grand_total:'',
            })
        }
    },

    methods:{
        submit(){
            if(this.form.isDirty==true)
            {
                this.form.post(route('admin.transfer.store'))
                this.form.reset();
                Swal.fire(
                    'Success!',
                    'You Transfer Data Submit Successfully!',
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
    },
}
</script>

<style scoped>

</style>
