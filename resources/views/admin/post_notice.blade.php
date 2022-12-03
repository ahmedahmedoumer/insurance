
@extends('main.admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Notice</title>
</head>
<body>
    <h1 style="background-color: 1E1E1E" ><center> POST Notice Page </center></h1>
    @php
        // $posts = \App\Models\new_post::paginate(2);
    @endphp

    @if (isset($success))
    <div class="alert alert-info">{{ $success }}
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button></div>   
   @else
   @if (isset($fail))
   <div class="alert alert-danger">{{ $fail }}
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button></div>
   @endif
  
   @endif
    <form action="/post" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row" style="margin-top:0%">
          <div class="col">
            <input type="text" class="form-control col-4" placeholder="post name" name="post_name" id="post_name">
          </div> 
        </div>
        <span style="color: red;">@error('post_name')
            {{ $message }}
        @enderror</span>
          <div class="form-group col-5" style="margin-top: 30px" >
            <label for="exampleFormControlTextarea1">Post Text</label>
            <textarea class="form-control" id="main_text" rows="6" name="main_text"></textarea>
          </div>
          <span style="color: red">@error('main_text')
              {{ $message }}
          @enderror</span>
          <div class="form-group">
            <label for="exampleFormControlFile1">Do You want attach image ?  </label>
            <input type="checkbox" value="yes" id="check" name="check">
            <input type="file" name="image" class="form-control-file" id="image">
          </div>
          <input type="submit" class="btn btn-primary mb-2" value="post news">
        </div>
       
      </form>

</body>
</html>
@endsection
