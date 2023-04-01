<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Account;
use App\Models\admin\AdvanceTransaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class AdvanceTransactionController extends Controller
{
    public function index()
    {
        $account = Account::latest()->get();
        $advanceTransaction = AdvanceTransaction::with('account')->latest()->get();
        return Inertia::render('AdvanceTransaction/AdvanceTransactionAddShow',compact('account','advanceTransaction'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'transaction_type' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $advanceTransaction = AdvanceTransaction::create([
                'transaction_type' => $request->transaction_type,
                'account_id' => $request->account_id,
                'transaction_account_type' => $request->transaction_account_type,
                'amount' => $request->amount,
                'details' => $request->details,
                'date' => $request->date,
            ]);
            if(!empty($advanceTransaction)){
                DB::commit();
                return redirect()->route('admin.advance.transaction');

            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.advance.transaction');
        }
    }

    public function destroy($id)
    {
        $advanceTransaction = AdvanceTransaction::findOrFail($id);
        $advanceTransaction->delete();
        return redirect()->route('admin.advance.transaction');
    }

}
