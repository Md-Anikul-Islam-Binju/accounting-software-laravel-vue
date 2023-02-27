<template>
<AdminIndex />
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Sale Return List</a>
        </nav>


        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Sale Return List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Item</th>
                            <th class="wd-15p">Customer Type</th>
                            <th class="wd-15p">Customer Name</th>
                            <th class="wd-15p">Phone</th>
                            <th class="wd-15p">Company Name</th>
                            <th class="wd-15p">Qty</th>
                            <th class="wd-15p">Rate</th>
                            <th class="wd-15p">Total</th>
                            <th class="wd-15p">Discount</th>
                            <th class="wd-15p">Sub Total</th>
                            <th class="wd-15p">Paid</th>
                            <th class="wd-15p">Due</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mask</td>
                            <td>Multiple</td>
                            <td>Anik</td>
                            <td>01905256528</td>
                            <td>ACI</td>
                            <td>100</td>
                            <td>1000 Tk</td>
                            <td>1000 Tk</td>
                            <td>200 Tk</td>
                            <td>1300 Tk</td>
                            <td>500 Tk</td>
                            <td>700 Tk</td>
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
import AdminIndex from "../AdminIndex";
export default {
    name: "SaleReturnList",
    components: {AdminIndex}
}
</script>

<style scoped>

</style>
