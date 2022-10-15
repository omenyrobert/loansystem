<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Loan System</title>
</head>

<body>
    <div class="container-fluid" style="background-color: #bbd0d750;">
        @include('layouts.header')
        <div class="d-flex">
            <div class="col-md-2">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-3 p-2">
                        <div class="bg-white shadow-sm p-3" style="border-radius: 15px; height: 130px;">
                            <div class="d-flex" style="justify-content: space-between;">
                                <p>Loans</p>
                                <i style="color: 041854;" class="bi bi-bank"></i>
                            </div>
                            <br />
                            <h4 style="color: #008ad3;">22</h4>
                        </div>
                    </div>
                    <div class="col-md-3 p-2">
                        <div class="bg-white shadow-sm p-3" style="border-radius: 15px; height: 130px;">
                            <div class="d-flex" style="justify-content: space-between;">
                                <p>Users</p>
                                <i style="color: 041854;" class="bi bi-people"></i>
                            </div><br />
                            <h4 style="color: #008ad3;">12</h4>
                        </div>

                    </div>
                    <div class="col-md-3 p-2">
                        <div class="bg-white shadow-sm p-3" style="border-radius: 15px; height: 130px;">
                            <div class="d-flex" style="justify-content: space-between;">
                                <p>Loans</p>
                                <i style="color: 041854;" class="bi bi-bank"></i>
                            </div><br />
                            <h4 style="color: #008ad3;">22</h4>
                        </div>

                    </div>
                    <div class="col-md-3 p-2">
                        <div class="bg-white shadow-sm p-3" style="border-radius: 15px; height: 130px;">
                            <div class="d-flex" style="justify-content: space-between;">
                                <p>Loans</p>
                                <i style="color: 041854;" class="bi bi-bank"></i>
                            </div>
                            <br />
                            <h4 style="color: #008ad3;">22</h4>
                        </div>

                    </div>

                </div>
                <div class="bg-white p-3 mt-2 shadow overflow-auto" style="border-radius: 15px; height: 80vh;">

                    <h3 style="color: #008ad3; ">loans</h3>
                    <a href="{{ url('/loans') }}" class="text-decoration-none btn btn-primary">Back</a>
                    <div class="row">
                        <div class="col-md-7">

                            <table class="table mt-3">
                                <thead style="background-color: #bbd0d750; color: #008ad3;">
                                  <th>No</th><th>Full Name</th><th>Amount Borrowed</th><th>Paid</th><th>Balance</th><th>Type of Bike</th><th>Type Of Loan</th><th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($loans as $loan)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>Omeny Robert</td>
                                        <td>{{ $loan->amount }}</td>
                                        <td>{{ $loan->amount }}</td>                          
                                        <td>{{ $loan->amount }}</td>
                                        <td>{{ $loan->type_of_bike }}</td>
                                        <td>{{ $loan->type_of_loan }}</td>
                                        <td><div class="d-flex"> <a href="{{ route('loan.edit',$loan->id) }}"><i class="bi bi-pencil m-1 text-warning"></i> </a>
                                            <form action="{{ route('loan.destroy',$loan->id) }}" method="POST"> @csrf<button type="submit" style="margin-top: -5px;" class="btn btn-default"> <i class="bi bi-trash-fill m-1 text-danger"></i></button></form>
                                             <a href="{{ route('loan.show',$loan->id) }}"> <i class="bi bi-eye-fill m-1 text-primary"></i></a></div></td>
                                        {{-- <td>
                                            <form action="{{ route('destroy',$loan->id) }}" method="POST">
                                  
                                                <a class="btn btn-info" href="{{ route('show',$loan->id) }}">Show</a>
                                   
                                                <a class="btn btn-primary" href="{{ route('edit',$loan->id) }}">Edit</a>
                                  
                                                @csrf
                                                @method('DELETE')
                                     
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table> 

                        </div>
                        <div class="col-md-5">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('loan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                    <div class="m-2">
                                        <label>loan</label>
                                        <input type="number" name="loan_id" class="form-control mt-2" placeholder="Full Name" required>
                                    </div>
                                    <div class="m-2">
                                        <label>Type of Bike</label>
                                        <select type="text" name="type_of_bike" class="form-control mt-2">
                                            <option selected disabled>--select type of bike--</option>
                                            <option value="Bajaj Bm 100">Bajaj Bm 100</option>
                                            <option value="Bajaj CT 125">Bajaj CT 125</option>
                                        </select>
    
                                    </div>
                                    <div class="m-2">
                                        <label>Amount</label>
                                        <input type="number" class="form-control mt-2" name="amount" placeholder="Enter Amount">
                                    </div>
                                    <div class="m-2">
                                        <label>Number Plate</label>
                                        <input type="text" name="contact1" class="form-control mt-2" placeholder="Enter First Contacts" required>
                                    </div>
    
                                    <div class="m-2">
                                        <label>Type of loan</label>
                                        <select type="text" name="type_of_loan" class="form-control mt-2">
                                            <option selected disabled>--select type of loan--</option>
                                            <option value="loan">Bike loan</option>
                                            <option value="other">other</option>
                                        </select>
                                    </div>
    
                                    <div class="m-2">
                                        <label>Loan Duration</label>
                                        <input type="number" class="form-control mt-2" name="loan_duration" placeholder="Enter Loan Duration">
                                    </div>
                                    <div class="m-2">
                                        <label>Reason</label>
                                        <input type="text" class="form-control mt-2" name="reason" placeholder="Enter reason">
                                    </div>
                                    <div class="m-2">
        
                                        <button class="btn btn-primary form-control mt-2" type="submit">Add Loan</button>
                                    </div>
                        </form>
                        </div>

                    </div>

           



                </div>

            </div>

        </div>

    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->

</body>

</html>
