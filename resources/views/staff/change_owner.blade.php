@extends('main.staff')
@section('staff_content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> --}}

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <title>approve contract</title>
    <style>
        input::-moz-input-placeholder {
            color: red;
            font-weight: normal;
            text-decoration: underline;
            text-decoration-color: rgba(251,175,93,1);  
}
    </style>
</head>
<body  style="margin:10;background-color:white">
    {{-- <div></div>
    <form>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" id="inputPassword4">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Address 2</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity">
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control">
              <option selected>Choose...</option>
              <option>...</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip">
          </div>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
      </form> --}}
      <div  class="container">
        <div class="row mt-5 ">
            <div class=" offset-2 col-8">
                <div class="card btn-secondary" >
                    <div class="card-header" style="background-color:#5A6268; ">
                        <h4 style="background-color: #5A6268;" class="card-title text-black"> <center>Change Owner of Vehicles</center> </h4>
                    </div>
                    <div style="margin: 20px;"></div>
                    <form class="form-inline" method="POST" action="/staff/change_owners" id="form-validation">
                      @csrf 

                        <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                        <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                          </div>
                          <input type="text" class="form-control " name="username" id="username" placeholder="Enter Current Username" >
                        </div>
                        <label class="sr-only" for="inlineFormInputName2">Name</label>
                        <input type="password" class="form-control mb-2 mr-sm-2" id="password" name="password" placeholder="Enter Current Password" >
                        <span style="color: red">@error('username')
                            {{ $message }}
                        @enderror</span>
                        <span style="color: red">@error('password')
                            {{ $message }}
                        @enderror</span>


                        <input type="submit" value="Submit" class="btn btn-primary mb-2">
                      </form>
                </div>
            </div>
        </div>
    </div>
    @if(isset($success))
    <div style="margin: 10%;" class="alert alert-success alert-dismissible fade show" role="alert">
       <center> <strong>Congratulation !!</strong> {{ $success }}.</center>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    @if (isset($data))


    @foreach ($data as $item)


    <form action="/staff/change/owner" method="post" >
        @csrf
        <div style="margin: 10%;padding: 2%; border-style: solid;border-width: 40%;" class="border border-primary">
        {{-- <div class="form-row"> --}}
          <div class="col">
            <div style="padding-bottom: 5px;" class="input-group-prepend">
                <div class="input-group-text">fname</div>
                <input type="text" class="form-control"  name="fname" value=
               {{$item->first_name  }}  id="fname" >
          </div>
        </div>
        @error('fname')
            {{ $message }}
        @enderror
          <div class="col">
            <div class="input-group-prepend">
                <div class="input-group-text">lname</div>
            <input type="text" class="form-control" value=
            {{$item->last_name  }} name="lname" id="lname" >
          </div>
        </div>
        @error('lname')
        {{ $message }}
    @enderror

        <br>
        <div class="form-row">
            <div class="col">
                <div class="input-group-prepend">
                    <div class="input-group-text">@</div>

              <input type="text" class="form-control"  value={{$item->username  }} name="uname" id="uname" >
            </div>
        </div>
        @error('uname')
        {{ $message }}
        @enderror
       
            <div class="col">
                <div class="input-group-prepend">
                    <div class="input-group-text">password</div>
              <input type="password" class="form-control"  value={{$item->password  }} name="password" >
            </div>
            </div>
            @error('password')
            {{ $message }}
            @enderror
          </div>
          <br>
          <br>
          <div class="form-row">
            <div class="col">
                <div class="input-group-prepend">
                    <div class="input-group-text">phone_no</div>
                <input type="text" class="form-control" name="p_no" value={{$item->phone_no  }}  ><span style="color: red">@error('p_no')
                    {{ $message }}
                @enderror</span>
              </div>
            </div>
            <div class="col">
                <div class="input-group-prepend">
                    <div class="input-group-text">address</div>
              <input type="text" class="form-control"  value={{$item->address  }} name="address" >
            </div>
            </div>
               @error('address')
                    {{ $message }}
                @enderror
            <div class="col">
                <div class="input-group-prepend">
                    <div class="input-group-text">EMAIL:</div>
              <input type="text" class="form-control" value= {{$item->last_name  }} name="email" >
            </div>
          </div>
          @error('email')
          {{ $message }}
      @enderror
          <input type="text" hidden value=" {{$item->staff_id  }}" name="id" >
          </div>
          <br>
          <br><center>
          <input type="submit" class="btn btn-primary" value="update">
          <input type="submit" class="btn btn-danger" value="cancel">
        </center>
        </div>

      </form>
      @endforeach
      @endif
    @endif
    @if (isset($fail))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>SORRY !!</strong> {{ $fail }}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

   

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
  <script src="assets/js/main.js"></script>

</html>
<script>
 
    $(document).ready(function () {
 
    $('#form-validate').parsley();
    });
});
</script>
@endsection
