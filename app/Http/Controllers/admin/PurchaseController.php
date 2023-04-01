<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Item;
use App\Models\admin\Purchase;
use App\Models\admin\PurchaseReturn;
use Exception;
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
        $items = Item::latest()->get();
        return Inertia::render('Purchase/PurchaseReturnAdd',compact('items'));
    }
    public function storePurchaseReturn(Request $request)
    {

        $validated = $request->validate([
            'item_id' => 'required',
            'supplier_type' => 'required',
            'supplier_name' => 'required',
            'phone' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $purchaseReturn = PurchaseReturn::create([
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
            ]);
            if(!empty($purchaseReturn)){
                DB::commit();
                return redirect()->route('admin.purchase.return.list');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.purchase.rreturn.list');
        }
    }

    //Show Purchase Return
    public function purchaseReturnList()
    {
        $purchaseReturn = PurchaseReturn::with('item')->latest()->get();
        return Inertia::render('Purchase/PurchaseReturnList',compact('purchaseReturn'));
    }



    public function editPurchaseReturn($id)
    {
        $items = Item::latest()->get();
        $purchaseReturn = PurchaseReturn::where('id',$id)->first();
        return Inertia::render('Purchase/PurchaseReturnUpdate',compact('items','purchaseReturn'));
    }

    public function updatePurchaseReturn(Request $request,$id)
    {
        $validated = $request->validate([
            'item_id' => 'required',
            'supplier_type' => 'required',
            'supplier_name' => 'required',
            'phone' => 'required',
        ]);
        try {
            $purchaseReturn = PurchaseReturn::find($id);
            if (empty($purchaseReturn)) {
                throw new \Exception('Failed!');
            }
            $updatePurchaseReturn = $purchaseReturn->update([
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
            ]);
            if (!empty($updatePurchaseReturn)) {
                DB::commit();
                return redirect()->route('admin.purchase.return.list');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.purchase.return.list');
        }
    }

    public function destroyPurchaseReturn($id)
    {
        $purchaseReturn = PurchaseReturn::findOrFail($id);
        $purchaseReturn->delete();
        return redirect()->route('admin.purchase.return.list');
    }


}
