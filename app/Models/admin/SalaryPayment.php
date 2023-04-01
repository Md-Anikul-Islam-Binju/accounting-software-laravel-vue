<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalaryPayment extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = [];

    public function account()
    {
        return $this->belongsTo(Account::class,'form_account_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class,'to_employee_id');
    }



}
