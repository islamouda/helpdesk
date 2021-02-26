@extends('layouts.main_user')



@section('ticket')

    <h4 class="mb-0">Hi
        <span class="text-primary">{{ $user_auth->name }}</span>
    </h4>
    <div class="subheading mb-4"><p class="lead mb-3"> You Can Add New Ticket</p></div>

{{--  main code   --}}
    <form method="post" action="{{ route('ticket.create') }}" >
        @csrf
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="inputAddress">Title</label>
                        <input type="text" class="form-control is-valid" name="title" id="inputAddress" placeholder="Your Title For Ticket" required>
                        <div class="valid-feedback">
                                Must be add title
                        </div>
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Details</label>
                    <textarea class="form-control" name="subject" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">priority</label>
                    </div>
                <select name="priority_id" class="custom-select is-valid" id="inputGroupSelect01" required>
                    <option disabled selected>Choose...</option>
                    @foreach ($priorities as $priority)
                    <option value="{{ $priority->id }}">{{ $priority->priority }}</option>
                    @endforeach
                    </select>
                </div>
            </div>


        </div>

        <div class="row">



                <div class="form-group">
                <div class="form-check">
                <ul class="checkbox-grid">
              @foreach ($types as $type)
                <li>
                  <input class="form-check-input is-valid" type="checkbox" name="type_id[]" value="{{ $type->id }} "


                  >
                  <label class="form-check-label" for="invalidCheck3" style="margin-right: 5rem;" >
                        {{ $type->type }}
                  </label>

                </li>
                @endforeach

                </ul>
                </div>
              </div>


        </div>






        <div class="row " style="margin-top:1rem">
        <div class="col d-flex justify-content-center">
        <button type="submit" class="btn btn-success">Create</button>
        </div>
        </div>

        </div>

    </form>


@endsection

@section('my_ticket')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

        .my-custom-scrollbar {
            position: relative;
            height: 200px;
            overflow: auto;
            }
            .table-wrapper-scroll-y {
            display: block;
            }
</style>
@endsection

{{--  table for Ticket   --}}

<h4 class="mb-0">My
    <span class="text-primary"> Ticket</span>
</h4>


<div  class="container mt-3">
    <h4>This Table for all ticket</h4>
    <p>you can search by key , title , priority and comment</p>
    <input  class="form-control" id="myInput" type="text" placeholder="Search..">
    <br>
    <div  class="table-wrapper-scroll-y my-custom-scrollbar">
    <table  class="table table-bordered table-striped mb-0">
      <thead>
        <tr>
            <th scope="col">Key</th>
            <th scope="col">Title</th>
            <th scope="col">Priority</th>
            <th scope="col">comment</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="myTable">


        @foreach ($tickets as $ticket)
        {{--  @if ($user_auth->id == $ticket->user_id)  --}}


        <tr>
        <td >{{ $ticket->id }}</td>
        <td>{{ $ticket->title }} </td>
        <td >{{ $ticket->priority->priority }}</td>
        <td >@if ($ticket->replay)
                {{ $ticket->replay }}
        @else
            No Comment
        @endif
            </td>
        <td scope="row" style="text-align: center" >
        @if ( $ticket->status_id == 1)
        <i class="fa fa-check-circle"  style="color:seagreen;font-size:1.5rem"></i>
        @elseif ($ticket->status_id == 2)
        <i class="fa fa-times" style="color:red;font-size:1.5rem"></i>
        @else

        @endif
        </td>
        <td>
            
        {{--  start button  --}}
        <!-- Button trigger modal -->

        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ticket{{ $ticket->id }}">
        Edit
        </button>
        <a href="{{ route('show',['id'=>$ticket->id]) }}" target="_blank">
        <button type="button" class="btn btn-info" data-toggle="modal" >
                Show
        </button>
         </a>
        <!-- Modal -->
        <form action="{{ route('ticket.update',['id'=>$ticket->id]) }}" method="post">
        @csrf
        <div class="modal fade" id="ticket{{ $ticket->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">{{ $ticket->id }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">


        {{--  main code   --}}

        <div class="container">
        <div class="row">
        <div class="col">
        <div class="form-group">
        <label for="inputAddress">Title</label>
        <input type="text" class="form-control" name="title" id="inputAddress" value="{{ $ticket->title }}">
        </div>

        </div>
        </div>

        <div class="row">
        <div class="col">
        <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" name="subject"  rows="3">{{ $ticket->subject }}</textarea>
        </div>
        </div>
        </div>


        <div class="row">
        <div class="col">
        <div class="input-group mb-3">
        <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">priority</label>
        </div>
        <select name="priority_id" class="custom-select" id="inputGroupSelect01">
        @foreach ($priorities as $priority)
        @if ($priority->id == $ticket->priority_id)
        <option value="{{ $priority->id }}" selected>{{ $priority->priority }}</option>
        @else
        <option value="{{ $priority->id }}" >{{ $priority->priority }}</option>
        @endif
        @endforeach


        </select>
        </div>
        </div>
        </div>

        <div class="row">
        <div class="col">
        <div class="input-group mb-3">
        <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">type</label>
        </div>

        {{--  @foreach ($types as $type)  --}}

        <div class="form-check">

            {{--  <label class="form-check-label">

            <input class="form-check-input checkbox"  type="checkbox" name="type_id[]" value="{{ $type->id }}"
            @foreach ($ticket->types as $ty)
            @if ($type->id == $ty->id)
            checked
            @endif
            @endforeach>

            {{ $type->type }} <br>


            <span class="form-check-sign">
            <span class="check"></span>
            </span>
            </label>  --}}


            <div class="form-check">
                <ul class="checkbox-grid">
              @foreach ($types as $type)
                <li>
                  <input class="form-check-input is-valid" type="checkbox" name="type_id[]"
                   value="{{ $type->id }} "
@foreach ($ticket->types as $ty)
            @if ($type->id == $ty->id)
            checked
            @endif
            @endforeach

                  >
                  <label class="form-check-label" for="invalidCheck3" style="margin-left: 1rem;
                  margin-right: 2rem;" >
                        {{ $type->type }}
                  </label>

                </li>
                @endforeach

                </ul>
                </div>

            </div>
            {{--  @endforeach  --}}


        </div>
        </div>
        </div>

        </div>




        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>                                  </div>
        </div>
        </div>
        </div>
        </form>
        {{--  end button  --}}
        
        </td>
        </tr>
        {{-- @endif --}}
        @endforeach
      </tbody>
    </table>
  </div>
    <p>Note the Number of your ticks is : {{ $ticket_user_count }} </p>
  </div>



{{--  --tableforTicket--  --}}

@section('js')
    <script>
    $(document).ready(function()
    $('#islam').DataTable(
    scrollY:'50vh',
    scrollCollapse:true,
    paging:false
    );
    );
    </script>


    <script>


        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });

</script>
@endsection


@endsection




@section('dirctory')


<div class="container">
<div class="row">
<div class="col-6">
<div class="card" >
<div class="card-body ">
<h5 class="card-title" style="text-align: center;margin-bottom:1.5rem">Directory</h5>

<input type="text" id="myInput12" onkeyup="myFunction()" placeholder="Search for names.." style="position: absolute;left: 50%;transform: translate(-50%, -50%);">

<div style="margin-top:3rem">

<ul class=" list-user" id="myUL12">
@foreach ($users as $user)
<li class="list-group-item shadow p-3  bg-white rounded" style="margin:1rem;" >
<a href="" data-toggle="modal" data-target="#dir{{ $user->id }}">
<div class="media ">
{{-- <img src="{{ $user->profile['avatar'] }}" style="width:4rem; height: 4rem;" class="mr-3" alt="..."> --}}
<div class="media-body">
<h5 class="mt-0">{{ $user->name }}</h5>
<p style="font-size: 0.7rem;">{{ $user->email }}</p>

</div>
</div>
</a>
</li>



<!-- Modal -->
<div class="modal fade" id="dir{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $user->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <div class="container">
                    <div class="row">
                      <div class="col-4">
                        {{-- <img src="{{ $user->profile['avatar']}}" style="width:6rem; height: 6rem;" alt="{{ $user->name }} " > --}}
                      </div>
                      <div class="col-8">
                        <p>Name : <span>{{ $user->name }}</span></p>
                        <p>Email : <span>{{ $user->email }}</span></p>
                        {{-- <p>EXT : <span>{{ $user->profile['ip_phone']}}</span></p> --}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm">
                            {{-- @foreach ($sites as $site)
                            @if ($site->id == $user->profile['site_id'])
                            <p>Site : <span>{{ $site->site}}</span></p>
                            @endif
                            @endforeach --}}
                            {{-- <p>HR_ID : <span>{{ $user->profile['hr_id']}}</span></p>
                               <p>Mobile : <span>{{ $user->profile['mobile']}}</span></p> --}}

                    </div>
                    <div class="col-sm">
                            {{-- @foreach ($positions as $position)
                            @if ($position->id == $user->profile['position_id'])
                            <p>position : <span>{{ $position->position}}</span></p>
                            @endif
                            @endforeach
                            @foreach ($departments as $department)
                            @if ($department->id == $user->profile['department_id'])
                            <p>department :  <span>{{ $department->department}}</span></p>
                            @endif
                            @endforeach --}}
                    </div>
                    </div>
                  </div>



        {{--  <p>Name : {{ $user->name }}</p>
        <p>Email : {{ $user->email }}</p>
        <p>Hr-ID : {{ $user->profile['hr_id']}}</p>


        @foreach ($sites as $site)
        @if ($site->id == $user->profile['site_id'])
        <p>Site : {{ $site->site}}</p>
        @endif
        @endforeach


        @foreach ($departments as $department)
        @if ($department->id == $user->profile['department_id'])
        <p>department : {{ $department->department}}</p>
        @endif
        @endforeach

        @foreach ($positions as $position)
        @if ($position->id == $user->profile['position_id'])
        <p>position : {{ $position->position}}</p>
        @endif
        @endforeach
        <p>EXT . : {{ $user->profile['ip_phone']}}</p>
        <p>Mobile : {{ $user->profile['mobile']}}</p>
        <p>Mobile : {{ $user->profile['mobile']}}</p>  --}}





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>


@endforeach
</ul>

</div>





</div>
</div>
</div>
{{-- {{ --col for profil euser-- }} --}}

<div class="col-6">
@foreach ($profiles as $profile)

<form action="{{ route('profile.update',['id'=>$profile->id]) }}" method="post" enctype="multipart/form-data">
@csrf
<div class="card" >
<span class="d-none d-lg-block">

{{-- <img  class="img-fluid img-profile rounded-circle mx-auto mb-2 d-block" style="width:3rem; height: 3rem; margin:1rem" src="{{ asset($user->profile->avatar) }}" alt="" > --}}



</span>
<div class="card-body">
<label for="formGroupExampleInput">Name</label>
<input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ $user_auth->name }}">
<div class="row">

<div class="form-group col-md-12">
<label for="inputEmail4">Email</label>
<input type="email"  name="email" class="form-control" id="inputEmail4" value="{{ $user_auth->email }}">
</div>
{{--  <div class="form-group col-md-6">
<label>Password</label>
<input type="" name="password" class="form-control is-valid"  placeholder="Password"  required>
</div>  --}}
</div>



<div class="row">

<div class="form-group col-md-6">
<label for="inputEmail4">Hr ID</label>
<input type="text"  name="hr_id" class="form-control" id="inputEmail4" value="{{ $profile->hr_id }}">
</div>
<div class="form-group col-md-6">
<label for="inputPassword4">EXT .</label>
<input type="text"  name="ip_phone" class="form-control"  value="{{ $profile->ip_phone }}">
</div>
</div>


<div class="row">
<div class="col-md-6">
<div class="input-group mb-3">
<div class="input-group-prepend">
<label class="input-group-text" for="inputGroupSelect01">Site</label>
</div>
<select name="site_id" class="custom-select" id="inputGroupSelect01">
@foreach ($sites as $site)
@if ($site->id == $profile->site_id)
<option value="{{ $site->id }}" selected>{{ $site->site }}</option>
@else
<option value="{{ $site->id }}" >{{ $site->site }}</option>
@endif
@endforeach
</select>
</div>
</div>
<div class="col-md-6">
<div class="input-group mb-3">
<div class="input-group-prepend">
<label class="input-group-text" for="inputGroupSelect01">Departmint</label>
</div>
<select name="department_id" class="custom-select" id="inputGroupSelect01">
@foreach ($departments as $department)
@if ($department->id == $profile->department_id)
<option value="{{ $department->id }}" selected>{{ $department->department }}</option>
@else
<option value="{{ $department->id }}" >{{ $department->department }}</option>
@endif
@endforeach
</select>
</div>
</div>
</div>

<div class="row">
<div class="form-group col-md-6">
<div class="input-group mb-3">
<div class="input-group-prepend">
<label class="input-group-text" for="inputGroupSelect01">Mobile</label>
</div>
<input type="text" name="mobile" class="form-control" id="inputPassword4" value="{{ $profile->mobile }}">
</div>
</div>
<div class="col-md-6">
<div class="input-group mb-3">
<div class="input-group-prepend">
<label class="input-group-text" for="inputGroupSelect01">Position</label>
</div>
<select name="position_id" class="custom-select" id="inputGroupSelect01">
@foreach ($positions as $position)
@if ($position->id == $profile->position_id)
<option value="{{ $position->id }}" selected>{{ $position->position }}</option>
@else
<option value="{{ $position->id }}" >{{ $position->position }}</option>
@endif
@endforeach
</select>
</div>
</div>
</div>

<label for="inputEmail4">Change Image</label>
<div class="custom-file">
        <input type="file" name="avatar" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
        <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
      </div>

</div>
<button type="submit" class="btn btn-primary">Update</button>

</div>

</form>
@endforeach
</div>
</div>
{{-- {{ --col for profile user-- }} --}}
</div>
</div>


    <script>
            function myFunction() {
                var input, filter, ul, li, a, i, txtValue;
                input = document.getElementById("myInput12");
                filter = input.value.toUpperCase();
                ul = document.getElementById("myUL12");
                li = ul.getElementsByTagName("li");
                for (i = 0; i < li.length; i++) {
                    a = li[i].getElementsByTagName("a")[0];
                    txtValue = a.textContent || a.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        li[i].style.display = "";
                    } else {
                        li[i].style.display = "none";
                    }
                }
            }
            </script>

@endsection





