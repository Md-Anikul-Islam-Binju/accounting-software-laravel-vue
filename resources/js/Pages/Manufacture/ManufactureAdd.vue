<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Manufacture</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Manufacture</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Manufacture Add</h6>
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
                                <input class="form-control" type="text" name="rate" v-model="form.rate" placeholder="Enter Rate">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Date: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="date" name="date" v-model="form.date" placeholder="Enter Date">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Total Cost: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="total_cost" v-model="form.total_cost" placeholder="Enter Cost">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Total: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="total"  v-model="form.total"  placeholder="Enter Total">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Details: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="details"  v-model="form.details"  placeholder="Enter Details">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Labour Cost: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="labour_cost"  v-model="form.labour_cost" placeholder="Enter Labour Cost">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Other Cost: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="other_cost" v-model="form.other_cost" placeholder="Enter Other Cost">
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
    name: "ManufactureAdd",
    components: {AdminIndex},
    props:{
        items:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                item_id:'',
                qty:'',
                rate:'',
                date:'',
                total_cost:'',
                total:'',
                details:'',
                labour_cost:'',
                other_cost:'',
            })
        }
    },

    methods:{
        submit(){
            if(this.form.isDirty==true)
            {
                this.form.post(route('admin.manufacture.store'))
                this.form.reset();
                Swal.fire(
                    'Success!',
                    'You Manufacture Data Submit Successfully!',
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
