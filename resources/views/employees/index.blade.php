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
        You will delete all information about this Employee.
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
                <strong>New Employee Was Added:</strong>
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h2>Empluyees</h2>
        <a href="{{ route('employees.create') }}" class="btn btn-info" role="button">Add New Employee</a>
        <hr>
        <div class="card">
            <div class="card-body">
                @if($employees->isEmpty())
                    <p>There is no employees yet...</p>
                @else
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Company</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $key => $employee)
                            <tr>
                                <th scope="row">{{ $employee->id }}</th>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->company['name'] }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>
                                <a href="{{ route('employees.show', [$employee->id]) }}" role="button" class="btn btn-sm btn-success"> Show </a>
                                <a href="{{ route('employees.edit', [$employee->id]) }}" role="button" class="btn btn-sm btn-primary"> Edit </a>
                                <a href="#" data-employee-id="{{$employee->id}}" data-employee-title="{{$employee->first_name}}" data-toggle="modal" data-target="#delete_modal" role="button" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
						{{ $employees->links() }}
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
        let actionRoute = "/employees/"+data.employeeId;
        $(this).find('.modal-title').text(`Confirm to deleting the ${data.employeeTitle} employee`);
        $('#delete_form').attr('action', actionRoute);
      });
    });
    </script>
@stop

