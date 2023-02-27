<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Account;
use App\Models\admin\Income;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class IncomeController extends Controller
{
    public function index()
    {
        $account = Account::latest()->get();
        $income = Income::with('form_account','to_account')->latest()->get();
        return Inertia::render('Income/IncomeAddShow',compact('account','income'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'recipe_form_account_id' => 'required',
            'recipe_to_account_id' => 'required',
            'income_date' => 'required',
            'income_amount' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $income = Income::create([
                'recipe_form_account_id' => $request->recipe_form_account_id,
                'recipe_to_account_id' => $request->recipe_to_account_id,
                'income_date' => $request->income_date,
                'income_amount' => $request->income_amount,
                'income_code' => mt_rand(1000, 9999),
                'details' => $request->details,
            ]);
            if(!empty($income)){
                DB::commit();
                return redirect()->route('admin.income');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.income');
        }
    }

    public function edit($id)
    {
        $account = Account::latest()->get();
        $income = Income::where('id',$id)->first();
        return Inertia::render('Income/IncomeUpdate',compact('income','account'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'recipe_form_account_id' => 'required',
            'recipe_to_account_id' => 'required',
            'income_date' => 'required',
            'income_amount' => 'required',
        ]);
        try {
            $income = Income::find($id);
            if (empty($income)) {
                throw new \Exception('Failed!');
            }
            $updateIncome = $income->update([
                'recipe_form_account_id' => $request->recipe_form_account_id,
                'recipe_to_account_id' => $request->recipe_to_account_id,
                'income_date' => $request->income_date,
                'income_amount' => $request->income_amount,
                'details' => $request->details,
            ]);
            if (!empty($updateIncome)) {
                DB::commit();
                return redirect()->route('admin.income');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.income');
        }
    }

    public function destroy($id)
    {
        $income = Income::findOrFail($id);
        $income->delete();
        return redirect()->route('admin.income');
    }
}
