<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Account;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SingleEntryController extends Controller
{
    public function singleEntry()
    {
        $account = Account::latest()->get();
        return Inertia::render('SingleEntry/SingleEntryAddShow',compact('account'));
    }
}
