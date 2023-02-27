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
                            <th class="wd-15p">Lab Cost</th>
                            <th class="wd-15p">Other Cost</th>
                            <th class="wd-15p">Total Cost</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mask</td>
                            <td>100</td>
                            <td>1000 Tk</td>
                            <td>1000 Tk</td>
                            <td>16-01-2023</td>
                            <td>500 Tk</td>
                            <td>700 Tk</td>
                            <td>1300 Tk</td>
                            <td>Edit , Delete</td>
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
export default {
    name: "ManufactureList",
    components: {AdminIndex}
}
</script>

<style scoped>

</style>
