@extends('main/home')
@section('home')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/style.css">
    <title>Register page</title>
    <style>

        /* .gt{
            padding:10px;
        } */
    </style>
</head>
<body >
    {{-- <div class="container">
        <div class="row "> --}}
@if (isset($msg))
    <div style="margin: 10%;" class="alert alert-success">{{ $msg }}</div>
@endif
@if (isset($fail))
    <div style="margin: 10%;" class="alert alert-warning">{{ $fail }}</div>
@endif
    <form action="/register/new-customer
    " method="post" enctype="multipart/form-data">
        @csrf
        <div  style="margin: 10%;" class="border border-primary ">
            <h1 style="border-style: solid;padding: 5px; background-color:darkgray" class="rounded"> <center > Create New Account </center></h1>
      <div style="margin: 5px; padding: 5px;">
            <div class="form-row gt">
          <div class="col-6">
            <input type="text" class="form-control" placeholder="First name" name="first_name" autofocus>
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
              <input type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" >
            </div>
            <span style="color:red;">
                @error('password_confirmation')
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
    </center>
        </div>
      </form>
      </div>
    </div>



    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.jn[[ ]]s"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>
@endsection
