<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit</title>
</head>
<body>
<div class="container" style="padding-top: 5%;">
    <div class="card-body col-md-12">
    <h5 class="card-title">Edit user</h5>
    <form action="{{ route('user.update',$user->id)  }}" method="POST">
@csrf
@method('PUT')
<div class="row">
<div class="col-md-6" style="padding-top: 1%;">
    <input type="text" class="form-control" placeholder="Name" name="name" value="{{$user->name}}">
    </div>
    @error('name')
    <span>{{$message}}</span>
    @enderror
    <div class="col-md-6" style="padding-top: 1%;">
    <input type="text" class="form-control" placeholder="Email" name="email" value="{{$user->email}}">
    </div>
    @error('email')
    <span>{{$message}}</span>
    @enderror
    <div class="col-md-6" style="padding-top: 1%;">
    <input type="text" class="form-control" placeholder="State" name="state" value="{{$user->state}}">
    </div>
    @error('state')
    <span>{{$message}}</span>
     @enderror
    <div class="col-md-6" style="padding-top: 1%;">
    <input type="text" class="form-control" placeholder="Country" name="country" value="{{$user->country}}">
    </div>
    @error('country')
    <span>{{$message}}</span>
     @enderror
    <div class="col" style="padding-top: 1%;">
    <button style="float: right" type="submit" class="btn btn-primary">Update</button>
    </div>
</div>
</form>
</div>
</div>
</body>
</html>