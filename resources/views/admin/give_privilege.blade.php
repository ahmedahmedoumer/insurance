@extends('main.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    {{-- <title>Document</title> --}}
    <style>
       
            .glyphicon {  margin-bottom: 10px;margin-right: 10px;}
             small {
             display: block;
             line-height: 1.428571429;
             color: #999;
             }
    </style>
</head>
<body>
    @if (isset($fail))
    <div class="alert alert-warning">
        {{$fail}}
    </div>
    @endif
    @if (isset($success))
    <div class="alert alert-success">
       {{$success}}
    </div>
    @endif
    @if (isset($staff_data))
    @if ($staff_data==null)
        <div class="alert alert-warning">
            {{ "please insert valid insert id !!" }}
        </div>
        @endif
    @endif
    <form action="/assign-privilege" method="post">
        @csrf
    <div class="input-group">
        <div class="form-outline">
            <input type="search" id="form1" name="search_id" placeholder="serach by id" class="form-control"/>
        </div>
      <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>
<br>
<br>
<div style="border: 2px;border-style: solid;" class="container">
@if (isset($staff_data))
<div class="form-group row">
<div class="form-control col-md-6">
    <strong>{{ "Full Name  : " .$staff_data->first_name."   ".$staff_data->last_name }} </strong>
</div></div>
<form action={{"/assign_".$staff_data->staff_id}} method="post">
    @csrf
    <div class="form-group row">        
     <div class="col-md-6">
       <select id="inputState" name="select" class="form-control">
           <option selected>Choose...</option>
           <option value="admin">Admin</option>
           <option value="customer" disabled>Customer</option>
           <option value="staff" disabled>Staff</option>
            <option value="delete">Delete</option>
         </select>
         <input type="submit" class="btn btn-success" value="assign">
          <span style="color: red;">                                               
            @error('select')
                 {{ $message }}
             @enderror
          </span>
       </div>
    </div>
</form>
    </div> <br>
    
@endif
<!------ Include the above in your HEAD tag ---------->


</body>
</html>
@endsection

