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
    <style>
        .tab-font {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div class="container-fluid" style="background-color: #bbd0d750;">
        @include('layouts.header')
        <div class="d-flex">
            <div class="col-md-2">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-10">
                @include('layouts.cards')
                <div class="bg-white p-3 mt-2 shadow overflow-auto" style="border-radius: 15px; height: 80vh;">
                    <div class="d-flex" style="justify-content: space-between">
                        <h3 style="color: #008ad3; ">loans</h3>
                        <h4 data-bs-toggle="modal" data-bs-target="#addloan" role="button" style="color: #008ad3; ">Add
                            Loan</h4>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your
                            input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">

                            <table class="table mt-3">
                                <thead style="background-color: #bbd0d750; color: #008ad3;">
                                    <th class="tab-font">No</th>
                                    <th class="tab-font">Full Name</th>
                                    <th class="tab-font">Amount Borrowed</th>
                                    <th class="tab-font">Paid</th>
                                    <th class="tab-font">Balance</th>
                                    <th class="tab-font">Type of Bike</th>
                                    <th class="tab-font">Type Of Loan</th>
                                    <th class="tab-font">Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($loans as $loan)
                                        <tr>
                                            <td class="tab-font">{{ ++$i }}</td>
                                            <td class="tab-font">{{ $loan->client->full_name }}</td>
                                            <td class="tab-font">{{ $loan->amount }}</td>
                                            <td class="tab-font">{{ $loan->amount }}</td>
                                            <td class="tab-font">{{ $loan->amount }}</td>
                                            <td class="tab-font">{{ $loan->type_of_bike }}</td>
                                            <td class="tab-font">{{ $loan->type_of_loan }}</td>
                                            <td class="tab-font">
                                                <div class="d-flex"> <a href="{{ route('loan.edit', $loan->id) }}"><i
                                                            class="bi bi-pencil m-1 text-warning"></i> </a>
                                                    <form action="{{ route('loan.destroy', $loan->id) }}"
                                                        method="POST">
                                                        @csrf<button type="submit" style="margin-top: -5px;"
                                                            class="btn btn-default"> <i
                                                                class="bi bi-trash-fill m-1 text-danger"></i></button>
                                                    </form>
                                                    <a href="{{ route('loan.show', $loan->id) }}"> <i
                                                            class="bi bi-eye-fill m-1 text-primary"></i></a>
                                                    <p style="margin-left: 20px;" class="text-success" role="button"
                                                        data-bs-toggle="modal" data-bs-target="#pay">Pay</p>
                                                    <p style="margin-left: 20px;" data-bs-toggle="modal" data-bs-target="#missed" class="text-info" role="button">
                                                        Missed</p>
                                                    <p style="margin-left: 20px;" class="text-primary" data-bs-toggle="modal" data-bs-target="#resc" role="button">
                                                        Reschedule</p>
                                                </div>

                                            </td>
                                            {{-- pay modal begin --}}
                                            <div class="modal fade" id="pay" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{ route('payment.store') }}" method="POST">
                                                            @csrf
                                                            <div class="modal-header bg-primary">
                                                                <h5 class="modal-title text-white" id="exampleModalLabel">Enter
                                                                    Payment</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body px-5">
                                                                <h3 class="text-primary">{{ $loan->client->full_name }}
                                                                </h3>
                                                                <br />
                                                                <input type="hidden" name="client_id"
                                                                    value="{{ $loan->client->id }}">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Enter Amount" name="amount">
                                                                <br />
                                                                <select name="type_id" class="form-control">
                                                                    <option selected disabled>--select Payment Type--
                                                                    </option>
                                                                    @foreach ($payment_types as $payment_type)
                                                                        <option value="{{ $payment_type->id }}">
                                                                            {{ $payment_type->type }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Add
                                                                    Payment</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- pay modal end --}}

                                               {{-- missed modal begin --}}
                                               <div class="modal fade" id="missed" tabindex="-1"
                                               aria-labelledby="exampleModalLabel" aria-hidden="true">
                                               <div class="modal-dialog">
                                                   <div class="modal-content">
                                                       <form action="{{ route('payment.store') }}" method="POST">
                                                           @csrf
                                                           <div class="modal-header bg-primary">
                                                               <h5 class="modal-title text-white" id="exampleModalLabel">Enter Missed Payment</h5>
                                                               <button type="button" class="btn-close"
                                                                   data-bs-dismiss="modal" aria-label="Close"></button>
                                                           </div>
                                                           <div class="modal-body px-5">
                                                               <h3 class="text-primary">{{ $loan->client->full_name }}
                                                               </h3>
                                                               <br />
                                                               <input type="hidden" name="client_id"
                                                                   value="{{ $loan->client->id }}">
                                                               <input type="number" class="form-control"
                                                                   placeholder="Enter Amount" name="amount">
                                                               <br />
                                                             
                                                           </div>
                                                           <div class="modal-footer">
                                                               <button type="button" class="btn btn-secondary"
                                                                   data-bs-dismiss="modal">Close</button>
                                                               <button type="submit" class="btn btn-primary">Add Missed Payment</button>
                                                           </div>
                                                       </form>
                                                   </div>
                                               </div>
                                           </div>
                                           {{-- missed modal end --}}

                                           {{-- missed modal begin --}}
                                           <div class="modal fade" id="resc" tabindex="-1"
                                           aria-labelledby="exampleModalLabel" aria-hidden="true">
                                           <div class="modal-dialog">
                                               <div class="modal-content">
                                                   <form action="{{ route('payment.store') }}" method="POST">
                                                       @csrf
                                                       <div class="modal-header bg-primary">
                                                           <h5 class="modal-title text-white" id="exampleModalLabel">Reschedule
                                                               Payment</h5>
                                                           <button type="button" class="btn-close"
                                                               data-bs-dismiss="modal" aria-label="Close"></button>
                                                       </div>
                                                       <div class="modal-body px-5">
                                                           <h3 class="text-primary">{{ $loan->client->full_name }}
                                                           </h3>
                                                           <br />
                                                           <label>Amount</label>
                                                           <input type="hidden" name="client_id"
                                                               value="{{ $loan->client->id }}">
                                                           <input type="number" class="form-control"
                                                               placeholder="Enter Amount" name="amount">
                                                           <br />
                                                           <label>Date</label>
                                                           <input type="date" class="form-control" name="date">
                                                          
                                                       </div>
                                                       <div class="modal-footer">
                                                           <button type="button" class="btn btn-secondary"
                                                               data-bs-dismiss="modal">Close</button>
                                                           <button type="submit" class="btn btn-primary">Reschedule
                                                               Payment</button>
                                                       </div>
                                                   </form>
                                               </div>
                                           </div>
                                       </div>
                                       {{-- missed modal end --}}





                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="modal fade" id="addloan" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <center>
                                            <h5 class="modal-title text-center text-white " id="exampleModalLabel">Add
                                                Loan</h5>
                                        </center>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="{{ route('loan.store') }}" method="POST">
                                            @csrf

                                            <div class="row" style="padding: 50px;">
                                                <div class="col-md-6">
                                                    <div class="m-2">
                                                        <label>client</label>
                                                        <select name="client_id" class="form-control">
                                                            <option selected disabled>--select Client--</option>
                                                            @foreach ($clients as $client)
                                                                <option value="{{ $client->id }}">
                                                                    {{ $client->full_name }}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <div class="m-2">
                                                        <label>Type of Bike</label>
                                                        <select type="text" name="type_of_bike"
                                                            class="form-control mt-2">
                                                            <option selected disabled>--select type of bike--</option>
                                                            <option value="Bajaj Bm 100">Bajaj Bm 100</option>
                                                            <option value="Bajaj CT 125">Bajaj CT 125</option>
                                                        </select>

                                                    </div>
                                                    <div class="m-2">
                                                        <label>Amount</label>
                                                        <input type="number" class="form-control mt-2"
                                                            name="amount" placeholder="Enter Amount">
                                                    </div>
                                                    <div class="m-2">
                                                        <label>Number Plate</label>
                                                        <input type="text" name="number_plate"
                                                            class="form-control mt-2"
                                                            placeholder="Enter Number Plate" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="m-2">
                                                        <label>Type of loan</label>
                                                        <select type="text" name="loan_type_id"
                                                            class="form-control mt-2">
                                                            <option selected disabled>--select type of loan--</option>
                                                            @foreach($loan_types as $loan_type)
                                                            <option value="{{$loan_type->id}}">{{$loan_type->type}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="m-2">
                                                        <label>Loan Duration</label>
                                                        <input type="number" class="form-control mt-2"
                                                            name="loan_duration" placeholder="Enter Loan Duration">
                                                    </div>
                                                    <div class="m-2">
                                                        <label>Reason</label>
                                                        <input type="text" class="form-control mt-2"
                                                            name="reason" placeholder="Enter reason">
                                                    </div>
                                                    <div class="m-2">

                                                        <button class="btn btn-primary form-control mt-2"
                                                            type="submit">Add Loan</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
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
