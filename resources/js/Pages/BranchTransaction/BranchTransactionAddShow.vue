<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Branch Transaction</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Branch Transaction</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Branch Transaction Add & Show</h6>
                <div class="form-layout">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">To Branch Name: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose To Branch Name">
                                    <option label="Choose To Branch Name"></option>
                                    <option value="1">demo</option>
                                    <option value="0">demo</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Branch Account: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose Branch Account">
                                    <option label="Choose Branch Account"></option>
                                    <option value="1">demo</option>
                                    <option value="0">demo</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Code: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="code"  placeholder="Enter Code">
                            </div>
                        </div>
                    </div>

                    <div class="row">
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

                        <div class="col-lg-4">
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
                <h6 class="card-body-title">Branch Transaction List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Branch Name </th>
                            <th class="wd-15p">Branch Account </th>
                            <th class="wd-15p">Code</th>
                            <th class="wd-15p">Details</th>
                            <th class="wd-15p">Account</th>
                            <th class="wd-15p">Amount</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mirpur Branch</td>
                            <td>DB25465</td>
                            <td>2584512</td>
                            <td>Test.........</td>
                            <td>1478523654</td>
                            <td>50k</td>
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
    name: "BranchTransactionAddShow",
    components: {AdminIndex}
}
</script>

<style scoped>

</style>
