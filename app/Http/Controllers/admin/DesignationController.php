<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Designation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DesignationController extends Controller
{
    public function index()
    {
        $designation = Designation::latest()->get();
        return Inertia::render('Designation/DesignationAddShow',compact('designation'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
        ]);
        try{
            DB::beginTransaction();
            $designation = Designation::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            if(!empty($designation)){
                DB::commit();
                return redirect()->route('admin.designation');

            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.designation');
        }
    }

    public function edit($id)
    {
        $designation = Designation::where('id',$id)->first();
        return Inertia::render('Designation/DesignationUpdate',compact('designation'));
    }


    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
        ]);
        try {
            $designation = Designation::find($id);
            if (empty($designation)) {
                throw new \Exception('Failed!');
            }
            $updateDesignation = $designation->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            if (!empty($updateDesignation)) {
                DB::commit();
                return redirect()->route('admin.designation');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.designation');
        }
    }


    public function destroy($id)
    {
        $designation = Designation::findOrFail($id);
        $designation->delete();
        return redirect()->route('admin.designation');
    }
}
