@extends('main.staff')
@section('staff_content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <title>approve contract</title>
</head>
<body  style="margin:10;background-color:white">
    <h1>hello</h1>
    {{ "hello" }}
    @if(isset($success))
         {{$success}}
     @endif

    @if(isset($contract_data))
    <div style="background-color:brown; margin: 8%;border-style: solid;border-width:  2px;">
    <h1 style="background-color:#1E1E1E" ><center>do contract Center  </center></h1>
    <div class="card mb-3" style="text-decoration: black; background-color:white;">

     @foreach ($contract_data as $data_contract)

           <h1 class=" btn btn-light">
            <table border="1" class="card-header" style="text-decoration: black;padding: 10px; width:75%;" >
                <tr>
                    <td>  {{"Owner      :  " }}</td>
                    <td> {{  $data_contract->first_name."  ". $data_contract->last_name }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{$data_contract->address}}</td>
                </tr>
                <tr>
                      <td>phone No : </td>
                      <td>{{$data_contract->phone_no}}</td>
                </tr>
                        <tr>
                            <td>Vehicle Chance No :</td>
                            <td>{{ $data_contract->vehicle_chance_no }}</td>
                        </tr>
                        <tr>
                             <td>vehicle type : </td>
                             <td>{{$data_contract->vehicle_type}}</td>
                        </tr>
                        <tr>
                               <td> vehicle force :</td>
                               <td>{{$data_contract->vehicle_force}}</td>
                        </tr>
                        <tr>
                               <td> vehicle Model :</td>
                               <td>{{$data_contract->vehicle_model}}</td>
                        </tr>
                        <tr>
                               <td> Code No :</td>
                               <td>{{$data_contract->vehicle_code_no}}</td>
                        </tr>
                        <tr>
                            <td> Selling price :</td>
                            <td>{{$data_contract->vehicle_price}}</td>
                     </tr>
                     <tr>
                        <td> Contrat Type:</td>
                        <td>{{$data_contract->contract_type}}</td>
                    </tr>
                     <tr>
                        <td> Insurance price In Birr:</td>
                        <td>{{$data_contract->price."/Year"}}</td>
                    </tr>
                    <form action="/staff/{{ $data_contract->vehicle_chance_no }}/send_approve" method="post">
                        @csrf
                    <tr>
                        <td colspan="2">
                           <label class="btn btn-primary" aria-disabled="true" d>Admin Approve </label>
                        <input style="transform: scale(2);-webkit-transform: scale(2); margin-left: 10%;" type="checkbox" name="admin_approve" @if ($data_contract->admin_approve==null)

                        @else
                          checked
                        @endif id="" disabled ></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                         <label class="btn btn-primary" aria-disabled="true">customer Approve </label>
                        <input type="checkbox" style="transform: scale(2);-webkit-transform: scale(2); margin-left: 10%;" name="customer_approve" @if ($data_contract->customer_approve==null)

                        @else
                          checked
                        @endif disabled id=""></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                <label class="btn btn-primary" >Do You Want To Approve  ? </label>

                          <input style="transform: scale(2);-webkit-transform: scale(2);margin-left: 10%; " type="checkbox" name="staff_approve" @if ($data_contract->staff_approve==null)

                          @else
                            checked
                          @endif  id="" >
                      </td>
                      </tr>
                        <tr >
                            <td colspan="2">
                            <center>
                                <input class="btn btn-success"   type="submit" value=" Approve">
                            {{-- <a href="/staff/{{ $data_contract->vehicle_chance_no }}/send_approve"   >send request</a> --}}
                            </center>
                        </td>
                        </tr>
                    </form>




            </table>
            {{-- <table class="card-header" style="text-decoration: black;padding: 10px; width:75%;">

            </table> --}}
        </h1>

     @endforeach
    </div>
</div>
    @endif



<div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

  <!-- Vendor JS Files -->
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

