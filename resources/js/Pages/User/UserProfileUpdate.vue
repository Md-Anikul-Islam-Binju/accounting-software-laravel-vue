<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">User Profile</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>User Profile</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">User Profile Update</h6>
                <form @submit.prevent="update">
                    <div class="form-layout">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" v-model="form.name" placeholder="Enter User Name">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="email" v-model="form.email" placeholder="Enter User email">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Branch: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="branch_id" v-model="form.branch_id" data-placeholder="Select Branch">
                                        <option label="Select Branch"></option>
                                        <option v-for="data in branches" :value="data.id" >{{ data.name }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">User Role: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="role" v-model="form.role" data-placeholder="Select Role">
                                        <option label="Select Role"></option>
                                        <option value="2">Admin</option>
                                        <option value="3">User</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="password" name="password" v-model="form.password"  placeholder="Enter Password">
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
    name: "UserProfileUpdate",
    components: {AdminIndex},

    props:{
        branches:Object,
        user:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                name:this.user.name,
                email:this.user.email,
                role:this.user.role,
                branch_id:this.user.branch_id,
                password:this.user.password,
            })
        }
    },

    methods:{
        update(){
            this.form.post(route('admin.user.update',this.user.id))
            this.form.reset();
        }
    },
}
</script>

<style scoped>

</style>
