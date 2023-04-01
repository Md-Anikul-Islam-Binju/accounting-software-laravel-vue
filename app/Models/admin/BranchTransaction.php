<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BranchTransaction extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = [];

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function to_account()
    {
        return $this->belongsTo(Account::class,'branch_account_id',);
    }

    public function form_account()
    {
        return $this->belongsTo(Account::class,'account_id',);
    }
}
