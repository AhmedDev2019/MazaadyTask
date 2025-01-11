@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header d-flex justify-content-between">
                    <span>{{ __('Employees') }}</span>
                    <span>
                        <a href="{{ route('employees.create') }}" class="btn btn-primary">Create New</a>
                    </span>
                </h3>

                <div class="card-body">
                    
                    <!-- Enter Number Between [5,50] -->
                    <form action="{{ route('employees.index') }}" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="number" name="number" min="3" max="50" class="form-control" placeholder="Enter Number between 5 and 50">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>
                        </div>
                    </form>
                    <br>

                    <table class="table table-hover table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Departments</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $index => $employee)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <img style="width:50px" src="{{ asset($employee->image) }}" alt="">
                                    </td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>
                                        @foreach($employee->employee_department as $index => $employee_department)
                                            <span style="display:block">{{ $employee_department->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('employees.edit' , $employee->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('employees.destroy' , $employee->id) }}" method="POST" style="display:inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button title="Delete Record" type="submit"  class="btn btn-danger delete" style="cursor:pointer">
                                                Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
