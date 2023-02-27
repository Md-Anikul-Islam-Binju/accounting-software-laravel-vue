<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ExpenseController extends Controller
{
    public function expense()
    {
        return Inertia::render('Expense/ExpenseAddShow');
    }
}
