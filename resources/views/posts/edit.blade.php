@extends('main')

@section('title' , $post->title.' | Edit')
@section('stylesheet')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

@endsection
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
        {{ Form::label('category_id', 'Category') }}
        <select name="category_id" id="" class="form-control">
            @foreach ($categories as $cat )
            <option value="{{$cat->id}}" {{$post->category_id==$cat->id?'selected':''}}>{{$cat->name}}</option>

            @endforeach
        </select>

        {{ Form::label('tag', 'Tag') }}
        {{ Form::select('tags[]', $tags2, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
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
                <dt>Category:  </dt>
                <dd>{{$post->category->name}}</dd>
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
@section('javascrpt')

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    <script>
        $(document).ready(function(){
            $('.select2-multi').select2();
            // $('.select2-multi').select2().val() !!}).trigger('change');
        });
    </script>

@endsection