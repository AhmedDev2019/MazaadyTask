<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Many To Many Relationship Between Department & Employee .
    public function employee_department()
    {
        return $this->belongsToMany(Employee::class , 'employee_department' /* pivot table */ );
    }

    // for each department there is a specific salary .
    public function salary()
    {
        return $this->belongsTo(Salary::class,'salary_id' /* foreign key in departments table */ );
    }
}
