@extends('main.staff')
@section('staff_content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <title>new customer</title>
    <style>
        .gt{
            padding:10px;
            
        }
    </style>
    </style>
</head>
<body>
    @if (isset($msg))
        <div class="alert alert-success">{{ $msg }}</div>
    @endif
    @if (isset($fail))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Failed!</strong> {{ $fail }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif
    <div >
        <form action="/staff/add-new-customer
             " method="post">
            @csrf
            <div style="margin: 10%;background-image: url(../images/download.jpg);" class="border border-primary">
                <h1 style="border:2;border-style: solid;background-color:darkgray" class="rounded"> <center > Create New Account </center></h1>
            <div class="form-row gt">
              <div class="col-6">
                <input type="text" class="form-control" placeholder="First name" name="first_name" >
              </div>
              <span style="color:red;">
              @error('first_name')
                 {{ $message }} 
              @enderror
            </span>
            </div>
            <div class="row gt">
              <div class="col-6">
                <input type="text" class="form-control" placeholder="Last name" name="last_name" >
              </div>
              <span style="color:red;">
                @error('last_name')
                   {{ $message }} 
                @enderror
              </span>
            </div>
            <div class="row gt">
                <div class="col-6">
                    <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
    
                  <input type="text" class="form-control" placeholder="username" name="username" >
                </div>
            </div>
            <span style="color:red;">
                @error('username')
                   {{ $message }} 
                @enderror
              </span>
            </div>
            <div class="row gt">
                <div class="col-6 ">
                  <input type="password" class="form-control" placeholder="password" name="password" >
                </div>
                <span style="color:red;">
                    @error('password')
                       {{ $message }} 
                    @enderror
                  </span>
              </div>
              <div class="row gt">
                <div class="col-6 ">
                  <input type="password" class="form-control" placeholder="Confirm password" name="confirm_password" >
                </div>
                <span style="color:red;">
                    @error('confirm_password')
                       {{ $message }} 
                    @enderror
                  </span>
              </div>
    
              <div class="row gt">
                <div class="col-6">
                    <input type="text" class="form-control" placeholder="phone number" name="phone_no" >
                  </div>
                  <span style="color:red;">
                    @error('phone_no')
                       {{ $message }} 
                    @enderror
                  </span>
              </div>
              <div class="row gt">
                <div class="col-6">
                  <input type="text" class="form-control" placeholder="address" name="address" >
                </div>
                <span style="color:red;">
                    @error('address')
                       {{ $message }} 
                    @enderror
                  </span>
              </div>
              <div class="row gt">
                <div class="col-6">
                  <input type="text" class="form-control" placeholder="email" name="email" >
                </div>
                <span style="color:red;">
                    @error('email')
                       {{ $message }} 
                    @enderror
                  </span>
              </div>
              <div  class="row gt">
                <div class="col-6">
                    <div style="border-style: solid;background-color:darkgrey;">
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
              </div>
              </div>
              <br>
              <br><center>
              <input type="submit" class="btn btn-primary" value="register">
              <input type="submit" class="btn btn-danger" value="cancel">
            </center>
            </div>
    
          </form>
    </div>
    

<div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>
</html>
@endsection