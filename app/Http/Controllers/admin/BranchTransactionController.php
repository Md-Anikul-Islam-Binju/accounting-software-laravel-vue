<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BranchTransactionController extends Controller
{
    public function branchTransaction()
    {

        return Inertia::render('BranchTransaction/BranchTransactionAddShow');
    }
}
