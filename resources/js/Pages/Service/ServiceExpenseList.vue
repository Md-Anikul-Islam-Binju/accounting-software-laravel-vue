<template>
<AdminIndex/>

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Service Expense List</a>
        </nav>


        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Service Expense List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Item</th>
                            <th class="wd-15p">Supplier Name</th>
                            <th class="wd-15p">Phone</th>
                            <th class="wd-15p">Qty</th>
                            <th class="wd-15p">Rate</th>
                            <th class="wd-15p">Total</th>
                            <th class="wd-15p">Grand Total</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data, index) in serviceExpense">
                            <td>{{ index+1 }}</td>
                            <td>{{ data.item.item_name }}</td>
                            <td>{{ data.supplier_name }}</td>
                            <td>{{ data.phone }}</td>
                            <td>{{ data.qty }}</td>
                            <td>{{ data.rate }}</td>
                            <td>{{ data.total }}</td>
                            <td>{{ data.grand_total }}</td>

                            <td>
                                <Link class="btn btn-success" :href="route('admin.service.expense.edit',data.id)" style="text-align: end; color:white;" >Edit</Link>
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
    name: "ServiceExpenseList",
    components: {AdminIndex,Link},
    props:{
        serviceExpense:Object,
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
                    this.$inertia.delete('service-expense-delete/'+id);
                    Swal.fire(
                        'Deleted!',
                        'Your service expense has been deleted.',
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
