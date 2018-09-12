<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Players</title>
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
   

</tr>

@foreach ($players as $player)

<tr>


<td><a href="{{ route('player.show',$player->id) }}">{{ $player->Pname}}</a></td>

<td><a href="{{ route('team.show',$player->idT) }}">{{ $player->name}}</a></td>


</tr>

@endforeach

</table>

</body>
</html>