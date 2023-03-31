<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleReturn extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded=[];


    public function item()
    {
        return $this->belongsTo(Item::class,'item_id');
    }
}
