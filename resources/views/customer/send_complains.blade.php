@extends('main.customer')

@section('customer')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css"  crossorigin="anonymous">

    <title>insurance</title>
</head>
<body>
    <div style="margin:10%;margin-top:5%; padding:5%;background-color:lightslategrey;" >
    <h1 style="background-color: 1E1E1E" ><center> Give complains </center></h1>
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
    <form method="post" action="
    @if (isset($customer_account))
        @foreach ($customer_account as $item)
            {{ "/customer/give_comments_".$item->id }}
        @endforeach
      @endif
    ">
        @csrf
        
          <div class="form-group col-5 " style="margin-top: 30px" >
            <label for="exampleFormControlTextarea1">comment</label>
            <textarea  class="form-control" id="comment" rows="6" placeholder="Write comment here" name="comment"></textarea>
            <span style="color: red;">@error('comment')
                {{ $message }}
            @enderror</span>
          </div>
        <input type="submit" class="btn btn-primary mb-2" value="send comments">

      </form>
    </div>
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
