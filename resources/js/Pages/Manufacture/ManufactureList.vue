<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Manufacture List</a>
        </nav>


        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Manufacture List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Item</th>
                            <th class="wd-15p">Qty</th>
                            <th class="wd-15p">Rate</th>
                            <th class="wd-15p">Total</th>
                            <th class="wd-15p">Date</th>
                            <th class="wd-15p">Voucher</th>
                            <th class="wd-15p">Total Cost</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data, index) in manufacture">
                            <td>{{ index+1 }}</td>
                            <td>{{ data.item.item_name }}</td>
                            <td>{{ data.qty }}</td>
                            <td>{{ data.rate }} Tk</td>
                            <td>{{ data.total }} Tk</td>
                            <td>{{ data.date }}</td>
                            <td>{{ data.voucher }}</td>
                            <td>{{ data.total_cost }} Tk</td>
                            <td>
                                <Link class="btn btn-success" :href="route('admin.manufacture.edit',data.id)" style="text-align: end; color:white;" >Edit</Link>
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
    name: "ManufactureList",
    components: {AdminIndex,Link},
    props:{
        manufacture:Object,
    },
    methods:{
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
                    this.$inertia.delete('manufacture-delete/'+id);
                    Swal.fire(
                        'Deleted!',
                        'Your Manufacture  has been deleted.',
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
