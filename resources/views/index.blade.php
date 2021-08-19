<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container" style="padding-top: 5%;">
    <div class="card-body col-md-12">
    <h5 class="card-title">Add user</h5>
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-md-6" style="padding-top: 1%;">
    <input type="text" class="form-control" placeholder="Name" name="name">
    </div>
    @error('name')
    <span>{{$message}}</span>
    @enderror
    <div class="col-md-6" style="padding-top: 1%;">
    <input type="text" class="form-control" placeholder="Email" name="email">
    </div>
    @error('email')
    <span>{{$message}}</span>
    @enderror
    <div class="col-md-6" style="padding-top: 1%;">
    <input type="text" class="form-control" placeholder="State" name="state">
    </div>
    @error('state')
    <span>{{$message}}</span>
     @enderror
    <div class="col-md-6" style="padding-top: 1%;">
    <input type="text" class="form-control" placeholder="Country" name="country">
    </div>
    @error('country')
    <span>{{$message}}</span>
     @enderror
     <div class="col-md-6" style="padding-top: 1%;">
    <input type="file" class="form-control" name="profile_picture">
    </div>
    @error('profile_picture')
    <span>{{$message}}</span>
     @enderror
    <div class="col" style="padding-top: 1%;">
    <button style="float: right" type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>
</div>
</div>



@if($message = Session::get('success'))
  <div class="alert alert-success" style="width:23%;margin-left:1050px;">
  <h6 style="text-align:center;">{{ $message}}</h6>
  </div>
  @endif

  <div class="card" style="margin-top: 5%;">
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>State</td>
          <td>Country</td>
          <td>Profile Picture</td>
          <td colspan=2>Actions</td>
        </tr>
    </thead>
<tbody>
   @foreach($users as $user)
    <tr>
    <td >{{ $user->id }}</td>
    <td >{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->state }}</td>
    <td>{{ $user->country }}</td>
    <td><img src="images/{{ $user->profile_picture }}" style="width:5%;height:5%;"></td>
    <td>
        <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a></td>
       <td><form action="{{ route('user.destroy',$user->id) }}" method="POST">
    @csrf
    @method('DELETE')
     <button  class="btn btn-danger">Delete</button>
    <form>
    </td>
   </tr>
   @endforeach
</tbody>
</table>
</div>
</body>
</html>