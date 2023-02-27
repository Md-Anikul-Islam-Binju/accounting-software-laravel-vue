<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Account;
use App\Models\admin\Location;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function index()
    {
        $location = Location::latest()->get();
        $account = Account::latest()->get();
        return Inertia::render('Account/AccountAddShow',compact('location','account'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_code' => 'required|max:50',
            'account_name' => 'required|max:150',
            'account_type' => 'required',
            'account_open_date' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $account = Account::create([
                'account_code' => $request->account_code,
                'account_name' => $request->account_name,
                'account_type' => $request->account_type,
                'account_balance' => $request->account_balance,
                'account_open_date' => $request->account_open_date,
                'bank_account_number' => $request->bank_account_number,
                'bank_account_branch' => $request->bank_account_branch,
                'bank_account_type' => $request->bank_account_type,
                'address' => $request->address,
                'phone' => $request->phone,
                'location_id' => $request->location_id,
                'email' => $request->email,
                'credit_limit' => $request->credit_limit,
                'party_type' => $request->party_type,
                'status' => $request->status,
            ]);
            if(!empty($account)){
                DB::commit();
                return redirect()->route('admin.account');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.account');
        }
    }

    public function edit($id)
    {
        $location = Location::latest()->get();
        $account = Account::where('id',$id)->first();
        return Inertia::render('Account/AccountUpdate',compact('account','location'));
    }


    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'account_code' => 'required|max:50',
            'account_name' => 'required|max:150',
            'account_type' => 'required',
            'account_open_date' => 'required',
        ]);
        try {
            $account = Account::find($id);
            if (empty($account)) {
                throw new \Exception('Failed!');
            }
            $updateAccount = $account->update([
                'account_code' => $request->account_code,
                'account_name' => $request->account_name,
                'account_type' => $request->account_type,
                'account_balance' => $request->account_balance,
                'account_open_date' => $request->account_open_date,
                'bank_account_number' => $request->bank_account_number,
                'bank_account_branch' => $request->bank_account_branch,
                'bank_account_type' => $request->bank_account_type,
                'address' => $request->address,
                'phone' => $request->phone,
                'location_id' => $request->location_id,
                'email' => $request->email,
                'credit_limit' => $request->credit_limit,
                'party_type' => $request->party_type,
                'status' => $request->status,
            ]);
            if (!empty($updateAccount)) {
                DB::commit();
                return redirect()->route('admin.account');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.account');
        }
    }


    public function destroy($id)
    {
        $account = Account::findOrFail($id);
        $account->delete();
        return redirect()->route('admin.account');
    }

}
