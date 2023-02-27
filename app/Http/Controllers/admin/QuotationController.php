<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuotationController extends Controller
{
    //Sale
    public function quotationAdd()
    {
        return Inertia::render('Quotation/QuotationAdd');
    }

    public function quotationList()
    {
        return Inertia::render('Quotation/QuotationList');
    }
}
