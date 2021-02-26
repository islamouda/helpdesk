@extends('layouts.app')

@section('content')
<div class="container">







    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('pages.user') }}">
                        <button  type="button" class="btn btn-success">User Page</button>
                    </a>

                    <a href="{{ route('administrator') }}">
                        <button  type="button" class="btn btn-success">Administrator</button>
                    </a>
                </div>






            </div>
        </div>
    </div>
</div>
@endsection
