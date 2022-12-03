@extends('main.customer')

@section('customer')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css"  crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css"  crossorigin="anonymous">

</head>
<body>
    @if (isset($data))
    @foreach( $data as $post)
    <div style="margin: 8%;border-style: solid;border-color:white">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">{{$post->name }}!</h4>
        <img src={{ "posts/".$post->image}} class="rounded " alt="...">

        <p>{{ $post->post }}</p>
        <hr>
        <p class="mb-0"><a href="http://ethioinsuarance.com">View detail</a> </p>
      </div>
</div>
    @endforeach

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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"  crossorigin="anonymous"></script>
    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
</body>
</html>
@endsection
