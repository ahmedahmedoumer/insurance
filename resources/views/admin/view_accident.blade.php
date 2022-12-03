{{-- @extends('main.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accident</title>
</head>
<body>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
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
@endsection --}}
@extends('main.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css"  crossorigin="anonymous">
    <title>Vehicle Insurance </title>
</head>
<body>
    @if (isset($report))

{{--
         <div class="container " style="margin:10%;border-style: solid;background-color: #ADEDDD">
            @foreach ($data as $item)
            {{"vehicle id :". $item->vehicle_detail }}
            {{ "accicedent place :".$item->accident_place }}
            {{ "accicedent detail :".$item->accident_type }} --}}
            <center><h4 class="card-title bg-info" style="padding: 8px;" > report view</h4></center>
            @foreach ($report as $item)
            <div class="container">
                <div class="row mt-5">
                    <div class=" offset-2 col-8">
                        <div class="card">
                            <div class="card-header alert-success">

                            </div>
                            @csrf
                            <div style="background-color:aliceblue; padding:5px;">
                            <div  class="form-group">

                                    <label for="title" class="col-form-label">  {{"vehicle id :"}}</label>


                                {{ $item->vehicle_detail }}
                            </div>
                            <div class="form-group">
                                {{ "accicedent place :".$item->accident_place }}
                            </div>
                            <div class="form-group">
                                {{ "The time accident Happend :".$item->created_at }}
                            </div>
                            <div class="card-footer">
                                {{ "accicedent detail :".$item->accident_type }}
                            </div>
                        </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

         </div>
         @endif












<script src="../js/popper.min.js"  crossorigin="anonymous"></script>
<script src="../js/bootstrap.min.js"  crossorigin="anonymous"></script>
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

