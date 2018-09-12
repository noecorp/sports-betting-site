<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Teams</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="main.js"></script>
</head>
<body>

   
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Teams</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-success" href="{{ route('adminteam.create') }}"> Create New Team</a>

        </div>

    </div>

</div>


@if ($message = Session::get('success'))

<div class="alert alert-success">

    <p>{{ $message }}</p>

</div>

@endif


<table class="table table-bordered">
           <th>Team</th>
            <th>Country</th>
            <th>Flag</th>
            <th>Logo</th>
            <th>Action</th>

<tr>

    @foreach ($teams as $team)

    <tr>

        
        <td>{{ $team->name}}</td>

        <td>{{ $team->country}}</td>

        <td><img width="30%" height="30%" src="/storage/flags/{{ $team->flag}}" /></td>

        <td><img width="70%" height="70%" src="/storage/logos/{{ $team->logo}}" /></td>

         <td>

<a href="{{ route('adminteam.show',$team->id) }}">Show</a>

<a  href="{{ route('adminteam.edit',$team->id) }}">Edit</a>

{!! Form::open(['method' => 'DELETE','route' => ['adminteam.destroy', $team->id],'style'=>'display:inline']) !!}

{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

{!! Form::close() !!}

</td>

</tr>

@endforeach

</table>

</body>
</html>