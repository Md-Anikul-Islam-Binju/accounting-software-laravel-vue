<template>
<AdminIndex />
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Item</a>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Item List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Code</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Group</th>
                            <th class="wd-15p">Category</th>
                            <th class="wd-15p">Unit</th>
                            <th class="wd-15p">Sale Qty</th>
                            <th class="wd-15p">Sale Rate</th>
                            <th class="wd-15p">Wholesale Rate</th>
                            <th class="wd-15p">Corporate Rate</th>
                            <th class="wd-15p">Distributor Rate</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data, index) in items">
                            <td>{{ index+1 }}</td>
                            <td>{{ data.item_code }}</td>
                            <td>{{ data.item_name }}</td>
                            <td>{{ data.group.name }}</td>
                            <td>{{ data.category.name }}</td>
                            <td>{{ data.unit.name }}</td>
                            <td>{{ data.minimum_sale_qty }}</td>
                            <td>{{ data.minimum_sale_rate }}</td>
                            <td>{{ data.wholesale_rate }}</td>
                            <td>{{ data.corporate_rate }}</td>
                            <td>{{ data.distributor_rate }}</td>
                            <td>
                                <Link class="btn btn-success" :href="route('admin.item.edit',data.id)" style="text-align: end; color:white;" >Edit</Link>
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
import AdminIndex from "../AdminIndex";
import {Link} from "@inertiajs/inertia-vue3";
import Swal from "sweetalert2";
export default {
    name: "ItemList",
    components: {AdminIndex,Link},
    props:{
        items:Object,
    },
    methods:{
        // destroy: function (id) {
        //     if (confirm("Are you sure you want to delete this?")) {
        //         this.$inertia.delete('item-delete/'+id);
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
                    this.$inertia.delete('item-delete/'+id);
                    Swal.fire(
                        'Deleted!',
                        'Your Item has been deleted.',
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
