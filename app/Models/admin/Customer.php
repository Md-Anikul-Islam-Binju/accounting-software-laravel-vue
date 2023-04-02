<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded=[];
    public function form_account()
    {
        return $this->belongsTo(Account::class,'form_account_id');
    }

    public function to_account()
    {
        return $this->belongsTo(Account::class,'to_account_id');
    }
}
