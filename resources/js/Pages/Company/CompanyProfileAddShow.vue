<template>
<AdminIndex />
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
                <h6 class="card-body-title">Company Profile Add & Show</h6>
                <form @submit.prevent="submit">
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

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Company Profile List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Logo</th>
                            <th class="wd-15p">Invoice</th>
                            <th class="wd-15p">Ware House</th>
                            <th class="wd-15p">Discount Value</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data, index) in company">
                            <td>{{ index+1 }}</td>
                            <td>{{ data.name }}</td>
                            <td>
                                <img :src="'storage/company-profile/'+data.logo" style="height: 30px; width: 50px;">
                            </td>
                            <td>{{ data.invoice==1? "A4":"POS" }}</td>
                            <td>{{ data.ware_house==1? "Checked":"Unchecked" }}</td>
                            <td>{{ data.discount_value==1? "On Voucher Total":"On Individual Item" }}</td>
                            <td>
                                <Link class="btn btn-success" :href="route('admin.company.profile.edit',data.id)" style="text-align: end; color:white; margin-right: 2px;" >Edit</Link>
                                <Link class="btn btn-danger"   @click="destroy(data.id)"  style="text-align: end; color:white;margin-right: 2px;" >Delete</Link>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AdminIndex from "../AdminIndex";
import {Link} from "@inertiajs/inertia-vue3";
import Swal from "sweetalert2";
export default {
    name: "CompanyProfileAddShow",
    components: {AdminIndex,Link},

    props:{
        company:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                name:'',
                details:'',
                logo:'',
                currency:'',
                ware_house:'',
                serial_item:'',
                voucher_receipt:'',
                discount_value:'',
                invoice:'',
            })
        }
    },
    methods:{
        // submit(){
        //     this.form.post(route('admin.company.profile.store'))
        //     this.form.reset();
        // },
        submit(){
            if(this.form.isDirty==true)
            {
                this.form.post(route('admin.company.profile.store'))
                this.form.reset();
                Swal.fire(
                    'Success!',
                    'You company profile Data Submit Successfully!',
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
        // destroy: function (id) {
        //     if (confirm("Are you sure you want to delete this?")) {
        //         this.$inertia.delete('company-profile-delete/'+id);
        //     }
        // },
        destroy: function (id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You went to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.delete('company-profile-delete/'+id);
                    Swal.fire(
                        'Deleted!',
                        'Your company profile has been deleted.',
                        'success'
                    )
                }
            })
        },
    },
}
</script>

<style scoped>

</style>
