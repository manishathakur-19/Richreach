<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <title>Update Blog</title>
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
    <h2>Update Blog</h2>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" placeholder="Enter Title" id="title" name="title" value="{{ $blog->title }}">

            @if ($errors->has('title'))
              <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="content">Content</label>
          <textarea class="form-control" rows="10" cols="12" name="content" placeholder="Enter Content">{{ $blog->content }}</textarea>

            @if ($errors->has('content'))
              <span class="text-danger">{{ $errors->first('content') }}</span>
            @endif
        </div>
      </div>
    </div>
    <!--  row   -->
    
    <a href="{{ url('/blogs') }}"><button type="button" class="btn btn-primary" style="float: right;">Back</button></a>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
</html>