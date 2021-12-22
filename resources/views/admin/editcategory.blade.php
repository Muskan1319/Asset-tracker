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
  <h2>Category Management</h2>
  @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
            @endif
       
  <form action="/category/update/{{$id}}" method="post" >
    @csrf
    @foreach($query as $data)
   <div class="form-group">
    <label for="typ">Name:</label>
    <input type="text" class="form-control container" id="name" placeholder="Asset type" name="name">
    @if($errors->has('name'))
    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('name')}}</label>
    @endif
    </div>
    
    <div class="form-group">
    <label for="img">Image</label>
    <input type="file" class="form-control" id="img" placeholder="Enter Description" name="image">
    </div>
    
    <div class="form-group">
      <label for="">Status</label></br>
      <input type="radio" value="status" id="status"  name="status">Active
      <input type="radio" value="status" id="status"  name="status">Inactive
 @if($errors->has('status'))
<label class="text-danger  font-weight-bold col-10 container">{{$errors->first('status')}}</label>
@endif
</div>
<div>
<label for="cars">Select Type</label>

<select id="type_id" name="type_id">
@foreach($query as $data)
<option value="{{$data->id}}">{{$data->type}}</option>
@endforeach
</select>
 @if($errors->has('type_id'))
<label class="text-danger  font-weight-bold col-10 container">{{$errors->first('type_id')}}</label>
@endif
</div>
</br>
@endforeach
<button type="submit" class="btn btn-success">Submit</button>
</form>
</body>
</html>
@endsection