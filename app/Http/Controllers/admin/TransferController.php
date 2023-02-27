<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TransferController extends Controller
{
    public function transfer()
    {
        return Inertia::render('Transfer/TransferAdd');
    }

    public function transferList()
    {
        return Inertia::render('Transfer/TransferList');
    }
}
