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
                <h2>All User</h2>

                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                <ul id="myUL">
                @foreach ($users as $user)

                {{-- class="btn btn-primary"  --}}

                    <li><a  data-toggle="collapse" href="#user{{ $user->id }}" role="button" aria-expanded="false"  aria-controls="user{{ $user->id }}">
                        {{ $user->name }}
                        {{--  @if ($user->privilege == 0)  --}}


                    </a></li>


                    @endforeach
                </ul>

        </div>
        <div class="col-sm-8">
                @foreach ($users as $user)
                <div class="collapse"  id="user{{ $user->id }}">
                        <div class="card card-body">
                    {{-- main card user  --}}
                    <form action="{{ route('admin.user',['id'=>$user->id]) }}" method="post">
                            @csrf
                            <div class="form-row">
                                    <div class="col">
                                     <label for="exampleFormControlInput1">name</label>
                                      <input type="text" name="name" class="form-control" placeholder="First name" value="{{ $user->name }}">
                                    </div>
                                    <div class="col">
                                     <label for="exampleFormControlInput1">Email address</label>
                                      <input type="text" name="email" class="form-control" placeholder="Last name" value="{{ $user->email }}">
                                    </div>
                                  </div>

                            <div class="form-group">
                              <label >Password</label>
                              <input type="password" class="form-control"   value="{{ $user->password }}">
                            </div>







                            <div class="row">

                                    <div class="form-group col-md-6">
                                    <label for="inputEmail4">Hr ID</label>
                                    <input type="text"  name="hr_id" class="form-control" id="inputEmail4" value="{{ $user->profile['hr_id'] }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="inputPassword4">EXT .</label>
                                    <input type="text"  name="ip_phone" class="form-control"  value="{{ $user->profile['ip_phone'] }}">
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
                    @if ($site->id == $user->profile['site_id'])
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
                    @if ($department->id == $user->profile['department_id'])
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
            <input type="text" name="mobile" class="form-control" id="inputPassword4" value="{{ $user->profile['mobile'] }}">
            </div>
            </div>
            <div class="col-md-6">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Position</label>
            </div>
            <select name="position_id" class="custom-select" id="inputGroupSelect01">
            @foreach ($positions as $position)
            @if ($position->id == $user->profile['position_id'])
            <option value="{{ $position->id }}" selected>{{ $position->position }}</option>
            @else
            <option value="{{ $position->id }}" >{{ $position->position }}</option>
            @endif
            @endforeach
            </select>
            </div>
            </div>
            </div>



            <label >Privilege</label> <br>
            @foreach ($privileges as $privilege)
            <div class="form-check form-check-inline">

                    {{--  <input class="form-check-input" type="radio"  id="inlineRadio1" value="{{ $privilege->id }}" checked>  --}}



                    <input class="form-check-input" type="radio" name="privilege" id="inlineRadio1" value="{{ $privilege->id }}"
                    @if ($privilege->id == $user->privilege)
                    checked
                    @endif
                    >

                    <label class="form-check-label" for="inlineRadio1">{{ $privilege->privilege }}</label>

            </div>
            @endforeach
<br>
            <label >Admin</label> <br>

            <div class="form-check form-check-inline">

                     <input class="form-check-input" type="checkbox" name="admin"
                     @if ($user->admin == 1)
                    checked
                    @endif
                     id="inlineCheckbox1" value="1">
                    <label class="form-check-label" for="inlineRadio1">Administrator</label>
            </div>
<div class="row">
            <button type="submit" class="btn btn-success">Success</button>
        </div>
                          </form>
                    {{-- main card user  --}}
                      </div>
                    </div>
                @endforeach


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



