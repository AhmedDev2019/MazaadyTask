@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header d-flex justify-content-between">
                    <span>{{ __('Create Salary') }}</span>
                    <span>
                        <a href="{{ route('salaries.index') }}" class="btn btn-warning">Back</a>
                    </span>
                </h3>

                <div class="card-body">

                    <form id="myForm" action="{{ route('salaries.store') }}" method="POST" class="userForm" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <!-- Start Row  -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" style="margin-bottom:10px"><b>Salary Name</b></label>
                                    <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount" style="margin-bottom:10px"><b>Salary Amount</b></label>
                                    <input type="text" name="amount" id="amount" class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" value="{{ old('amount') }}">
                                    @if ($errors->has('amount'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                    @endif
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
