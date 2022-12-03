@extends('main.customer')

@section('customer')
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Vehicle Insurance</title>
                <meta name="viewport" content="width=device-width , initial-scale=1">
                <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
                <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
                <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
                <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
                <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
                <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
                <link href="../assets/css/style.css" rel="stylesheet">

                <style>

                </style>
            </head>


                <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center my-5">
                                <h1 class="display-5 fw-bolder text-white mb-2">You can guaranted when  Deliver Agreed to Enhance your business in a whole new way</h1>
                                <p class="lead text-white-50 mb-4">Quickly decide and collaborate with us and set Your Bussiness on Guranted status!</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" >Get Started</a>
                                    <a class="btn btn-outline-light btn-lg px-4" >read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



        <script type="text/javascript">
            $(document).ready(function(){
                $('#tabs').tab();
            });
            $().button('toggle');
            $('#myDropdown').on('show.bs.dropdown', function () {
              $('.dropdown-toggle').dropdown()
            });
            $('.dropdown-toggle').dropdown();
            $('a.dropdown').on('click',function(){
                $(this).parent().toggleClass('open');
            });
            $('dropdownmenubutton').on('click',function(){
                $(this).parent().toggleClass('open');
            });
          </script>
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
