<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Employee</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Employee</h5>
            </div>
            <form @submit.prevent="submit">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Employee Add and Show</h6>
                    <div class="form-layout">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" v-model="form.name"  placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Salary: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="salary" v-model="form.salary"  placeholder="Enter Salary">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Bank Account Number: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="account_number" v-model="form.account_number"  placeholder="Enter Bank Account Number">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Bank Account Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="account_name" v-model="form.account_name"  placeholder="Enter Bank Account Name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Bank Branch: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="branch" v-model="form.branch"  placeholder="Enter Branch">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">IFSC Code: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="ifsc_code" v-model="form.ifsc_code"  placeholder="Enter IFSC Code">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Present Address: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="present_address" v-model="form.present_address"  placeholder="Enter Present Address">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Permanent Address: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="permanent_address" v-model="form.permanent_address"  placeholder="Enter Permanent Address">
                                </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Phone Number: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="phone" v-model="form.phone" placeholder="Enter Phone Number">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="email" v-model="form.email"  placeholder="Enter Email">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">NID: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="nid" v-model="form.nid"  placeholder="Enter NID">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Father Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="father_name" v-model="form.father_name"  placeholder="Enter Father Name">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Mother Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="mother_name" v-model="form.mother_name"  placeholder="Enter Mother Name">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Join Date: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="date" name="join_date" v-model="form.join_date"  placeholder="Enter Retailer Rate">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Department: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="department_id" v-model="form.department_id" data-placeholder="Choose Department">
                                        <option label="Choose Department"></option>
                                        <option v-for="data in department" :value="data.id" >{{ data.name }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Designation: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="designation_id" v-model="form.designation_id" data-placeholder="Choose Designation">
                                        <option label="Choose Designation"></option>
                                        <option v-for="data in designation" :value="data.id" >{{ data.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Target Amount: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="target_amount" v-model="form.target_amount" placeholder="Enter Target Amount">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Commission: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="commission" v-model="form.commission" placeholder="Enter Commission">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Gander: <span class="tx-danger">*</span></label>
                                    <label class="rdiobox">
                                        <input name="gender" value="1" v-model="form.gender" type="radio">
                                        <span>Male</span>
                                    </label>
                                    <label class="rdiobox">
                                        <input name="gender" value="2" v-model="form.gender" type="radio">
                                        <span>Female</span>
                                    </label>
                                    <label class="rdiobox">
                                        <input name="gender" value="3" v-model="form.gender" type="radio">
                                        <span>Other</span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Marital Status: <span class="tx-danger">*</span></label>
                                    <label class="rdiobox">
                                        <input name="marital_status" value="1" v-model="form.marital_status" type="radio">
                                        <span>Single</span>
                                    </label>
                                    <label class="rdiobox">
                                        <input name="marital_status" value="2" v-model="form.marital_status" type="radio">
                                        <span>Maride</span>
                                    </label>
                                </div>
                            </div>

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

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Employee List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Code</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Phone</th>
                            <th class="wd-15p">Address</th>
                            <th class="wd-15p">Gender</th>
                            <th class="wd-15p">Account Number</th>
                            <th class="wd-15p">Branch</th>
                            <th class="wd-15p">Department</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data, index) in employee">
                            <td>{{ index+1 }}</td>
                            <td>{{ data.employee_uniq_code }}</td>
                            <td>{{ data.name }}</td>
                            <td>{{ data.phone }}</td>
                            <td>{{ data.present_address }}</td>
                            <td>
                                <div v-if="data.gender==1">Male</div>
                                <div v-if="data.gender==2">Female</div>
                                <div v-if="data.gender==3">Other</div>
                            </td>

                            <td>{{ data.account_number }}</td>
                            <td>{{ data.branch }}</td>
                            <td>{{ data.department.name }}</td>
                            <td>{{ data.status==1? "Active":"Inactive" }}</td>
                            <td>
                                <Link class="btn btn-success" :href="route('admin.employee.edit',data.id)" style="text-align: end; color:white;" >Edit</Link>
                                <Link class="btn btn-danger"   @click="destroy(data.id)"  style="text-align: end; color:white;" >Delete</Link>
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
    name: "EmployeeAddShow",
    components: {AdminIndex,Link},
    props:{
        department:Object,
        designation:Object,
        employee:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                name:'',
                salary:'',
                account_number:'',
                account_name:'',
                branch:'',
                ifsc_code:'',
                present_address:'',
                permanent_address:'',
                phone:'',
                email:'',
                nid:'',
                father_name:'',
                mother_name:'',
                join_date:'',
                department_id:'',
                designation_id:'',
                target_amount:'',
                commission:'',
                gender:'',
                marital_status:'',
                status:'',
            })
        }
    },
    methods:{
        // submit(){
        //     this.form.post(route('admin.employee.store'))
        //     this.form.reset();
        // },
        submit(){
            if(this.form.isDirty==true)
            {
                this.form.post(route('admin.employee.store'))
                this.form.reset();
                Swal.fire(
                    'Success!',
                    'You employee Data Submit Successfully!',
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
        //         this.$inertia.delete('employee-delete/'+id);
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
                    this.$inertia.delete('employee-delete/'+id);
                    Swal.fire(
                        'Deleted!',
                        'Your employee has been deleted.',
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
