@extends('layouts.admin')
@section('css')
<style>
        * {
          box-sizing: border-box;
        }

        #myInput {
          background-image: url('/css/searchicon.png');
          background-position: 10px 12px;
          background-repeat: no-repeat;
          width: 100%;
          font-size: 16px;
          padding: 12px 20px 12px 40px;
          border: 1px solid #ddd;
          margin-bottom: 12px;
        }

        #myUL {
          list-style-type: none;
          padding: 0;
          margin: 0;
        }

        #myUL li a {
          border: 1px solid #ddd;
          margin-top: -1px; /* Prevent double borders */
          background-color: #f6f6f6;
          padding: 12px;
          text-decoration: none;
          font-size: 18px;
          color: black;
          display: block
        }

        #myUL li a:hover:not(.header) {
          background-color: #eee;
        }
        </style>
@endsection
@section('admin')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
                <h2>All Item</h2>

                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                <ul id="myUL">


                    <li><a  data-toggle="collapse" href="#site" role="button" aria-expanded="false">Site</a></li>
                    <li><a  data-toggle="collapse" href="#department" role="button" aria-expanded="false">department</a></li>
                    <li><a  data-toggle="collapse" href="#position" role="button" aria-expanded="false">position</a></li>
                    <li><a  data-toggle="collapse" href="#priority" role="button" aria-expanded="false">priority</a></li>
                    <li><a  data-toggle="collapse" href="#privilege" role="button" aria-expanded="false">privilege</a></li>
                    <li><a  data-toggle="collapse" href="#status" role="button" aria-expanded="false">status</a></li>
                    <li><a  data-toggle="collapse" href="#type" role="button" aria-expanded="false">type</a></li>



                </ul>

        </div>
        <div class="col-sm-8">
 {{--  code site  --}}
<div class="collapse"  id="site">
    <div class="card card-body">
        <!-- Button trigger modal -->
        <div class="form-row text-center" style="margin-bottom: 2rem;" >
        <div class="col-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newsite">
        NEW Site
        </button>
        </div>
        </div>
                    <form action="{{ route('site.create') }}" method="post">
                    @csrf
                    <!-- Modal -->
                    <div class="modal fade" id="newsite" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" >New Site</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                         <input type="text" class="form-control"  name="site" placeholder="Enter New site">
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Save</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    </form>

    @foreach ($sites as $site)
        <div class="row">
            <div class="col-10">
                <form action="{{ route('update.site',['id'=>$site->id]) }}" method="post">
                 @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">{{ $site->id }}</span>
                        </div>
                        <input type="text" class="form-control" name="site" value="{{ $site->site }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-success" type="submit" id="inputGroupFileAddon04">Update</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-2">
                <form action="{{ route('remove.site',['id'=>$site->id]) }}" method="post">
                @csrf
                    <div class="input-group-append">
                        <button class="btn btn-outline-danger" type="submit" id="inputGroupFileAddon04">Delete</button>
                    </div>
             </form>
            </div>
        </div>
    @endforeach
</div>
</div>
{{--  code site  --}}


{{--  code department  --}}
<div class="collapse"  id="department">
        <div class="card card-body">
            <!-- Button trigger modal -->
            <div class="form-row text-center" style="margin-bottom: 2rem;" >
            <div class="col-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newdepartment">
            NEW department
            </button>
            </div>
            </div>
                        <form action="{{ route('department.create') }}" method="post">
                        @csrf
                        <!-- Modal -->
                        <div class="modal fade" id="newdepartment" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" >New department</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                             <input type="text" class="form-control"  name="department" placeholder="Enter New department">
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Save</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        </form>

        @foreach ($departments as $department)
            <div class="row">
                <div class="col-10">
                    <form action="{{ route('update.department',['id'=>$department->id]) }}" method="post">
                     @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">{{ $department->id }}</span>
                            </div>
                            <input type="text" class="form-control" name="department" value="{{ $department->department }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="submit" id="inputGroupFileAddon04">Update</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-2">
                    <form action="{{ route('remove.department',['id'=>$department->id]) }}" method="post">
                    @csrf
                        <div class="input-group-append">
                            <button class="btn btn-outline-danger" type="submit" id="inputGroupFileAddon04">Delete</button>
                        </div>
                 </form>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    {{--  code department  --}}



    {{--  code position  --}}
<div class="collapse"  id="position">
        <div class="card card-body">
            <!-- Button trigger modal -->
            <div class="form-row text-center" style="margin-bottom: 2rem;" >
            <div class="col-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newposition">
            NEW position
            </button>
            </div>
            </div>
                        <form action="{{ route('position.create') }}" method="post">
                        @csrf
                        <!-- Modal -->
                        <div class="modal fade" id="newposition" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" >New position</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                             <input type="text" class="form-control"  name="position" placeholder="Enter New position">
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Save</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        </form>

        @foreach ($positions as $position)
            <div class="row">
                <div class="col-10">
                    <form action="{{ route('update.position',['id'=>$position->id]) }}" method="post">
                     @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">{{ $position->id }}</span>
                            </div>
                            <input type="text" class="form-control" name="position" value="{{ $position->position }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="submit" id="inputGroupFileAddon04">Update</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-2">
                    <form action="{{ route('remove.position',['id'=>$position->id]) }}" method="post">
                    @csrf
                        <div class="input-group-append">
                            <button class="btn btn-outline-danger" type="submit" id="inputGroupFileAddon04">Delete</button>
                        </div>
                 </form>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    {{--  code position  --}}


        {{--  code priority  --}}
<div class="collapse"  id="priority">
        <div class="card card-body">
            <!-- Button trigger modal -->
            <div class="form-row text-center" style="margin-bottom: 2rem;" >
            <div class="col-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newpriority">
            NEW priority
            </button>
            </div>
            </div>
                        <form action="{{ route('priority.create') }}" method="post">
                        @csrf
                        <!-- Modal -->
                        <div class="modal fade" id="newpriority" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" >New priority</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                             <input type="text" class="form-control"  name="priority" placeholder="Enter New priority">
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Save</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        </form>

        @foreach ($prioritys as $priority)
            <div class="row">
                <div class="col-10">
                    <form action="{{ route('update.priority',['id'=>$priority->id]) }}" method="post">
                     @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">{{ $priority->id }}</span>
                            </div>
                            <input type="text" class="form-control" name="priority" value="{{ $priority->priority }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="submit" id="inputGroupFileAddon04">Update</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-2">
                    <form action="{{ route('remove.priority',['id'=>$priority->id]) }}" method="post">
                    @csrf
                        <div class="input-group-append">
                            <button class="btn btn-outline-danger" type="submit" id="inputGroupFileAddon04">Delete</button>
                        </div>
                 </form>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    {{--  code priority  --}}



        {{--  code privilege  --}}
<div class="collapse"  id="privilege">
        <div class="card card-body">
            <!-- Button trigger modal -->
            <div class="form-row text-center" style="margin-bottom: 2rem;" >
            <div class="col-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newprivilege">
            NEW privilege
            </button>
            </div>
            </div>
                        <form action="{{ route('privilege.create') }}" method="post">
                        @csrf
                        <!-- Modal -->
                        <div class="modal fade" id="newprivilege" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" >New privilege</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                             <input type="text" class="form-control"  name="privilege" placeholder="Enter New privilege">
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Save</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        </form>

        @foreach ($privileges as $privilege)
            <div class="row">
                <div class="col-10">
                    <form action="{{ route('update.privilege',['id'=>$privilege->id]) }}" method="post">
                     @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">{{ $privilege->id }}</span>
                            </div>
                            <input type="text" class="form-control" name="privilege" value="{{ $privilege->privilege }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="submit" id="inputGroupFileAddon04">Update</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-2">
                    <form action="{{ route('remove.privilege',['id'=>$privilege->id]) }}" method="post">
                    @csrf
                        <div class="input-group-append">
                            <button class="btn btn-outline-danger" type="submit" id="inputGroupFileAddon04">Delete</button>
                        </div>
                 </form>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    {{--  code privilege  --}}



        {{--  code status  --}}
<div class="collapse"  id="status">
        <div class="card card-body">
            <!-- Button trigger modal -->
            <div class="form-row text-center" style="margin-bottom: 2rem;" >
            <div class="col-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newstatus">
            NEW status
            </button>
            </div>
            </div>
                        <form action="{{ route('status.create') }}" method="post">
                        @csrf
                        <!-- Modal -->
                        <div class="modal fade" id="newstatus" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" >New status</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                             <input type="text" class="form-control"  name="status" placeholder="Enter New status">
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Save</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        </form>

        @foreach ($statuss as $status)
            <div class="row">
                <div class="col-10">
                    <form action="{{ route('update.status',['id'=>$status->id]) }}" method="post">
                     @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">{{ $status->id }}</span>
                            </div>
                            <input type="text" class="form-control" name="status" value="{{ $status->status }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="submit" id="inputGroupFileAddon04">Update</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-2">
                    <form action="{{ route('remove.status',['id'=>$status->id]) }}" method="post">
                    @csrf
                        <div class="input-group-append">
                            <button class="btn btn-outline-danger" type="submit" id="inputGroupFileAddon04">Delete</button>
                        </div>
                 </form>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    {{--  code status  --}}



{{--  code type  --}}
<div class="collapse"  id="type">
        <div class="card card-body">
            <!-- Button trigger modal -->
            <div class="form-row text-center" style="margin-bottom: 2rem;" >
            <div class="col-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newtype">
            NEW type
            </button>
            </div>
            </div>
                        <form action="{{ route('type.create') }}" method="post">
                        @csrf
                        <!-- Modal -->
                        <div class="modal fade" id="newtype" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" >New type</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                                <input type="text" class="form-control"  name="type" placeholder="Enter New type">
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Save</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        </form>

        @foreach ($types as $type)
            <div class="row">
                <div class="col-10">
                    <form action="{{ route('update.type',['id'=>$type->id]) }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">{{ $type->id }}</span>
                            </div>
                            <input type="text" class="form-control" name="type" value="{{ $type->type }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="submit" id="inputGroupFileAddon04">Update</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-2">
                    <form action="{{ route('remove.type',['id'=>$type->id]) }}" method="post">
                    @csrf
                        <div class="input-group-append">
                            <button class="btn btn-outline-danger" type="submit" id="inputGroupFileAddon04">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    {{--  code type  --}}



        </div>



    </div>
</div>

<script>
        function myFunction() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
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



