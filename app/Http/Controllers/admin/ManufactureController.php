<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ManufactureController extends Controller
{
    //Add Manufacture
    public function manufacture()
    {
        return Inertia::render('Manufacture/ManufactureAdd');
    }

    //Show Manufacture
    public function manufactureList()
    {
        return Inertia::render('Manufacture/ManufactureList');
    }

    //Manufacture Voucher
    public function manufactureVoucher()
    {
        return Inertia::render('Manufacture/ManufactureVoucher');
    }
}
