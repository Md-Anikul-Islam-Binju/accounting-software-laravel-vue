<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\Item;
use App\Models\admin\Service;
use App\Models\admin\ServiceExpense;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ServiceController extends Controller
{
    //Add Service
    public function index()
    {
        $items = Item::latest()->get();
        return Inertia::render('Service/ServiceAdd',compact('items'));
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'item_id' => 'required',
            'customer_type' => 'required',
            'customer_name' => 'required',
            'phone' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $service = Service::create([
                'item_id' => $request->item_id,
                'customer_type' => $request->customer_type,
                'customer_name' => $request->customer_name,
                'phone' => $request->phone,
                'address' => $request->address,
                'details' => $request->details,
                'voucher' => mt_rand(1000, 9999),
                'qty' => $request->qty,
                'rate' => $request->rate,
                'date' => $request->date,
                'total' => $request->total,
                'discount' => $request->discount,
                'vat' => $request->vat,
                'sub_total' => $request->sub_total,
                'grand_total' => $request->grand_total,
                'institution' => $request->institution,
                'paid_amount' => $request->paid_amount,
                'due_amount' => $request->due_amount,
            ]);
            if(!empty($service)){
                DB::commit();
                return redirect()->route('admin.service.list');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.service.list');
        }
    }

    //Show Service
    public function serviceList()
    {
        $service = Service::with('item')->latest()->get();
        return Inertia::render('Service/ServiceList',compact('service'));
    }


    public function edit($id)
    {
        $items = Item::latest()->get();
        $service = Service::where('id',$id)->first();
        return Inertia::render('Service/ServiceUpdate',compact('items','service'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'item_id' => 'required',
            'customer_type' => 'required',
            'customer_name' => 'required',
            'phone' => 'required',
        ]);
        try {
            $service = Service::find($id);
            if (empty($service)) {
                throw new \Exception('Failed!');
            }
            $updateService = $service->update([
                'item_id' => $request->item_id,
                'customer_type' => $request->customer_type,
                'customer_name' => $request->customer_name,
                'phone' => $request->phone,
                'address' => $request->address,
                'details' => $request->details,
                'qty' => $request->qty,
                'rate' => $request->rate,
                'date' => $request->date,
                'total' => $request->total,
                'discount' => $request->discount,
                'vat' => $request->vat,
                'sub_total' => $request->sub_total,
                'grand_total' => $request->grand_total,
                'institution' => $request->institution,
                'paid_amount' => $request->paid_amount,
                'due_amount' => $request->due_amount,
            ]);
            if (!empty($updateService)) {
                DB::commit();
                return redirect()->route('admin.service.list');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.service.list');
        }
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('admin.service.list');
    }

    //Service Voucher
    public function serviceVoucher()
    {
        return Inertia::render('Service/ServiceVoucher');
    }




    //Add Service Expense
    public function serviceExpense()
    {
        $items = Item::latest()->get();
        return Inertia::render('Service/ServiceExpenseAdd',compact('items'));
    }
    //Show Purses Order
    public function serviceExpenseList()
    {
        $serviceExpense = ServiceExpense::with('item')->latest()->get();
        return Inertia::render('Service/ServiceExpenseList',compact('serviceExpense'));
    }

    public function storeServiceExpense(Request $request)
    {

        $validated = $request->validate([
            'item_id' => 'required',
            'supplier_type' => 'required',
            'supplier_name' => 'required',
            'phone' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $serviceExpense = ServiceExpense::create([
                'item_id' => $request->item_id,
                'supplier_type' => $request->supplier_type,
                'supplier_name' => $request->supplier_name,
                'phone' => $request->phone,
                'address' => $request->address,
                'details' => $request->details,
                'voucher' => mt_rand(1000, 9999),
                'qty' => $request->qty,
                'rate' => $request->rate,
                'date' => $request->date,
                'total' => $request->total,
                'discount' => $request->discount,
                'vat' => $request->vat,
                'sub_total' => $request->sub_total,
                'grand_total' => $request->grand_total,
                'institution' => $request->institution,
                'paid_amount' => $request->paid_amount,
                'due_amount' => $request->due_amount,
            ]);
            if(!empty($serviceExpense)){
                DB::commit();
                return redirect()->route('admin.service.expense.list');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.service.expense.list');
        }
    }



    public function editServiceExpense($id)
    {
        $items = Item::latest()->get();
        $serviceExpense = ServiceExpense::where('id',$id)->first();
        return Inertia::render('Service/ServiceExpenseUpdate',compact('items','serviceExpense'));
    }

    public function updateServiceExpense(Request $request,$id)
    {
        $validated = $request->validate([
            'item_id' => 'required',
            'supplier_type' => 'required',
            'supplier_name' => 'required',
            'phone' => 'required',
        ]);
        try {
            $serviceExpense = ServiceExpense::find($id);
            if (empty($serviceExpense)) {
                throw new \Exception('Failed!');
            }
            $updateServiceExpense = $serviceExpense->update([
                'item_id' => $request->item_id,
                'supplier_type' => $request->supplier_type,
                'supplier_name' => $request->supplier_name,
                'phone' => $request->phone,
                'address' => $request->address,
                'details' => $request->details,
                'qty' => $request->qty,
                'rate' => $request->rate,
                'date' => $request->date,
                'total' => $request->total,
                'discount' => $request->discount,
                'vat' => $request->vat,
                'sub_total' => $request->sub_total,
                'grand_total' => $request->grand_total,
                'institution' => $request->institution,
                'paid_amount' => $request->paid_amount,
                'due_amount' => $request->due_amount,
            ]);
            if (!empty($updateServiceExpense)) {
                DB::commit();
                return redirect()->route('admin.service.expense.list');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.service.expense.list');
        }
    }

    public function destroyServiceExpense($id)
    {
        $serviceExpense = ServiceExpense::findOrFail($id);
        $serviceExpense->delete();
        return redirect()->route('admin.service.expense.list');
    }




    //Purses Order Voucher
    public function serviceExpenseVoucher()
    {
        return Inertia::render('Service/ServiceExpenseVoucher');
    }
}
