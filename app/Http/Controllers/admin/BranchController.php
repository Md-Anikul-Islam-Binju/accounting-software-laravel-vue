<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Branch;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::latest()->get();
        return Inertia::render('Branch/BranchAddShow',compact('branches'));
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
            $branch = Branch::create([
                'name' => $request->name,
                'title'=> $request->title,
                'address' =>$request->address,
                'status' => $request->status,
            ]);
            if(!empty($branch)){
                DB::commit();
                return redirect()->route('admin.branch');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.branch');
        }
    }

    public function edit($id)
    {
        $branch = Branch::where('id',$id)->first();
        return Inertia::render('Branch/BranchUpdate',compact('branch'));
    }


    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'title' => 'required|max:50',
            'address' => 'required',
        ]);
        try {
            $branch = Branch::find($id);
            if (empty($branch)) {
                throw new \Exception('Failed!');
            }
            $updateBranch = $branch->update([
                'name' => $request->name,
                'title'=> $request->title,
                'address' =>$request->address,
                'status' => $request->status,
            ]);
            if (!empty($updateBranch)) {
                DB::commit();
                return redirect()->route('admin.branch');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.branch');
        }
    }


    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        return redirect()->route('admin.branch');
    }
}
