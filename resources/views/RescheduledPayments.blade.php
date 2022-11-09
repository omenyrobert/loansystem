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
                    
                         <h3 style="color: #008ad3; ">Rescheduled Payments</h3>  
                         <table class="table mt-3">
                            <thead style="background-color: #bbd0d750; color: #008ad3;">
                                <th>No</th>
                                <th>Client</th>
                                <th>Loan Type</th>
                                <th>Amount to Pay(UGX)</th>
                                <th>Amount(UGX)</th>
                                <th>Balance(UGX)</th>
                                <th>Date to Pay</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($reschedule_payments as $item)
                                <tr>

                                    <td>{{++$i}}</td>
                                    <td>{{$item->client->full_name}}</td>
                                    <td>{{\App\Models\LoanType::find($item->loan->loan_type_id)->type}}</td>
                                    <td>{{number_format($item->amount)}}</td>
                                    <td>{{number_format($item->loan->amount)}}</td>
                                    <td>{{number_format($item->loan->balance)}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->reschedule_date)->format('d-m-Y')}}</td>
                                    <td>{{$item->created_at->format('h:i A')}}</td>                                                                    
                                    <td>{{$item->created_at->format('d-m-Y')}}</td>
                                   <td>
                                    @if ($item->cleared == 0)
                                    <p style="margin-left: 20px;" class="text-danger" role="button"
                                    data-bs-toggle="modal" data-bs-target="#pay">Clear</p>
                                    @else
                                    <p style="margin-left: 20px;" class="text-success" role="button"
                                    >Cleared</p>
                                    @endif
                                   </td>
                                </tr>
                                <div class="modal fade" id="pay" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('payment.clear') }}" method="POST">
                                            @csrf
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title text-white" id="exampleModalLabel">Clear
                                                    Payment</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body px-5">
                                                <p>Are You sure you to Clear this Payment of UGX {{$item->amount}}?</p>
                                                <input type="hidden" value="{{$item->id}}" name="payment_id">
                                                <input type="hidden" value="{{$item->loan->id}}" name="loan_id">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Clear
                                                    Payment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                            </tbody>
                          </table>  
                    @if (count($reschedule_payments) == 0)
                        <p>No Payment Rescheduled</p>
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
