<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Unit</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Unit</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Unit Update</h6>
                <form @submit.prevent="update">
                    <div class="form-layout">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Unit Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" v-model="form.name"  placeholder="Enter Unit Name">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Type: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" v-model="form.type"  data-placeholder="Choose Type">
                                        <option label="Choose Type"></option>
                                        <option value="Single">Single</option>
                                        <option value="Multiple">Multiple</option>
                                    </select>
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
    name: "UnitUpdate",
    components: {AdminIndex},
    props:{
        unit:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                name:this.unit.name,
                type:this.unit.type,
                status:this.unit.status,
            })
        }
    },

    methods:{
        update(){
            this.form.post(route('admin.unit.update',this.unit.id))
            this.form.reset();
        }
    },
}
</script>

<style scoped>

</style>
