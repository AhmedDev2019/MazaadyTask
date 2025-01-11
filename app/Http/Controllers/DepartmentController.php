<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Salary;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::paginate(10);

        return view('departments.index' , compact('departments'));
    }

    public function create()
    {
        $salaries = Salary::all();

        return view('departments.create' , compact('salaries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departments',
            'salary_id' => 'required'
        ]);

        $department = new Department;
        $department->name = $request->name;
        $department->salary_id = $request->salary_id;
        $department->save();

        session()->flash('success' , 'Department Created Successfully');
        return redirect()->route('departments.index');
    }

    public function edit(Department $department)
    {
        $salaries = Salary::all();

        return view('departments.edit' , compact('department','salaries'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|unique:departments,name,' . $department->id,
            'salary_id' => 'required'
        ]);

        $department->name = $request->name;
        $department->salary_id = $request->salary_id;
        $department->save();

        session()->flash('success' , 'Department Updated Successfully');
        return redirect()->route('departments.index');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        session()->flash('success' , 'Department Deleted Successfully');
        return redirect()->route('departments.index');
    }
}
