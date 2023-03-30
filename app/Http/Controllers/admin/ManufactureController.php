<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Item;
use App\Models\admin\Manufacture;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ManufactureController extends Controller
{
    //Add Manufacture
    public function index()
    {
        $items = Item::latest()->get();
        return Inertia::render('Manufacture/ManufactureAdd',compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required',
            'qty' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $manufacture = Manufacture::create([
                'item_id' => $request->item_id,
                'qty' => $request->qty,
                'rate' => $request->rate,
                'voucher' => mt_rand(1000, 9999),
                'date' => $request->date,
                'total_cost' => $request->total_cost,
                'total' => $request->total,
                'details' => $request->details,
                'labour_cost' => $request->labour_cost,
                'other_cost' => $request->other_cost,
            ]);
            if(!empty($manufacture)){
                DB::commit();
                return redirect()->route('admin.manufacture.list');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.manufacture.list');
        }
    }

    //Show Manufacture
    public function manufactureList()
    {
        $manufacture = Manufacture::with('item')->latest()->get();
        return Inertia::render('Manufacture/ManufactureList',compact('manufacture'));
    }

    public function edit($id)
    {
        $items = Item::latest()->get();
        $manufacture = Manufacture::where('id',$id)->first();
        return Inertia::render('Manufacture/ManufactureUpdate',compact('items','manufacture'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'item_id' => 'required',
            'qty' => 'required',
        ]);
        try {
            $manufacture = Manufacture::find($id);
            if (empty($manufacture)) {
                throw new \Exception('Failed!');
            }
            $updateTransferManufacture = $manufacture->update([
                'item_id' => $request->item_id,
                'qty' => $request->qty,
                'rate' => $request->rate,
                'date' => $request->date,
                'total_cost' => $request->total_cost,
                'total' => $request->total,
                'details' => $request->details,
                'labour_cost' => $request->labour_cost,
                'other_cost' => $request->other_cost,
            ]);
            if (!empty($updateTransferManufacture)) {
                DB::commit();
                return redirect()->route('admin.manufacture.list');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.manufacture.list');
        }
    }

    public function destroy($id)
    {
        $manufacture = Manufacture::findOrFail($id);
        $manufacture->delete();
        return redirect()->route('admin.manufacture.list');
    }

    //Manufacture Voucher
    public function manufactureVoucher()
    {
        return Inertia::render('Manufacture/ManufactureVoucher');
    }
}
