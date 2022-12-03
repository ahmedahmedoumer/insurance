@extends('main.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show status</title>
</head>
<body>
    <h1 style="background-color: white;color:black;"><center>Status </center> </h1>

    @if(isset($status))
    <div style="background-color:brown; margin: 8%;border-style: solid;border-width:  2px;">
    <h1 style="background-color:#1E1E1E;color: white;" ><center>show the Deadline Date  </center></h1>
    <div class="card mb-3" style="text-decoration: black; background-color:white;">

     @foreach ($status as $data_contract)

           <h1 class=" btn btn-light">
            <table border="1" class="card-header" style="text-decoration: black;padding: 10px; width:75%;" >
                <tr ><td class="btn-success">Title</td><td class="btn-success">Info</td></tr>
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
                        <td> Paid price In Birr:</td>
                        <td>{{$data_contract->price."/Year"}}</td>
                    </tr>
                    <tr>
                        <td> The last Paid Date :</td>
                        <td>{{$data_contract->updated_at}}</td>
                    </tr>
                    <tr>
                        <td> The Deadline of renew term lefts:</td>
                        <td>{{$data_contract->deadline}}</td>
                    </tr>
                    <tr><td><form action="{{"/notify".$data_contract->id}}" method="post">
                        @csrf
                        <textarea name="comment" id="comment" cols="30" rows="2" placeholder="write something here to this User">
                        </textarea>
                        @error('comment')
                          <span style="color: red;">  {{$message}}
                        </span>
                        @enderror
                        <input type="submit" class=" btn-primary" value="Notify User">
                    </form></td>
                        <td>@if ($data_contract->admin_approval==NULL)
                            <input type="submit" class=" btn-danger disabled" value="Blocked">
                        @else
                        <form action="{{"/block".$data_contract->id}}" method="post">
                            @csrf
                            <input type="submit" class=" btn-danger" value="Block User"></form>
                        </td>
                        {{-- <a  class="btn-danger" href={{"/block".$data_contract->id}}>Block User</a></td> --}}
                        @endif
                    </tr>









            </table>
        </h1>

     @endforeach
    </div>
</div>
    @endif


    <script type="text/javascript">
        Enable = function(val)
        {
            var sbmt = document.getElementById("comment"); //id of text field


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
</body>
</html>
@endsection
