<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CustomerController extends Controller
{
    public function customer()
    {
        return Inertia::render('Customer/CustomerAddShow');
    }
}
