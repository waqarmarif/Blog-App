@extends('main')

@section('title' , ' | View Post')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>{{$post->title}}</h1>
        <p>{{$post->body}}</p>
        <hr>
            @foreach ($post->tags as $tag)
                
                    <p class="badge badge-success p-1">
                        {{$tag->name}}
                    </p>
                   
                
            @endforeach
        
    </div>
    <div class="col-md-4">
        <div class="card card-body bg-light">
            <dl class="dl-horizontal">
                <label>Created at:</label>
                <p>{{date('M j, Y H:i',strtotime($post->created_at))}}</p>
                <label>Updated at:  </label>
                <p>{{date('M j, Y H:i',strtotime($post->updated_at))}}</p>
                <label>Url </label>
                <p><a href="{{url('blog/'.$post->slug)}}">{{url($post->slug)}}</a></p>
            </dl>
            
               
            
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('post.edit' , 'Edit' , array($post->id),array('class'=>'btn btn-primary btn-block')) !!}
                </div>
                <div class="col-sm-6">
                    {!!Form::open(['route'=>['post.destroy',$post->id],'method'=>'delete'])!!}
                    {!!Form::submit('Delete',['class'=>'btn btn-danger btn-block'])!!}
                    {!!Form::close()!!}
                </div>
                <div class="col-sm-12">
                    <a href="{{route('post.index')}}" class="btn btn-info btn-block mt-3">All Post</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection