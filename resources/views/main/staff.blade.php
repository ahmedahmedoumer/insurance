
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Vehicle Insurance</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
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

<body style="background-color: #FFFFFF;">

<!-- ======= Top Bar ======= -->


  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex">

    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <div class="d-flex align-items-center">
      <h1 class="logo mr-auto"><a href="index.html">Vehicle Insurance</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
       {{-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> --}}
{{-- @if (isset($staff))
    {{ .$staff->id }}
@endif --}}
{{-- staff --}}
      </a>
      <nav class="nav-menu d-none d-lg-block">
        <ul>

           @php
           $model=App\Models\staff::where('role',1)->first();
           if ($model==null) {
                $model=0;
                $lname=null;
                $fname=null;
           }
           else {
              $id=$model->staff_id;
              $fname=$model->first_name;
              $lname=$model->last_name;
           }
            @endphp
          <li><a href="/home_page">Home</a></li>
          <li><a href="
            /staff/register">register</a></li>
          <li><a href="/staff/do_contract">Do Contract</a></li>
          <li><a href="/staff/update_account_info">Update</a></li>
          <li><a href=
              {{ "/staff_".$id."_view_information" }}
             >view information</a></li>
          <li><a href="/staff/change_owner">change Owner</a></li>
          <li><a href="/contact">Contact</a></li>
          {{-- <li><a href="#about">About</a></li> --}}
          {{-- <li class="book-a-table text-center"><a href="#book-a-table">Sign Out</a></li> --}}
          <li>
            <div class="dropdown book-a-table text-center" style="width: 100px;height: 50px;">
                <button style="background-color:#6A737B; width: 100%;height: 100%;"  class="rounded-pill dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Account
                </button>
                <div class="dropdown-menu p-3 mb-2 bg-secondary text-white" aria-labelledby="dropdownMenuButton" style="background-color: #fafaf9">
                  <a class="dropdown-menu p-3 mb-2 bg-secondary text-white" href="#">@if (isset($staff))
                      {{ "hello ".$fname."   ".$lname}}

                  @endif</a>
                  <a class="dropdown-menu p-3 mb-2 bg-secondary text-white" href="/staff/add_account">Add another Account</a>
                  <a class="dropdown-menu p-3 mb-2 bg-secondary text-white" href="/staff/logout">Logout</a>
                  {{-- <a class="dropdown-item" href="#"></a> --}}
                </div>
              </div>

          </li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
  {{-- <section id="hero" class="d-flex align-items-center">



  </section> --}}
  <main id="main" >
    <section id="regsiter" class="menu">

    </section>
  </main>



@yield('staff_content')
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
