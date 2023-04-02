<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Account;
use App\Models\admin\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class CustomerController extends Controller
{
    public function index()
    {
        $account = Account::latest()->get();
        $customer = Customer::with('form_account','to_account')->latest()->get();
        return Inertia::render('Customer/CustomerAddShow',compact('account','customer'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'form_account_id' => 'required',
            'to_account_id' => 'required',
            'amount' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $customer = Customer::create([
                'form_account_id' => $request->form_account_id,
                'to_account_id' => $request->to_account_id,
                'date' => $request->date,
                'amount' => $request->amount,
                'details' => $request->details,
                'code' => mt_rand(1000, 9999),
            ]);
            if(!empty($customer)){
                DB::commit();
                return redirect()->route('admin.customer');

            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.customer');
        }
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('admin.customer');
    }
}
