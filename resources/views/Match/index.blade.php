<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Match</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="main.js"></script>
</head>
<body>
   
<div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Match</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ url('/') }}"> Back</a>

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

   <th></th>
    <th>Score</th>
    <th></th>
    <th>Location</th>
    <th>Action</th>
    

</tr>

@foreach ($match as $val)

<tr>

<td><a href="{{ route('team.show',$val->id1) }}">{{ $val->name1}}</a></td>

<td><a href="{{ route('match.show',$val->id) }}">{{ $val->ScoreBoard}}</td>

<td><a href="{{ route('team.show',$val->id2) }}">{{ $val->name2}}</a></td>

<td>{{ $val->Placement}}</td>

<?php if ($val->ScoreBoard == NULL) { ?>
<td><a href="/bet">Bet - {{ $val->name1}}</a></td>
<?php } else { ?>
    <td><a href="#">You can't bet on finished evenement !</a></td>
<?php } ?>
</tr>

@endforeach

</table>

</body>
</html>