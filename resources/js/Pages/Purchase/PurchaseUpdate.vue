<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Purchase</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Purchase</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Purchase Update</h6>
                <form @submit.prevent="update">
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
                                    <label class="form-control-label">Supplier Type: <span class="tx-danger">*</span></label>
                                    <select class="form-control" name="supplier_type" v-model="form.supplier_type" data-placeholder="Choose Supplier Type">
                                        <option label="Choose Supplier Type" ></option>
                                        <option value="1">Generale Supplier</option>
                                        <option value="2">New Supplier</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Supplier Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="customer_name"  v-model="form.supplier_name"  placeholder="Enter Supplier Name">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="phone" v-model="form.phone" placeholder="Enter Phone">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="address" v-model="form.address" placeholder="Enter Address">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Details: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="details" v-model="form.details" placeholder="Enter Details">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Institution Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="institution" v-model="form.institution" placeholder="Enter Institution Name">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Qty: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="qty" v-model="form.qty"  placeholder="Enter Qty">
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
                                    <label class="form-control-label">Total: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="total" v-model="form.total" placeholder="Enter Total">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Discount: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="discount" v-model="form.discount" placeholder="Enter Discount">
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
                                    <label class="form-control-label">Date: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="date" name="date" v-model="form.date" placeholder="Enter date">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Sub total: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="sub_total" v-model="form.sub_total" placeholder="Enter Sub total">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Grand Total: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="grand_total" v-model="form.grand_total" placeholder="Enter Grand Total">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Transport Cost: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="transport_cost" v-model="form.transport_cost" placeholder="Enter Transport Cost">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Due Amount: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="due_amount" v-model="form.due_amount" placeholder="Enter Due Amount">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Paid Amount: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="paid_amount" v-model="form.paid_amount" placeholder="Enter Paid Amount">
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
    name: "PurchaseUpdate",
    components: {AdminIndex},
    props:{
        items:Object,
        purchase:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                item_id:this.purchase.item_id,
                supplier_type:this.purchase.supplier_type,
                supplier_name:this.purchase.supplier_name,
                phone:this.purchase.phone,
                address:this.purchase.address,
                details:this.purchase.details,
                qty:this.purchase.qty,
                rate:this.purchase.rate,
                date:this.purchase.date,
                total:this.purchase.total,
                discount:this.purchase.discount,
                vat:this.purchase.vat,
                sub_total:this.purchase.sub_total,
                grand_total:this.purchase.grand_total,
                institution:this.purchase.institution,
                paid_amount:this.purchase.paid_amount,
                due_amount:this.purchase.due_amount,
                transport_cost:this.purchase.transport_cost,
            })
        }
    },

    methods:{
        update(){
            this.form.post(route('admin.purchase.update',this.purchase.id))
            this.form.reset();
        }
    },
}
</script>

<style scoped>

</style>
