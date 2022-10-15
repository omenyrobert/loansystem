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

                    <h3 style="color: #008ad3; ">Loans</h3>
                    <a href="{{ url('/loans') }}" class="text-decoration-none btn btn-primary">Back</a>
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
                    <form action="{{ route('loan.update', $loan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="m-2">
                            <label>loan</label>
                            <input type="number" name="client_id" value="{{ $loan->client_id }}" class="form-control mt-2" value="" placeholder="Full Name" required>
                        </div>
                        <div class="m-2">
                            <label>Type of Bike</label>
                            <select type="text" name="type_of_bike" value="{{ $loan->type_of_bike }}" class="form-control mt-2">
                                <option selected disabled>--select type of bike--</option>
                                <option value="Bajaj Bm 100">Bajaj Bm 100</option>
                                <option value="Bajaj CT 125">Bajaj CT 125</option>
                            </select>

                        </div>
                        <div class="m-2">
                            <label>Amount</label>
                            <input type="number" value="{{ $loan->amount }}" class="form-control mt-2" name="amount" placeholder="Enter Amount">
                        </div>
                        <div class="m-2">
                            <label>Number Plate</label>
                            <input type="text" name="contact1" value="{{ $loan->number_plate }}" class="form-control mt-2" placeholder="Enter First Contacts" required>
                        </div>

                        <div class="m-2">
                            <label>Type of loan</label>
                            <select type="text" value="{{ $loan->type_of_loan }}" name="type_of_loan" class="form-control mt-2">
                                <option selected disabled>--select type of loan--</option>
                                <option value="loan">Bike loan</option>
                                <option value="other">other</option>
                            </select>
                        </div>

                        <div class="m-2">
                            <label>Loan Duration</label>
                            <input type="number" value="{{ $loan->loan_duration }}" class="form-control mt-2" name="loan_duration" placeholder="Enter Loan Duration">
                        </div>
                        <div class="m-2">
                            <label>Reason</label>
                            <input type="text" value="{{ $loan->reason }}" class="form-control mt-2" name="reason" placeholder="Enter reason">
                        </div>
                        <div class="m-2">

                            <button class="btn btn-primary form-control mt-2" type="submit">Update</button>
                        </div>
                    </form>



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
