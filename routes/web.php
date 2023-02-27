<?php


use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdvanceTransactionController;
use App\Http\Controllers\admin\AttendanceController;
use App\Http\Controllers\admin\BranchController;
use App\Http\Controllers\admin\BranchTransactionController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CompanyProfileController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\admin\DesignationController;
use App\Http\Controllers\admin\DoubleEntryController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\ExpenseController;
use App\Http\Controllers\admin\GroupController;
use App\Http\Controllers\admin\IncomeController;
use App\Http\Controllers\admin\ItemController;
use App\Http\Controllers\admin\LocationController;
use App\Http\Controllers\admin\ManufactureController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\PurchaseController;
use App\Http\Controllers\admin\QuotationController;
use App\Http\Controllers\admin\SalaryPaymentController;
use App\Http\Controllers\admin\SaleController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SingleEntryController;
use App\Http\Controllers\admin\SmsSendController;
use App\Http\Controllers\admin\SupplierController;
use App\Http\Controllers\admin\TransferController;
use App\Http\Controllers\admin\UnitController;
use App\Http\Controllers\admin\UserProfileController;
use App\Http\Controllers\admin\WarehouseController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//Route::get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    //Admin Dashboard
    Route::get('account-dashboard',[AdminDashboardController::class,'dashboard'])->name('admin.dashboard');

    //Group
    Route::get('group',[GroupController::class,'index'])->name('admin.group');
    Route::post('group-store',[GroupController::class,'store'])->name('admin.group.store');
    Route::get('group-edit/{id}',[GroupController::class,'edit'])->name('admin.group.edit');
    Route::post('group-update/{id}',[GroupController::class,'update'])->name('admin.group.update');
    Route::delete('group-delete/{id}',[GroupController::class,'destroy'])->name('admin.group.delete');

    //Unit
    Route::get('unit',[UnitController::class,'index'])->name('admin.unit');
    Route::post('unit-store',[UnitController::class,'store'])->name('admin.unit.store');
    Route::get('unit-edit/{id}',[UnitController::class,'edit'])->name('admin.unit.edit');
    Route::post('unit-update/{id}',[UnitController::class,'update'])->name('admin.unit.update');
    Route::delete('unit-delete/{id}',[UnitController::class,'destroy'])->name('admin.unit.delete');

    //Item
    Route::get('item-create',[ItemController::class,'create'])->name('admin.item.create');
    Route::post('item-store',[ItemController::class,'store'])->name('admin.item.store');
    Route::get('item-list',[ItemController::class,'index'])->name('admin.item.list');
    Route::get('item-edit/{id}',[ItemController::class,'edit'])->name('admin.item.edit');
    Route::post('item-update/{id}',[ItemController::class,'update'])->name('admin.item.update');
    Route::delete('item-delete/{id}',[ItemController::class,'destroy'])->name('admin.item.delete');

    //Item Adjustment
    Route::get('item-adjustment',[ItemController::class,'itemAdjustment'])->name('admin.item.adjustment');
    Route::get('item-adjustment-report',[ItemController::class,'itemAdjustmentReport'])->name('admin.item.adjustment.report');
    Route::get('item-adjustment-pending-report',[ItemController::class,'itemAdjustmentPendingReport'])->name('admin.item.adjustment.pending.report');
    Route::get('item-adjustment-received-report',[ItemController::class,'itemAdjustmentReceivedReport'])->name('admin.item.adjustment.received.report');

    //Category
    Route::get('category',[CategoryController::class,'index'])->name('admin.category');
    Route::post('category-store',[CategoryController::class,'store'])->name('admin.category.store');
    Route::get('category-edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
    Route::post('category-update/{id}',[CategoryController::class,'update'])->name('admin.category.update');
    Route::delete('category-delete/{id}',[CategoryController::class,'destroy'])->name('admin.category.delete');

    //Branch
    Route::get('branch',[BranchController::class,'index'])->name('admin.branch');
    Route::post('branch-store',[BranchController::class,'store'])->name('admin.branch.store');
    Route::get('branch-edit/{id}',[BranchController::class,'edit'])->name('admin.branch.edit');
    Route::post('branch-update/{id}',[BranchController::class,'update'])->name('admin.branch.update');
    Route::delete('branch-delete/{id}',[BranchController::class,'destroy'])->name('admin.branch.delete');

    //Warehouse
    Route::get('warehouse',[WarehouseController::class,'index'])->name('admin.warehouse');
    Route::post('warehouse-store',[WarehouseController::class,'store'])->name('admin.warehouse.store');
    Route::get('warehouse-edit/{id}',[WarehouseController::class,'edit'])->name('admin.warehouse.edit');
    Route::post('warehouse-update/{id}',[WarehouseController::class,'update'])->name('admin.warehouse.update');
    Route::delete('warehouse-delete/{id}',[WarehouseController::class,'destroy'])->name('admin.warehouse.delete');

    //User
    Route::get('user-profile',[UserProfileController::class,'index'])->name('admin.user.profile');
    Route::post('user-store',[UserProfileController::class,'store'])->name('admin.user.store');
    Route::get('user-edit/{id}',[UserProfileController::class,'edit'])->name('admin.user.edit');
    Route::post('user-update/{id}',[UserProfileController::class,'update'])->name('admin.user.update');
    Route::delete('user-delete/{id}',[UserProfileController::class,'destroy'])->name('admin.user.delete');


    //SMS-Send
    Route::get('sms-send',[SmsSendController::class,'index'])->name('admin.sms.send');


    //Employee
    Route::get('employee',[EmployeeController::class,'index'])->name('admin.employee');
    Route::post('employee-store',[EmployeeController::class,'store'])->name('admin.employee.store');
    Route::get('employee-edit/{id}',[EmployeeController::class,'edit'])->name('admin.employee.edit');
    Route::post('employee-update/{id}',[EmployeeController::class,'update'])->name('admin.employee.update');
    Route::delete('employee-delete/{id}',[EmployeeController::class,'destroy'])->name('admin.employee.delete');

    //Company Profile
    Route::get('company-profile',[CompanyProfileController::class,'index'])->name('admin.company.profile');
    Route::post('company-profile-store',[CompanyProfileController::class,'store'])->name('admin.company.profile.store');
    Route::get('company-profile-edit/{id}',[CompanyProfileController::class,'edit'])->name('admin.company.profile.edit');
    Route::post('company-profile-update/{id}',[CompanyProfileController::class,'update'])->name('admin.company.profile.update');
    Route::delete('company-profile-delete/{id}',[CompanyProfileController::class,'destroy'])->name('admin.company.profile.delete');

    //Sale
    Route::get('sale',[SaleController::class,'saleAdd'])->name('admin.sale.add');
    Route::get('sale-list',[SaleController::class,'saleList'])->name('admin.sale.list');
    //Sale Return
    Route::get('sale-return',[SaleController::class,'saleReturnAdd'])->name('admin.sale.return.add');
    Route::get('sale-return-list',[SaleController::class,'saleReturnList'])->name('admin.sale.return.list');
    //Quotation
    Route::get('quotation',[QuotationController::class,'quotationAdd'])->name('admin.quotation.add');
    Route::get('quotation-list',[QuotationController::class,'quotationList'])->name('admin.quotation.list');
    //Sale Order
    Route::get('sale-order',[OrderController::class,'saleOrder'])->name('admin.sale.order');
    Route::get('sale-order-list',[OrderController::class,'saleOrderList'])->name('admin.sale.order.list');
    Route::get('sale-order-voucher',[OrderController::class,'saleOrderVoucher'])->name('admin.sale.order.voucher');
    //Purses Order
    Route::get('purses-order',[OrderController::class,'pursesOrder'])->name('admin.purses.order');
    Route::get('purses-order-list',[OrderController::class,'pursesOrderList'])->name('admin.purses.order.list');
    Route::get('purses-order-voucher',[OrderController::class,'pursesOrderVoucher'])->name('admin.purses.order.voucher');
    //Service
    Route::get('service',[ServiceController::class,'service'])->name('admin.service');
    Route::get('service-list',[ServiceController::class,'serviceList'])->name('admin.service.list');
    Route::get('service-voucher',[ServiceController::class,'serviceVoucher'])->name('admin.service.voucher');
    //Service Expense
    Route::get('service-expense',[ServiceController::class,'serviceExpense'])->name('admin.service.expense');
    Route::get('service-order-list',[ServiceController::class,'serviceExpenseList'])->name('admin.service.expense.list');
    Route::get('service-order-voucher',[ServiceController::class,'serviceExpenseVoucher'])->name('admin.service.expense.voucher');
    //Purchase
    Route::get('purchase',[PurchaseController::class,'purchase'])->name('admin.purchase');
    Route::get('purchase-list',[PurchaseController::class,'purchaseList'])->name('admin.purchase.list');
    //Service Expense
    Route::get('purchase-return',[PurchaseController::class,'purchaseReturn'])->name('admin.purchase.return');
    Route::get('purchase-return-list',[PurchaseController::class,'purchaseReturnList'])->name('admin.purchase.return.list');
    //Manufacture
    Route::get('manufacture',[ManufactureController::class,'manufacture'])->name('admin.manufacture');
    Route::get('manufacture-list',[ManufactureController::class,'manufactureList'])->name('admin.manufacture.list');
    Route::get('manufacture-voucher',[ManufactureController::class,'manufactureVoucher'])->name('admin.manufacture.voucher');
    //Transfer
    Route::get('transfer',[TransferController::class,'transfer'])->name('admin.transfer');
    Route::get('transfer-list',[TransferController::class,'transferList'])->name('admin.transfer.list');

    //Location
    Route::get('location',[LocationController::class,'location'])->name('admin.location');
    Route::post('location-store',[LocationController::class,'store'])->name('admin.location.store');
    Route::get('location-edit/{id}',[LocationController::class,'edit'])->name('admin.location.edit');
    Route::post('location-update/{id}',[LocationController::class,'update'])->name('admin.location.update');
    Route::delete('location-delete/{id}',[LocationController::class,'destroy'])->name('admin.location.delete');

    //Account
    Route::get('account',[AccountController::class,'index'])->name('admin.account');
    Route::post('account-store',[AccountController::class,'store'])->name('admin.account.store');
    Route::get('account-edit/{id}',[AccountController::class,'edit'])->name('admin.account.edit');
    Route::post('account-update/{id}',[AccountController::class,'update'])->name('admin.account.update');
    Route::delete('account-delete/{id}',[AccountController::class,'destroy'])->name('admin.account.delete');


    //Double Entry
    Route::get('double-entry',[DoubleEntryController::class,'doubleEntry'])->name('admin.double.entry');
    //Advance Transaction
    Route::get('advance-transaction',[AdvanceTransactionController::class,'advanceTransaction'])->name('admin.advance.transaction');
    //Single Entry
    Route::get('single-entry',[SingleEntryController::class,'singleEntry'])->name('admin.single.entry');

    //Supplier
    Route::get('supplier',[SupplierController::class,'supplier'])->name('admin.supplier');

    //Income
    Route::get('income',[IncomeController::class,'index'])->name('admin.income');
    Route::post('income-store',[IncomeController::class,'store'])->name('admin.income.store');
    Route::get('income-edit/{id}',[IncomeController::class,'edit'])->name('admin.income.edit');
    Route::post('income-update/{id}',[IncomeController::class,'update'])->name('admin.income.update');
    Route::delete('income-delete/{id}',[IncomeController::class,'destroy'])->name('admin.income.delete');

    //Expense
    Route::get('expense',[ExpenseController::class,'expense'])->name('admin.expense');

    //Customer
    Route::get('customer',[CustomerController::class,'customer'])->name('admin.customer');
    //Branch Transaction
    Route::get('branch-transaction',[BranchTransactionController::class,'branchTransaction'])->name('admin.branch.transaction');


    //Attendance
    Route::get('attendance',[AttendanceController::class,'attendance'])->name('admin.attendance');

    //Department
    Route::get('department',[DepartmentController::class,'index'])->name('admin.department');
    Route::post('department-store',[DepartmentController::class,'store'])->name('admin.department.store');
    Route::get('department-edit/{id}',[DepartmentController::class,'edit'])->name('admin.department.edit');
    Route::post('department-update/{id}',[DepartmentController::class,'update'])->name('admin.department.update');
    Route::delete('department-delete/{id}',[DepartmentController::class,'destroy'])->name('admin.department.delete');

    //Designation
    Route::get('designation',[DesignationController::class,'index'])->name('admin.designation');
    Route::post('designation-store',[DesignationController::class,'store'])->name('admin.designation.store');
    Route::get('designation-edit/{id}',[DesignationController::class,'edit'])->name('admin.designation.edit');
    Route::post('designation-update/{id}',[DesignationController::class,'update'])->name('admin.designation.update');
    Route::delete('designation-delete/{id}',[DesignationController::class,'destroy'])->name('admin.designation.delete');

    //Salary Payment
    Route::get('salary-payment',[SalaryPaymentController::class,'salaryPayment'])->name('admin.salary.payment');


    //Logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
require __DIR__.'/auth.php';

