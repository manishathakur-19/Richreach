<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<title>Home</title>

<style>
body{margin-top:20px;}
.home-blog {
    padding-top: 80px;
    padding-bottom: 80px;
}
@media (min-width: 992px) {
    .home-blog {
        padding-top: 100px;
        padding-bottom: 100px;
    }
}
.home-blog .section-title {
    padding-bottom: 15px;
}
.home-blog .media {
    margin-top: 50px;
}
@media (min-width: 768px) {
    .home-blog .media {
        margin-top: 30px;
    }
}
.bg-sand {
    background-color: #f5f5f6;
}
.media.blog-media {
    margin-top: 30px;
    position: relative;
    display: block;
}
@media (min-width: 992px) {
    .media.blog-media {
        display: table;
    }
}
.media.blog-media .circle {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background-color: rgba(0, 0, 0, 0.5);
    white-space: nowrap;
    position: absolute;
    padding: 0;
    top: 20px;
    left: 20px;
    text-align: center;
    box-shadow: none;
    transform: translateX(0);
    color: #fff;
    transition: background-color 0.3s ease;
}
.media.blog-media .circle .day {
    color: #fff;
    transition: color 0.25s ease;
    font-weight: 500;
    font-size: 28px;
    line-height: 1;
    margin-top: 12px;
}
.media.blog-media .circle .month {
    text-transform: uppercase;
    font-size: 14px;
}
.media.blog-media > a {
    position: relative;
    display: block;
}
@media (min-width: 992px) {
    .media.blog-media > a {
        display: table-cell;
        vertical-align: top;
        min-width: 200px;
    }
}
@media (min-width: 1200px) {
    .media.blog-media > a {
        min-width: 230px;
    }
}
.media.blog-media > a:before {
    position: absolute;
    content: "";
    top: 15px;
    left: 15px;
    right: 15px;
    bottom: 15px;
    opacity: 0;
    transform: scale(0);
    transition: transform 0.3s ease, opacity 0.3s;
    background: rgba(12, 198, 82, 0.7);
}
.media.blog-media > a img {
    width: 100%;
}
.media.blog-media:hover > a:before {
    opacity: 1;
    transform: scale(1);
}
.media.blog-media:hover .circle {
    background-color: rgba(255, 255, 255, 0.9);
}
.media.blog-media:hover .circle .day,
.media.blog-media:hover .circle .month {
    color: #222;
}
.media.blog-media:hover .media-body h5 {
    color: #0cc652;
}
.media.blog-media:hover .media-body a.post-link {
    color: #0cc652;
    text-decoration: underline;
}
.media.blog-media .media-body {
    border: 1px solid #efeff3;
    padding: 30px 30px 10px;
    font-size: 14px;
    background: #fff;
    border-top: none;
}
@media (min-width: 992px) {
    .media.blog-media .media-body {
        padding: 15px 20px 10px;
        border-top: 1px solid #efeff3;
        border-left: none;
        display: table-cell;
        vertical-align: top;
    }
}
@media (min-width: 1200px) {
    .media.blog-media .media-body {
        padding: 30px 20px 10px;
    }
}
.media.blog-media .media-body h5 {
    transition: color 0.3s ease;
    margin-bottom: 15px;
}
@media (min-width: 992px) {
    .media.blog-media .media-body h5 {
        font-size: 15px;
    }
}
@media (min-width: 1200px) {
    .media.blog-media .media-body h5 {
        margin-bottom: 15px;
        font-size: 18px;
    }
}
.media.blog-media .media-body a.post-link {
    display: block;
    color: #222;
    font-size: 11px;
    padding: 23px 0;
    text-transform: uppercase;
    font-weight: 400;
}
@media (min-width: 992px) {
    .media.blog-media .media-body a.post-link {
        padding: 7px 0;
    }
}
@media (min-width: 1200px) {
    .media.blog-media .media-body a.post-link {
        padding: 23px 0;
    }
}
.media.blog-media .media-body ul {
    position: relative;
    padding: 10px 0 0;
}
.media.blog-media .media-body ul li {
    display: inline-block;
    width: 49%;
    position: relative;
}
.media.blog-media .media-body ul li:before {
    position: absolute;
    content: "";
    top: 5px;
    left: 0;
    width: 1px;
    height: 14px;
    background: #eeeef2;
}
.media.blog-media .media-body ul li:first-child:before {
    visibility: hidden;
}
.media.blog-media .media-body ul:before {
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    width: 100%;
    height: 1px;
    background: #eeeef2;
}
</style>
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

<section class="home-blog bg-sand">
    <div class="container">
		<div class="row ">
            @foreach($blogs as $blog)
			<div class="col-md-6">
				<div class="media blog-media">
				  <div class="media-body">
				    <a href="{{ url('/blog/detail/' . $blog->id) }}"><h5 class="mt-0">{{ $blog->title }}</h5></a>
                    {{ Str::limit($blog->content, 50) }}
                    <a href="{{ url('/blog/detail/' . $blog->id) }}" class="post-link">Read More</a>
				    <ul>
                      <li>By: {{ $blog->user->name }}</li>
				    </ul>
				  </div>
				</div>
			</div>
            @endforeach
		</div>
	</div>
</section>
</body>
</html>