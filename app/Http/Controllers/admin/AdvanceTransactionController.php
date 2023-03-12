<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Account;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdvanceTransactionController extends Controller
{
    public function advanceTransaction()
    {
        $account = Account::latest()->get();

        return Inertia::render('AdvanceTransaction/AdvanceTransactionAddShow');
    }
}
