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
                <div class="bg-white p-3 mt-2 shadow" style="border-radius: 15px; height: 70vh;">
                    
                         <h3 style="color: #008ad3; ">Clients</h3>  
                         <a href="{{ route('client.create') }}" class="text-decoration-none btn btn-primary">Add Client</a>
                         @if ($message = Session::get('success'))
                         <div class="alert alert-success">
                             <p>{{ $message }}</p>
                         </div>
                     @endif
                         <table class="table mt-3">
                            <thead style="background-color: #bbd0d750; color: #008ad3;">
                              <th>No</th>
                              <th>Image</th>
                              <th>Full Name</th>
                              <th>Place of Residence</th>
                              <th>Contact</th>
                              <th>Border stage</th>
                              <th>Spouse</th>
                              <th>Guarantee</th>
                              <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td><img src="{{ !is_null($client->photo) ? asset($client->photo) : asset('upload/user/placeholder.png') }}" width="100px" height="100px" style="border-radius: 5px"></td>
                                    <td>{{ $client->full_name }}</td>
                                    <td>{{ $client->place_of_residence }}</td>
                                    <td>{{ $client->contact1 }}</td>
                                                                       
                                    <td>{{ $client->boda_stage }}</td>
                                    <td><div class="d-flex">{{ $client->spouse_name }}  <p style="color: #008ad3; margin-left: 10px;">{{ $client->spouse_contact }}</p></div></td>
                                    <td><div class="d-flex">{{ $client->guarantee_name }} <p style="color: #008ad3; margin-left: 10px;"> {{ $client->guarantee_contact }}</p></div></td>
                                    <td><div class="d-flex"> <a href="{{ route('client.edit',$client->id) }}"><i class="bi bi-pencil m-1 text-warning"></i> </a>
                                        <form action="{{ route('client.destroy',$client->id) }}" method="POST"> @csrf<button type="submit" style="margin-top: -5px;" class="btn btn-default"> <i class="bi bi-trash-fill m-1 text-danger"></i></button></form>
                                         <a href="{{ route('client.show',$client->id) }}"> <i class="bi bi-eye-fill m-1 text-primary"></i></a></div></td>
                                    {{-- <td>
                                        <form action="{{ route('destroy',$client->id) }}" method="POST">
                              
                                            <a class="btn btn-info" href="{{ route('show',$client->id) }}">Show</a>
                               
                                            <a class="btn btn-primary" href="{{ route('edit',$client->id) }}">Edit</a>
                              
                                            @csrf
                                            @method('DELETE')
                                 
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>  
                          {{-- {!! $clients-links() !!} --}}

                    
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
