<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror" name="password">
                            </div>

                            <div class="form-group">
                                <label>Authority</label>
                                <select class="form-control @error('authority') is-invalid @enderror" name="authority">
                                    <option value="User">User</option>
                                    <option value="AdminPO">AdminPO</option>
                                    <option value="root">root</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Add</button>
                            <button type="reset" class="btn btn-md btn-warning">Reset</button>
                            <a style="display:flex;justify-content:center;float:right;"href="/users" class="btn btn-md btn-primary">Back</a>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>