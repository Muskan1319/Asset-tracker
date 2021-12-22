@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@section('Muskan') 
<div class="container">
  <h2>Edit Asset </h2>
  @if(Session::has('error'))
  <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
  @endif
          
  <form action="/asset/update/{{$id}}" method="post" >
    @csrf
    @foreach($sel as $data)
   <div class="form-group">
    <label for="typ">Type:</label>
    <input type="text" class="form-control" id="typ" placeholder="Asset type" value="{{$data->type}}" name="type">
    @if($errors->has('type'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('type')}}</label>
    @endif
    </div>
    <div class="form-group">
      <label for="desc">Description:</label>
      <input type="text" class="form-control" id="desp" placeholder="Enter Description" value="{{$data->desc}}" name="desc">
      @if($errors->has('desc'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('desc')}}</label>
                    @endif
    </div>
    @endforeach
    <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
@endsection
</body>
</html>
