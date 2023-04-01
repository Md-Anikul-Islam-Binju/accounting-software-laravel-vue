<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Account;
use App\Models\admin\Branch;
use App\Models\admin\BranchTransaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class BranchTransactionController extends Controller
{
    public function index()
    {
        $branch  = Branch::latest()->get();
        $account = Account::latest()->get();
        $branchTransaction = BranchTransaction::with('branch','to_account','form_account')->latest()->get();
        return Inertia::render('BranchTransaction/BranchTransactionAddShow',compact('branch','account','branchTransaction'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'branch_id' => 'required',
            'amount' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $branchTransaction = BranchTransaction::create([
                'branch_id' => $request->branch_id,
                'branch_account_id' => $request->branch_account_id,
                'date' => $request->date,
                'account_id' => $request->account_id,
                'amount' => $request->amount,
                'details' => $request->details,
                'code' => mt_rand(1000, 9999),

            ]);
            if(!empty($branchTransaction)){
                DB::commit();
                return redirect()->route('admin.branch.transaction');

            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.branch.transaction');
        }
    }

    public function edit($id)
    {
        $branch  = Branch::latest()->get();
        $account = Account::latest()->get();
        $branchTransaction = BranchTransaction::where('id',$id)->first();
        return Inertia::render('BranchTransaction/BranchTransactionUpdate',compact('branch','account','branchTransaction'));
    }


    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'branch_id' => 'required',
            'amount' => 'required',
        ]);
        try {
            $branchTransaction = BranchTransaction::find($id);
            if (empty($branchTransaction)) {
                throw new \Exception('Failed!');
            }
            $updateBranchTransaction = $branchTransaction->update([
                'branch_id' => $request->branch_id,
                'branch_account_id' => $request->branch_account_id,
                'date' => $request->date,
                'account_id' => $request->account_id,
                'amount' => $request->amount,
                'details' => $request->details,
            ]);
            if (!empty($updateBranchTransaction)) {
                DB::commit();
                return redirect()->route('admin.branch.transaction');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.branch.transaction');
        }
    }


    public function destroy($id)
    {
        $branchTransaction = BranchTransaction::findOrFail($id);
        $branchTransaction->delete();
        return redirect()->route('admin.branch.transaction');
    }


}
