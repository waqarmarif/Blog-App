@extends('main')

@section('title' , '| Edit Post')

@section('content')

<div class="row">
    <div class="col-md-8">
        @if (count($errors)>0 )
        @foreach ($errors->all() as $error )
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
        {!!Form::model($post,['route'=>['post.update',$post->id],'method'=>'put'])!!}
        {!!Form::label('title','Title')!!}
        {!!Form::text('title',null,['class'=>'form-control'])!!}
        {!!Form::label('slug','Slug')!!}
        {!!Form::text('slug',null,['class'=>'form-control'])!!}
        {!!Form::label('body','Body')!!}
        {!!Form::textarea('body',null,['class'=>'form-control'])!!}
      
    </div>
    <div class="col-md-4">
        <div class="card card-body bg-light">
            <dl class="dl-horizontal">
                <dt>Created at:</dt>
                <dd>{{date('M j, Y H:i',strtotime($post->created_at))}}</dd>
                <dt>Updated at:  </dt>
                <dd>{{date('M j, Y H:i',strtotime($post->updated_at))}}</dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('post.show' , 'Cancel' , array($post->id),array('class'=>'btn btn-primary btn-block')) !!}
                </div>
                <div class="col-sm-6">
                    {{Form::submit('Update Post',['class'=>'btn btn-success btn-block'])}}
                </div>
                <div class="col-sm-12 mt-3">
                    <a href="{{route('post.index')}}" class="btn btn-info btn-block mt-3">All Post</a>
                </div>
            </div>
        </div>
    </div>
    {!!Form::close()!!}
</div>
@endsection