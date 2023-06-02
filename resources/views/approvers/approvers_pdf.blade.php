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
		<h5>Items Report</h4>
	</center>
 
	<div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
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