@extends('main/home')
@section('home')
<!doctype html>
<html lang="en">
  <head>
  	<title>Login page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="../css/font-awesome.min.css">

	<link rel="stylesheet" href="../css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Well come To Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
                  @if (isset($msg))
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      {{ $msg }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                @endif
		      	<form action="sign_in" class="signin-form" method="POST">
                    @csrf
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Username" name="user" required>
		      		</div>
                      <span style="color: red;">
                      @error('user')
                          {{ $message }}
                      @enderror
                    </span>
	            <div class="form-group">
	              <input id="password-field" type="password" name="pass" class="form-control" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
                <span style="color: red;">
                @error('pass')
                          {{ $message }}
                      @enderror
                   </span>
                <div class="form-group col-md-10 " >
                    <label for="inputState">State</label>
                    <select id="inputState" name="select" class="form-control">
                      <option selected>Choose...</option>
                      <option value="admins">Admin</option>
                      <option value="customers">Customer</option>
                      <option value="staffs">Staff</option>
                    </select>
                  </div>
                  <span style="color: red;">
                         @error('select')
                              {{ $message }}
                          @enderror
                       </span>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
	            </div>
	          </form>
              <div>


            </div>
	          {{-- <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p> --}}
	          {{-- <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div> --}}
		      {{-- </div> --}}
				</div>
			</div>
		</div>
	</section>

  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.jn[[ ]]s"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>

	</body>
</html>
@endsection
