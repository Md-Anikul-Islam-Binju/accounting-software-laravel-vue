<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Company Profile</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Company Profile</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Company Profile Updatew</h6>
                <form @submit.prevent="update">
                    <div class="form-layout">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Company Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" v-model="form.name"  placeholder="Enter Company Name">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Details: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="details" v-model="form.details"  placeholder="Enter Details">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Logo: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="file" name="logo" @input="form.logo = $event.target.files[0]"  accept="image/jpeg"  placeholder="Enter Logo">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Currency: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="currency" v-model="form.currency"  placeholder="Enter Currency">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Ware House: <span class="tx-danger">*</span></label>
                                    <label class="rdiobox">
                                        <input name="ware_house" value="1" v-model="form.ware_house"  type="radio">
                                        <span>Checked</span>
                                    </label>
                                    <label class="rdiobox">
                                        <input name="ware_house" value="2" v-model="form.ware_house" type="radio">
                                        <span>Unchecked</span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">IS Serial ob Item ?: <span class="tx-danger">*</span></label>
                                    <label class="rdiobox">
                                        <input name="serial_item" value="1" v-model="form.serial_item" type="radio">
                                        <span>Checked</span>
                                    </label>
                                    <label class="rdiobox">
                                        <input name="serial_item" value="2" v-model="form.serial_item" type="radio">
                                        <span>Unchecked</span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Is Voucher Wise Receipt ?: <span class="tx-danger">*</span></label>
                                    <label class="rdiobox">
                                        <input name="voucher_receipt" value="1" v-model="form.voucher_receipt" type="radio">
                                        <span>Checked</span>
                                    </label>
                                    <label class="rdiobox">
                                        <input name="voucher_receipt" value="2" v-model="form.voucher_receipt" type="radio">
                                        <span>Unchecked</span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Discount Value: <span class="tx-danger">*</span></label>
                                    <label class="rdiobox">
                                        <input name="discount_value" value="1" v-model="form.discount_value" type="radio">
                                        <span>On Voucher Total</span>
                                    </label>
                                    <label class="rdiobox">
                                        <input name="discount_value" value="2" v-model="form.discount_value" type="radio">
                                        <span>On Individual Item</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Invoice: <span class="tx-danger">*</span></label>
                                    <label class="rdiobox">
                                        <input name="invoice" value="1" v-model="form.invoice" type="radio">
                                        <span>A4</span>
                                    </label>
                                    <label class="rdiobox">
                                        <input name="invoice" value="2" v-model="form.invoice" type="radio">
                                        <span>POS</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Submit</button>
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
    name: "CompanyProfileUpdate",
    components: {AdminIndex},
    props:{
        company:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                name:this.company.name,
                details:this.company.details,
                logo:this.company.logo,
                currency:this.company.currency,
                ware_house:this.company.ware_house,
                serial_item:this.company.serial_item,
                voucher_receipt:this.company.voucher_receipt,
                discount_value:this.company.discount_value,
                invoice:this.company.invoice,
            })
        }
    },

    methods:{
        update(){
            this.form.post(route('admin.company.profile.update',this.company.id))
            this.form.reset();
        }
    },
}
</script>

<style scoped>

</style>
