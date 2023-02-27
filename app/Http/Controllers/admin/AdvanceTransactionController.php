<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdvanceTransactionController extends Controller
{
    public function advanceTransaction()
    {
        return Inertia::render('AdvanceTransaction/AdvanceTransactionAddShow');
    }
}
