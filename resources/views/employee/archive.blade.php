@extends('layouts.app', ['activePage' => 'archive-employee', 'titlePage' => __('Employee Management')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Archive Employee List</h4>
            <p class="card-category"> Restore and permanent delete your archive employee here</p>
          </div>
          <div class="card-body">
            @if (count($employee) > 0)
            <a href="{{url('/restore-all')}}" class="btn btn-success" role="button" style="float: right;">Restore All</a>
            @endif
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>No.</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Address</th>
                  <th style="text-align: center">Action</th>
                </thead>
                <tbody>
                @if (count($employee) > 0)
                  @foreach($employee as $key => $employees)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$employees->name}}</td>
                    <td>{{$employees->employeeRole->name}}</td>
                    <td>{{$employees->address}}</td>
                    <td style="text-align: center;width:20%;"><a href="{{url('restore/'.$employees['id'])}}" class="btn btn-success btn-sm" role="button" title="Restore"><img src="{{asset('storage/pencil-fill.svg')}}" alt="Edit"></a>
                      {{-- <a href="{{url('view_ahli/'.$user['id'])}}" class="btn btn-info btn-sm" role="button" title="View"><img src="{{asset('storage/eye-fill.svg')}}" alt="View"></a> --}}
                      <a href="{{url('force-delete/'.$employees['id'])}}" onclick="return confirm('Are you sure you want to permanent delete this?')" class="btn btn-danger btn-sm" role="button" title="Permanent Delete"><img src="{{asset('storage/trash-fill.svg')}}" alt="Delete"></a></td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="6" style="text-align: center;"><h4>No records found.</h4></td>
                  </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection