@extends('main')

@section('title' , " | $post->title")


@section('content')

<div class="row">
    <div class="col-md-8 offset-md-2">
        <h1>{{$post->title}}</h1>
        <p>{{$post->body}}</p>
        <hr>
        @if($post->category)
        <p>{{$post->category->name}}</p>
        @else
        <p>UnCategorized</p>
        @endif
    </div>
</div>
@endsection