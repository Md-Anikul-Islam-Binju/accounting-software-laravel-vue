<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Item;
use App\Models\admin\PurchaseOrder;
use App\Models\admin\SaleOrder;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class OrderController extends Controller
{

    public function index()
    {
        $items = Item::latest()->get();
        return Inertia::render('Order/SaleOrderAdd',compact('items'));
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
            $saleOrder = SaleOrder::create([
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
                'order_number' => $request->order_number,
                'sub_total' => $request->sub_total,
                'transport_cost' => $request->transport_cost,
                'grand_total' => $request->grand_total,
                'institution' => $request->institution,

            ]);
            if(!empty($saleOrder)){
                DB::commit();
                return redirect()->route('admin.sale.order.list');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.sale.order.list');
        }
    }

    public function saleOrderList()
    {
        $saleOrder = SaleOrder::with('item')->latest()->get();
        return Inertia::render('Order/SaleOrderList',compact('saleOrder'));
    }

    public function edit($id)
    {
        $items = Item::latest()->get();
        $saleOrder = SaleOrder::where('id',$id)->first();
        return Inertia::render('Order/SaleOrderUpdate',compact('items','saleOrder'));
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
            $saleOrder = SaleOrder::find($id);
            if (empty($saleOrder)) {
                throw new \Exception('Failed!');
            }
            $updateSaleOrder = $saleOrder->update([
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
                'order_number' => $request->order_number,
                'sub_total' => $request->sub_total,
                'transport_cost' => $request->transport_cost,
                'grand_total' => $request->grand_total,
                'institution' => $request->institution,
            ]);
            if (!empty($updateSaleOrder)) {
                DB::commit();
                return redirect()->route('admin.sale.order.list');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.sale.order.list');
        }
    }

    public function destroy($id)
    {
        $saleOrder = SaleOrder::findOrFail($id);
        $saleOrder->delete();
        return redirect()->route('admin.sale.order.list');
    }

    //Sale Order Voucher
    public function saleOrderVoucher()
    {
        return Inertia::render('Order/SaleOrderVoucher');
    }




    //Add Purses Order
    public function pursesOrder()
    {
        $items = Item::latest()->get();
        return Inertia::render('Order/PursesOrderAdd',compact('items'));
    }

    public function storePursesOrder(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required',
            'supplier_type' => 'required',
            'supplier_name' => 'required',
            'phone' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $pursesOrder = PurchaseOrder::create([
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
                'order_number' => $request->order_number,
                'sub_total' => $request->sub_total,
                'transport_cost' => $request->transport_cost,
                'grand_total' => $request->grand_total,
                'institution' => $request->institution,

            ]);
            if(!empty($pursesOrder)){
                DB::commit();
                return redirect()->route('admin.purses.order.list');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.purses.order.list');
        }
    }

    //Show Purses Order
    public function pursesOrderList()
    {
        $pursesOrder = PurchaseOrder::with('item')->latest()->get();
        return Inertia::render('Order/PursesOrderList',compact('pursesOrder'));
    }

    public function editPursesOrder($id)
    {
        $items = Item::latest()->get();
        $pursesOrder = PurchaseOrder::where('id',$id)->first();
        return Inertia::render('Order/PursesOrderUpdate',compact('items','pursesOrder'));
    }

    public function updatePursesOrder(Request $request,$id)
    {
        $validated = $request->validate([
            'item_id' => 'required',
            'supplier_type' => 'required',
            'supplier_name' => 'required',
            'phone' => 'required',
        ]);
        try {
            $pursesOrder = PurchaseOrder::find($id);
            if (empty($pursesOrder)) {
                throw new \Exception('Failed!');
            }
            $updatePursesOrder = $pursesOrder->update([
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
                'order_number' => $request->order_number,
                'sub_total' => $request->sub_total,
                'transport_cost' => $request->transport_cost,
                'grand_total' => $request->grand_total,
                'institution' => $request->institution,
            ]);
            if (!empty($updatePursesOrder)) {
                DB::commit();
                return redirect()->route('admin.purses.order.list');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.purses.order.list');
        }
    }

    public function destroyPursesOrder($id)
    {
        $pursesOrder = PurchaseOrder::findOrFail($id);
        $pursesOrder->delete();
        return redirect()->route('admin.purses.order.list');
    }

    //Purses Order Voucher
    public function pursesOrderVoucher()
    {
        return Inertia::render('Order/PursesOrderVoucher');
    }
}
