<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Double Entry</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Double Entry</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Double Entry Add & Show</h6>
                <div class="form-layout">
                    <div class="row">

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Account: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="account_id" data-placeholder="Choose Account">
                                    <option label="Choose Account"></option>
                                    <option value="1">DBBL</option>
                                    <option value="0">City</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Journal Code: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="code"  placeholder="Enter Journal Code">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Debit Account: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="debit"  placeholder="Enter Debit Account">
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Credit Account: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="credit"  placeholder="Enter Credit Account">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Details: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="details"  placeholder="Enter Details">
                            </div>
                        </div>

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
                <h6 class="card-body-title">Location List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Journal Code</th>
                            <th class="wd-15p">Account Name</th>
                            <th class="wd-15p">Credit</th>
                            <th class="wd-15p">Deviate</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>DB22081</td>
                            <td>DBBL</td>
                            <td>400000tk</td>
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
    name: "DoubleEntryAddShow",
    components: {AdminIndex}
}
</script>

<style scoped>

</style>
