<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes, HasFactory;
    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class,'designation_id');
    }
}
