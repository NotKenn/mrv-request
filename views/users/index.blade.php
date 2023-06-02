<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">MRV Requests</h3>
                    <h5 class="text-center">MRV Requests Program</h5>         
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('users.create') }}" class="btn btn-md btn-success mb-3">Add User</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Authority</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->username }}</td>
                                    <td>{!! $user->authority !!}</td>
                                    <td style="width:25%">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-dark">Show</a>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Not Available.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>
                          {{ $users->links() }}
                          <a href="/"><button class="btn btn-md btn-success mb-3" style="background-color:blue">Home</button></a>
                    </div>
                </div>
                @else
                <div class ="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <p style="font-size:larger"><center>You don't Have The Authority To Access This Page</center></p>
                        <a href="/"><center><button class="btn btn-md btn-success mb-3" style="background-color:blue">Back to Home</center></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>