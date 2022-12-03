{{--
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
    <h1 style="background-color: 1E1E1E" ><center> register Page </center></h1>

    <form>
        <div class="row">
          <div class="col">
            <input type="text" class="form-control" placeholder="First name">
          </div>
          <div class="col">
            <input type="text" class="form-control" placeholder="Last name">
          </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
          </div>
        <div class="row">
          <div class="col">
            <input type="text" class="form-control" placeholder="Username">
          </div>
          <div class="col">
            <input type="text" class="form-control" placeholder="password">
          </div>
          <div class="col">
            <input type="text" class="form-control" placeholder="+251  phone no">
          </div>
        </div>
      </form>
</body>
</html>
@endsection --}}
@extends('main.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>approve contract</title>
</head>
<body>
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
    <form action="/customer_register" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row" style="margin: 10px">
          <div class="form-group col-md-6" >
            <label for="inputname">First Name</label>
            <input type="text" class="form-control"  name="fname" id="inputEmail4" required>
          </div>
          <div class="form-group col-md-6" >
            <label for="inputname">Last Name</label>
            <input type="text" class="form-control"  name="lname" id="inputEmail4" required>
          </div>
        </div>
          <div class="form-group  col-md-6" >
            <label for="inputname">Username</label>
            <input type="text" class="form-control"  name="uname" id="inputEmail4" required>
          </div>
        <div class="form-group col-6" >
          <label for="inputAddress">password</label>
          <input type="password" class="form-control" name="pass" id="inputAddress" required>
        </div>
        < class=" form-row form-group col-6" >
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" name="address" id="inputemail" placeholder="1234 Main St" required>

        <div class=" form-group col-6">
          <label for="inputphone_no">phone no</label>
          <input type="text" class="form-control" id="inputAddress2" name="phone_no" placeholder="+251 " required>
        </div>

        <h1 style="background-color:#6d6868">
           <center> vehicle information</center></h1>
            <div class="form-row" style="margin: 10px">
                <div class="form-group" style="padding: 10px" >
                    <label for="inputchance">chance no</label>
                    <input type="text" class="form-control" name="chance_no" id="inputAddress2" placeholder=" " required>
                  </div>
                  <div class="form-group" style="padding: 10px">
                    <label for="inputtype">vehicle type</label>
                    <input type="text" class="form-control" id="inputAddress2" name="vehicle_type" placeholder=" " required >
                  </div>
              <div class="form-group"style="padding: 10px">
                <label for="inputheight">height</label>
                <input type="text"  name="height" class="form-control" id="inputAddress2" placeholder=" " required>
              </div>
            <div class="form-group" style="padding: 10px">
                <label for="inputwidth">Width</label>
                <input type="text" name="width" class="form-control" id="inputAddress2" placeholder=" " required>
              </div>
            </div>
              <div class="form-row ">
                  <div class="col-4">
              <select class="custom-select" id="inlineFormCustomSelectPref" name="oil_type" required>
                <option selected>Oil/benzyl</option>
                <option value="1">Pure Oil</option>
                <option value="2">Benzyl</option>
              </select>
              <br>
              <br>
              <select class="custom-select" id="inlineFormCustomSelectPref" name="vehicle_code" required>
                <option selected>vehicle code</option>
                <option value="1">code 1</option>
                <option value="2">code 2</option>
                <option value="1">code 3</option>
                <option value="2">code 4</option>
              </select>
              <div class="form-group " style="padding: 10px">
                <label for="inputwidth">Number of Tire</label>
                <input type="text" name="no_tire" class="form-control" id="inputAddress2" placeholder=" " required>
              </div>

              <div class="form-group" style="padding: 10px">
                <label for="inputwidth">load capacity</label>
                <input type="text" name="load_capacity" class="form-control" id="inputAddress2" placeholder=" ">
              </div>
            </div>
        </div>
            <div class="form-row" style="margin: 10px">

                  <div class="form-group" style="padding: 10px">
                    <label for="inputwidth">vehicle models</label>
                    <input type="text" name="vehicle_model" class="form-control" id="inputAddress2" placeholder=" ">
                  </div>
                  <div class="form-group" style="padding: 10px">
                    <label for="inputwidth">Vehicle targa</label>
                    <input type="text" class="form-control" name="vehicle_targa" id="inputAddress2" placeholder=" ">
                  </div>
                  <div class="form-group" style="padding: 10px">
                    <label for="inputwidth">Vehicle sell Price</label>
                    <input type="text" class="form-control" name="vehicle_Price" id="inputAddress2" placeholder=" ">
                  </div>
                  <div class="form-group" style="padding: 10px">
                    <label for="inputwidth">Vehicle color</label>
                    <input type="text" class="form-control" name="vehicle_color" id="inputAddress2" placeholder=" ">
                  </div>
                  <div class="form-group" style="padding: 10px">
                    <select class="custom-select" name="insurance_type" id="" >
                        <option selected >insurance type</option>
                        <option value="3rd_party">3rd party insurance</option>
                        <option value="full_insurance">full insurance</option>
                    </select>
                  </div>
                </div>
                   <input type="submit" class="btn btn-primary" value="register">
                   <button type="submit" class="btn btn-primary">Cancel</button>






      </form>



</body>
</html>
@endsection
