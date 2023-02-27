<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AttendanceController extends Controller
{
    public function attendance()
    {
        return Inertia::render('Attendance/AttendanceAddShow');
    }
}
