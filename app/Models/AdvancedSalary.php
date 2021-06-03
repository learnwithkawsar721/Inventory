<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvancedSalary extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function employee(){
        return $this->belongsTo(Employee::class,'id','emp_id');
    }
}
