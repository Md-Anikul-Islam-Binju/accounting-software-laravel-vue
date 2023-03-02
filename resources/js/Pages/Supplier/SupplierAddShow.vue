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
                <h6 class="card-body-title">Supplier Add & Show</h6>
                <form @submit.prevent="submit">
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
                        <button class="btn btn-info mg-r-5">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Supplier List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">To Account </th>
                            <th class="wd-15p">Form Account </th>
                            <th class="wd-15p">Amount</th>
                            <th class="wd-15p">Code</th>
                            <th class="wd-15p">Date</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data,index) in suppliers">
                            <td>{{ index+1 }}</td>
                            <td>{{ data.supplier_to_account.account_name }}</td>
                            <td>{{ data.supplier_form_account.account_name }}</td>
                            <td>{{ data.supplier_amount }}Tk</td>
                            <td>{{ data.supplier_entry_code }}</td>
                            <td>{{ data.supplier_date }}</td>
                            <td>
                                <Link class="btn btn-success" :href="route('admin.supplier.edit',data.id)" style="text-align: end; color:white; margin-right: 2px;" >Edit</Link>
                                <Link class="btn btn-danger"   @click="destroy(data.id)"  style="text-align: end; color:white; margin-left: 2px;" >Delete</Link>
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
import AdminIndex from "@/Pages/AdminIndex";
import {Link} from "@inertiajs/inertia-vue3";
import Swal from "sweetalert2";
export default {
    name: "SupplierAddShow",
    components: {AdminIndex,Link},
    props:{
        account:Object,
        suppliers:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                supplier_to_account_id:'',
                supplier_form_account_id:'',
                supplier_amount:'',
                supplier_date:'',
                details:'',
            })
        }
    },
    methods:{
        submit(){
            if(this.form.isDirty==true)
            {
                this.form.post(route('admin.supplier.store'))
                this.form.reset();
                Swal.fire(
                    'Success!',
                    'You Supplier Information Store Successfully!',
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
                    this.$inertia.delete('supplier-delete/'+id);
                    Swal.fire(
                        'Deleted!',
                        'Your Supplier Information has been deleted.',
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
