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
    <title>Church System</title>
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
                        <div class="row mt-5 p-1">
                            <div class="col-md-6">
                                <div class="m-4">
                                    <label>Photo</label>
                                    {{ $loan->date_of_birth }}
                                    {{-- <input type="file" class="form-control mt-2" name="photo" placeholder="Photo"> --}}
                                </div>
                                <div class="m-4">
                                    <h3 style="color: #008ad3; "> {{ $loan->full_name }}</h3>
                                    <br/>
                                    <h4 style="color: #05165b; "> {{ $loan->amount }}</h4>
                                    <h6 style="color: #008ad3; "> {{ $loan->amount }}</h6>
                                    <p style="color: #008ad3; "> {{ $loan->amount }}</p>
                                </div>
                                <div class="m-4">
                                    <label>Type of Bike</label>
                                    {{ $loan->type_of_bike }}
                                </div>
                                <div class="m-4">
                                    <label>Type of Loan</label>
                                    {{ $loan->type_of_loan }}
                                    
                                </div>

                               

                                <div class="m-4">
                                    <label>Reason</label>
                                    {{ $loan->contact1 }}
                                   
                                </div>



                            </div>
                            <div class="col-md-6 d-flex">
                              <div class="m-2">
                                <h3 class="text-primary">Payment history</h3>
                                <table class="table mt-3">
                                    <thead style="background-color: #bbd0d750; color: #008ad3;">
                                     <th>Type of Loan</th> <th>Amount </th><th>Time</th><th>date</th><th>Balance</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>other</td><td>20,000</td><td>10:00pm</td><td>20-10-2022</td><td>4,500,000</td>
                                        </tr>
                                        <tr>
                                            <td>Motor Bike</td><td>20,000</td><td>10:00pm</td><td>20-10-2022</td><td>4,500,000</td>
                                        </tr>
                                        <tr>
                                            <td>other</td><td>20,000</td><td>10:00pm</td><td>20-10-2022</td><td>4,500,000</td>
                                        </tr>
                                    </tbody>
                                </table>
                              </div>
                              <div class="m-2">
                                <h3 class="text-primary">Missed Payments</h3>
                                <table class="table mt-3">
                                    <thead style="background-color: #bbd0d750; color: #008ad3;">
                                     <th>Type of Loan</th> <th>Amount </th><th>Time</th><th>date</th><th>Balance</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>other</td><td>20,000</td><td>10:00pm</td><td>20-10-2022</td><td>4,500,000</td>
                                        </tr>
                                        <tr>
                                            <td>Motor Bike</td><td>20,000</td><td>10:00pm</td><td>20-10-2022</td><td>4,500,000</td>
                                        </tr>
                                        <tr>
                                            <td>other</td><td>20,000</td><td>10:00pm</td><td>20-10-2022</td><td>4,500,000</td>
                                        </tr>
                                    </tbody>
                                </table>
                              </div>
                            </div>

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
