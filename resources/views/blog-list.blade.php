<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <title>Blogs</title>
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

@if(session()->has('success'))
<div class="alert alert-success success_msg">
{{ session()->get('success') }}
</div>
@endif

<div class="row">
  <a href="{{ url('/addblog') }}"><button type="button" class="btn btn-primary" style="float: right;">Add Blog</button></a>
</div>

<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Title</th>
        <th>Content</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($blogs as $blog_key => $blog)
      <tr>
        <td>{{ $blog_key + 1 }}</td>
        <td>{{ $blog->title }}</td>
        <td>{{ Str::limit($blog->content, 50) }}</td>
        <td>
        <a href="{{ url('/editblog/' . $blog->id) }}" class="edit" title="" data-toggle="tooltip" data-original-title="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        <a href="javascript:void(0);" class="delete deletePost" title="" data-id="{{$blog->id}}" data-toggle="modal" data-original-title="Delete" data-target="#delete"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  </div>

</body>
</html>


<!-- Delete modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
</div>
<form action="" method="post" id="delete_form">
{{method_field('delete')}}
{{csrf_field()}}
<div class="modal-body">
<p class="text-center">
Are you sure you want to delete this?
</p>
<input type="hidden" name="del_post_id" id="del_post_id" value="">
</div>
<div class="modal-footer">
<button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
<button type="submit" class="btn btn-warning">Yes, Delete</button>
</div>
</form>
</div>
</div>
</div>

<script>
$(document).ready(function(){
    setTimeout(function(){
        $(".success_msg").fadeOut("slow");
    }, 5000);

  jQuery('body').on('click', '.deletePost', function() {
    var postId = jQuery(this).data('id');
    jQuery('#del_post_id').val( postId );

    var formAction = '/deleteBlog/' + postId;
    jQuery('#delete_form').attr('action', formAction);

  });
});
</script>