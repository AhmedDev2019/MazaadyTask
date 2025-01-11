<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Many To Many Relationship Between Employee & Department .
    public function employee_department()
    {
        return $this->belongsToMany(Department::class , 'employee_department' /* pivot table */ );
    }
}
