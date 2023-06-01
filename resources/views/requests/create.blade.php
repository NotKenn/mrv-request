<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Request</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('requests.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label>Customer</label>
                                <select type="text" class="form-control @error('user_id') is-invalid @enderror" name="namaCust">
                                        @if(auth()->user()->authority === "User")
                                            <option value="{{auth()->user()->username}}">{{auth()->user()->username}}</option>
                                        @else
                                        @foreach($approvers as $s)
                                            <option value="{{$s->username}}">{{$s->username}}</option>
                                        @endforeach
                                        @endif
                                </select>
                            
                                <!-- error message untuk title -->
                                @error('customer')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Item</label>
                                <select type="text" class="form-control @error('itemName') is-invalid @enderror" name="namaItem">
                                        @foreach($items as $a)
                                            <option value="{{$a->itemName}}">{{$a->itemName}}</option>
                                        @endforeach
                                </select>
                            
                                <!-- error message untuk title -->
                                @error('itemName')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Level Of Approval</label>
                                <select class="form-control @error('level') is-invalid @enderror" name="level">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            
                                <!-- error message untuk title -->
                                @error('level')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status" style="width:75%">
                                    <option value="Not Approved">Not Approved</option>
                                    <option value="Approved">Approved</option>
                                </select>
                            
                                <!-- error message untuk title -->
                                @error('status')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Create At</label>
                                <input type="date" class="form-control @error('created_at') is-invalid @enderror" name="createDate" style="width:15%">
                            
                                <!-- error message untuk date -->
                                @error('created_at')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Updated At</label>
                                <input type="date" class="form-control @error('updated_at') is-invalid @enderror" name="updateDate" style="width:15%">
                            
                                <!-- error message untuk date -->
                                @error('updated_at')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <button type="reset" class="btn btn-md btn-warning">Reset</button>
                            <a style="display:flex;justify-content:center;float:right;"href="/requests"class="btn btn-md btn-primary">Back</a>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</body>
</html>