
@extends('main.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{--  1000195276602 --}}
    @if (isset($success))
    <div class="alert alert-info">{{ $success }}
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button></div>   
   @else
   @if (isset($fail))
   <div class="alert alert-danger">{{ $success }}
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button></div>
   @endif
  
   @endif

    <form action="/staffs_register" method="post">
        @csrf
        <div style="margin: 10%" class="border border-primary">
        <div class="form-row">
          <div class="col">
            <input type="text" class="form-control" placeholder="First name" name="firstname" >
          </div>
          <span style="color: red;">
          @error('firstname')
              {{ $message }}
          @enderror
        </span>
          <div class="col">
            <input type="text" class="form-control" placeholder="Last name" name="lastname" >
          </div>
          <span style="color: red;">
          @error('lastname')
          {{ $message }}
      @enderror
      </span>
        </div>
        <br>
        <br>
        <div class="form-row">
            <div class="col">
                <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                  
              <input type="text" class="form-control" placeholder="username" name="username" >
            </div>
        </div>
        <span style="color: red;">
        @error('username')
        {{ $message }}
         @enderror
        </span>
            <div class="col">
              <input type="password" class="form-control" placeholder="password" name="password" >
            </div>
          </div>
          <span style="color: red;">
          @error('password')
          {{ $message }}
          @enderror
          </span>
          <br>
          <br>
          <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" placeholder="phone number" name="phone_no" >
              </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="address" name="address" >
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="email" name="email" >
            </div>
            <table><tr><td><span style="color: red;"> @error('phone_no')
                {{ $message }}
            @enderror</span></td><td><span style="color: red;"> @error('address')
                {{ $message }}
            @enderror</span></td><td><span style="color: red;"> @error('email')
                {{ $message }}
            @enderror</span></td></tr></table>
          </div>
          <br>
          <br><center>
          <input type="submit" class="btn btn-primary" value="register">
          <input type="submit" class="btn btn-danger" value="cancel">
        </center>
        </div>
           
      </form>
</body>
</html>
@endsection
