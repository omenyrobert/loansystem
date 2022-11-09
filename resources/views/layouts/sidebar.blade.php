<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Church System</title>
  </head>
  <body>
   <div class="p-3" style="height: 100vh; position: fixed; overflow-y: auto; width:200px; color: #fff; background-color: #047cde; border-radius: 10px;">
   
    <a href="{{ url('/dashboard') }}" class="d-flex text-white text-decoration-none"   style="justify-content: space-between;">
    <div class="d-flex">
        <i class="bi bi-speedometer"></i><p  style="margin-left: 10px; font-size: 14px; font-weight:300;">Dashboard</p>
    </div>
    <div>
    <i  class="bi bi-arrow-right"></i>
    </div>
</a>
<a href="{{ url('/members') }}" class="d-flex text-white text-decoration-none" style="justify-content: space-between;">
    <div class="d-flex">
        <i class="bi bi-people"></i><p  style="margin-left: 10px; font-size: 14px; font-weight:300;">Members</p>
    </div>
    <div>
    <i  class="bi bi-arrow-right"></i>
    </div>
</a>
<a href="{{ route('income.index') }}" class="d-flex text-white text-decoration-none"  style="justify-content: space-between;">
    <div class="d-flex">
        <i class="bi bi-people"></i><p  style="margin-left: 10px; font-size: 14px; font-weight:300;">Incomes</p>
    </div>
    <div>
    <i  class="bi bi-arrow-right"></i>
    </div>
</a>
<a href="{{ route('income_type.index') }}" class="d-flex text-white text-decoration-none"  style="justify-content: space-between;">
    <div class="d-flex">
        <i class="bi bi-file-earmark-bar-graph"></i><p  style="margin-left: 10px; font-size: 14px; font-weight:300;">Income Types</p>
    </div>
    <div>
    <i  class="bi bi-arrow-right"></i>
    </div>
</a>
<a href="{{ route('expense.index') }}" class="d-flex text-white text-decoration-none"  style="justify-content: space-between;">
    <div class="d-flex">
        <i class="bi bi-file-earmark-bar-graph"></i><p  style="margin-left: 10px; font-size: 14px; font-weight:300;">Expenses</p>
    </div>
    <div>
    <i  class="bi bi-arrow-right"></i>
    </div>
</a>
<a href="{{ route('expense_type.index') }}" class="d-flex text-white text-decoration-none"  style="justify-content: space-between;">
    <div class="d-flex">
        <i class="bi bi-wallet2"></i><p  style="margin-left: 10px; font-size: 14px; font-weight:300;">Expense Types</p>
    </div>
    <div>
    <i  class="bi bi-arrow-right"></i>
    </div>
</a>

<a href="{{ route('report.index') }}" class="d-flex text-white text-decoration-none"  style="justify-content: space-between;">
    <div class="d-flex">
        <i class="bi bi-file-earmark-bar-graph"></i><p  style="margin-left: 10px; font-size: 14px; font-weight:300;">Report</p>
    </div>
    <div>
    <i  class="bi bi-arrow-right"></i>
    </div>
</a>

   </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>