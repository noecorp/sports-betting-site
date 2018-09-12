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
            

<tr>

    @foreach ($teams as $team)

    <tr>

        
        <td><a href="{{ route('team.show',$team->id) }}">{{ $team->name}}</a></td>

        <td>{{ $team->country}}</td>

        <td><img width="30%" height="30%" src="/storage/flags/{{ $team->flag}}" /></td>

        <td><img width="30%" height="30%" src="/storage/logos/{{ $team->logo}}" /></td>

</tr>

@endforeach

</table>

</body>
</html>