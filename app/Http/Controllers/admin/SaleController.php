<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Item;
use App\Models\admin\Sale;
use App\Models\admin\SaleReturn;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class SaleController extends Controller
{
    //Sale
    public function index()
    {
        $items = Item::latest()->get();
        return Inertia::render('Sale/SaleAdd',compact('items'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'item_id' => 'required',
            'customer_type' => 'required',
            'customer_name' => 'required',
            'phone' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $sale = Sale::create([
                'item_id' => $request->item_id,
                'customer_type' => $request->customer_type,
                'customer_name' => $request->customer_name,
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
                'transport_cost' => $request->transport_cost,
                'grand_total' => $request->grand_total,
                'institution' => $request->institution,
                'paid_amount' => $request->paid_amount,
                'due_amount' => $request->due_amount,
                'previous_due_amount' => $request->previous_due_amount,

            ]);
            if(!empty($sale)){
                DB::commit();
                return redirect()->route('admin.sale.list');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.sale.list');
        }
    }

    public function saleList()
    {
        $sale = Sale::with('item')->latest()->get();
        return Inertia::render('Sale/SaleList',compact('sale'));
    }

    public function edit($id)
    {
        $items = Item::latest()->get();
        $sale = Sale::where('id',$id)->first();
        return Inertia::render('Sale/SaleUpdate',compact('items','sale'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'item_id' => 'required',
            'customer_type' => 'required',
            'customer_name' => 'required',
            'phone' => 'required',
        ]);
        try {
            $sale = Sale::find($id);
            if (empty($sale)) {
                throw new \Exception('Failed!');
            }
            $updateSale = $sale->update([
                'item_id' => $request->item_id,
                'customer_type' => $request->customer_type,
                'customer_name' => $request->customer_name,
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
                'transport_cost' => $request->transport_cost,
                'grand_total' => $request->grand_total,
                'institution' => $request->institution,
                'paid_amount' => $request->paid_amount,
                'due_amount' => $request->due_amount,
                'previous_due_amount' => $request->previous_due_amount,
            ]);
            if (!empty($updateSale)) {
                DB::commit();
                return redirect()->route('admin.sale.list');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.sale.list');
        }
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();
        return redirect()->route('admin.sale.list');
    }





    //Sale Return
    public function saleReturnAdd()
    {
        $items = Item::latest()->get();
        return Inertia::render('Sale/SaleReturnAdd',compact('items'));
    }


    public function storeSaleReturn(Request $request)
    {

        $validated = $request->validate([
            'item_id' => 'required',
            'customer_type' => 'required',
            'customer_name' => 'required',
            'phone' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $saleReturn = SaleReturn::create([
                'item_id' => $request->item_id,
                'customer_type' => $request->customer_type,
                'customer_name' => $request->customer_name,
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
            if(!empty($saleReturn)){
                DB::commit();
                return redirect()->route('admin.sale.return.list');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.sale.return.list');
        }
    }

    public function saleReturnList()
    {
        $saleReturn = SaleReturn::with('item')->latest()->get();
        return Inertia::render('Sale/SaleReturnList',compact('saleReturn'));
    }



    public function editSaleReturn($id)
    {
        $items = Item::latest()->get();
        $saleReturn = SaleReturn::where('id',$id)->first();
        return Inertia::render('Sale/SaleReturnUpdate',compact('items','saleReturn'));
    }

    public function updateSaleReturn(Request $request,$id)
    {
        $validated = $request->validate([
            'item_id' => 'required',
            'customer_type' => 'required',
            'customer_name' => 'required',
            'phone' => 'required',
        ]);
        try {
            $saleReturn = SaleReturn::find($id);
            if (empty($saleReturn)) {
                throw new \Exception('Failed!');
            }
            $updateSaleReturn = $saleReturn->update([
                'item_id' => $request->item_id,
                'customer_type' => $request->customer_type,
                'customer_name' => $request->customer_name,
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
            if (!empty($updateSaleReturn)) {
                DB::commit();
                return redirect()->route('admin.sale.return.list');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.sale.return.list');
        }
    }

    public function destroySaleReturn($id)
    {
        $saleReturn = SaleReturn::findOrFail($id);
        $saleReturn->delete();
        return redirect()->route('admin.sale.return.list');
    }


}
