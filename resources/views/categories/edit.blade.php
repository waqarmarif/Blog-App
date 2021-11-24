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
            {!!Form::model($category,['route'=>['category.update',$category->id],'method'=>'put'])!!}
            {!!Form::label('category','Category')!!}
            {!!Form::text('name',null,['class'=>'form-control'])!!}
            {!!Form::submit('Update',['class'=>'btn btn-success mt-3'])!!}

            {!!Form::close()!!}
            
            
        </div>
    </div>
 @endsection