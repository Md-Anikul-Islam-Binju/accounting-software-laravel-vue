<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Transfer</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Transfer</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Transfer Add</h6>
                <div class="form-layout">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Item: <span class="tx-danger">*</span></label>
                                <select class="form-control" data-placeholder="Choose Item">
                                    <option label="Choose Item"></option>
                                    <option value="">ACI</option>
                                    <option value="">Maximino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Qty: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="qty"  placeholder="Enter Qty">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Rate: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="rate"  placeholder="Enter Rate">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Sub Total: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="sub_total"  placeholder="Enter Sub Total">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">voucher: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="voucher"  placeholder="Enter Voucher">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Transfer Cost: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="transfer_cost"  placeholder="Enter Transfer Cost">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Total: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="total"  placeholder="Enter Total">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Grand Total: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="grand_total"  placeholder="Enter Grand Total">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Branch Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="branch_name"  placeholder="Enter Branch Name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                                <select class="form-control" data-placeholder="Choose Status">
                                    <option label="Choose Status"></option>
                                    <option value="">Active</option>
                                    <option value="">Inactive</option>
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
    </div>
</template>

<script>
import AdminIndex from "@/Pages/AdminIndex";
export default {
    name: "TransferAdd",
    components: {AdminIndex}
}
</script>

<style scoped>

</style>
