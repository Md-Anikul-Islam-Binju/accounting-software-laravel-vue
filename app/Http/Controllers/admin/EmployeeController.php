<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Department;
use App\Models\admin\Designation;
use App\Models\admin\Employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    public function index()
    {
        $department = Department::latest()->get();
        $designation = Designation::latest()->get();
        $employee = Employee::with('department','designation')->latest()->get();
        return Inertia::render('Employee/EmployeeAddShow',compact('designation','department','employee'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required',
            'phone' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $employee = Employee::create([
                'name' => $request->name,
                'salary'=> $request->salary,
                'account_number' =>$request->account_number,
                'account_name' => $request->account_name,
                'branch' => $request->branch,
                'ifsc_code'=> $request->ifsc_code,
                'present_address' =>$request->present_address,
                'permanent_address' => $request->permanent_address,
                'phone' => $request->phone,
                'email'=> $request->email,
                'nid' =>$request->nid,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'join_date'=> $request->join_date,
                'department_id' =>$request->department_id,
                'designation_id' => $request->designation_id,
                'target_amount' => $request->target_amount,
                'commission'=> $request->commission,
                'gender' =>$request->gender,
                'marital_status' => $request->marital_status,
                'employee_uniq_code' => random_int(1000, 9999),
                'status'=> $request->status,
            ]);
            if(!empty($employee)){
                DB::commit();
                return redirect()->route('admin.employee');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.employee');
        }
    }

    public function edit($id)
    {
        $department = Department::latest()->get();
        $designation = Designation::latest()->get();
        $employee = Employee::where('id',$id)->with('department','designation')->latest()->first();
        return Inertia::render('Employee/EmployeeUpdate',compact('designation','department','employee'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required',
            'phone' => 'required',
        ]);
        try {
            $employee = Employee::find($id);
            if (empty($employee)) {
                throw new \Exception('Failed!');
            }
            $updateEmployee = $employee->update([
                'name' => $request->name,
                'salary'=> $request->salary,
                'account_number' =>$request->account_number,
                'account_name' => $request->account_name,
                'branch' => $request->branch,
                'ifsc_code'=> $request->ifsc_code,
                'present_address' =>$request->present_address,
                'permanent_address' => $request->permanent_address,
                'phone' => $request->phone,
                'email'=> $request->email,
                'nid' =>$request->nid,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'join_date'=> $request->join_date,
                'department_id' =>$request->department_id,
                'designation_id' => $request->designation_id,
                'target_amount' => $request->target_amount,
                'commission'=> $request->commission,
                'gender' =>$request->gender,
                'marital_status' => $request->marital_status,
                'status'=> $request->status,
            ]);
            if (!empty($updateEmployee)) {
                DB::commit();
                return redirect()->route('admin.employee');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.employee');
        }
    }


    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('admin.employee');
    }
}
