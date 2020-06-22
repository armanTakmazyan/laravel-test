@extends('layouts.app')

@section('content')

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        You will delete all the information about this Company
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="" id="deleteForm">
            {{ method_field('DELETE')}} {{csrf_field()}}
            <button type="submit" id="delete-btn" class="btn btn-danger">Yes, I want to delete it!</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Content -->

<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>New Company Was Added:</strong>
                session('sucess')
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h2>Companies</h2>
        <a href="{{ route('companies.create') }}" class="btn btn-info" role="button">Add New Company</a>
        <hr>
        <div class="card-group">
            @if($companies->isEmpty())
                <div class="card">
                    <div class="card-body">
                        There is no companies yet...
                    </div>
                </div>
            @else
                 @foreach($companies as $key => $company)
                    <div class="card">
                        <div class="card-header">
                            <p>{{ $company['name'] }}</p>
                        </div>
                        <div class="card-body">
                            <p>Company Email: {{ $company['email'] }}</p>
                            <p>Company Website: {{ $company['website'] }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('companies.show', ['id' => $company->id]) }}" role="button" class="btn btn-sm btn-success"> Show </a>
						    <a href="{{ route('companies.edit', ['id' => $company->id]) }}" role="button" class="btn btn-sm btn-primary"> Edit </a>
                            <a href="#" data-company-id="{{$company->id}}" data-company-name="{{$company->name}}" data-toggle="modal" data-target="#deleteModal" role="button" class="btn btn-sm btn-danger">Delete</a>
                        </div>
                    </div>
                @endforeach
                <div class="card">
                    <div class="card-footer">{{ $companies->links() }}</div>
                </div>
            @endif
        </div>
    </div>
</div>


@endsection

@section('scripts')
    <script>
        $('#deleteModal').on('show.bs.modal', function(e) {
            let data = $(e.relatedTarget).data();
            let actionRoute = "/companies/"+data.companyId;
            $('.title', this).text('You will delete ' + data.companyName);
            $('#deleteForm').attr('action', actionRoute);
        });
    </script>
@stop

