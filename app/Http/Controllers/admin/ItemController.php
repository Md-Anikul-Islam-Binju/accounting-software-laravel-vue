<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use App\Models\admin\Group;
use App\Models\admin\Item;
use App\Models\admin\ItemAdjust;
use App\Models\admin\Unit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class ItemController extends Controller
{
    //Item
    public function index()
    {
        $items = Item::with('group','unit','category')->latest()->get();
        return Inertia::render('Item/ItemList',compact('items'));
    }

    public function create()
    {
        $group = Group::latest()->get();
        $category = Category::latest()->get();
        $unit = Unit::latest()->get();
        return Inertia::render('Item/ItemAdd',compact('group','category','unit'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_code' => 'required|max:50',
            'item_name' => 'required|max:50',
            'item_barcode' => 'required',
            'item_type' => 'required',
            'minimum_sale_qty' => 'required',
            'minimum_sale_rate' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $item = Item::create([
                'item_code' => $request->item_code,
                'item_name'=> $request->item_name,
                'item_barcode' =>$request->item_barcode,
                'group_id' => $request->group_id,
                'category_id' => $request->category_id,
                'unit_id'=> $request->unit_id,
                'item_type' =>$request->item_type,
                'details' => $request->details,
                'minimum_sale_qty' => $request->minimum_sale_qty,
                'minimum_sale_rate'=> $request->minimum_sale_rate,
                'purchases_rate' =>$request->purchases_rate,
                'default_sale_rate' => $request->default_sale_rate,
                'wholesale_rate' => $request->wholesale_rate,
                'retailer_rate'=> $request->retailer_rate,
                'corporate_rate' =>$request->corporate_rate,
                'distributor_rate' => $request->distributor_rate,
                'discount_rate'=> $request->discount_rate,
                'vat' =>$request->vat,
                'status' => $request->status,
            ]);
            if(!empty($item)){
                DB::commit();
                return redirect()->route('admin.item.list');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.item.list');
        }
    }

    public function edit($id)
    {
        $group = Group::latest()->get();
        $category = Category::latest()->get();
        $unit = Unit::latest()->get();
        $item = Item::where('id',$id)->first();
        return Inertia::render('Item/ItemUpdate',compact('group','category','unit','item'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'item_code' => 'required|max:50',
            'item_name' => 'required|max:50',
            'item_barcode' => 'required',
            'item_type' => 'required',
            'minimum_sale_qty' => 'required',
            'minimum_sale_rate' => 'required',
        ]);
        try {
            $item = Item::find($id);
            if (empty($item)) {
                throw new \Exception('Failed!');
            }
            $updateItem = $item->update([
                'item_code' => $request->item_code,
                'item_name'=> $request->item_name,
                'item_barcode' =>$request->item_barcode,
                'group_id' => $request->group_id,
                'category_id' => $request->category_id,
                'unit_id'=> $request->unit_id,
                'item_type' =>$request->item_type,
                'details' => $request->details,
                'minimum_sale_qty' => $request->minimum_sale_qty,
                'minimum_sale_rate'=> $request->minimum_sale_rate,
                'purchases_rate' =>$request->purchases_rate,
                'default_sale_rate' => $request->default_sale_rate,
                'wholesale_rate' => $request->wholesale_rate,
                'retailer_rate'=> $request->retailer_rate,
                'corporate_rate' =>$request->corporate_rate,
                'distributor_rate' => $request->distributor_rate,
                'discount_rate'=> $request->discount_rate,
                'vat' =>$request->vat,
                'status' => $request->status,
            ]);
            if (!empty($updateItem)) {
                DB::commit();
                return redirect()->route('admin.item.list');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.item.list');
        }
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.item.list');
    }



    //Item Adjustment
    public function itemAdjustment()
    {
        $items = Item::latest()->get();
        return Inertia::render('Item/ItemAdjustAdd',compact('items'));
    }

    public function itemAdjustmentStore(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required',
            'qty' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $itemAdjustment = ItemAdjust::create([
                'item_id' => $request->item_id,
                'qty' => $request->qty,
                'rate' => $request->rate,
                'voucher' => mt_rand(1000, 9999),
                'total' => $request->total,
                'sub_total' => $request->sub_total,
                'date' => $request->date,
            ]);
            if(!empty($itemAdjustment)){
                DB::commit();
                return redirect()->route('admin.item.adjustment.report');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.item.adjustment.report');
        }
    }

    public function itemAdjustmentReport()
    {
        $itemAdjustments = ItemAdjust::with('item')->latest()->get();
        return Inertia::render('Item/ItemAdjustReport',compact('itemAdjustments'));
    }

    public function itemAdjustmentEdit($id)
    {
        $items = Item::latest()->get();
        $itemAdjustments = ItemAdjust::where('id',$id)->first();
        return Inertia::render('Item/ItemAdjustUpdate',compact('itemAdjustments','items'));
    }

    public function itemAdjustmentUpdate(Request $request,$id)
    {
        $validated = $request->validate([
            'item_id' => 'required',
            'qty' => 'required',
        ]);
        try {
            $itemAdjustments = ItemAdjust::find($id);
            if (empty($itemAdjustments)) {
                throw new \Exception('Failed!');
            }
            $updateItemAdjustments = $itemAdjustments->update([
                'item_id' => $request->item_id,
                'qty' => $request->qty,
                'rate' => $request->rate,
                'total' => $request->total,
                'sub_total' => $request->sub_total,
                'date' => $request->date,
            ]);
            if (!empty($updateItemAdjustments)) {
                DB::commit();
                return redirect()->route('admin.item.adjustment.report');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.item.adjustment.report');
        }
    }

    public function itemAdjustmentDelete($id)
    {
        $itemAdjustments = ItemAdjust::findOrFail($id);
        $itemAdjustments->delete();
        return redirect()->route('admin.item.adjustment.report');
    }



}
