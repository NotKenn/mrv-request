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
                        <form action="{{ route('approvers.store') }}" method="POST" enctype="multipart/form-data">
                            
                            @csrf
                            <div class="form-group">
                                <label>Approval Date</label>
                                <input style="width:25%" type="date" class="form-control @error('approved_date') is-invalid @enderror" name="approved_date" value="{{old('approved_date', $approvers->approved_date}}">
                            
                                <!-- error message untuk title -->
                                @error('approved_date')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>User</label>
                                <select type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{old('user_id', $approvers->user_id}}">
                                        @foreach($approvers as $s)
                                            <option value="{{$s->id}}">{{$s->username}}</option>
                                        @endforeach
                                </select>
                            
                                <!-- error message untuk title -->
                                @error('item')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label>Order</label>
                                <select type="text" class="form-control @error('req_id') is-invalid @enderror" name="req_id" value="{{old('req_id', $approvers->req_id}}">
                                @foreach($orders as $o)
                                            <option value="{{$s->id}}">{{$o->item}}</option>
                                        @endforeach
                                </select>
                            
                                <!-- error message untuk title -->
                                @error('req_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control @error('isApproved') is-invalid @enderror" name="isApproved" value="{{old('isApproved', $approvers->isApproved}}" style="width:75%">
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                </select>
                            
                                <!-- error message untuk title -->
                                @error('isApproved')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Level</label>
                                <select class="form-control @error('level') is-invalid @enderror" name="level" value="{{old('level', $approvers->level}}" style="width:75%">
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
                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <button type="reset" class="btn btn-md btn-warning">Reset</button>
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