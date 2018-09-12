<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Stats</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="main.js"></script>
    </head>
    <body>

   <div class="row">

<div class="col-lg-12 margin-tb">

    <div class="pull-left">

        <h2> Match stats</h2>

    </div>

    <div class="pull-right">

        <a class="btn btn-primary" href="{{ route('match.index') }}"> Back</a>

    </div>

</div>

</div>

        <table class="table table-bordered">
            <tr>
               
                <th></th>
                <th>ScoreBoard</th>
                <th></th>
                <th>Placement</th>
            </tr>

            <tr>
                
                <td>{{ $match->name1 }}</td>
                <td>{{ $match->ScoreBoard }}</td>
                <td>{{ $match->name2 }}</td>
                <td>{{ $match->Placement }}</td>
            </tr>

        </table>
    </body>
</html>