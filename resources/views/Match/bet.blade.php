<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bet</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="main.js"></script>
    </head>
    <body>

   <div class="row">

<div class="col-lg-12 margin-tb">

    <div class="pull-left">

        <h2> Bet</h2>

    </div>

    <div class="pull-right">

        <a class="btn btn-primary" href="{{ route('match.index') }}"> Back</a>

    </div>

</div>

</div>
    {!! Form::open(array('route' => 'adminteam.store','method'=>'POST', 'files'=> true)) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Winner:</strong>
                {!! Form::text('winner', null, array('placeholder' => 'Winner','class' => 'form-control')) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Placement:</strong>
                {!! Form::text('placement', null, array('placeholder' => 'Placement','class' => 'form-control')) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bet:</strong>
                {!! Form::text('bet', null, array('placeholder' => '€','class' => 'form-control')) !!}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    {!! Form::close() !!}
    </body>
</html>