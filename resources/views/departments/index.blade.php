@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header d-flex justify-content-between">
                    <span>{{ __('Departments') }}</span>
                    <span>
                        <a href="{{ route('departments.create') }}" class="btn btn-primary">Create New</a>
                    </span>
                </h3>

                <div class="card-body">
                    <table class="table table-hover table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Department Name</th>
                                <th>Salary</th>
                                <th>Employees Count</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departments as $index => $department)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td>
                                        <strong>Salary Name:</strong> {{ $department->salary->name }} <br>
                                        <strong>Salary Amount:</strong> {{ number_format($department->salary->amount,1) }}
                                    </td>
                                    <td>{{ $department->employee_department->count() }}</td>
                                    <td>
                                        <a href="{{ route('departments.edit' , $department->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('departments.destroy' , $department->id) }}" method="POST" style="display:inline">
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
