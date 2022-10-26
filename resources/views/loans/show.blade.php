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
                {{-- @include('layouts.cards') --}}
                <div class="bg-white p-3 mt-2 shadow overflow-auto" style="border-radius: 15px; height: 80vh;">

                    <h3 style="color: #008ad3; ">Loans</h3>
                    <a href="{{ url('/loans') }}" class="text-decoration-none btn btn-primary">Back</a>
                        <div class="row mt-5 p-1">
                            <div class="col-md-4">
                                <div class="m-4">
                                    <label>Photo</label> <br>
                                    <h3 style="color: #008ad3; "> {{ $loan->client->full_name }}</h3>
                                    {{-- <input type="file" class="form-control mt-2" name="photo" placeholder="Photo"> --}}
                                </div>
                                <div class="m-4">
                                     
                                    <br/>
                                    <h4 style="color: #05165b; "> Loan Amount: {{ $loan->amount }}</h4>
                                    <h6 style="color: #008ad3; "> Balance: {{ $loan->amount }}</h6>
                                    {{-- <p style="color: #008ad3; "> {{ $loan->amount }}</p> --}}
                                </div>
                                <div class="m-4">
                                    <label>Type of Bike</label><br/>
                                    <p class="text-primary">{{ $loan->type_of_bike }}</p>
                                </div>
                                <div class="m-4">
                                    <label>Type of Loan</label><br/>
                                    <p class="text-primary">{{ $loan->loan_type->type }}</p>
                                    
                                </div>

                                <div class="m-4">
                                    <label>Reason</label><br/>
                                    <p class="text-primary">{{ $loan->reason }}</p>
                                   
                                </div>



                            </div>
                            <div class="col-md-8">
                              {{-- <div class="m-2"> --}}
                                <h5 class="text-primary">Loan Payment History</h5>
                                <table class="table mt-3">
                                    <thead style="background-color: #bbd0d750; color: #008ad3;">
                                     <th style="font-size: 13px;">Type of Payment</th> 
                                     <th style="font-size: 13px;">Amount(UGX) </th>
                                     <th style="font-size: 13px;">Time</th>
                                     <th style="font-size: 13px;">date</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($loan_payments as $item)
                                        <tr>
                                            <td style="font-size: 13px;">{{$item->type->type}}</td>
                                            <td style="font-size: 13px;">{{number_format($item->amount)}}</td>
                                            <td style="font-size: 13px;">{{$item->created_at->format('h:i A')}}</td>
                                            <td style="font-size: 13px;">{{$item->created_at->format('d-m-Y')}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if (count($loan_payments) == 0)
                                    <p>No Payment Made</p>
                                @endif
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
