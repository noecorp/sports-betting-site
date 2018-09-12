<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="main.js"></script>
</head>
<body>

    <div class="row">

<div class="col-lg-12 margin-tb">

    <div class="pull-left">

        <h2>Edit team</h2>

    </div>

    <div class="pull-right">

        <a class="btn btn-primary" href="{{ route('adminteam.index') }}"> Back</a>

    </div>

</div>

</div>


@if (count($errors) > 0)

<div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif


{!! Form::model($teams, ['method' => 'PATCH','route' => ['adminteam.update', $teams->id], 'files' => true]) !!}

@include('Team.form')

{!! Form::close() !!}




</body>
</html>