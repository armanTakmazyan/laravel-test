@extends('layouts.app')

@section('content')

<!-- Modal -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        You will delete all information about this Company, including Employee data.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="" id="delete_form" method="POST">
            {{ method_field('DELETE')}} {{csrf_field()}}
            <button type="submit" id="delete-btn" class="btn btn-danger">Delete anyway!</button>
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
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h2>Companies</h2>
        <a href="{{ route('companies.create') }}" class="btn btn-info" role="button">Add New Company</a>
        <hr>
        <div class="card">
            <div class="card-body">
                @if($companies->isEmpty())
                    <p>There is no companies yet...</p>
                @else
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Website</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $key => $company)
                            <tr>
                                <th scope="row">{{ $company->id }}</th>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->website }}</td>
                                <td>
                                <a href="{{ route('companies.show', [$company->id]) }}" role="button" class="btn btn-sm btn-success"> Show </a>
                                <a href="{{ route('companies.edit', [$company->id]) }}" role="button" class="btn btn-sm btn-primary"> Edit </a>
                                <a href="#" data-company-id="{{$company->id}}" data-company-title="{{$company->name}}" data-toggle="modal" data-target="#delete_modal" role="button" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
						{{ $companies->links() }}
					</tfoot>
                    </table>

                @endif    
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
    <script>
    window.addEventListener('load', function() {
      console.log('All assets are loaded');
      $('#delete_modal').on('show.bs.modal', function(e) {
        let data = $(e.relatedTarget).data();
        let actionRoute = "/companies/"+data.companyId;
        $(this).find('.modal-title').text(`Confirm to deleting the ${data.companyTitle} company`);
        $('#delete_form').attr('action', actionRoute);
      });
    })
    </script>
@stop

