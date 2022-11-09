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
                {{-- @include('layouts.cards') --}}
                <div class="bg-white p-3 mt-2 shadow" style="border-radius: 15px; height: 70vh;">
                    
                         <h3 style="color: #008ad3; ">Daily Report - Today Payments</h3>  
                {{-- <form>
                    <div class="row mt-4 mb-5" style="width: 700px;">
                        <div class="col-md-4">
                         <label>Start Date</label>
                         <input type="date" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>End Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary mt-4">Generate</button>

                        </div>

                    </div>
                </form> --}}
                         <table class="table mt-3">
                            <thead style="background-color: #bbd0d750; color: #008ad3;">
                              <th>No</th>
                              <th>Client</th>
                              <th>Payment Type</th>
                              <th>Amount(UGX)</th>
                              <th>Loan Type</th>
                              <th>Loan Amount(UGX)</th>
                              <th>Balance(UGX)</th>
                              <th>Time</th>
                              <th>Date</th>
                            </thead>
                            <tbody>
                                @foreach ($today_payments as $item)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$item->client->full_name}}</td>
                                    <td>{{$item->type->type}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>{{\App\Models\LoanType::find($item->loan->loan_type_id)->type}}</td>
                                    <td>{{number_format($item->loan->amount)}}</td>
                                    <td>{{number_format($item->loan->balance)}}</td>
                                    <td>{{$item->created_at->format('h:i A')}}</td>
                                    <td>{{$item->created_at->format('d-m-Y')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                          </table>  
                    @if (count($today_payments) == 0)
                        <p>No Payment Recorded Today</p>
                    @endif

                    
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
