<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServiceController extends Controller
{
    //Add Service
    public function service()
    {
        return Inertia::render('Service/ServiceAdd');
    }

    //Show Service
    public function serviceList()
    {
        return Inertia::render('Service/ServiceList');
    }

    //Service Voucher
    public function serviceVoucher()
    {
        return Inertia::render('Service/ServiceVoucher');
    }

    //Add Service Expense
    public function serviceExpense()
    {
        return Inertia::render('Service/ServiceExpenseAdd');
    }
    //Show Purses Order
    public function serviceExpenseList()
    {
        return Inertia::render('Service/ServiceExpenseList');
    }
    //Purses Order Voucher
    public function serviceExpenseVoucher()
    {
        return Inertia::render('Service/ServiceExpenseVoucher');
    }
}
