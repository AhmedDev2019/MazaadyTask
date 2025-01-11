@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header d-flex justify-content-between">
                    <span>{{ __('Create Employee') }}</span>
                    <span>
                        <a href="{{ route('employees.index') }}" class="btn btn-warning">Back</a>
                    </span>
                </h3>

                <div class="card-body">

                    <form id="myForm" action="{{ route('employees.store') }}" method="POST" class="userForm" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <!-- Start Row  -->
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="name" style="margin-bottom:10px"><b>Name</b></label>
                                    <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="email" style="margin-bottom:10px"><b>Email</b></label>
                                    <input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="phone" style="margin-bottom:10px"><b>Phone</b></label>
                                    <input type="text" name="phone" id="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" value="{{ old('phone') }}">
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="age" style="margin-bottom:10px"><b>Age</b></label>
                                    <input type="number" name="age" id="age" class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" value="{{ old('age') }}">
                                    @if ($errors->has('age'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('age') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="department_id" style="margin-bottom:10px"><b>Employee Departments</b></label>
                                    <select name="department_id[]" id="department_id" class="form-control {{ $errors->has('department_id') ? 'is-invalid' : '' }} select2" multiple>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}"
                                                @if( old('department_id') )
                                                    @foreach(old('department_id') as $old_department)
                                                        @if( $old_department == $department->id )
                                                            selected
                                                        @endif
                                                    @endforeach
                                                @endif
                                            >
                                                <strong>Department Name:</strong>{{ $department->name }} &nbsp;-&nbsp;
                                                <strong>Department Salary:</strong>{{ number_format($department->salary->amount) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('department_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('department_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputFile"><b>Image</b></label>
                                    <input type="file" name="image" id="exampleInputFile" style="padding: 10px;height:45px" class="form-control image {{ $errors->has('image') ? 'is-invalid' : '' }}">
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                    <div class="imagePreview">
                                        <img style="width:250px;height:150px;margin-top:5px;object-fit:contain" class="image-preview img-thumbnail" src="{{ asset('uploads/employees/default.png') }}" alt="">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center" style="margin-top:30px">
                                    <button type="submit" class="btn btn-primary w-100 btn-block" style="font-size:16px"><i class="fa fa-check fa-fw fa-lg"></i> Save</button>
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
