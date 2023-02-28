<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Account;
use App\Models\admin\SingleEntry;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class SingleEntryController extends Controller
{
    public function index()
    {
        $account = Account::latest()->get();
        $singleEntry = SingleEntry::with('single_entry_form_account','single_entry_to_account')->latest()->get();
        return Inertia::render('SingleEntry/SingleEntryAddShow',compact('account','singleEntry'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'form_account_id' => 'required|max:50',
            'to_account_id' => 'required|max:50',
            'entry_date' => 'required|max:50',
            'transaction_amount' => 'required|max:50',
        ]);
        try{
            DB::beginTransaction();
            $singleEntry = SingleEntry::create([
                'form_account_id' => $request->form_account_id,
                'to_account_id' => $request->to_account_id,
                'entry_date' => $request->entry_date,
                'transaction_amount' => $request->transaction_amount,
                'details' => $request->details,
                'single_entry_code' => mt_rand(1000, 9999),
            ]);
            if(!empty($singleEntry)){
                DB::commit();
                return redirect()->route('admin.single.entry');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.single.entry');
        }
    }

    public function edit($id)
    {
        $account = Account::latest()->get();
        $singleEntry = SingleEntry::where('id',$id)->first();
        return Inertia::render('SingleEntry/SingleEntryUpdate',compact('account','singleEntry'));
    }


    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'form_account_id' => 'required|max:50',
            'to_account_id' => 'required|max:50',
            'entry_date' => 'required|max:50',
            'transaction_amount' => 'required|max:50',
        ]);
        try {
            $singleEntry = SingleEntry::find($id);
            if (empty($singleEntry)) {
                throw new \Exception('Failed!');
            }
            $updateSingleEntry = $singleEntry->update([
                'form_account_id' => $request->form_account_id,
                'to_account_id' => $request->to_account_id,
                'entry_date' => $request->entry_date,
                'transaction_amount' => $request->transaction_amount,
                'details' => $request->details,
            ]);
            if (!empty($updateSingleEntry)) {
                DB::commit();
                return redirect()->route('admin.single.entry');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.single.entry');
        }
    }


    public function destroy($id)
    {
        $singleEntry = SingleEntry::findOrFail($id);
        $singleEntry->delete();
        return redirect()->route('admin.single.entry');
    }

}
