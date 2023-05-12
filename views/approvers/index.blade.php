<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Approving List</title>
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
                        <a href="{{ route('approvers.create') }}" class="btn btn-md btn-success mb-3">Assign User</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Approved Date</th>
                                <th scope="col">Approver Id</td>
                                <th scope="col">Approver Name</td>
                                <th scope="col">Order Id</th>
                                <th scope="col">Approved</th>
                                <th scope="col">Level</th>
                                <th scope="col">Edit</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($approvers as $approver)
                                <tr>
                                    <td>{{ $approver->approved_date }}</td>
                                    <td>{{ $approver->user_id }}</td>
                                    <td>{{ $approver->user->username}}</td>
                                    <td>{{ $approver->req_id }}</td>
                                    <td>{{ $approver->isApproved}}</td>
                                    <td>{{ $approver->level }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('approvers.destroy', $approver->id) }}" method="POST">
                                            <a href="{{ route('approvers.show', $approver->id) }}" class="btn btn-sm btn-dark">Show</a>
                                            <a href="{{ route('approvers.edit', $approver->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
                          {{ $approvers->links() }}
                        <a href="/"><button class="btn btn-md btn-success mb-3" style="background-color:blue">Home</button></a>
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