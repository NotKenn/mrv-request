<!DOCTYPE html>
<html>
<head>
	<title>Orders Report</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Orders Report</h4>
	</center>
 
	<div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Item</th>
                                <th scope="col">Level</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Updated at</th>
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
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Not Available.
                                  </div>
                              @endforelse
                            </tbody>
                          </table> 
</body>
</html>