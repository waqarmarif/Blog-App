@extends('main')

@section('title' ,'| create')

@section('stylesheet')
{!! Html::style('css/parsley.css') !!}
@endsection
@section('content')
<div class="row">
    <div class="offset-md-2 col-md-8 ">
        <h1>Create New Post</h1>
        @if (count($errors)>0 )
            @foreach ($errors->all() as $error )
                {{$error}}
            @endforeach
        @endif
        {!! Form::open(['route' => 'post.store','method' => 'post','data-parsley-validate' => '']) !!}
            {{Form::label('title','Title')}}
            {{Form::text('title',null,['class'=>'form-control', 'required' => ''])}}
            {{Form::label('slug','Slug')}}
            {{Form::text('slug',null,['class'=>'form-control','required' => '','minlength'=>'5','maxlength'=>'255'])}}
            {{Form::label('body','Body')}}
            {{Form::textarea('body',null,['class'=>'form-control','required' => ''])}}
            {{Form::submit('Create New Post',['class'=>'btn btn-success mt-3'])}}
    </form>
    </div>
</div>

@endsection

@section('javascrpt')

{!! Html::script('js/parsley.min.js') !!}
@endsection