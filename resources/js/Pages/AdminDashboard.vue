<template>
    <AdminIndex />
    <!-- Dashboard Body  -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Accounting</a>
            <span class="breadcrumb-item active">Dashboard</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-3">
                    <div class="card pd-20 bg-primary">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Sales</h6>
                            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">$850</h3>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                    <div class="card pd-20 bg-info">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Week's Sales</h6>
                            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">$4,625</h3>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="card pd-20 bg-purple">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Month's Sales</h6>
                            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">$11,908</h3>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="card pd-20 bg-sl-primary">
                        <div class="d-flex justify-content-between align-items-center mg-b-10">
                            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Year's Sales</h6>
                            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mg-b-0 tx-white tx-lato tx-bold">$91,239</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
import AdminIndex from "./AdminIndex";
export default {
    name: "AdminDashboard",
    components: {AdminIndex}
}
</script>

<style scoped>

</style>
