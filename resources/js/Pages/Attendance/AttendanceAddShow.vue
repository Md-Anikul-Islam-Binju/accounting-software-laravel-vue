<template>
<AdminIndex/>
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="#">Accounting</a>
            <a class="breadcrumb-item" href="#">Attendance</a>
        </nav>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Attendance</h5>
            </div>
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Attendance Add & Show</h6>
                <div class="form-layout">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Select Year: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose Year">
                                    <option label="Choose Year"></option>
                                    <option value="1">2023</option>
                                    <option value="0">2023</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Select Month: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose Month">
                                    <option label="Choose Month"></option>
                                    <option value="1">Jun</option>
                                    <option value="0">December</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Employee Name: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose Employee Name">
                                    <option label="Choose Employee Name"></option>
                                    <option value="1">Anik</option>
                                    <option value="0">Binju</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Attendance: <span class="tx-danger">*</span></label>
                                <label class="rdiobox">
                                    <input name="house" type="radio" checked>
                                    <span>Attend</span>
                                </label>
                                <label class="rdiobox">
                                    <input name="house" type="radio">
                                    <span>Absent</span>
                                </label>
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
                <h6 class="card-body-title">Attendance List</h6>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">S/N</th>
                            <th class="wd-15p">Year</th>
                            <th class="wd-15p">Month</th>
                            <th class="wd-15p">Employee</th>
                            <th class="wd-15p">Attendance</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>2023</td>
                            <td>Jun</td>
                            <td>Md Anikul Islam</td>
                            <td>Yes</td>
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
    name: "AttendanceAddShow",
    components: {AdminIndex}
}
</script>

<style scoped>

</style>
