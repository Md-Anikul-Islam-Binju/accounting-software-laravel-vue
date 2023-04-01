<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Item;
use App\Models\admin\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PurchaseController extends Controller
{
    //Add Purchase
    public function index()
    {
        $items = Item::latest()->get();
        return Inertia::render('Purchase/PurchaseAdd',compact('items'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'item_id' => 'required',
            'supplier_type' => 'required',
            'supplier_name' => 'required',
            'phone' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $purchase = Purchase::create([
                'item_id' => $request->item_id,
                'supplier_type' => $request->supplier_type,
                'supplier_name' => $request->supplier_name,
                'phone' => $request->phone,
                'address' => $request->address,
                'details' => $request->details,
                'voucher' => mt_rand(1000, 9999),
                'qty' => $request->qty,
                'rate' => $request->rate,
                'date' => $request->date,
                'total' => $request->total,
                'discount' => $request->discount,
                'vat' => $request->vat,
                'sub_total' => $request->sub_total,
                'grand_total' => $request->grand_total,
                'institution' => $request->institution,
                'paid_amount' => $request->paid_amount,
                'due_amount' => $request->due_amount,
                'transport_cost'  => $request->transport_cost,
            ]);
            if(!empty($purchase)){
                DB::commit();
                return redirect()->route('admin.purchase.list');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.purchase.list');
        }
    }

    //Show Purchase
    public function purchaseList()
    {
        $purchase = Purchase::with('item')->latest()->get();
        return Inertia::render('Purchase/PurchaseList',compact('purchase'));
    }


    public function edit($id)
    {
        $items = Item::latest()->get();
        $purchase = Purchase::where('id',$id)->first();
        return Inertia::render('Purchase/PurchaseUpdate',compact('items','purchase'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'item_id' => 'required',
            'supplier_type' => 'required',
            'supplier_name' => 'required',
            'phone' => 'required',
        ]);
        try {
            $purchase = Purchase::find($id);
            if (empty($purchase)) {
                throw new \Exception('Failed!');
            }
            $updatePurchase = $purchase->update([
                'item_id' => $request->item_id,
                'supplier_type' => $request->supplier_type,
                'supplier_name' => $request->supplier_name,
                'phone' => $request->phone,
                'address' => $request->address,
                'details' => $request->details,
                'qty' => $request->qty,
                'rate' => $request->rate,
                'date' => $request->date,
                'total' => $request->total,
                'discount' => $request->discount,
                'vat' => $request->vat,
                'sub_total' => $request->sub_total,
                'grand_total' => $request->grand_total,
                'institution' => $request->institution,
                'paid_amount' => $request->paid_amount,
                'due_amount' => $request->due_amount,
                'transport_cost'  => $request->transport_cost,
            ]);
            if (!empty($updatePurchase)) {
                DB::commit();
                return redirect()->route('admin.purchase.list');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.purchase.list');
        }
    }

    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();
        return redirect()->route('admin.purchase.list');
    }




    //Add Purchase Return
    public function purchaseReturn()
    {
        return Inertia::render('Purchase/PurchaseReturnAdd');
    }
    //Show Purchase Return
    public function purchaseReturnList()
    {
        return Inertia::render('Purchase/PurchaseReturnList');
    }

}
