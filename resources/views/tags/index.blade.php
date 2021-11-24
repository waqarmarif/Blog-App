@extends('main')

@section('title' ,' | All Tags')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td><a href="{{route('tag.show',$tag->id)}}">{{$tag->name}}</a></td>
                           
                            <td>  {!!Form::open(['route'=>['tag.destroy',$tag->id],'method'=>'delete'])!!}
                                {!!Form::submit('Delete',['class'=>'btn btn-danger btn-block'])!!}
                                {!!Form::close()!!}</td>
                            <td><a href="{{route('tag.edit',$tag->id)}}" class="btn btn-success">Edit</a></td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="card card-body bg-light">
               {!!Form::open(['route'=>'tag.store','method'=>'post'])!!}
               <h2>Create New Tag</h2>
               {{Form::label('tag','Tag')}}
               {{Form::text('name',null,['class'=>'form-control'])}}
               {{Form::submit('Save Tag',['class'=>'btn btn-success btn-block mt-3'])}}
               {!!Form::close()!!}
            </div>
        </div>
    </div>
    <div class="row mt-5 mb-5">
    
        <div class="col-md-12">
            <hr>
            <h3 class="text-center">Deleted Tags</h3>
            <hr>
        </div>
        
    </div>
    {{-- @if($deletedtag->count()>0)
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($deletedtag as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                           

                            <td><a href="{{route('tag.restore',$tag->id)}}" class="btn btn-success">Restore</a></td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif --}}
    
@endsection