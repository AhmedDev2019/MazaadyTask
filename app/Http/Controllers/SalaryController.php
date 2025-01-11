<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::paginate(10);

        return view('salaries.index' , compact('salaries'));
    }

    public function create()
    {
        return view('salaries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:salaries',
            'amount' => 'required|numeric'
        ]);

        $salary = new Salary;
        $salary->name = $request->name;
        $salary->amount = $request->amount;
        $salary->save();

        session()->flash('success' , 'Salary Created Successfully');
        return redirect()->route('salaries.index');
    }

    public function edit(Salary $salary)
    {
        return view('salaries.edit' , compact('salary'));
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'name' => 'required|unique:salaries,name,' . $salary->id,
            'amount' => 'required|numeric'
        ]);

        $salary->name = $request->name;
        $salary->amount = $request->amount;
        $salary->save();

        session()->flash('success' , 'Salary Updated Successfully');
        return redirect()->route('salaries.index');
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();
        
        session()->flash('success' , 'Salary Deleted Successfully');
        return redirect()->route('salaries.index');
    }
}
