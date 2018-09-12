<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create Team</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="main.js"></script>
</head>
<body>
    


    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Add New team</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('adminteam.index') }}"> Back</a>

            </div>

        </div>

    </div>


    @if (count($errors) < 0)

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {!! Form::open(array('route' => 'adminteam.store','method'=>'POST', 'files'=> true)) !!}

         @include('Team.admin.form')

    {!! Form::close() !!}


</body>
</html>
