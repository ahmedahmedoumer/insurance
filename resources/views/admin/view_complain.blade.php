@extends('main.admin')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (isset($data))
       @foreach($data as $datas)
       <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        {{  $datas->comments }}
    
        <hr>
        <p class="mb-0">Date :{{ $datas->created_at->format('Y, m d') }}.</p>
      </div>
       @endforeach
    @endif

</body>
</html>
@endsection
