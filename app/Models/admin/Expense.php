<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = [];

    public function expense_form_account()
    {
        return $this->belongsTo(Account::class,'expense_paid_form_account_id');
    }
    public function expense_to_account()
    {
        return $this->belongsTo(Account::class,'expense_paid_to_account_id');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }
}
