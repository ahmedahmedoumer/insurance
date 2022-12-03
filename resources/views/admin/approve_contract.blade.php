@extends('main.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>approve contract</title>
</head>
<body>
    <h1 style="background-color: white;color:black;"><center>Approve Contract Page </center> </h1>

    @if(isset($customer_data))
    <div style="background-color:brown; margin: 8%;border-style: solid;border-width:  2px;">
    <h1 style="background-color:#1E1E1E;color: white;" ><center>do contract Center  </center></h1>
    <div class="card mb-3" style="text-decoration: black; background-color:white;">

     @foreach ($customer_data as $data_contract)

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
                    <form action="/admin/{{ $data_contract->vehicle_chance_no }}/send_approve" method="post">
                        @csrf
                    <tr>
                        <td colspan="2">
                            <label class="btn btn-primary" >Do You Want To Approve  ? </label>
                        <input style="transform: scale(2);-webkit-transform: scale(2); margin-left: 10%;" type="checkbox" name="admin_approve" id="" ></td>
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
                                <input class="btn btn-success"   type="submit" value="send approve">
                            {{-- <a href="/staff/{{ $data_contract->vehicle_chance_no }}/send_approve"   >send request</a> --}}
                            </center>
                        </td>
                        </tr>
                    </form>




            </table>
        </h1>

     @endforeach
    </div>
</div>
    @endif



</body>
</html>
@endsection
