<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SalaryPaymentController extends Controller
{
    public function salaryPayment()
    {
        return Inertia::render('SalaryPayment/SalaryPaymentAddShow');
    }
}
