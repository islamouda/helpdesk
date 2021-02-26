@extends('layouts.admin')

@section('admin')
<div class="container">
  <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>



                <div class="table-responsive" >
                        <table  id="ticket" class="table table-bordered table-hover table-sm" style="">
                        <thead class="thead-dark">
                        <tr>
                        <th scope="col">Key</th>
                        <th scope="col">Title</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($tickets as $ticket)

                        <tr>
                        <td >{{ $ticket->id }}</td>
                        <td>{{ $ticket->title }} </td>
                        <td >{{ $ticket->priority->priority }}</td>
                        <td scope="row" style="text-align: center" >
                        @if ( $ticket->status_id == 1)
                        Done
                        {{-- <i class="fas fa-check-circle" style="color:#2f9914"></i> --}}
                        @elseif ($ticket->status_id == 2)
                        Failure
                        {{-- <i class="fas fa-times-circle" style="color:red"></i> --}}

                        @else

                        @endif
                        </td>
                        <td>Action </td>

                        </tr>
                        {{-- @endif --}}
                        @endforeach
                        </tbody>
                        </table>
                        </div>

        </div>
        </div>
    </div>
</div>


@endsection


