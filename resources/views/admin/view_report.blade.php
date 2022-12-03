@extends('main.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css"  crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Vehicle Insurance </title>
</head>
<body>
    @if (isset($data))

{{-- 
         <div class="container " style="margin:10%;border-style: solid;background-color: #ADEDDD">
            @foreach ($data as $item)
            {{"vehicle id :". $item->vehicle_detail }}
            {{ "accicedent place :".$item->accident_place }}
            {{ "accicedent detail :".$item->accident_type }} --}}
            @foreach ($data as $item)
            <div class="container">
                <div class="row mt-5">
                    <div class=" offset-2 col-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> report view</h4>
                            </div>
                            @csrf
                            <div class="form-group">
        
                                    <label for="title" class="col-form-label">  {{"vehicle id :"}}</label>
                                    
                              
                                {{ $item->vehicle_detail }}
                            </div>
                            <div class="form-group">
                                {{ "accicedent place :".$item->accident_place }}
                            </div>
                            <div class="card-footer">
                                {{ "accicedent detail :".$item->accident_type }} 
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

            @endforeach

         </div>
         @endif











         <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
