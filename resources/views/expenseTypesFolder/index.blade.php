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
    <style>
        .tab-font {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div class="container-fluid" style="background-color: #bbd0d750; height: 120vh;">
        @include('layouts.header')
        <div class="d-flex">
            <div class="col-md-2">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-10">
                {{-- @include('layouts.cards') --}}
                <div class="bg-white p-3 mt-2 shadow overflow-auto" style="border-radius: 15px; height: 80vh;">
                    <div class="d-flex" style="justify-content: space-between">
                        <h3 style="color: #008ad3; ">Expense Types</h3>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
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
                            <div class="row">
                                <div class="col-md-6 p-5">
                                    <form action="{{ route('expense_type.store') }}" method="POST">
                                        @csrf
                                        <input type="text" name="expense_type" placeholder="Expense Type" class="form-control">
                                        <button type="submit" class="btn btn-primary mt-4 w-100">Add</button>
                                    </form>

                                </div>
                                <div class="col-md-6 p-5">
                                    <table class="table mt-3">
                                        <thead style="background-color: #bbd0d750; color: #008ad3;">
                                            <th class="tab-font">Expense Type</th>
                                            <th class="tab-font">Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($expense_types as $expense_type )
                                                <tr>
                                                    <td>{{ $expense_type->expense_type }}</td>
                                                    <td><div class="d-flex"> <i class="bi bi-pencil m-1 text-warning cursor-pointer" role="button" data-bs-toggle="modal" data-bs-target="#edit{{ $expense_type->id }}"></i><i class="bi bi-trash m-1 text-danger cursor-pointer" role="button" data-bs-toggle="modal" data-bs-target="#del{{ $expense_type->id }}"></i>
                                                        
                                                         </div>
                                                         {{-- edit modal start --}}
                                                         <div class="modal fade" id="edit{{ $expense_type->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                              <div class="modal-content">
                                                                <div class="modal-header bg-primary">
                                                                  <h5 class="modal-title text-white" id="exampleModalLabel">Edit Expenses Type</h5>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form action="{{ route('expense_type.update') }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                            
                                                                <div class="modal-body">
                                                                  <input type="hidden" value="{{ $expense_type->id }}" name="id">
                                                                  <input type="text" value="{{ $expense_type->expense_type }}" class="form-control"  name="expense_type">
                                                                </div>
                                                                <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-primary">Update</button>
                                                                </div>
                                                                </form>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          {{-- edit modal end --}}


                                                          {{-- delete modal start --}}
                                                         <div class="modal fade" id="del{{ $expense_type->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                              <div class="modal-content">
                                                                <div class="modal-header bg-primary">
                                                                  <h5 class="modal-title text-white" id="exampleModalLabel">Delete Expense Type</h5>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form action="{{ route('expense_type.destroy',$expense_type->id) }}" method="POST">
                                                                @csrf                                                                <div class="modal-body">
                                                                  <input type="hidden" value="{{ $expense_type->id }}" name="id">
                                                                  <h4 class="text-primary">{{ $expense_type->expense_type }} </h4>
                                                                </div>
                                                                <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-danger">delete</button>
                                                                </div>
                                                                </form>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          {{-- delete modal end --}}
                                                        
                                                        </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

</body>

</html>
