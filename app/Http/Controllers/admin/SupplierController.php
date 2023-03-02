<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\Account;
use App\Models\admin\Supplier;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class SupplierController extends Controller
{
    public function index()
    {
        $account = Account::latest()->get();
        $suppliers = Supplier::with('supplier_form_account','supplier_to_account')->latest()->get();
        return Inertia::render('Supplier/SupplierAddShow',compact('account','suppliers'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'supplier_to_account_id' => 'required|max:50',
            'supplier_form_account_id' => 'required|max:50',
            'supplier_amount' => 'required|max:50',
            'supplier_date' => 'required|max:50',
        ]);
        try{
            DB::beginTransaction();
            $supplier = Supplier::create([
                'supplier_to_account_id' => $request->supplier_to_account_id,
                'supplier_form_account_id' => $request->supplier_form_account_id,
                'supplier_amount' => $request->supplier_amount,
                'supplier_date' => $request->supplier_date,
                'details' => $request->details,
                'supplier_entry_code' => mt_rand(1000, 9999),
            ]);
            if(!empty($supplier)){
                DB::commit();
                return redirect()->route('admin.supplier');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.supplier');
        }
    }

    public function edit($id)
    {
        $account = Account::latest()->get();
        $supplier = Supplier::where('id',$id)->first();
        return Inertia::render('Supplier/SupplierUpdate',compact('account','supplier'));
    }


    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'supplier_to_account_id' => 'required|max:50',
            'supplier_form_account_id' => 'required|max:50',
            'supplier_amount' => 'required|max:50',
            'supplier_date' => 'required|max:50',
        ]);
        try {
            $supplier = Supplier::find($id);
            if (empty($supplier)) {
                throw new \Exception('Failed!');
            }

            $updateSupplier = $supplier->update([
                'supplier_to_account_id' => $request->supplier_to_account_id,
                'supplier_form_account_id' => $request->supplier_form_account_id,
                'supplier_amount' => $request->supplier_amount,
                'supplier_date' => $request->supplier_date,
            ]);
            if (!empty($updateSupplier)) {
                DB::commit();
                return redirect()->route('admin.supplier');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.supplier');
        }
    }


    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('admin.supplier');
    }
}
