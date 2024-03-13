<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <title>Register</title>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                <li class="{{ Request::is('register') ? 'active' : '' }}"><a href="{{ url('/register') }}">Register</a></li>
                @if(auth()->check())
                <li class="{{ Request::is('blogs') ? 'active' : '' }}"><a href="{{ url('/blogs') }}">Dashboard</a></li>
                <li class="{{ Request::is('logout') ? 'active' : '' }}" style="margin-top:6%;">
                    <form action="{{ url('/logout') }}" method="POST" id="logout-form">
                        @csrf
                        <a href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();" style="color: #555;">Logout</a>
                    </form>
                </li>
                @else
                <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="{{ url('/login') }}">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="container">
  <form method="post">
    @csrf
    <h2>Login</h2>

    @if(session()->has('success'))
    <div class="alert alert-success success_msg">
    {{ session()->get('success') }}
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger error_msg">
    {{ session()->get('error') }}
    </div>
    @endif

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" class="form-control" id="email" placeholder="Enter Email Address" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
              <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">

            @if ($errors->has('password'))
              <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
</html>

<script>
$(document).ready(function(){
    setTimeout(function(){
        $(".success_msg").fadeOut("slow");
    }, 5000);

    setTimeout(function(){
        $(".error_msg").fadeOut("slow");
    }, 5000);
});
</script>