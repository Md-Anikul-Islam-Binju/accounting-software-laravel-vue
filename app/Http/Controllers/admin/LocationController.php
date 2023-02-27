<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\Location;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class LocationController extends Controller
{
    public function location()
    {
        $location  = Location::latest()->get();
        return Inertia::render('Location/LocationAddShow',compact('location'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
        ]);
        try{
            DB::beginTransaction();
            $location = Location::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            if(!empty($location)){
                DB::commit();
                return redirect()->route('admin.location');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.location');
        }
    }

    public function edit($id)
    {
        $location = Location::where('id',$id)->first();
        return Inertia::render('Location/LocationUpdate',compact('location'));
    }


    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
        ]);
        try {
            $location = Location::find($id);
            if (empty($location)) {
                throw new \Exception('Failed!');
            }
            $updateLocation = $location->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            if (!empty($updateLocation)) {
                DB::commit();
                return redirect()->route('admin.location');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.location');
        }
    }


    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return redirect()->route('admin.location');
    }

}
