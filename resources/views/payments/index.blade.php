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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                <div class="bg-white p-3 mt-2 shadow overflow-auto" style="border-radius: 15px; height: 80vh;">

                    <h3 style="color: #008ad3; ">Payments</h3>
                    <form method="POST" action="{{route('payment.generate')}}">
                        @csrf
                        <div class="row mt-4 mb-5" style="width: 90%;">
                            <div class="col-md-3">
                             <label>Start Date</label>
                             <input type="date" class="form-control" required name="start_date">
                            </div>
                            <div class="col-md-3">
                                <label>End Date</label>
                                <input type="date" class="form-control" required name="end_date">
                            </div>
                            <div class="col-md-3">
                                <label>Payment Type</label>
                                <select class="form-control" name="type">
                                    <option value="" selected="" disabled="">Select Payment Type</option>
                                    @foreach ($types as $item)
                                        <option value="{{$item->id}}">{{$item->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary mt-4">Generate</button>
    
                            </div>
    
                        </div>
                    </form>
                    <div class="row">
                        {{-- <div class="col-md-7"> --}}

                            <table class="table mt-3">
                                <thead style="background-color: #bbd0d750; color: #008ad3;">
                                  <th>No</th>
                                  <th>Client</th>
                                  <th>Amount Paid(UGX)</th>
                                  <th>Type of Payment</th>
                                  <th>Type Of Loan</th>
                                  <th>Time</th>
                                  <th>Date</th>
                                  <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{$payment->client->full_name}}</td>
                                        <td>{{ $payment->amount }}</td>
                                        <td>{{ $payment->type->type }}</td>                          
                                        <td>{{ \App\Models\LoanType::find($payment->loan->loan_type_id)->type }}</td>
                                        <td>{{ $payment->created_at->format('h:i A') }}</td>
                                        <td>{{ $payment->created_at->format('d-m-Y') }}</td>
                                        <td><div class="d-flex"> <a href="{{ route('loan.edit',$payment->id) }}"><i class="bi bi-pencil m-1 text-warning"></i> </a>
                                            {{-- <form action="{{ route('loan.destroy',$payment->id) }}" method="POST"> @csrf<button type="submit" style="margin-top: -5px;" class="btn btn-default"> <i class="bi bi-trash-fill m-1 text-danger"></i></button></form> --}}
                                             <a href="{{ route('loan.show',$payment->id) }}"> <i class="bi bi-eye-fill m-1 text-primary"></i></a></div></td>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table> 
                              @if (count($payments) == 0)
                              <p>No Payments Recorded</p>
                                  
                              @endif

                        {{-- </div> --}}
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
