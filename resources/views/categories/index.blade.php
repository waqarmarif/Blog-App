@extends('main')

@section('title' ,' | All Categories')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($cate as $cate)
                        <tr>
                            <td>{{$cate->id}}</td>
                            <td>{{$cate->name}}</td>
                           
                            <td>  {!!Form::open(['route'=>['category.destroy',$cate->id],'method'=>'delete'])!!}
                                {!!Form::submit('Delete',['class'=>'btn btn-danger btn-block'])!!}
                                {!!Form::close()!!}</td>
                            <td><a href="{{route('category.edit',$cate->id)}}" class="btn btn-success">Edit</a></td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="card card-body bg-light">
               {!!Form::open(['route'=>'category.store','method'=>'post'])!!}
               <h2>Create New Category</h2>
               {{Form::label('category','Category')}}
               {{Form::text('name',null,['class'=>'form-control'])}}
               {{Form::submit('Save Category',['class'=>'btn btn-success btn-block mt-3'])}}
               {!!Form::close()!!}
            </div>
        </div>
    </div>
    <div class="row mt-5 mb-5">
    
        <div class="col-md-12">
            <hr>
            <h3 class="text-center">Deleted Categories</h3>
            <hr>
        </div>
        
    </div>
@if($deletedCategories->count()>0)
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th><th>Restore</th>
                    </tr>
                </thead>
                
                <tbody>
                    {{-- {{dd($deletedCategories->count())}} --}}
                    @foreach ($deletedCategories  as $cate)
                    
                        <tr>
                            <td>{{$cate->id}}</td>
                            <td>{{$cate->name}}</td>
                            <td>  <a class="btn btn-primary btn-block" href="{{route('category.restore',$cate->id)}}">Restore</a></td>
                         </tr>                        
                    @endforeach
                </tbody>
            </table>
        </div>
       
    </div>
    @endif
@endsection