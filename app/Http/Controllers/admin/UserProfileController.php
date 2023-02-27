<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Branch;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserProfileController extends Controller
{
    public function index()
    {
        $branches = Branch::latest()->get();
        $users = User::where('role',3)->with('branch')->latest()->get();
        return Inertia::render('User/UserProfileAddShow',compact('branches','users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:50',
            'password' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'email'=> $request->email,
                'role' =>$request->role,
                'branch_id' => $request->branch_id,
                'password' => Hash::make($request->password),
            ]);
            if(!empty($user)){
                DB::commit();
                return redirect()->route('admin.user.profile');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.user.profile');
        }
    }

    public function edit($id)
    {
        $branches = Branch::latest()->get();
        $user = User::where('id',$id)->first();
        return Inertia::render('User/UserProfileUpdate',compact('branches','user'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:50',
        ]);
        try {
            $user = User::find($id);
            if (empty($user)) {
                throw new \Exception('Failed!');
            }
            $updateUser = $user->update([
                'name' => $request->name,
                'email'=> $request->email,
                'role' =>$request->role,
                'branch_id' => $request->branch_id,
                'password' => Hash::make($request->password),
            ]);
            if (!empty($updateUser)) {
                DB::commit();
                return redirect()->route('admin.user.profile');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.user.profile');
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.profile');
    }
}
