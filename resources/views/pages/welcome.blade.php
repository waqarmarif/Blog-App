@extends('main')
@section('title','| Welcome')
@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="jumbotron">
          <h1 class="display-4">Welcome To My Blog</h1>
          <p class="lead">This is my first blog. This is our most papular blog for these kind of Posts.</p>
          <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-md-8">
      @foreach ($post as $post )
        <div class="post">
            <h3>{{$post->title}}</h3>
            <p>{{substr($post->body,0,200)}}</p>
            <a href="{{route('blog.single',$post->slug)}}" class="btn btn-primary">Read More</a>
        </div>
        <hr>
      @endforeach
    
  </div>
  <div class="col-md-3 col-md-offset-1">
      <h2>Sidebar</h2>
  </div>
</div>
@endsection


        