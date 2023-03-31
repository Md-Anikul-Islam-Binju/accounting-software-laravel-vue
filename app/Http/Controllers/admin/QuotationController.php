<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Item;
use App\Models\admin\Quotation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class QuotationController extends Controller
{

    public function index()
    {
        $items = Item::latest()->get();
        return Inertia::render('Quotation/QuotationAdd',compact('items'));
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
            $quotation = Quotation::create([
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
                'quotation_number' => $request->quotation_number,
                'sub_total' => $request->sub_total,
                'transport_cost' => $request->transport_cost,
                'grand_total' => $request->grand_total,
                'institution' => $request->institution,

            ]);
            if(!empty($quotation)){
                DB::commit();
                return redirect()->route('admin.quotation.list');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.quotation.list');
        }
    }

    public function quotationList()
    {
        $quotations = Quotation::with('item')->latest()->get();
        return Inertia::render('Quotation/QuotationList',compact('quotations'));
    }

    public function edit($id)
    {
        $items = Item::latest()->get();
        $quotation = Quotation::where('id',$id)->first();
        return Inertia::render('Quotation/QuotationUpdate',compact('items','quotation'));
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
            $quotation = Quotation::find($id);
            if (empty($quotation)) {
                throw new \Exception('Failed!');
            }
            $updateQuotation = $quotation->update([
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
                'quotation_number' => $request->quotation_number,
                'sub_total' => $request->sub_total,
                'transport_cost' => $request->transport_cost,
                'grand_total' => $request->grand_total,
                'institution' => $request->institution,
            ]);
            if (!empty($updateQuotation)) {
                DB::commit();
                return redirect()->route('admin.quotation.list');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.quotation.list');
        }
    }

    public function destroy($id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->delete();
        return redirect()->route('admin.quotation.list');
    }
}
