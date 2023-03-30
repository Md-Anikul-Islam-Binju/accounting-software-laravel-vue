<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transfer extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded=[];

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class,'item_id');
    }
}
