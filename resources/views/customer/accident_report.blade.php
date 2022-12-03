@extends('main.customer')
@section('customer')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css"  crossorigin="anonymous">

    <title>insurance</title>
</head>
<body style="background-image: url(images/download.jpg);">
    
    <form action="@if (isset($customer_account))
    @foreach ($customer_account as $item)
    {{"/customer/accident_".$item->id."_report" }}
    @endforeach
   
@endif" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="margin: 10%; padding: 3px;border-style: solid;border-color: wheat;">
            <h1 style="background-color: gray"><center> Accident Report </center></h1>
            @if (isset($success))
                <div class="alert alert-success">
                    <center>
                    {{ $success }}
                    </center>
                </div>
            @else
            @if (isset($fail))
            <div class="alert alert-warning">
                <center>
            {{ $fail }}
               </center>
            </div>
            @endif
            @endif
        <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="vehicle chance no" name="chance_no" >
          </div>
          <br>
          <div class="col">
            <input type="text" class="form-control" placeholder="vehicle targa" name="targa" >
          </div>
         
        </div>
        <table class="col-6">
            <tr>
                <td><span style="color: red;">@error('chance_no')
                     {{ $message }}
                    @enderror
                    </span>
                 </td>
                 <td><span style="color: red;">@error('targa')
                     {{ $message }}
                     @enderror
                     </span>
                  </td>
              </tr>
        </table>
          <br>
       <div class="row">
          <div class="col">
            <div class="form-group">
                <label for="Textarea1">Accident Detail</label>
                <textarea class="form-control"  rows="5" name="accident_detail" placeholder="Type Accident Detail" ></textarea>
              </div>
          </div>
          </div>
          <span style="color: red;">
          @error('accident_detail')
            {{ $message }}
           @enderror
        </span>
        <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="validatedCustomFile" name="image" >
            <br>
            <label class="custom-file-label" for="validatedCustomFile">Do You Want to attach image ?</label>
            <div class="invalid-feedback">Example invalid custom file feedback</div>
          </div>
          <span style="color: red;">
          @error('image')
          {{ $message }}
          @enderror
          </span>
      <div class="col">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Location Description</label>
            <textarea class="form-control" id="Textarea2" rows="5" name="description" placeholder="Type Something Location Description" ></textarea>
          </div>
      </div>
      <span style="color: red;">
      @error('description')
      {{ $message }}
      @enderror
      </span>
      <center><input type="submit" class="btn btn-primary" value="send report" name="send"></center>
    </div>

  </form> 
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"  crossorigin="anonymous"></script>
  <script src="js/popper.min.js"  crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"  crossorigin="anonymous"></script>
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
