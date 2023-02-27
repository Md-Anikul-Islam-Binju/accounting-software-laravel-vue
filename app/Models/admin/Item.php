<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded=[];

    public function group()
    {
        return $this->belongsTo(Group::class,'group_id');
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

}
