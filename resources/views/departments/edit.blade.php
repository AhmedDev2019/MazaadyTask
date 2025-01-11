@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header d-flex justify-content-between">
                    <span>{{ __('Edit Department') }}</span>
                    <span>
                        <a href="{{ route('departments.index') }}" class="btn btn-warning">Back</a>
                    </span>
                </h3>

                <div class="card-body">

                    <form id="myForm" action="{{ route('departments.update' , $department->id) }}" method="POST" class="userForm" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <!-- Start Row  -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" style="margin-bottom:10px"><b>Department Name</b></label>
                                    <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $department->name }}">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount" style="margin-bottom:10px"><b>Department Salary</b></label>
                                    <select name="salary_id" id="salary_id" class="form-control {{ $errors->has('salary_id') ? 'is-invalid' : '' }}">
                                        <option value="">...........</option>
                                        @foreach($salaries as $salary)
                                            <option value="{{ $salary->id }}" {{ $department->salary_id == $salary->id ? 'selected' : '' }}>
                                                <strong>Salary Name:</strong>{{ $salary->name }} &nbsp;-&nbsp;
                                                <strong>Salary Amount:</strong>{{ number_format($salary->amount) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('salary_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('salary_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center" style="margin-top:30px">
                                    <button type="submit" class="btn btn-primary w-100 btn-block" style="font-size:16px"><i class="fa fa-check fa-fw fa-lg"></i> Update</button>
                                </div>
                            </div>
                        </div>
                        <!-- End Row  -->
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
