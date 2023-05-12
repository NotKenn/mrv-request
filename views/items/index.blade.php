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
                        <a href="{{ route('items.create') }}" class="btn btn-md btn-success mb-3">Add Items</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Item Name</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($items as $item)
                                <tr>
                                    <td>{{ $item->itemName }}</td>
                                    <td style="width:30%;">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('items.destroy', $item->id) }}" method="POST">
                                            <a href="{{ route('items.show', $item->id) }}" class="btn btn-sm btn-dark">Show</a>
                                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
                          {{ $items->links() }}
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





