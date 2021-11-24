@extends('main')

@section('title', '| create')

@section('stylesheet')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

@endsection
@section('content')
    <div class="row">
        <div class="offset-md-2 col-md-8 ">
            <h1>Create New Post</h1>
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif
            {!! Form::open(['route' => 'post.store', 'method' => 'post', 'data-parsley-validate' => '']) !!}
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, ['class' => 'form-control', 'required' => '']) }}
            {{ Form::label('slug', 'Slug') }}
            {{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255']) }}
            {{ Form::label('category_id', 'Category') }}

            <select name="category_id" id="" class="form-control">
                @foreach ($categories as $cat )
                <option value="{{$cat->id}}">{{$cat->name}}</option>

                @endforeach
            </select>
            {{ Form::label('tags', 'Tags') }}

            <select name="tags[]" id="" class="form-control select2-multi" multiple="multiple">
                @foreach ($tags as $tag )
                <option value="{{$tag->id}}">{{$tag->name}}</option>

                @endforeach
            </select>
            {{ Form::label('body', 'Body') }}
            {{ Form::textarea('body', null, ['class' => 'form-control', 'required' => '']) }}
            {{ Form::submit('Create New Post', ['class' => 'btn btn-success mt-3']) }}
            </form>
        </div>
    </div>

@endsection

@section('javascrpt')

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    <script>
        $(document).ready(function(){
            $('.select2-multi').select2();
        });
    </script>

@endsection
