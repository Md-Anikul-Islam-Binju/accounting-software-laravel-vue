<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::latest()->get();
        return Inertia::render('Category/CategoryAddShow',compact('category'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
        ]);
        try{
            DB::beginTransaction();
            $category = Category::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            if(!empty($category)){
                DB::commit();
                return redirect()->route('admin.category');

            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.category');
        }
    }

    public function edit($id)
    {
        $category = Category::where('id',$id)->first();
        return Inertia::render('Category/CategoryUpdate',compact('category'));
    }


    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
        ]);
        try {
            $category = Category::find($id);
            if (empty($category)) {
                throw new \Exception('Failed!');
            }
            $updateCategory = $category->update([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            if (!empty($updateCategory)) {
                DB::commit();
                return redirect()->route('admin.category');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.category');
        }
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category');
    }
}
