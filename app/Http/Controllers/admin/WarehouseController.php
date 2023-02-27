<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\Warehouse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::latest()->get();
        return Inertia::render('Warehouse/WarehouseAddShow',compact('warehouses'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'title' => 'required|max:50',
            'address' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $warehouse = Warehouse::create([
                'name' => $request->name,
                'title'=> $request->title,
                'address' =>$request->address,
                'status' => $request->status,
            ]);
            if(!empty($warehouse)){
                DB::commit();
                return redirect()->route('admin.warehouse');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.warehouse');
        }
    }

    public function edit($id)
    {
        $warehouse = Warehouse::where('id',$id)->first();
        return Inertia::render('Warehouse/WarehouseUpdate',compact('warehouse'));
    }


    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'title' => 'required|max:50',
            'address' => 'required',
        ]);
        try {
            $warehouse = Warehouse::find($id);
            if (empty($warehouse)) {
                throw new \Exception('Failed!');
            }
            $updateWarehouse = $warehouse->update([
                'name' => $request->name,
                'title'=> $request->title,
                'address' =>$request->address,
                'status' => $request->status,
            ]);
            if (!empty($updateWarehouse)) {
                DB::commit();
                return redirect()->route('admin.warehouse');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.warehouse');
        }
    }


    public function destroy($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        $warehouse->delete();
        return redirect()->route('admin.warehouse');
    }
}
