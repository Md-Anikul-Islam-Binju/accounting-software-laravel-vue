<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\CompanyProfile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class CompanyProfileController extends Controller
{
    public function index()
    {
        $company = CompanyProfile::latest()->get();
        return Inertia::render('Company/CompanyProfileAddShow',compact('company'));
    }

    //Company Profile Store
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'logo' => 'mimes:jpeg,bmp,png'
        ]);
        try{
            DB::beginTransaction();
            if ($request->hasFile('logo'))
            {
                $imageName = time().'.'.$request->logo->extension();
                $request->logo->storeAs('public/company-profile', $imageName);
                $company = CompanyProfile::create([
                    'name' => $request->name,
                    'details' => $request->details,
                    'invoice' => $request->invoice,
                    'currency' => $request->currency,
                    'ware_house' => $request->ware_house,
                    'serial_item' => $request->serial_item,
                    'voucher_receipt' => $request->voucher_receipt,
                    'discount_value' => $request->discount_value,
                    'logo' => $imageName,
                ]);
            }
            if(!empty($company)){
                DB::commit();
                return redirect()->route('admin.company.profile');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.company.profile');
        }
    }

    //Company Profile Edit
    public function edit($id)
    {
        $company = CompanyProfile::where('id',$id)->first();
        return Inertia::render('Company/CompanyProfileUpdate',compact('company'));
    }

    //Company Profile Update
    public function update(Request $request,$id)
    {

        try {
            $company = CompanyProfile::find($id);
            if (empty($company)) {
                throw new \Exception('Failed!');
            }
            $imageName = time().'.'.$request->logo->extension();
            $request->logo->storeAs('public/company-profile', $imageName);
            $updateCompany = $company->update([
                'name' => $request->name,
                'details' => $request->details,
                'invoice' => $request->invoice,
                'currency' => $request->currency,
                'ware_house' => $request->ware_house,
                'serial_item' => $request->serial_item,
                'voucher_receipt' => $request->voucher_receipt,
                'discount_value' => $request->discount_value,
                'logo' => $imageName,
            ]);

            if (!empty($updateCompany)) {
                DB::commit();
                return redirect()->route('admin.company.profile');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.company.profile');
        }
    }

    //Company Profile Delete
    public function destroy($id)
    {
        $company = CompanyProfile::findOrFail($id);
        Storage::delete('public/company-profile/' . $company->logo);
        $company->delete();
        return redirect()->route('admin.company.profile');
    }
}
