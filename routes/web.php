<?php

use Illuminate\Support\Facades\Route;

// Import Controllers .
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return redirect('login');
});

// Login & Register & Logout & Forgot password .
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// All routes inside auth middleware should be authenticated to visit it .
Route::group(['middleware' => 'auth'] , function(){

    // Salaries Routes .
    Route::group(['prefix' => 'salaries'] , function(){
        Route::get('/' , [SalaryController::class,'index'])->name('salaries.index');
        Route::get('/create' , [SalaryController::class,'create'])->name('salaries.create');
        Route::post('/store' , [SalaryController::class,'store'])->name('salaries.store');
        Route::get('/edit/{salary}' , [SalaryController::class,'edit'])->name('salaries.edit');
        Route::put('/update/{salary}' , [SalaryController::class,'update'])->name('salaries.update');
        Route::delete('/destroy/{salary}' , [SalaryController::class,'destroy'])->name('salaries.destroy');
    });

    // Departments Routes .
    Route::group(['prefix' => 'departments'] , function(){
        Route::get('/' , [DepartmentController::class,'index'])->name('departments.index');
        Route::get('/create' , [DepartmentController::class,'create'])->name('departments.create');
        Route::post('/store' , [DepartmentController::class,'store'])->name('departments.store');
        Route::get('/edit/{department}' , [DepartmentController::class,'edit'])->name('departments.edit');
        Route::get('/show/{department}' , [DepartmentController::class,'show'])->name('departments.show');
        Route::put('/update/{department}' , [DepartmentController::class,'update'])->name('departments.update');
        Route::delete('/destroy/{department}' , [DepartmentController::class,'destroy'])->name('departments.destroy');
    });

    Route::group(['prefix' => 'employees'] , function(){
        Route::get('/' , [EmployeeController::class,'index'])->name('employees.index');
        Route::get('/create' , [EmployeeController::class,'create'])->name('employees.create');
        Route::post('/store' , [EmployeeController::class,'store'])->name('employees.store');
        Route::get('/edit/{employee}' , [EmployeeController::class,'edit'])->name('employees.edit');
        Route::get('/show/{employee}' , [EmployeeController::class,'show'])->name('employees.show');
        Route::put('/update/{employee}' , [EmployeeController::class,'update'])->name('employees.update');
        Route::delete('/destroy/{employee}' , [EmployeeController::class,'destroy'])->name('employees.destroy');
    });


    Route::get('test' , function(){
        $salary = App\Models\Salary::where('amount', '>' , 1000)->paginate(50);

        // dd($salary);

        return calc(10,10);
    });

});

