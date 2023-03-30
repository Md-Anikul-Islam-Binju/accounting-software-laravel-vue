<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Branch;
use App\Models\admin\Item;
use App\Models\admin\Transfer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class TransferController extends Controller
{
    public function index()
    {
        $items = Item::latest()->get();
        $branch = Branch::latest()->get();
        return Inertia::render('Transfer/TransferAdd',compact('items','branch'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required',
            'branch_id' => 'required',
            'qty' => 'required',
            'grand_total' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $transfer = Transfer::create([
                'item_id' => $request->item_id,
                'branch_id' => $request->branch_id,
                'qty' => $request->qty,
                'rate' => $request->rate,
                'voucher' => mt_rand(1000, 9999),
                'total' => $request->total,
                'sub_total' => $request->sub_total,
                'transfer_cost' => $request->transfer_cost,
                'grand_total' => $request->grand_total,
            ]);
            if(!empty($transfer)){
                DB::commit();
                return redirect()->route('admin.transfer.list');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.transfer.list');
        }
    }

    public function transferList()
    {
        $transfer = Transfer::with('branch','item')->get();
        return Inertia::render('Transfer/TransferList',compact('transfer'));
    }

    public function edit($id)
    {
        $items = Item::latest()->get();
        $branch = Branch::latest()->get();
        $transfer = Transfer::where('id',$id)->first();
        return Inertia::render('Transfer/TransferUpdate',compact('items','branch','transfer'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'item_id' => 'required',
            'branch_id' => 'required',
            'qty' => 'required',
            'grand_total' => 'required',
        ]);
        try {
            $transfer = Transfer::find($id);
            if (empty($transfer)) {
                throw new \Exception('Failed!');
            }
            $updateTransfer = $transfer->update([
                'item_id' => $request->item_id,
                'branch_id' => $request->branch_id,
                'qty' => $request->qty,
                'rate' => $request->rate,
                'total' => $request->total,
                'sub_total' => $request->sub_total,
                'transfer_cost' => $request->transfer_cost,
                'grand_total' => $request->grand_total,
            ]);
            if (!empty($updateTransfer)) {
                DB::commit();
                return redirect()->route('admin.transfer.list');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.transfer.list');
        }
    }

    public function destroy($id)
    {
        $transfer = Transfer::findOrFail($id);
        $transfer->delete();
        return redirect()->route('admin.transfer.list');
    }

}
