<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Group;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::latest()->get();
        return Inertia::render('Group/GroupAddShow',compact('groups'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
        ]);
        try{
            DB::beginTransaction();
            $group = Group::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            if(!empty($group)){
                DB::commit();
                return redirect()->route('admin.group');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.group');
        }
    }

    public function edit($id)
    {
        $group = Group::where('id',$id)->first();
        return Inertia::render('Group/GroupUpdate',compact('group'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
        ]);
        try {
            $group = Group::find($id);
            if (empty($group)) {
                throw new \Exception('Failed!');
            }
            $updateGroup = $group->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            if (!empty($updateGroup)) {
                DB::commit();
                return redirect()->route('admin.group');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.group');
        }
    }

    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();
        return redirect()->route('admin.group');
    }
}
