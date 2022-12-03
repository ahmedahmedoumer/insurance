@extends('main.customer')
@section('customer')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send request</title>
    <style>
      body {
  background-image: url("images/download.gif");
  background-color: #cccccc;
}
    </style>
</head>
<body>


    @if (isset($success))
    <div class="alert alert-info">{{ $success }}
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button></div>
   @else
   @if (isset($fail))
   <div class="alert alert-danger">{{ $fail }}
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button></div>
   @endif

   @endif
        {{-- <div class="form-row" style="margin: 10px">
          <div class="form-group col-md-6" >
            <label for="inputname">First Name</label>
            <input type="text" class="form-control"  name="fname" id="inputEmail4">
          </div>
          <div class="form-group col-md-6" >
            <label for="inputname">Last Name</label>
            <input type="text" class="form-control"  name="lname" id="inputEmail4">
          </div>
        </div>
        <div class="form-group col-7" >
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="form-group col-7">
          <label for="inputphone_no">phone no</label>
          <input type="text" class="form-control" name="phone_no" id="inputAddress2" placeholder="+251 ">
        </div>
        <h1 style="background-color:#1E1E1E ">
           <center> vehicle information</center></h1>
            <div class="form-row" style="margin: 10px">
                <div class="form-group" style="padding: 10px" >
                    <label for="inputchance">chance no</label>
                    <input type="text" name="chance_no" class="form-control" id="inputAddress2" placeholder=" ">
                  </div>

              <div class="form-group"style="padding: 10px">
                <label for="inputheight">height</label>
                <input type="text" name="height" class="form-control" id="inputAddress2" placeholder=" ">
              </div>
            <div class="form-group" style="padding: 10px">
                <label for="inputwidth">Width</label>
                <input type="text" name="width" class="form-control" id="inputAddress2" placeholder=" ">
              </div>
              <div class="form-group" style="padding: 10px">
                <label for="inputwidth">load capacity</label>
                <input type="text" name="load_capacity" class="form-control" id="inputAddress2" placeholder=" ">
              </div>
            </div>
            <div class="form-row" style="margin: 10px">

                  <div class="form-group" style="padding: 10px">
                    <label for="inputwidth">vehicle models</label>
                    <input type="text" name="vehicle_models" class="form-control" id="inputAddress2" placeholder=" ">
                  </div>
                  <div class="form-group" style="padding: 10px">
                    <label for="inputwidth">Vehicle targa</label>
                    <input type="text" class="form-control"  name="vehicle_targa" id="inputAddress2" placeholder=" ">
                  </div>
                  <div class="form-group" style="padding: 10px">
                    <label for="inputwidth">Vehicle sell Price</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder=" ">
                  </div>
                  <div class="form-group" style="padding: 10px">
                    <label for="inputwidth">Vehicle color</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder=" ">
                  </div>
            </div>



        <input type="submit" class="btn btn-primary"  value="send request" >
        <input type="submit" class="btn btn-primary" value="Cancel">
      </form> --}}
      <form action="
      @if (isset($customer_account))
        @foreach ($customer_account as $item)
            {{ "/customer_register_".$item->id }}
        @endforeach
      @endif
    " method="post" enctype="multipart/form-data">
        @csrf
        {{-- <div class="form-row" style="margin: 10px">
          <div class="form-group col-md-6" >
            <label for="inputname">First Name</label>
            <input type="text" class="form-control"  name="fname" id="inputEmail4" >
          </div>
          <div class="form-group col-md-6" >
            <label for="inputname">Last Name</label>
            <input type="text" class="form-control"  name="lname" id="inputEmail4" >
          </div>
        </div>
          <div class="form-group  col-md-6" >
            <label for="inputname">Username</label>
            <input type="text" class="form-control"  name="uname" id="inputEmail4" >
          </div>
        </div>
        <div class="form-group col-6" >
          <label for="inputAddress">password</label>
          <input type="password" class="form-control" name="pass" id="inputAddress" >
        </div>
        <div class=" form-row form-group col-6" >
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" name="address" id="inputemail" placeholder="1234 Main St" >

        <div class=" form-group col-6">
          <label for="inputphone_no">phone no</label>
          <input type="text" class="form-control" id="inputAddress2" name="phone_no" placeholder="+251 " > --}}
        {{-- </div>
    </div> --}}
           <div class="border border-primary" style="margin-top: 5%; margin-left: 20%; margin-right: 20%; padding:30px;">
            <h1 style="background-color:#6d6868;">
                <center> vehicle information</center></h1>
            <div class="col-6" style="padding: 2px; background-image: url('images/download.gif')">


                <div class="form-group">
                    <label for="inputchance">chance no</label>
                    <input type="text" class="form-control" name="chance_no" id="inputAddress2" placeholder="Vehicle chance no" >
                  </div>
                  <span style="color: red;">@error('chance_no')
                     {{$message}}
                  @enderror</span>
                  <div class="form-group">
                    <label for="inputchance">Veicle Type</label>
                    <select class="custom-select" name="vehicle_type" id="" >
                        <option selected >vehicle type</option>
                        <option value="1">private use vehicle</option>
                        <option value="2">public Transport</option>
                        <option value="3">mini bus code 3</option>
                        <option value="4">dump truck</option>
                        <option value="5">general cartege</option>
                        <option value="6">fuel tanker</option>
                        <option value="7">car hire</option>
                        <option value="8">Busses-public Transport</option>
                        <option value="9">learner</option>
                        <option value="10">Construction machineries/Agricultural Vehicles</option>
                        <option value="11">General chartege ISUZU NPR,FSR,FVR</option>
                        <option value="12">Taxi</option>
                        <option value="13">Motor recycle</option>
                        <option value="14">Tri cycle</option>
                        <option value="15">Motor Trade </option>
                        <option value="16">Other</option>
                    </select>
                    <span style="color: red;">@error('vehicle_type')
                        {{$message}}
                     @enderror</span>
                </div>
                </div>
                <div class="col-6">
                  {{-- <div class="form-group" style="padding: 40px">
                    <select class="custom-select" name="service type" id="" >
                        <option selected >service 1</option>
                        <option value="1">service 2</option>
                        <option value="2">service 3</option>
                    </select>
                  </div> --}}
              <div class="form-group">
                <label for="inputheight">height</label>
                <input type="text"  name="height" class="form-control" id="inputAddress2" placeholder="height " >
              </div>
              <span style="color: red;">@error('height')
                {{$message}}
             @enderror</span>
            <div class="form-group" >
                <label for="inputwidth">Width</label>
                <input type="text" name="width" class="form-control" id="inputAddress2" placeholder="width " >
              </div>
              <span style="color: red;">@error('width')
                {{$message}}
             @enderror</span>
              <div class="form-group ">
              <select class="custom-select" id="inlineFormCustomSelectPref" name="oil_type" >
                <option selected>Fuel type</option>
                <option value="1">Pure Oil</option>
                <option value="2">Benzyl</option>
              </select>
              </div>
              <span style="color: red;">@error('oil_type')
                {{$message}}
             @enderror</span>
              <div class="form-group ">
              <select class="custom-select" id="inlineFormCustomSelectPref" name="vehicle_code" >
                <option selected>vehicle code</option>
                <option value="1">code 1</option>
                <option value="2">code 2</option>
                <option value="1">code 3</option>
                <option value="2">code 4</option>
              </select>
              </div>
              <span style="color: red;">@error('vehicle_code')
                {{$message}}
             @enderror</span>
              <div class="form-group ">
                <label for="inputwidth">Number of Tire</label>
                <input type="text" name="no_tire" class="form-control" id="inputAddress2" placeholder="Number of Tire " >
              </div>
              <span style="color: red;">@error('no_tire')
                {{$message}}
             @enderror</span>
              <div class="form-group" >
                <label for="inputwidth">load capacity</label>
                <input type="text" name="load_capacity" class="form-control" id="inputAddress2" placeholder="load capacity ">
              </div>
              <span style="color: red;">@error('load_capacity')
                {{$message}}
             @enderror</span>
                  <div class="form-group" >
                    <label for="inputwidth">vehicle models</label>
                    <input type="text" name="vehicle_model" class="form-control" id="inputAddress2" placeholder="vehicle models ">
                  </div>
                  <span style="color: red;">@error('vehicle_model')
                    {{$message}}
                 @enderror</span>
                  <div class="form-group" style="padding: 2px;">
                    <label for="inputwidth">Vehicle targa</label>
                    <input type="text" class="form-control" name="vehicle_targa" id="inputAddress2" placeholder=" Vehicle targa">
                  </div>
                   <span style="color: red;">@error('vehicle_targa')
                     {{$message}}
                  @enderror</span>
                  <div class="form-group" style="padding: 2px;">
                    <label for="inputwidth">Vehicle sell Price</label>
                    <input type="text" class="form-control" name="vehicle_Price" id="inputAddress2" placeholder="Vehicle sell Price ">
                  </div>
                  <span style="color: red;">@error('vehicle_Price')
                    {{$message}}
                 @enderror</span>
                  <div class="form-group" style="padding: 2px;">
                    <label for="inputwidth">Vehicle color</label>
                    <input type="text" class="form-control" name="vehicle_color" id="inputAddress2" placeholder="Vehicle color ">
                  </div>
                  <span style="color: red;">@error('vehicle_color')
                    {{$message}}
                 @enderror</span>
                  <div class="form-group" style="padding: 10px">
                    <select class="custom-select" name="insurance_type" id="" >
                        <option selected >insurance type</option>
                        <option value="3rd_party">3rd party insurance</option>
                        <option value="full_insurance">full insurance</option>
                    </select>
                  </div>
                  <span style="color: red;">@error('insurance_type')
                    {{$message}}
                 @enderror</span>



     <center>
        <input type="submit" class="btn btn-primary" value="send Request" >
        <button type="submit" class="btn btn-primary">Cancel</button>
     </center>
            </div>
      </form>
    </div>
</div>

<div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>
@endsection
