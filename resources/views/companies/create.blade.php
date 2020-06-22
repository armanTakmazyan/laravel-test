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
                <input name="name" type="text" class="form-control" id="input_name" aria-describedby="nameHelp" placeholder="Enter Name">
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
                <input name="email" type="text" class="form-control" id="input_email" placeholder="Email">
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
                <input name="website" type="text" class="form-control" id="input_website" placeholder="Website">
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
            <hr>
            {{ method_field('POST')}} {{csrf_field()}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>    
    </div>

</div>

<script src="{{ asset('js/app.js') }}"></script>
@endsection