@php
    $today_payments = \App\Models\Payments::whereDate('created_at',\Carbon\Carbon::now()->format('Y-m-d'))
                                            ->where('cleared',1)
                                            ->sum('amount');
    $all_payments = \App\Models\Payments::where('cleared',1)
                                            ->sum('amount');  
    $all_incomes = \App\Models\Incomes::sum('income');  
    $all_expenses = \App\Models\Expenses::sum('expense');                                        

@endphp
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Church System</title>
</head>

<body>
    <div class="container-fluid" style="background-color: #bbd0d750; height: 120vh;">
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
                                <p>Incomes</p>
                                <i style="color: 041854;" class="bi bi-bank"></i>
                            </div>
                            <br/>
                            <h4 style="color: #008ad3;">{{number_format($all_incomes)}}</h4>
                        </div>
                    </div>
                    <div class="col-md-3 p-2">
                        <div class="bg-white shadow-sm p-3" style="border-radius: 15px; height: 130px;">
                            <div class="d-flex" style="justify-content: space-between;">
                                <p>Church Members</p>
                                <i style="color: 041854;" class="bi bi-people"></i>
                            </div><br/>
                            <h4 style="color: #008ad3;">{{count(\App\Models\Member::all())}}</h4>
                        </div>

                    </div>
                    <div class="col-md-3 p-2">
                        <div class="bg-white shadow-sm p-3" style="border-radius: 15px; height: 130px;">
                            <div class="d-flex" style="justify-content: space-between;">
                                <p>Expenses</p>
                                <i style="color: 041854;" class="bi bi-bank"></i>
                            </div><br/>
                            <h4 style="color: #008ad3;">{{number_format($all_expenses)}}</h4>
                        </div>

                    </div>
                    <div class="col-md-3 p-2">
                        <div class="bg-white shadow-sm p-3" style="border-radius: 15px; height: 130px;">
                            <div class="d-flex" style="justify-content: space-between;">
                                <p>Available Ballance</p>
                                <i style="color: 041854;" class="bi bi-bank"></i>
                            </div>
                            <br/>
                            <h4 style="color: #008ad3;">{{number_format($all_incomes-$all_expenses)}}</h4>
                        </div>

                    </div>

                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <div class="bg-white p-5 mt-2 shadow" style="border-radius: 15px; height: 70vh;">  
                            <canvas id="myChart" style="width: 70%; height: 300px;"></canvas>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-white p-5 mt-2 shadow ml-2 chart-container" style="border-radius: 15px; display: flex;
                        height: 70vh;">  
                            <canvas id="myChart2" style="width: 80%; margin: auto; height: 400px;"></canvas>
                        </div>
                    </div>
                   
                    
                </div>

            </div>

        </div>

    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: 'Remoting time',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 206, 86)',
                        'rgba(75, 192, 192)',
                        'rgba(153, 102, 255)',
                        'rgba(255, 159, 64)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        const ctx2 = document.getElementById('myChart2').getContext('2d');
        const myChart2 = new Chart(ctx2, {
            type: 'line',
            
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: 'Loans Payments',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 206, 86)',
                        'rgba(75, 192, 192)',
                        'rgba(153, 102, 255)',
                        'rgba(255, 159, 64)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->

</body>

</html>
