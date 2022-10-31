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

                    <h3 style="color: #008ad3; ">Clients</h3>
                    <a href="{{ url('/clients') }}" class="text-decoration-none btn btn-primary">Back</a>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-5 p-1">
                            <div class="col-md-6">
                                <div class="m-4">
                                    <label>Full Name</label>
                                    <input type="text" name="full_name" class="form-control mt-2" placeholder="Full Name" required>
                                </div>
                                <div class="m-4">
                                    <label>Date of Birth</label>
                                    <input type="date" name="date_of_birth" class="form-control mt-2" placeholder="date of birth">
                                </div>
                                <div class="m-4">
                                    <label>Place of Residence</label>
                                    <input type="text" class="form-control mt-2" name="place_of_residence" placeholder="Enter Place of Residence" required>
                                </div>

                               

                                <div class="m-4">
                                    <label>First Contact</label>
                                    <input type="text" name="contact1" class="form-control mt-2" placeholder="Enter First Contacts" required>
                                </div>

                                <div class="m-4">
                                    <label>Second Contact</label>
                                    <input type="text" name="contact2" class="form-control mt-2" placeholder="Enter Second Contact">
                                </div>

                                <div class="m-4">
                                    <label>Photo</label>
                                    <input type="file" class="form-control mt-2" name="photo" placeholder="Photo">
                                </div>
                                <div class="m-4">
                                    <label>Contract</label>
                                    <input type="file" class="form-control mt-2" name="contract" placeholder="Contract">
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="m-4">
                                    <label>Boda Stage</label>
                                    <input type="text" name="boda_stage" class="form-control mt-2" placeholder="Enter Boda Stage" required>
                                </div>

                                <div class="m-4">
                                    <label>Guarantee Name</label>
                                    <input type="text" class="form-control mt-2" name="guarantee_name" placeholder="Enter First Guarantee Name">
                                </div>

                                <div class="m-4">
                                    <label>Guarantee Contact</label>
                                    <input type="text" class="form-control mt-2" name="guarantee_contact" placeholder="Enter First Guarantee Contact">
                                </div>
                               
                                <div class="m-4">
                                    <label>Spouse Name</label>
                                    <input type="text" class="form-control mt-2" name="spouse_name" placeholder="Enter Spouse Name">
                                </div>

                                <div class="m-4">
                                    <label>Spouse Contact</label>
                                    <input type="text" class="form-control mt-2" name="spouse_contact" placeholder="Enter spouse Contact" required>
                                </div>
                                <div class="m-4">
                                    <button type="submit" class="btn btn-primary form-control">Register</button>
                                </div>

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
