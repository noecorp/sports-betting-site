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

        <h2>Edit player</h2>

    </div>

    <div class="pull-right">

        <a class="btn btn-primary" href="{{ route('adminplayer.index') }}"> Back</a>

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


{!! Form::model($players, ['method' => 'PATCH','route' => ['adminplayer.update', $players->id], 'files' => true]) !!}

<div class="row">

<div class="col-xs-12 col-sm-12 col-md-12">

    <div class="form-group">

        <strong>Player:</strong>

        {!! Form::text('Pname', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

    </div>

</div>

<div class="col-xs-12 col-sm-12 col-md-12">

    <div class="form-group">

        <strong>Team:</strong>
       

      {!! Form::select('team_id', $select ,null, array('placeholder' => 'Select a team..','class' => 'form-control')) !!}

    
    </div>

</div>

<div class="col-xs-12 col-sm-12 col-md-12">

    <div class="form-group">

        <strong>Photo:</strong>
   
        {{ csrf_field() }}
        {!! Form::file('photo', null, array('placeholder' => 'Photo','class' => 'form-control')) !!}

    </div>

</div>


<div class="col-xs-12 col-sm-12 col-md-12 text-center">

        <button type="submit" class="btn btn-primary">Submit</button>

</div>

</div>

    {!! Form::close() !!}
{!! Form::close() !!}




</body>
</html>