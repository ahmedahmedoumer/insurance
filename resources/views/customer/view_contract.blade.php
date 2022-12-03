@extends('main.customer')
@section('customer')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <title>approve contract</title>
</head>
<body>
 


    @if (isset($msg))
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>{{ $msg }}.</p>
        <hr>
        <p class="mb-0">  <strong>Dear Customer !!</strong> We are Appreciate and Great Thanks For You.</p>
      </div>
      @endif
    @if(isset($contract_data))
    <div style="background-color:brown; margin: 8%;border-style: solid;border-width:  2px;">
    <h1 style="background-color:#e7e4e4" ><center>do contract Center  </center></h1>
    <div class="card mb-3" style="color: black; background-color:white;">

     @foreach ($contract_data as $data_contract)

           <h1 class=" btn btn-light">
            <table border="1" class="card-header" style="text-decoration: black;padding: 10px; width:75%;" >
                <tr>
                    <td><strong>  {{"Owner      :  " }}</strong></td>
                    <td> <strong><b> {{  $data_contract->first_name."  ". $data_contract->last_name }}</b></strong></td>
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
               @if($data_contract->status=="rejected")
               <tr><td colspan="2">
                 <div class="alert alert-warning">
                {{ "Your receipt are rejected by an admin please insert valid receipt" }}
                 </div>
                </td></tr>
               @endif
               @if($data_contract->status=="accepted")
               <tr><td colspan="2">
                 <div class="alert alert-success">
                {{ " congratulation !! Your receipt are accepted now your are Guaranted" }}
                 </div>
                </td></tr>
               @endif
                    <form action="/customer/_{{ $data_contract->vehicle_chance_no."_".$data_contract->id }}_send_approve" method="post" enctype="multipart/form-data"  >
                        @csrf
                    <tr>
                        <td >
                            <label class="btn btn-primary" >Do You Want To Approve  ? </label>
                        <input style="transform: scale(2);-webkit-transform: scale(2); margin-left: 10%;" type="checkbox" name="customer_approve" id="check" @if ($data_contract->customer_approve != null)
                            checked disabled
                        @endif onclick="Enable(this)"  ><br>
                        <span style="color: red">
                            @error('customer_approve')
                            {{ $message }}
                             @enderror
                         </span>

                          </td>
                        <td>
                               <input type="file" class="rounded" value="Choose File"    name="image_file" id="file_image" @if ($data_contract->customer_approve != null)
                                disabled
                              
                              @endif><br>
                               <span style="color: red">
                               @error('image_file')
                               {{ $message }}
                           @enderror
                        </span>
                        </td>
                    </tr>
                     <tr><td></td><td>@if ($data_contract->customer_approve != null)
                        <span class="alert-success">You Already Send Done!!</span>
                      
                      @else<span class="btn-book">Please Upload Payment Reciept</span>@endif
                    </td></tr>  <tr>
                            <td colspan="2">
                         <label class="btn btn-primary" aria-disabled="true">Admin Approve </label>
                        <input type="checkbox" style="transform: scale(2);-webkit-transform: scale(2); margin-left: 10%;" name="admin_approve" @if ($data_contract->admin_approve==null)

                        @else
                          checked
                        @endif disabled id=""></td>
                        </tr> 
                         <tr>
                            <td colspan="2">
                      <label class="btn btn-primary" aria-disabled="true" d>staff Approve </label>
                          <input style="transform: scale(2);-webkit-transform: scale(2);margin-left: 10%; " type="checkbox" @if ($data_contract->staff_approve==null)

                          @else
                            checked
                          @endif name="staff_approve" disabled id="" >
                      </td>
                      </tr> 
                        <tr >
                            <td colspan="2">
                            <center>
                                
                                <input class="btn btn-success"   type="submit" value="send Approve"  @if ($data_contract->customer_approve != null)
                                disabled
                              
                              @endif >
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
    @if (isset($contract_data))
        
    
    <div style="margin: 15px;" class="alert alert-success" role="alert">
        <h4 class="alert-heading">Please Wait!</h4>
        <p>{{ "Until the admin approved your request  OR   wait until you received something from the admin"  }}.</p>
        <hr>
        <p class="mb-0">  <strong>Dear customer !!</strong> we have great thanks and values for you.</p>
      </div>
    @endif
    <script type="text/javascript">
        Enable = function(val)
        {
            var sbmt = document.getElementById("file_image"); //id of button


            if (val.checked == true)
            {
                sbmt.disabled = false;
            }
            else
            {
                sbmt.disabled = true;
            }
        }
        </script>


    <script src="../js/popper.min.js"  crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"  crossorigin="anonymous"></script>
    <script src="../assets/vendor/jquery/jquery.min.js"  crossorigin="anonymous"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/venobox/venobox.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>
</html>
@endsection
