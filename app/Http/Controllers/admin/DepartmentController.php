<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Department;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = Department::latest()->get();
        return Inertia::render('Department/DepartmentAddShow',compact('department'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
        ]);
        try{
            DB::beginTransaction();
            $department = Department::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            if(!empty($department)){
                DB::commit();
                return redirect()->route('admin.department');

            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.department');
        }
    }

    public function edit($id)
    {
        $department = Department::where('id',$id)->first();
        return Inertia::render('Department/DepartmentUpdate',compact('department'));
    }


    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
        ]);
        try {
            $department = Department::find($id);
            if (empty($department)) {
                throw new \Exception('Failed!');
            }
            $updateDepartment = $department->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            if (!empty($updateDepartment)) {
                DB::commit();
                return redirect()->route('admin.department');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.department');
        }
    }


    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->route('admin.department');
    }
}
