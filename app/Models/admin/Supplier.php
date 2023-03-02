<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'supplier_to_account_id',
        'supplier_form_account_id',
        'supplier_amount',
        'supplier_date',
        'details',
        'supplier_entry_code',
    ];

    public function supplier_form_account()
    {
        return $this->belongsTo(Account::class,'supplier_form_account_id');
    }
    public function supplier_to_account()
    {
        return $this->belongsTo(Account::class,'supplier_to_account_id');
    }
}
