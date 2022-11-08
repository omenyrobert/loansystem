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
    <div class="container p-5">
      <h2 class="text-primary text-center">Muramuzi Bodaboda Loan System</h2>
      <h4 class="text-primary text-center">Payment Receipt</h4>
      <div class="d-flex justify-content-between"><p>+256 700 665919</p><p class="ml-5">Wandegeya University plaza</p></div>
      Date of Payment: {{$print_data->created_at->format('d-m-Y')}}
      <hr class="bg-primary"/>
      <br/>
      <div class="d-flex justify-content-between"><p><b>Amount Paid</b>:  UGX {{$print_data->amount}}</p><p class="ml-5"><b>Balance:</b> UGX {{$print_data->loan->balance}}</p></div>
      
      <br/>
      <p>Paid by: {{$print_data->client->full_name}}</p>

    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->

</body>

<script>
    (function(){
        window.print();
    })();
</script>

</html>
