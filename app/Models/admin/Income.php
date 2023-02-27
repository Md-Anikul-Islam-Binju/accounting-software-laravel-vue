<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = [];

    public function form_account()
    {
        return $this->belongsTo(Account::class,'recipe_form_account_id');
    }
    public function to_account()
    {
        return $this->belongsTo(Account::class,'recipe_to_account_id');
    }
}
