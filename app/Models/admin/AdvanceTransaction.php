<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvanceTransaction extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = [];

    public function account()
    {
        return $this->belongsTo(Account::class,'account_id');
    }
}
