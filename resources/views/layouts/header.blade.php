<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Church System</title>
    <style>
        #icons{
            background-color: #008ad3;
            color: #fff;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 10px;
            padding-right: 10px;
            border-radius: 5px;
            margin-left: 5px;
        }
        .BgColour{
          background-color: #fff;
          box-shadow: 0px 2px 20px  #ccc;
        }
    </style>
  </head>
  <body>
   <div class="container-fluid sticky-top p-3" id="heada">
    <div class="row">
      <div class="col-md-2">
      <h4 class="text-primary text-center">Church System</h4>
      </div>
      <div class="col-md-8">
<input type="text" class="form-control bg-white" style="border-radius: 50px; width: 60%;">
    </div>
    <div class="col-md-2 d-flex">
        
        <i id="icons" class="bi bi-envelope"></i>
        <i id="icons" class="bi bi-bell"></i>
        <i id="icons"class="bi bi-gift"></i>
        <i id="icons"  class="bi bi-bar-chart-line"></i>
    </div>
    </div>

   </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <script>
     function scrollValue() {
    var navbar = document.getElementById('heada');
    var scroll = window.scrollY;
    if (scroll < 10) {
        navbar.classList.remove('BgColour');
    } else {
        navbar.classList.add('BgColour');
    }
}

window.addEventListener('scroll', scrollValue);
     </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>