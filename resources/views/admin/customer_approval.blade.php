@extends('main.admin')
@section('content')

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
             .background{
                        background-color: darkgrey;
                        border: 3px;
                        border-color: black;
                        height: 40%;
                        padding-bottom: 40%;
                    }
                    .headers{
                        background-color: darkolivegreen;
                        height: 200%;
                        font: 700;
                        padding-top: 10px;
                        padding-left: 10;
                        margin: 5%;
                    }
                    .headertext{
                        padding-left:30%;
                        height: 30%;
                    }
                    .padding{
                        text-align: center;
                        background-color: darkgreen;
                    }
                    .imageposition{
                    padding-right: 15%;
                    border: 3px;
                    height: 250px;
                    width: 200px;
                    }
                    .other{
                     padding-left: 20%;
                     font: 400%;
                    }
                    .paddings{
                        padding-right: 5%;
                    }
                    .paddingse{
                        padding-left: 5%;
                    }
                    .all{
                        margin-left: 10%;
                        margin-right: 10%;
                        margin-bottom: 10%;
                    }
        </style>
    </head>
    <body>
        <div class="all">
        @if (isset($data))

        @foreach ($data as $item)
        <div class="background">
            <h1 class="padding">Personal info</h1>
            <div class="rounded float-left other paddingse ">
            <p>ID:  {{$item->id}}</p>
            <p>Full name:   {{$item->first_name."   ".$item->last_name}}</p>
            <p>Phone No:  {{"  +251".$item->phone_no}}</p>
            <p>Address: {{$item->address}}</p>
            <p>email:   {{$item->email}}</p>
            <p>username:   {{"***********"}}</p>
            <p>password:   {{"***********"}}</p>
            <form action="/admin/{{ $item->id }}/request_approve" method="post">
                @csrf
                <div class="row">
                <div class=" col-12">
                <label class="btn btn-primary" >Do You Want To Approve  ? </label>
                <input style="transform: scale(2);-webkit-transform: scale(2); margin-left: 10%;" type="checkbox" name="admin_approve" id="" >
                 <input  type="submit" class="btn btn-success"  name="submit" value="approve">
                </div>
                </div>
               </form>
            </div>
            <img src="
            @if ($item->image==null)
            {{'../uploads/contact.png'}}


            @else
           {{"/posts/".$item->image}}
            @endif
            " class="rounded float-right imageposition paddings" alt="...">
            <label for="image"><h3><b><center>Profile Photo</center> </b></h3></label>
        </div>
        <div class="footer" >
            <input type="submit" onclick="Request({{$item}})" value="click to detail" id="detail" name="detail" class="btn btn-outline-secondary btn-lg btn-block">
        </div>
             @if ($item->image==null)
            <div class="alert alert-warning alert-dismissible fade show"  role="alert">
            <strong>No profile photo!</strong> You should upload your profile photo in the fields above.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>


            @endif

            @endforeach



    @endif
    <script>
        document.getElementById('detail').onclick=function(){
            alert("No Detail please check another");
        }
    </script>
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
@endsection
