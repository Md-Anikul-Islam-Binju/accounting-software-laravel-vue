<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Account;
use App\Models\admin\Employee;
use App\Models\admin\SalaryPayment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class SalaryPaymentController extends Controller
{
    public function index()
    {
        $employee = Employee::latest()->get();
        $account = Account::latest()->get();
        $salaryPayment = SalaryPayment::with('account','employee')->latest()->get();
        return Inertia::render('SalaryPayment/SalaryPaymentAddShow',compact('employee','account','salaryPayment'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'payment_type' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $salaryPayment = SalaryPayment::create([
                'payment_type' => $request->payment_type,
                'form_account_id' => $request->form_account_id,
                'to_employee_id' => $request->to_employee_id,
                'year' => $request->year,
                'month' => $request->month,
                'date' => $request->date,
                'salary_account_id' => $request->salary_account_id,
                'amount' => $request->amount,
                'details' => $request->details,
                'code' => mt_rand(1000, 9999),
            ]);
            if(!empty($salaryPayment)){
                DB::commit();
                return redirect()->route('admin.salary.payment');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.salary.payment');
        }
    }

    public function destroy($id)
    {
        $salaryPayment = SalaryPayment::findOrFail($id);
        $salaryPayment->delete();
        return redirect()->route('admin.salary.payment');
    }
}
