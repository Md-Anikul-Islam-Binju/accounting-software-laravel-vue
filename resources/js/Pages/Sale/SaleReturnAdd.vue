<template>
<AdminIndex />
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Sale Return</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Sale Return</h5>
            </div>

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Sale Return Add</h6>
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
                                <label class="form-control-label">Customer Type: <span class="tx-danger">*</span></label>
                                <select class="form-control" data-placeholder="Choose Customer Type">
                                    <option label="Choose Customer Type"></option>
                                    <option value="">Single</option>
                                    <option value="">Multiple</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Customer Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="customer_name"  placeholder="Enter Customer Name">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="number" name="phone"  placeholder="Enter Phone">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="address"  placeholder="Enter Address">
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
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Voucher: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="voucher"  placeholder="Enter Voucher">
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
                                <label class="form-control-label">Discount: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="discount"  placeholder="Enter Discount">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Vat: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="vat"  placeholder="Enter Vat">
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
                                <label class="form-control-label">Paid: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="paid"  placeholder="Enter Paid">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Due: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="due"  placeholder="Enter Due">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Company Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="company_name"  placeholder="Enter Company Name">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Date: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="date" name="date"  placeholder="Enter Date">
                            </div>
                        </div>
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
import AdminIndex from "../AdminIndex";
export default {
    name: "SaleReturnAdd",
    components: {AdminIndex}
}
</script>

<style scoped>

</style>
