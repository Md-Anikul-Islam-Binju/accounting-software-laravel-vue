<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Account;
use App\Models\admin\Employee;
use App\Models\admin\Expense;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ExpenseController extends Controller
{
    public function index()
    {
        $account = Account::latest()->get();
        $employee = Employee::latest()->get();
        $expense = Expense::with('expense_form_account','expense_to_account','employee')->latest()->get();
        return Inertia::render('Expense/ExpenseAddShow',compact('account','employee','expense'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'expense_paid_form_account_id' => 'required',
            'expense_paid_to_account_id' => 'required',
            'expense_date' => 'required',
            'expense_amount' => 'required',
            'employee_id' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $expense = Expense::create([
                'expense_paid_form_account_id' => $request->expense_paid_form_account_id,
                'expense_paid_to_account_id'=> $request->expense_paid_to_account_id,
                'expense_date' =>$request->expense_date,
                'expense_amount' => $request->expense_amount,
                'expense_details' => $request->expense_details,
                'employee_id'=> $request->employee_id,
                'expense_entry_code' => mt_rand(1000, 9999),
            ]);
            if(!empty($expense)){
                DB::commit();
                return redirect()->route('admin.expense');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.expense');
        }
    }

    public function edit($id)
    {
        $account = Account::latest()->get();
        $employee = Employee::latest()->get();
        $expense = Expense::where('id',$id)->latest()->first();
        return Inertia::render('Expense/ExpenseUpdate',compact('account','expense','employee'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'expense_paid_form_account_id' => 'required',
            'expense_paid_to_account_id' => 'required',
            'expense_date' => 'required',
            'expense_amount' => 'required',
            'employee_id' => 'required',
        ]);
        try {
            $expense = Expense::find($id);
            if (empty($expense)) {
                throw new \Exception('Failed!');
            }
            $updateExpense = $expense->update([
                'expense_paid_form_account_id' => $request->expense_paid_form_account_id,
                'expense_paid_to_account_id'=> $request->expense_paid_to_account_id,
                'expense_date' =>$request->expense_date,
                'expense_amount' => $request->expense_amount,
                'employee_id'=> $request->employee_id,
                'expense_details' => $request->expense_details,
            ]);
            if (!empty($updateExpense)) {
                DB::commit();
                return redirect()->route('admin.expense');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.expense');
        }
    }

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();
        return redirect()->route('admin.expense');
    }

}
