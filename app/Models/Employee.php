<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded=[];
     public function advanced(){
        return $this->hasMany(AdvancedSalary::class,'id','emp_id');
    }
}
