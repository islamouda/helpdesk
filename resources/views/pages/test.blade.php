@extends('layouts.main_user')

@section('ticket')

@section('css')
    <style>


            {{-- .first {
                display:block;
                visibility:hidden;
            }

            .first:first-letter {
                visibility:visible;
            }​ --}}


            .skillbar-title span {
                display:block;
                background:rgba(0, 0, 0, 0.1);
                padding:1px 20px;
                height:35px;
                line-height:35px;
                -webkit-border-top-left-radius:3px;
                -webkit-border-bottom-left-radius:3px;
                -moz-border-radius-topleft:3px;
                -moz-border-radius-bottomleft:3px;
                border-top-left-radius:3px;
                border-bottom-left-radius:3px;
                font-size: medium;
                display: ruby-text;

                }


            }

    </style>
@endsection




@section('ticket')


<div class="container">
        <div class="row">
          <div class="col-sm">
                <div class="card">
                        <div class="card-header">
                          Featured
                        </div>
                        <div class="card-body ">

                          <h5 class="card-title">Ticket Daily Status</h5>
                          <hr>
                          <p class="card-text" style="display:inline; margin-right:1rem;">Ticket : {{ $ticket_count }}</p>
                          <p class="card-text" style="display:inline; margin-right:1rem;">Open Ticket  : {{ $ticket_open_count }}</p>
                          <p class="card-text" style="display:inline; margin-right:1rem;">Close Ticket  : {{ $ticket_close_count }}</p>
                          <hr>
                          {{-- code for skells start --}}
                          <div class="skillbar clearfix progress" data-percent="{{ $ticket_open_percent  }}%">
                                <div class="skillbar-title" ><span>Open</span></div>
                                <div class="progress-bar progress-bar-danger progress-bar-striped active skillbar-bar " role="progressbar"
                                 aria-valuemin="0" aria-valuemax="100"  >
                                {{ $ticket_open_percent  }}%
                                </div>

                              </div>
                          {{-- code for skells end --}}

                        {{-- code for skells start --}}
                        <div class="skillbar clearfix progress" data-percent="{{ $ticket_close_percent  }}%">
                            <div class="skillbar-title" ><span>Close</span></div>
                            <div class="progress-bar progress-bar-success progress-bar-striped active skillbar-bar " role="progressbar"
                                aria-valuemin="0" aria-valuemax="100"  >
                            {{ $ticket_close_percent  }}%
                            </div>

                            </div>
                        {{-- code for skells end --}}
<hr>
@foreach ($recipient_tests as $recipient_test)


@php
    $recipientid = App\User::find($recipient_test->recipient_id);
@endphp
@php
    $test1 = ($recipient_test->count / $ticket_close_count)*100;
    $test = round($test1,0,PHP_ROUND_HALF_UP);
@endphp
{{-- code for skells start --}}
<span class="first">{{ $recipientid->name }}</span>
<div class="skillbar clearfix progress" data-percent="{{ $test  }}%">
        <div class="progress-bar progress-bar-striped active skillbar-bar " role="progressbar"
        aria-valuemin="0" aria-valuemax="100"  >
        {{ $test  }}%
        </div>

    </div>
{{-- code for skells end --}}
@endforeach
                        </div>
                      </div>
          </div>
          <div class="col-sm">
            <div class="card">
              <div class="card-header">
                Featured
              </div>
              <div class="card-body ">
                <h5 class="card-title">Ticket Daily Status</h5>

                <div class="row">
                  <div class="col-sm">
                    {{-- card start  --}}
                    <div class="card" >
                      <div class="card-body">
                        <h5 class="card-title">All Ticket</h5>
                        <p class="card-text "><span class="count">{{ $ticket_count }}</span>  Ticket</p>

                      </div>
                    </div>
                    {{-- card end --}}
                  </div>
                  <div class="col-sm">
                  {{-- card start  --}}
                  <div class="card" >
                  <div class="card-body">
                    <h5 class="card-title">Open Ticket</h5>
                    <p class="card-text"><span class="count">{{ $ticket_open_count }}</span>  Ticket</p>

                  </div>
                  </div>
                  {{-- card end --}}
                  </div>
                  <div class="col-sm">
                  {{-- card start  --}}
                  <div class="card" >
                  <div class="card-body">
                    <h5 class="card-title">Close Ticket</h5>
                    <p class="card-text"><span class="count">{{ $ticket_close_count }}</span>  Ticket</p>

                  </div>
                  </div>
                  {{-- card end --}}
                  </div>
                </div>
<hr>
<h5 class="card-title">Ticket Priority Status</h5>

        <div class="row">
          <div class="col-sm">
            {{-- card start  --}}
            <div class="card" >
              <div class="card-body">
                <h5 class="card-title">High</h5>
                <p class="card-text"><span class="count">{{ $ticket_high_counts }}</span>  Ticket</p>

              </div>
            </div>
            {{-- card end --}}
          </div>
          <div class="col-sm">
          {{-- card start  --}}
          <div class="card" >
          <div class="card-body ">
            <h5 class="card-title">Normal</h5>
            <p class="card-text"><span class="count">{{ $ticket_normal_counts }}</span>  Ticket</p>

          </div>
          </div>
          {{-- card end --}}
          </div>
          <div class="col-sm">
          {{-- card start  --}}
          <div class="card" >
          <div class="card-body">
            <h5 class="card-title">Low</h5>
            <p class="card-text"><span class="count">{{ $ticket_low_counts }}</span>  Ticket</p>

          </div>
          </div>
          {{-- card end --}}
          </div>
        </div>

              </div>
            </div>
          </div>
        </div>
      </div>


 {{-- <div class="skillbar clearfix progress" data-percent="{{ $ticket_open_percent  }}%">
    <div class="skillbar-title" ><span>Open</span></div>
    <div class="progress-bar progress-bar-striped active skillbar-bar " role="progressbar"
    aria-valuenow="{{ $ticket_open_percent  }}" aria-valuemin="0" aria-valuemax="100" >
    {{ $ticket_open_percent  }}%
    </div>

  </div> --}}
{{--
  <div class="skillbar clearfix progress" data-percent="{{ $ticket_close_percent  }}%">
        <div class="skillbar-title" ><span>Close</span></div>
    <div class="progress-bar progress-bar-danger progress-bar-striped active skillbar-bar " role="progressbar"
    aria-valuenow="{{ $ticket_close_percent  }}" aria-valuemin="0" aria-valuemax="100" >
    {{ $ticket_close_percent  }}%
    </div>

  </div> --}}



@endsection




@section('js')
    <script>

        jQuery(document).ready(function(){
            jQuery('.skillbar').each(function(){
                jQuery(this).find('.skillbar-bar').animate({
                    width:jQuery(this).attr('data-percent')
                },6000);
            });
        });


        $('.count').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 3000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });

    </script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
@endsection



@endsection



