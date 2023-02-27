<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PurchaseController extends Controller
{
    //Add Purchase
    public function purchase()
    {
        return Inertia::render('Purchase/PurchaseAdd');
    }

    //Show Purchase
    public function purchaseList()
    {
        return Inertia::render('Purchase/PurchaseList');
    }


    //Add Purchase Return
    public function purchaseReturn()
    {
        return Inertia::render('Purchase/PurchaseReturnAdd');
    }
    //Show Purchase Return
    public function purchaseReturnList()
    {
        return Inertia::render('Purchase/PurchaseReturnList');
    }

}
