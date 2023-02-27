<template>
<AdminIndex />
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Sms Send</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Sms Send</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Sms Send Add & Show</h6>
                <div class="form-layout">
                    <div class="row">



                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">User Name: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="User Name">
                                    <option label="Select User Name"></option>
                                    <option value="Anik">Anik</option>
                                    <option value="Manna">Manna</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Massage: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="massage"  placeholder="Enter Massage">
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
                <h6 class="card-body-title">User Sms Send List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Massage</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Anik</td>
                            <td>Hello Anik Please Help me</td>
                            <td>Edit , Delete</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Pinki</td>
                            <td>Hello Pinki Please Help me</td>
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
name: "SmsAddShow",
    components: {AdminIndex}
}
</script>

<style scoped>

</style>
