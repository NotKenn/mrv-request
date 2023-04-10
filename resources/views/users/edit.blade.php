<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body"> 
                        <form action="{{ route('users.update', $users->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control @error('customer') is-invalid @enderror" name="username" value="{{ old('username', $users->username) }}">
                        
                            <!-- error message untuk title -->
                            @error('customer')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                                <label>Authority</label>
                                <select class="form-control @error('authority') is-invalid @enderror" name="authority">
                                    <option value="User">User</option>
                                    <option value="AdminPO">AdminPO</option>
                                    <option value="root">root</option>
                                </select>
                            </div>
                        
                        <button type="submit" class="btn btn-md btn-primary">Update</button>
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
<script>
</script>
</body>
</html>