@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header d-flex justify-content-between">
                    <span>{{ __('Salaries') }}</span>
                    <span>
                        <a href="{{ route('salaries.create') }}" class="btn btn-primary">Create New</a>
                    </span>
                </h3>

                <div class="card-body">
                    <table class="table table-hover table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Salary Name</th>
                                <th>Salary Amount</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($salaries as $index => $salary)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $salary->name }}</td>
                                    <td>{{ number_format($salary->amount,1) }}</td>
                                    <td>
                                        <a href="{{ route('salaries.edit' , $salary->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('salaries.destroy' , $salary->id) }}" method="POST" style="display:inline">
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
