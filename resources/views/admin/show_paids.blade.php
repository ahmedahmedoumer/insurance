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
<!------ Include the above in your HEAD tag ---------->
@if (isset($data))
    @foreach ($data as $item)
        
    <div class="row">
<div class="container ">
    <div class="row">
        {{-- <div class="col-xs-12 col-sm-6 col-md-6"> --}}
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                       <a href="#"><img src="../{{ $item->receipt_image }}" alt="" class="img-rounded img-responsive" /> </a>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                           {{$item->first_name."   ".$item->last_name}}</h4>
                        <small><cite title="San Francisco, USA">Address, {{ $item->address }} <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>{{ $item->email }}
                            <br />
                           <i class=" glyphicon glyphicon-earphone"> </i>
                            {{"+251".$item->phone_no}}
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>{{ $item->updated_at }}</p>
                            <i class="glyphicon glyphicon-gift"></i>{{ $item->price."/Year" }}</p>
                        <!-- Split button -->
                        <i class="glyphicon glyphicon-share-alt"></i>
                         <a href="/admin/reject_{{$item->vehicle_id}}" class="btn btn-danger">Reject</a>  
                    
                         <a href="/admin/accept_{{$item->vehicle_id}}" class="btn btn-success">Accept</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endforeach
    @endif

</body>
</html>
@endsection

