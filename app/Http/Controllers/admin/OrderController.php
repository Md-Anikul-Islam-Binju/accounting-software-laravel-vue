<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    //Add Sale Order
    public function saleOrder()
    {
        return Inertia::render('Order/SaleOrderAdd');
    }

    //Show Sale Order
    public function saleOrderList()
    {
        return Inertia::render('Order/SaleOrderList');
    }

    //Sale Order Voucher
    public function saleOrderVoucher()
    {
        return Inertia::render('Order/SaleOrderVoucher');
    }

    //Add Purses Order
    public function pursesOrder()
    {
        return Inertia::render('Order/PursesOrderAdd');
    }
    //Show Purses Order
    public function pursesOrderList()
    {
        return Inertia::render('Order/PursesOrderList');
    }
    //Purses Order Voucher
    public function pursesOrderVoucher()
    {
        return Inertia::render('Order/PursesOrderVoucher');
    }
}
