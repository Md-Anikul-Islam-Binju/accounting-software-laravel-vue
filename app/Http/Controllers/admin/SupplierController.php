<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SupplierController extends Controller
{
    public function supplier()
    {
        return Inertia::render('Supplier/SupplierAddShow');
    }
}
