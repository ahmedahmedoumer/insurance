@extends('main/home')
@section('home')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="MHsKu43wVBvbvoKmazkS8BcIMgDQuo1TJGXvvePL">

    <title>Laravel</title>

    <!-- Scripts -->
    <script src="http://localhost:8000/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="http://localhost:8000/css/app.css" rel="stylesheet">
</head>
<body style="color: black;">
    <div id="app">

        <main class="py-4">
            <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b> Login</b></div>

                <div class="card-body">
                    <form method="POST" action="http://localhost:8000/sign_in">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control " name="user" value=""  required  autofocus>
                                <span style="color: red;">
                                    @error('user')
                                        {{ $message }}
                                    @enderror
                                  </span>
                              </div>
                             
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="pass" required autocomplete="current-password">
                                <span style="color: red;">
                                    @error('pass')
                                        {{ $message }}
                                    @enderror
                                  </span>
                               </div></div>
                             <div class="form-group row">
                             <label for="role" class="col-md-4 col-form-label text-md-right">Type</label>        
                          <div class="col-md-6">
                            <select id="inputState" name="select" class="form-control">
                                <option selected>Choose...</option>
                                <option value="admins">Admin</option>
                                <option value="customers">Customer</option>
                                <option value="staffs">Staff</option>
                              </select>
                           
                          <span style="color: red;">                                               
                                 @error('select')
                                      {{ $message }}
                                  @enderror
                               </span>
                            </div></div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" checked >

                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="http://localhost:8000/password/reset">
                                        Forgot Your Password?
                                    </a>
                                     </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        </main>
    </div>
</body>
</html>
@endsection