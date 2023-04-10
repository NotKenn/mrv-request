<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <hr>
                        <h4>{{ $request->customer }}</h4>
                        <p class="tmt-3">
                            Nomor Id: {!! $request->id !!}
                        </p>
                        <p class="tmt-3">
                            {!! $request->item !!}
                        </p>
                        <p class="tmt-3">
                            {!! $request->level !!}
                        </p>
                        <p class="tmt-3">
                            {!! $request->status !!}
                        </p>
                        <p class="tmt-3">
                            {!! $request->created_at !!}
                        </p>
                        <p class="tmt-3">
                            {!! $request->updated_at !!}
                        </p>
                        <a href="{{ route('requests.index')}}" class="btn btn-sm btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>