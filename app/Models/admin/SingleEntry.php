<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SingleEntry extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded=[];

    public function single_entry_form_account()
    {
        return $this->belongsTo(Account::class,'form_account_id');
    }
    public function single_entry_to_account()
    {
        return $this->belongsTo(Account::class,'to_account_id');
    }
}
