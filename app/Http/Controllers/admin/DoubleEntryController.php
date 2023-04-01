<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Account;
use App\Models\admin\DoubleEntry;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DoubleEntryController extends Controller
{
    public function index()
    {
        $account = Account::latest()->get();
        $doubleEntry = DoubleEntry::with('account')->latest()->get();
        return Inertia::render('DoubleEntry/DoubleEntryAddShow',compact('account','doubleEntry'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_id' => 'required',
            'date' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $doubleEntry = DoubleEntry::create([
                'account_id' => $request->account_id,
                'date'=> $request->date,
                'debit_amount' =>$request->debit_amount,
                'credit_amount' => $request->credit_amount,
                'details' => $request->details,
                'code' => mt_rand(1000, 9999),
            ]);
            if(!empty($doubleEntry)){
                DB::commit();
                return redirect()->route('admin.double.entry');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.double.entry');
        }
    }

    public function edit($id)
    {
        $account = Account::latest()->get();
        $doubleEntry = DoubleEntry::where('id',$id)->latest()->first();
        return Inertia::render('DoubleEntry/DoubleEntryUpdate',compact('account','doubleEntry'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'account_id' => 'required',
            'date' => 'required',
        ]);
        try {
            $doubleEntry = DoubleEntry::find($id);
            if (empty($doubleEntry)) {
                throw new \Exception('Failed!');
            }
            $updateDoubleEntry = $doubleEntry->update([
                'account_id' => $request->account_id,
                'date'=> $request->date,
                'debit_amount' =>$request->debit_amount,
                'credit_amount' => $request->credit_amount,
                'details' => $request->details,
            ]);
            if (!empty($updateDoubleEntry)) {
                DB::commit();
                return redirect()->route('admin.double.entry');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.double.entry');
        }
    }

    public function destroy($id)
    {
        $doubleEntry = DoubleEntry::findOrFail($id);
        $doubleEntry->delete();
        return redirect()->route('admin.double.entry');
    }
}
