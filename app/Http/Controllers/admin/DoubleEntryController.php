<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DoubleEntryController extends Controller
{
    public function doubleEntry()
    {
        return Inertia::render('DoubleEntry/DoubleEntryAddShow');
    }
}
