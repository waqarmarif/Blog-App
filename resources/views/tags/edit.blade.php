@extends('main')

@section('title', Auth::user()->name)

@section('content')
    <div class="row">
        <div class="col-md-8">
            @if (count($errors)>0 )
            @foreach ($errors->all() as $error )
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif
        <h1>        {{$tag->name}} <small>{{$tag->posts()->count()}}</small>
        </h1>
            {!!Form::model($tag,['route'=>['tag.update',$tag->id],'method'=>'put'])!!}
            {!!Form::label('tag','Tag')!!}
            {!!Form::text('name',null,['class'=>'form-control'])!!}
            {!!Form::submit('Update',['class'=>'btn btn-success mt-3'])!!}

            {!!Form::close()!!}
            
            
        </div>
    </div>
 @endsection