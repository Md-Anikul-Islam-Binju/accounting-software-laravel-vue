<template>
    <AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Salary Payment</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Salary Payment</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Salary Payment Add & Show</h6>
                <div class="form-layout">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Payment Type: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose Payment Type">
                                    <option label="Choose Payment Type"></option>
                                    <option value="1">demo</option>
                                    <option value="0">demo</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Payment Form Account: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose Payment Form Account">
                                    <option label="Choose Payment Form Account"></option>
                                    <option value="1">demo</option>
                                    <option value="0">demo</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Payment To Employee Account: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose Payment To Employee Account">
                                    <option label="Choose Payment To Employee Account"></option>
                                    <option value="1">demo</option>
                                    <option value="0">demo</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Select Year: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose Year">
                                    <option label="Choose Year"></option>
                                    <option value="1">2012</option>
                                    <option value="0">2013</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Select Month: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose Month">
                                    <option label="Choose Month"></option>
                                    <option value="1">Jun</option>
                                    <option value="0">July</option>
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
                                <label class="form-control-label">Select Salary Account: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose Salary Account">
                                    <option label="Choose Salary Account"></option>
                                    <option value="1">demo</option>
                                    <option value="0">demo</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Payment Amount: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="amount"  placeholder="Enter Payment Amount">
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
                <h6 class="card-body-title">Salary Payment List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Form</th>
                            <th class="wd-15p">To</th>
                            <th class="wd-15p">Account</th>
                            <th class="wd-15p">Amount</th>
                            <th class="wd-15p">Year</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Anik</td>
                            <td>Binju</td>
                            <td>1478523694</td>
                            <td>5000k</td>
                            <td>2023</td>
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
    name: "SalaryPaymentAddShow",
    components: {AdminIndex}
}
</script>

<style scoped>

</style>
