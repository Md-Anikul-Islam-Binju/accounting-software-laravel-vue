<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Supplier</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Supplier</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Supplier Add & Show</h6>
                <div class="form-layout">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">To Account: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose To Account">
                                    <option label="Choose To Account"></option>
                                    <option value="1">demo</option>
                                    <option value="0">demo</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Form Account: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose Form Account">
                                    <option label="Choose Form Account"></option>
                                    <option value="1">demo</option>
                                    <option value="0">demo</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Amount: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="amount"  placeholder="Enter Amount">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Code: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="code"  placeholder="Enter Code">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Details: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="details"  placeholder="Enter Details">
                            </div>
                        </div>
                    </div>


                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Supplier List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">To Account </th>
                            <th class="wd-15p">Form Account </th>
                            <th class="wd-15p">Amount</th>
                            <th class="wd-15p">Code</th>
                            <th class="wd-15p">Details</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>DB22081</td>
                            <td>DB25465</td>
                            <td>250000 Taka</td>
                            <td>2584512</td>
                            <td>Test.........</td>
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
    name: "SupplierAddShow",
    components: {AdminIndex}
}
</script>

<style scoped>

</style>
