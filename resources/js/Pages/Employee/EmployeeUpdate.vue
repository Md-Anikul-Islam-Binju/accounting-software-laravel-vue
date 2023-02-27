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
            <form @submit.prevent="update">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Employee Update</h6>
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
                            <button type="submit" class="btn btn-info mg-r-5">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import AdminIndex from "@/Pages/AdminIndex";
export default {
    name: "EmployeeUpdate",
    components: {AdminIndex},
    props:{
        department:Object,
        designation:Object,
        employee:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                name:this.employee.name,
                salary:this.employee.salary,
                account_number:this.employee.account_number,
                account_name:this.employee.account_name,
                branch:this.employee.branch,
                ifsc_code:this.employee.ifsc_code,
                present_address:this.employee.present_address,
                permanent_address:this.employee.permanent_address,
                phone:this.employee.phone,
                email:this.employee.email,
                nid:this.employee.nid,
                father_name:this.employee.father_name,
                mother_name:this.employee.mother_name,
                join_date:this.employee.join_date,
                department_id:this.employee.department_id,
                designation_id:this.employee.designation_id,
                target_amount:this.employee.target_amount,
                commission:this.employee.commission,
                gender:this.employee.gender,
                marital_status:this.employee.marital_status,
                status:this.employee.status,
            })
        }
    },

    methods:{
        update(){
            this.form.post(route('admin.employee.update',this.employee.id))
            this.form.reset();
        }
    },
}
</script>

<style scoped>

</style>
