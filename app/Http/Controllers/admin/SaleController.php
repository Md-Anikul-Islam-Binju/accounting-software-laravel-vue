<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SaleController extends Controller
{
    //Sale
    public function saleAdd()
    {
        return Inertia::render('Sale/SaleAdd');
    }

    public function saleList()
    {
        return Inertia::render('Sale/SaleList');
    }

    //Sale Return
    public function saleReturnAdd()
    {
        return Inertia::render('Sale/SaleReturnAdd');
    }

    public function saleReturnList()
    {
        return Inertia::render('Sale/SaleReturnList');
    }


}
