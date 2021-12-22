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
  <h2>Asset Management</h2>
  @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold col-10 container ">{{Session::get('error')}}</div>
            @endif
          
  <form action="senddata" method="post">
    @csrf
   <div class="form-group">
    <label for="typ">Type:</label>
    <input type="text" class="form-control" id="typ" placeholder="Asset type" name="type">
    @if($errors->has('type'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('type')}}</label>
                    @endif
    </div>
    <div class="form-group">
      <label for="desc">Description:</label>
      <input type="text" class="form-control" id="desp" placeholder="Enter Description" name="desc">
      @if($errors->has('desc'))
                    <label class="text-danger  font-weight-bold col-10 container">{{$errors->first('desc')}}</label>
                    @endif
    </div>
    <button type="submit" class="btn btn-info">Submit</button>
</form>
</body>
</html>
@endsection