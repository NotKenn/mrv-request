<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data requests</title>
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
                        <a href="{{ route('requests.create') }}" class="btn btn-md btn-success mb-3">Add Orders</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Customer</th>
                                <th scope="col">Item</th>
                                <th scope="col">Level</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated at</th>
                                <th scope="col">Edit</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($requests as $request)
                                <tr>
                                    <td>{{ $request->customer }}</td>
                                    <td>{!! $request->item !!}</td>
                                    <td>{{ $request->level }}</td>
                                    <td>{{ $request->status }}</td>
                                    <td>{{ $request->created_at }}</td>
                                    <td>{{ $request->updated_at }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('requests.destroy', $request->id) }}" method="POST">
                                            <a href="{{ route('requests.show', $request->id) }}" class="btn btn-sm btn-dark">Show</a>
                                            <a href="{{ route('requests.edit', $request->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
                          {{ $requests->links() }}
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





