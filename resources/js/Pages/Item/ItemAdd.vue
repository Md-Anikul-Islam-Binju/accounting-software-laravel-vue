<template>
<AdminIndex />
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Item</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Item</h5>
            </div>
           <form @submit.prevent="submit">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Item Add</h6>
                <div class="form-layout">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Code: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="item_code" v-model="form.item_code"  placeholder="Enter Code">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="item_name" v-model="form.item_name"  placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Barcode: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="item_barcode" v-model="form.item_barcode"  placeholder="Enter Barcode">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Group: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="group_id"  v-model="form.group_id" data-placeholder="Choose Group">
                                    <option label="Choose Group"></option>
                                    <option v-for="data in group" :value="data.id" >{{ data.name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="category_id"  v-model="form.category_id" data-placeholder="Choose Category">
                                    <option label="Choose Category"></option>
                                    <option v-for="data in category" :value="data.id" >{{ data.name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Unit: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="unit_id"  v-model="form.unit_id" data-placeholder="Choose Unit">
                                    <option label="Choose Unit"></option>
                                    <option v-for="data in unit" :value="data.id" >{{ data.name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Item Type: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="item_type" v-model="form.item_type" data-placeholder="Choose Item Type">
                                    <option label="Choose Item Type"></option>
                                    <option value="1">Service Item</option>
                                    <option value="2">Serial Item</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Details: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="details" v-model="form.details"  placeholder="Enter Details">
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Minimum Sale Qty: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="minimum_sale_qty" v-model="form.minimum_sale_qty"  placeholder="Enter Sale Qty">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Minimum Sale Rate: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="minimum_sale_rate" v-model="form.minimum_sale_rate"  placeholder="Enter Sale Rate">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Purchases Rate: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="purchases_rate" v-model="form.purchases_rate"  placeholder="Enter Purchases Rate">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Default Sale Rate: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="default_sale_rate" v-model="form.default_sale_rate"  placeholder="Default Sale Rate">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Wholesale Rate: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="wholesale_rate" v-model="form.wholesale_rate"  placeholder="Enter Wholesale Rate">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Retailer Rate: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="retailer_rate" v-model="form.retailer_rate"  placeholder="Enter Retailer Rate">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Corporate Rate: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="corporate_rate" v-model="form.corporate_rate"  placeholder="Corporate Rate">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Distributor Rate: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="distributor_rate" v-model="form.distributor_rate" placeholder="Enter Distributor Rate">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Discount: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="discount_rate" v-model="form.discount_rate" placeholder="Enter Discount">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Vat: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="vat" v-model="form.vat" placeholder="Enter Vat">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="status" v-model="form.status" data-placeholder="Choose Status">
                                    <option label="Choose Status"></option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info mg-r-5">Submit</button>
                    </div>
                </div>
            </div>
           </form>
        </div>
    </div>
</template>

<script>
import AdminIndex from "../AdminIndex";
import Swal from "sweetalert2";
export default {
    name: "ItemAdd",
    components: {AdminIndex},
    props:{
        group:Object,
        category:Object,
        unit:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                item_code:'',
                item_name:'',
                item_barcode:'',
                group_id:'',
                category_id:'',
                unit_id:'',
                item_type:'',
                details:'',
                minimum_sale_qty:'',
                minimum_sale_rate:'',
                purchases_rate:'',
                default_sale_rate:'',
                wholesale_rate:'',
                retailer_rate:'',
                corporate_rate:'',
                distributor_rate:'',
                discount_rate:'',
                vat:'',
                status:'',
            })
        }
    },
    methods:{
        // submit(){
        //     this.form.post(route('admin.item.store'))
        //     this.form.reset();
        // },
        submit(){
            if(this.form.isDirty==true)
            {
                this.form.post(route('admin.item.store'))
                this.form.reset();
                Swal.fire(
                    'Success!',
                    'You Item Data Submit Successfully!',
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
