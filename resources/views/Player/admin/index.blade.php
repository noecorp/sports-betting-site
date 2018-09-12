<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="main.js"></script>
</head>
<body>
    

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Players</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('adminplayer.create') }}"> Create New Player</a>

            </div>

        </div>

    </div>


    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif


    <table class="table table-bordered">

        <tr>

           <th>Player</th>
            <th>Team</th>
            <th>Photo</th>
            <th>Action</th>

        </tr>

    @foreach ($players as $player)

    <tr>

        
        <td>{{ $player->Pname}}</td>

        <td>{{ $player->name}}</td>

        <td><img width="30%" height="30%" src="/storage/photos/{{ $player->photo }}" /></td>


        <td>

            <a href="{{ route('adminplayer.show',$player->id) }}">Show</a>

            <a  href="{{ route('adminplayer.edit',$player->id) }}">Edit</a>

            {!! Form::open(['method' => 'DELETE','route' => ['adminplayer.destroy', $player->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}

        </td>

    </tr>

    @endforeach

    </table>


</body>
</html>