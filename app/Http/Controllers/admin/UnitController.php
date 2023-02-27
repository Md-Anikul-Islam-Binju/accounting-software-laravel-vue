<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\Unit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::latest()->get();
        return Inertia::render('Unit/UnitAddShow',compact('units'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:50',
        ]);
        try{
            DB::beginTransaction();
            $unit = Unit::create([
                'name' => $request->name,
                'symbol'=> $request->name,
                'type' =>$request->type,
                'status' => $request->status,
            ]);
            if(!empty($unit)){
                DB::commit();
                return redirect()->route('admin.unit');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.unit');
        }
    }

    public function edit($id)
    {
        $unit = Unit::where('id',$id)->first();
        return Inertia::render('Unit/UnitUpdate',compact('unit'));
    }


    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
        ]);
        try {
            $unit = Unit::find($id);
            if (empty($unit)) {
                throw new \Exception('Failed!');
            }
            $updateUnit = $unit->update([
                'name' => $request->name,
                'symbol'=> $request->name,
                'type' =>$request->type,
                'status' => $request->status,
            ]);
            if (!empty($updateUnit)) {
                DB::commit();
                return redirect()->route('admin.unit');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.unit');
        }
    }


    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();
        return redirect()->route('admin.unit');
    }
}
