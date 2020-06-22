@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-offset-md-2 col-md-5">
        <form id="add_company_form" action="{{ route('companies.store') }}" enctype="multipart/form-data" method="POST">
            @if($errors->has('name'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{$errors->first('name')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            <div class="form-group">
                <label for="input_name">Name</label>
                <input name="name" type="text" class="form-control" id="input_name" aria-describedby="nameHelp" placeholder="Enter Name" value="{{$company->name}}">
                <small id="nameHelp" class="form-text text-muted">Required field</small>
            </div>
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
                <input name="email" type="text" class="form-control" id="input_email" placeholder="Email" value="{{$company->email}}">
            </div>
            @if($errors->has('website'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{$errors->first('website')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
		    @endif
            <div class="form-group">
                <label for="input_website">Website</label>
                <input name="website" type="text" class="form-control" id="input_website" placeholder="Website" value="{{$company->website}}">
            </div>
            @if($errors->has('logo'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{$errors->first('logo')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
		    @endif
            <div class="custom-file">
                <input name="logo" type="file" class="custom-file-input" id="customFileLang" lang="es">
                <label class="custom-file-label" for="customFileLang">Upload Logo</label>
            </div>
            <div class="image_wrapper">
                <p>Current Logo: </p>
                <img style="object-fit: cover; width: 100px; height: 100px;" class="card-img-top img-responsive" src="{{asset('storage/logo/'.$company->logo)}}" alt="logo" onerror="this.src='https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn3.iconfinder.com%2Fdata%2Ficons%2Fglypho-generic-icons%2F64%2Faction-upload-alt-512.png&f=1&nofb=1';this.onerror='';">
            </div>
            <hr>
            {{ method_field('POST')}} {{csrf_field()}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <a style="margin-top: 10px;" href="{{ route('companies.index') }}" role="button" class="btn btn-info">
				Back To Companies
		</a>
        </div>    
    </div>

</div>

<script src="{{ asset('js/app.js') }}"></script>
@endsection