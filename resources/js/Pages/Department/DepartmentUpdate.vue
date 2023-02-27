<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Department</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Department</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Department Update</h6>
                <form @submit.prevent="update">
                    <div class="form-layout">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Department Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="name"  v-model="form.name" placeholder="Enter Department Name">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" v-model="form.status"  data-placeholder="Choose Status">
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
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import AdminIndex from "@/Pages/AdminIndex";
export default {
    name: "DepartmentUpdate",
    components: {AdminIndex},
    props:{
        department:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                name:this.department.name,
                status:this.department.status,
            })
        }
    },

    methods:{
        update(){
            this.form.post(route('admin.department.update',this.department.id))
            this.form.reset();
        }
    },
}
</script>

<style scoped>

</style>
