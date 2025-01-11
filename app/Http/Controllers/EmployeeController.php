<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {

        $employees = Employee::query();

        if( $request->number >= 3 || $request->number <= 50 ){
            foreach($employees as $employee){
                dd($employee);
            }
        }

        $employees = $employees->paginate(10);

        return view('employees.index' , compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();

        return view('employees.create' , compact('departments'));
    }

    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'phone' => 'required|unique:employees',
            'age' => 'required',
            'department_id' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg,webp',
        ]);

        $employee = new Employee;
        if( $request->image ){
            $image = $request->image;
            $image_new_name = time() . '_' . $image->getClientOriginalName();
            $image->move('uploads/employees/' , $image_new_name);
            $employee->image = 'uploads/employees/' . $image_new_name;
        }
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->age = $request->age;
        $employee->save();

        // Attach departments to employee .
        $employee->employee_department()->attach($request->department_id);

        session()->flash('success' , 'Department Created Successfully');
        return redirect()->route('employees.index');
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();

        return view('employees.edit' , compact('employee','departments'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'required|unique:employees,phone,' . $employee->id,
            'age' => 'required',
            'department_id' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg,webp',
        ]);

        if( $request->image ){
            if( $employee->image != 'uploads/employees/default.png' && file_exists($employee->image) ){
                unlink($employee->image);
            }
            $image = $request->image;
            $image_new_name = time() . '_' . $image->getClientOriginalName();
            $image->move('uploads/employees/' , $image_new_name);
            $employee->image = 'uploads/employees/' . $image_new_name;
        }
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->age = $request->age;
        $employee->save();

        // Sync or update departments to employee .
        $employee->employee_department()->sync($request->department_id);

        session()->flash('success' , 'Department Updated Successfully');
        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        session()->flash('success' , 'Department Deleted Successfully');
        return redirect()->route('employees.index');
    }
}
