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
    <div class="container-fluid">
<div class="row">
    <div class="col-md-8" style="background-image: url('https://res.cloudinary.com/dtlkiv19d/image/upload/v1665728556/bg_wis1np.png'); background-size: 100%; height: 100vh;">

    <img src="https://res.cloudinary.com/dtlkiv19d/image/upload/v1665728637/bajaj_ra3cfl.png" style="width: 450px; margin-left: 150px; margin-top: 30vh;">
    <br/><br/>
    <h4 class="text-white" style="margin-left: 170px; ">
        Muramuzi Bodaboda Loan System</h4>

    </div>
    <div style="height: 100vh;" class="col-md-4 my-3 p-5">

        <div class="bg-white" style="margin-top: 20vh; margin-left: -100px; width: 400px;">
            <div style="margin-left: 10px; text-align: center;">
            <h4 class="text-primary">Login and Manage</h4>
            <h4 class="text-primary">Your Loans</h4>
            </div>
            <br/>
         <form class="p-3" method="POST" action="{{route('login')}}">
            @csrf
           <label>Email</label>
           <br/>
           <input type="email" class="form-control" placeholder="Enter Email" name="email">
           <br/>
           <label>Password</label>
           <br/>
           <input type="password" class="form-control" placeholder="Enter Password" name="password">
           <br/>
           <button type="submit" style="background-color:#041854; color: #fff;"  class="form-control btn btn-default">Login</button>
   
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
