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
                <h6 class="card-body-title">Single Entry Add & Show</h6>
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
                        <button class="btn btn-info mg-r-5">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Single Entry List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Form Account</th>
                            <th class="wd-15p">To Account</th>
                            <th class="wd-15p">Code</th>
                            <th class="wd-15p">Amount</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>DBBL</td>
                            <td>City</td>
                            <td>2541</td>
                            <td>50000tk</td>
                            <td>Active</td>
                            <td>Edit , Delete</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AdminIndex from "@/Pages/AdminIndex";
import {Link} from "@inertiajs/inertia-vue3";
import Swal from "sweetalert2";
export default {
    name: "SingleEntryAddShow",
    components: {AdminIndex,Link},
    props:{
        account:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                form_account_id:'',
                to_account_id:'',
                entry_date:'',
                transaction_amount:'',
                details:'',
            })
        }
    },
}
</script>

<style scoped>

</style>
