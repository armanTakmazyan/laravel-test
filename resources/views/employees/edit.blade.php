@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-offset-md-2 col-md-5">
        <form id="add_employee_form" action="{{ route('employees.update', $employee) }}" enctype="multipart/form-data" method="POST">
            @if($errors->has('first_name'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{$errors->first('first_name')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            <div class="form-group">
                <label for="input_first_name">First Name</label>
                <input name="first_name" type="text" class="form-control" id="input_first_name" aria-describedby="first_name_Help" placeholder="Enter First Name" value="{{$employee->first_name}}">
                <small id="first_name_Help" class="form-text text-muted">Required field</small>
            </div>
            @if($errors->has('last_name'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{$errors->first('last_name')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            <div class="form-group">
                <label for="input_last_name">Last Name</label>
                <input name="last_name" type="text" class="form-control" id="input_last_name" aria-describedby="last_name_Help" placeholder="Enter Last Name" value="{{$employee->last_name}}">
                <small id="last_name_Help" class="form-text text-muted">Required field</small>
            </div>
            @if($errors->has('company_id'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{$errors->first('company_id')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <label for="company_id">Company Name</label>
            <select class="form-control" name="company_id">
				@foreach($companies as $company)
                    @if($company->id == $employee->company_id)
                        <option selected value="{{$company->id}}"> {{$company->name}} </option>
					@else
                        <option value="{{$company->id}}"> {{$company->name}} </option>
                    @endif     
				@endforeach
			</select>
            @if($errors->has('email'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{$errors->first('email')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
		    @endif
            <div class="form-group">
                <label for="input_email">Email</label>
                <input name="email" type="text" class="form-control" id="input_email" placeholder="Email" value="{{$employee->email}}">
            </div>
            @if($errors->has('phone'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{$errors->first('phone')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
		    @endif
            <div class="form-group">
                <label for="input_phone">Phone</label>
                <input name="phone" type="text" class="form-control" id="input_phone" placeholder="Phone" value="{{$employee->phone}}">
            </div>
            <hr>
            {{ method_field('PUT')}} {{csrf_field()}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <a style="margin-top: 10px;" href="{{ route('employees.index') }}" role="button" class="btn btn-info">
				Back To Employees
		</a>
        </div>    
    </div>

</div>


@endsection