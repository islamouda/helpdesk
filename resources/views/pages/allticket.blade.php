@extends('layouts.app')

@section('content')

<div class="container">


        @foreach ($tickets as $ticket)
 


        <div class="card border-danger" style="margin:1.5rem">
            <div class="card-header ">
                    <span style="margin-right: 1rem;">Key : {{ $ticket->id }} </span>
                    <span style="margin-right: 1rem;">Create : {{ $ticket->created_at->diffForHumans() }} </span>
                    <span style="margin-right: 1rem;"> Update : {{ $ticket->updated_at }}</span>
                    @if ($ticket->status_id == 1)
                        Done
                    @endif
            </div>
            <div class="card-body ">
                    <div class="row">
                            <div class="col-4">

                                <div class="card" style="width: 18rem;">
                                    <div class="card-header">
                                      Profile For Employee
                                    </div>
                                    <ul class="list-group list-group-flush">
                                      <li class="list-group-item">{{ $ticket->user->name }}</li>
                                      <li class="list-group-item">{{ $ticket->user->email }}</li>

                                      @foreach ($profiles as $profile)
                                      @if ($ticket->user->id == $profile->user_id)


                                      <li class="list-group-item">Site :{{ $profile->site['site']}}</li>
                                      <li class="list-group-item">EXT. :{{ $profile->ip_phone}}</li>
                                      <li class="list-group-item">Phone :{{ $profile->mobile}}</li>

                                      @endif
                                      @endforeach
                                    </ul>
                                  </div>

                                    {{--  <div class="" >
                                        <p>{{ $ticket->user->name }}</p>
                                        <p>{{ $ticket->user->email }}</p>

                                            <ul class="list-group list-group-flush">


                                              @foreach ($profiles as $profile)
                                              @if ($ticket->user->id == $profile->user_id)


                                              <li class="list-group-item">Site :{{ $profile->site['site']}}</li>
                                              <li class="list-group-item">EXT. :{{ $profile->ip_phone}}</li>
                                              <li class="list-group-item">Phone :{{ $profile->mobile}}</li>

                                              @endif
                                              @endforeach
                                            </ul>

                                          </div>  --}}


                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col">
                                            <div class="card  mb-3 text-white bg-info" >
                                                    <div class="card-header">type</div>
                                                    <div class="card-body">

                                                            <div class="input-group mb-3">


                                                                        @foreach ($types as $type)

                                                                                @foreach ($ticket->types as $ty)
                                                                                @if ($type->id == $ty->id)
                                                                                {{ $type->type }}

                                                                                @endif
                                                                                @endforeach
                                                                                <br>

                                                                    @endforeach


                                                                    </div>


                                                    </div>
                                                  </div>
                                    </div>
                                    <div class="col">
                                            <div class="card  mb-3" >
                                                <div >

                                                    <div
                                                    @if ($ticket->priority_id == 1)

                                                    class=" card-header bg-secondary text-white"
                                                    @elseif ($ticket->priority_id == 2)

                                                    class=" card-header bg-warning"


                                                    @else
                                                    class=" card-header bg-danger"


                                                    @endif
                                                    >Priority</div>
                                                    <div  class="card-body">

                                                      <p class="card-text">{{ $ticket->priority->priority }}</p>
                                                    </div>
                                                  </div>
                                                </div>

                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col">
                                    <div class="card bg-light mb-3" >
                                        <div class="card-header">{{ $ticket->title }}</div>
                                        <div class="card-body">

                                          <p class="card-text">{{ $ticket->subject }}</p>
                                        </div>
                                      </div>
                                    </div>
                                </div>



                            </div>
                          </div>
            </div>

            <div class="card-footer  border-danger text-muted">
            <form method="post" action="{{ route('it.update',['id'=>$ticket->id]) }}" >
                    @csrf
                    <div class="form-group">
                            <label for="exampleFormControlTextarea1">Example textarea</label>
                            <textarea class="form-control" name="replay" id="replay" value="{{ $ticket->replay }}" rows="3" >{{ $ticket->replay }}</textarea>
                    </div>

                    <div class="input-group " >
                            <select name="status_id" class="custom-select" id="inputGroupSelect01" aria-label="Example select with button addon">
                             <option disabled selected>Choose...</option>
                                    @foreach ($status as $status_id)
                                    @if ($status_id->id == $ticket->status_id)
                                    <option value="{{ $status_id->id }}" selected>{{ $status_id->status }}</option>
                                       @else
                                    <option value="{{ $status_id->id }}">{{ $status_id->status }}</option>
                                   @endif
                                   @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Update</button>
                            </div>
                        </div>
                        @if ($ticket->ticket_time)

                        <span style="margin-right: 1rem;">Close Ticket at : {{ $ticket->ticket_time }} </span>
                        @endif
                        <span style="margin-right: 1rem;">By Eng : {{ $ticket->user->name }} </span>


            </form>
            </div>
          </div>



        @endforeach

        {{--  main code   --}}



        {{ $tickets->links() }}

</div>




@endsection
