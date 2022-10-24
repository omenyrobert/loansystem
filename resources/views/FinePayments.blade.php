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
                @include('layouts.cards')
                <div class="bg-white p-3 mt-2 shadow" style="border-radius: 15px; height: 70vh;">
                    
                         <h3 style="color: #008ad3; ">Fine Payments</h3>  
                         <form>
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
                        </form>
                         <table class="table mt-3">
                            <thead style="background-color: #bbd0d750; color: #008ad3;">
                              <th>No</th><th>Client</th><th>Loan</th><th>Amount</th><th>Date</th><th>Status</th><th>Action</th>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td>1</td>
                                    <td>Omeny Robert</td>
                                    <td>Personal</td>
                                    <td>4,570,905</td>
                                    <td>22-11-2022</td>
                                    <td><span class="border-1 border-success text-success">cleared</span></td> 
                                    <td><i class="bi bi-eye-fill m-1 text-primary"></i></td>                                                                    
                                   
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Omoding Joshua</td>
                                    <td>Personal</td>
                                    <td>4,570,905</td>
                                    <td>22-11-2022</td>
                                    <td><span class="border-1 border-warning text-warning">cleared</span></td> 
                                    <td><i class="bi bi-eye-fill m-1 text-primary"></i></td>                                                                    
                                   
                                </tr>
                              
                            </tbody>
                          </table>  
                    

                    
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
