<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Advance Transaction</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Advance Transaction</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Advance Transaction Add & Show</h6>
                <div class="form-layout">

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Transaction Type: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="transaction_Type" data-placeholder="Choose Transaction Type">
                                    <option label="Choose Transaction Type"></option>
                                    <option value="1">payment</option>
                                    <option value="0">received</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Account Selection: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="account_id" data-placeholder="Choose Account">
                                    <option label="Choose Account"></option>
                                    <option value="1">demo1</option>
                                    <option value="0">demo2</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Transaction Account Type: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="transaction_type" data-placeholder="Choose Account Type">
                                    <option label="Choose Account Type"></option>
                                    <option value="1">demo1</option>
                                    <option value="0">demo2</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Select Bank: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="bank_id" data-placeholder="Choose Select Bank">
                                    <option label="Choose Account Type"></option>
                                    <option value="1">demo1</option>
                                    <option value="0">demo2</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Amount: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="amount"  placeholder="Enter Amount">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Details: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="details"  placeholder="Enter Details">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose Status">
                                    <option label="Choose Status"></option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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
                <h6 class="card-body-title">Advance Transaction List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Account Name</th>
                            <th class="wd-15p">Transaction Type</th>
                            <th class="wd-15p">Bank Name</th>
                            <th class="wd-15p">Amount</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Saving</td>
                            <td>Debit</td>
                            <td>NRBC</td>
                            <td>50000tk</td>
                            <td>Active</td>
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
    name: "AdvanceTransactionAddShow",
    components: {AdminIndex}
}
</script>

<style scoped>

</style>
