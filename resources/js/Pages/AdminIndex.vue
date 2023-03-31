<template>
    <div>
        <!-- Side Bar Panel  -->
        <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i>Account Admin</a></div>
        <div class="sl-sideleft">
            <label class="sidebar-label">Accounting Dashboard</label>
            <div class="sl-sideleft-menu">

                <Link :href="route('admin.dashboard')" class="sl-menu-link active">
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                        <span class="menu-item-label">Dashboard</span>
                    </div>
                </Link>

                <!--Sales Modules-->
                <a @click="menuButtonSale" href="#" class="sl-menu-link" >
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                        <span class="menu-item-label">Sales Modules</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                </a>
                <!--class="sl-menu-sub nav flex-column"-->
                <ul v-if="toggleSale" style="list-style: none;">
                    <li class="nav-item">
                        <Link :href="route('admin.sale.add')" class="nav-link">Sale Add</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.sale.list')" class="nav-link">Sale List</Link>
                    </li>

                    <li class="nav-item">
                        <Link :href="route('admin.sale.return.add')" class="nav-link">Sale Return</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.sale.return.list')" class="nav-link">Sale Return List</Link>
                    </li>
                </ul>

                <!--Quotation Modules-->
                <a @click="menuButtonQuotation" href="#" class="sl-menu-link" >
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                        <span class="menu-item-label">Quotation Modules</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                </a>
                <ul v-if="toggleQuotation" style="list-style: none;">
                    <li class="nav-item">
                        <Link :href="route('admin.quotation.add')" class="nav-link">Quotation Add</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.quotation.list')" class="nav-link">Quotation List</Link>
                    </li>
                </ul>


                <!--Order Modules-->
                <a @click="menuButtonOrder" href="#" class="sl-menu-link" >
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                        <span class="menu-item-label">Order Modules</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                </a>
                <ul v-if="toggleOrder" style="list-style: none;" >
                    <li class="nav-item">
                        <Link :href="route('admin.sale.order')" class="nav-link">Sale Order Add</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.sale.order.list')" class="nav-link">Sale Order List</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.sale.order.voucher')" class="nav-link">Sale Order Voucher</Link>
                    </li>

                    <li class="nav-item">
                        <Link :href="route('admin.purses.order')" class="nav-link">Purses Order Add</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.purses.order.list')"  class="nav-link">Purses Order List</Link>
                    </li>

                    <li class="nav-item">
                        <Link :href="route('admin.purses.order.voucher')"  class="nav-link">Purses Order Voucher</Link>
                    </li>
                </ul>

                <!--Service Modules-->
                <a @click="menuButtonService" href="#"  class="sl-menu-link" >
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                        <span class="menu-item-label">Service Modules</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                </a>
                <ul v-if="toggleService" style="list-style: none;" >
                    <li class="nav-item">
                        <Link :href="route('admin.service')" class="nav-link">Service Add</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.service.list')" class="nav-link">Service List</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.service.voucher')" class="nav-link">Service Voucher</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.service.expense')" class="nav-link">Service Expense Add</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.service.expense.list')" class="nav-link">Service Expense List</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.service.expense.voucher')" class="nav-link">Service Expense Voucher</Link>
                    </li>
                </ul>

                <!--Purchase Modules-->
                <a @click="menuButtonPurchase" href="#"  class="sl-menu-link" >
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                        <span class="menu-item-label">Purchase Modules</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                </a>
                <ul v-if="togglePurchase" style="list-style: none;" >
                    <li class="nav-item">
                        <Link :href="route('admin.purchase')" class="nav-link">Purchase Add</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.purchase.list')" class="nav-link">Purchase List</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.purchase.return')" class="nav-link">Purchase Return Add</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.purchase.return.list')" class="nav-link">Purchase Return List</Link>
                    </li>
                </ul>

                <!--Manufacture Modules-->
                <a @click="menuButtonManufacture" href="#"  class="sl-menu-link" >
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                        <span class="menu-item-label">Manufacture Modules</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                </a>
                <ul v-if="toggleManufacture" style="list-style: none;" >
                    <li class="nav-item">
                        <Link :href="route('admin.manufacture')" class="nav-link">Manufacture Add</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.manufacture.list')" class="nav-link">Manufacture List</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.manufacture.voucher')" class="nav-link">Manufacture Voucher</Link>
                    </li>
                </ul>


                <!--Inventory Modules-->
                <a @click="menuButtonTransfer" href="#" class="sl-menu-link" >
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                        <span class="menu-item-label">Inventory Modules</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                </a>
                <ul v-if="toggleTransfer" style="list-style: none;">
                    <li class="nav-item">
                        <Link :href="route('admin.transfer')" class="nav-link">Transfer Add</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.transfer.list')" class="nav-link">Transfer List</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.item.adjustment')" class="nav-link">Item Adjustment</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.item.adjustment.report')" class="nav-link">Adjustment List</Link>
                    </li>

                </ul>

                <!--Account Modules-->
                <a @click="menuButtonAccountInfo" href="#" class="sl-menu-link" >
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                        <span class="menu-item-label">Account Modules</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                </a>
                <ul v-if="toggleAccountInfo" style="list-style: none;">
                    <li class="nav-item">
                        <Link :href="route('admin.location')" class="nav-link">Location</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.account')" class="nav-link">Account</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.double.entry')" class="nav-link">Double Entry</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.advance.transaction')" class="nav-link">Advance Transaction</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.single.entry')" class="nav-link">Single Entry</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.supplier')" class="nav-link">Supplier</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.income')" class="nav-link">Income</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.expense')" class="nav-link">Expense</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.customer')" class="nav-link">Customer</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.branch.transaction')" class="nav-link">Branch Transaction</Link>
                    </li>
                </ul>

                <!--HR Modules-->
                <a @click="menuButtonHrModule" href="#" class="sl-menu-link" >
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                        <span class="menu-item-label">HR Modules</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                </a>
                <ul v-if="toggleHrModule" style="list-style: none;">
                    <li class="nav-item">
                        <Link :href="route('admin.attendance')" class="nav-link">Attendance</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.department')" class="nav-link">Department</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.designation')" class="nav-link">Designation</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.salary.payment')" class="nav-link">Salary Payment</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.employee')" class="nav-link">Employee</Link>
                    </li>
                </ul>






                <a @click="menuButton" href="#" class="sl-menu-link" >
                    <div class="sl-menu-item">
                        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                        <span class="menu-item-label">Setting</span>
                        <i class="menu-item-arrow fa fa-angle-down"></i>
                    </div>
                </a>
                <!--class="sl-menu-sub nav flex-column"-->
                <ul v-if="toggle" style="list-style: none;">
                    <li class="nav-item">
                        <Link :href="route('admin.item.create')" class="nav-link">Item Add</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.item.list')" class="nav-link">Item List</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.group')" class="nav-link">Group</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.category')" class="nav-link">Category</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.warehouse')" class="nav-link">Warehouse</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.branch')" class="nav-link">Branch</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.sms.send')" class="nav-link">Sms Send</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.user.profile')" class="nav-link">User Entry</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.company.profile')" class="nav-link">Company Profile</Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('admin.unit')" class="nav-link">Unit</Link>
                    </li>
                </ul>
            </div>
            <br>
        </div>

        <!-- Admin After Login Info  -->
        <div class="sl-header">
            <div class="sl-header-left">
                <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
                <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
            </div>
            <div class="sl-header-right">
                <nav class="nav">
                    <div class="dropdown">
                        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                            <span class="logged-name">Super<span class="hidden-md-down"> Admin</span></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-header wd-200">
                            <ul class="list-unstyled user-profile-nav">
                                <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                                <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                                <li>
                                  <Link :href="route('logout')" method="post"><i class="icon ion-power"></i> Sign Out</Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
export default {
    name: "AdminIndex",
    components:{
        Link
    },
    data(){
        return{
            toggle:false,
            toggleSale:false,
            toggleQuotation:false,
            toggleOrder:false,
            toggleService:false,
            togglePurchase:false,
            toggleManufacture:false,
            toggleTransfer:false,
            toggleAccountInfo:false,
            toggleHrModule:false,
        }
    },
    methods:{
        menuButton(){
            this.toggle = !this.toggle;
        },
        menuButtonSale()
        {
            this.toggleSale = !this.toggleSale;
        },
        menuButtonQuotation()
        {
            this.toggleQuotation = !this.toggleQuotation;
        },
        menuButtonOrder()
        {
            this.toggleOrder = !this.toggleOrder;
        },
        menuButtonService()
        {
            this.toggleService = !this.toggleService;
        },
        menuButtonPurchase()
        {
            this.togglePurchase = !this.togglePurchase;
        },
        menuButtonManufacture()
        {
            this.toggleManufacture = !this.toggleManufacture;
        },
        menuButtonTransfer()
        {
            this.toggleTransfer = !this.toggleTransfer;
        },
        menuButtonAccountInfo()
        {
            this.toggleAccountInfo = !this.toggleAccountInfo;
        },
        menuButtonHrModule()
        {
            this.toggleHrModule = !this.toggleHrModule;
        },
    },

}
</script>

<style scoped>

</style>

