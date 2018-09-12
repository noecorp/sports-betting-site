@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!<br><br>

                    <a  href="{{ url('/') }}">Back to Home Page </a><br>
                    <a  href="{{ url('adminteam') }}">Team administration</a><br>
                    <a  href="{{ url('adminplayer') }}">Players administration</a><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
