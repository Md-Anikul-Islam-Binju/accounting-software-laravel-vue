<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Warehouse</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Warehouse</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Warehouse Update</h6>
                <form @submit.prevent="update">
                    <div class="form-layout">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Warehouse Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" v-model="form.name" placeholder="Enter Branch Name">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Warehouse Title: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="title" v-model="form.title" placeholder="Enter Branch Title">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Warehouse Address: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="address" v-model="form.address" placeholder="Enter Branch Address">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" v-model="form.status" data-placeholder="Choose Status">
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
    name: "WarehouseUpdate",
    components: {AdminIndex},
    props:{
        warehouse:Object,
    },
    data(){
        return{
            form:this.$inertia.form({
                name:this.warehouse.name,
                title:this.warehouse.title,
                address:this.warehouse.address,
                status:this.warehouse.status,
            })
        }
    },

    methods:{
        update(){
            this.form.post(route('admin.warehouse.update',this.warehouse.id))
            this.form.reset();
        }
    },
}
</script>

<style scoped>

</style>
