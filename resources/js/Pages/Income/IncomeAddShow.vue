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
                <h6 class="card-body-title">Income Add & Show</h6>
                <form @submit.prevent="submit">
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
                        <button class="btn btn-info mg-r-5">Submit</button>
                    </div>
                </div>
                </form>
            </div>

        </div>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Income List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Recipe Form Account </th>
                            <th class="wd-15p">Recipe To Account </th>
                            <th class="wd-15p">Code</th>
                            <th class="wd-15p">Income Date</th>
                            <th class="wd-15p">Income Amount</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data, index) in income">
                            <td>{{ index+1 }}</td>
                            <td>{{ data.form_account.account_name }}</td>
                            <td>{{ data.to_account.account_name }}</td>
                            <td>{{ data.income_code }}</td>
                            <td>{{ data.income_date }}</td>
                            <td>{{ data.income_amount }}</td>
                            <td>
                                <Link class="btn btn-success" :href="route('admin.income.edit',data.id)"  >Edit</Link>
                                <Link class="btn btn-danger"   @click="destroy(data.id)"   >Delete</Link>
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
    name: "IncomeAddShow",
    components: {AdminIndex,Link},
    props:{
        account:Object,
        income:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                recipe_form_account_id:'',
                recipe_to_account_id:'',
                income_date:'',
                income_amount:'',
                details:'',
            })
        }
    },
    methods:{
        submit(){
            if(this.form.isDirty==true)
            {
                this.form.post(route('admin.income.store'))
                this.form.reset();
                Swal.fire(
                    'Success!',
                    'You Income Information Store Successfully!',
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
                    this.$inertia.delete('income-delete/'+id);
                    Swal.fire(
                        'Deleted!',
                        'Your Income Information has been deleted.',
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
