@extends('main')

@section('title' , '| All Posts')

@section('stylesheet')

<link rel="stylesheet" href="{{asset('datatable/dataTables.bootstrap4.min.css')}}">

@endsection
@section('content')
<div class="row mt-5 mb-5">
    
  
    
</div>
    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>

        <div class="col-md-2">
            <a href="{{route('post.create')}}" class="btn btn-success btn-block">Create New Post</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>  
    {{-- End Of Row --}}
    <div class="row">
        <div class="col-md-12">
            <table class="table" id="post-table">
                <thead>
                    
                        <th>#</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                  
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}{{strlen($post->body)>10 ? "...": ""}}</td>
                        <td>{{date('M j, Y H:i',strtotime($post->created_at))}}</td>
                        <td>{{date('M j, Y H:i',strtotime($post->updated_at))}}</td>
                        <td><a href="{{route('post.show' ,$post->id)}}" class="btn  btn-dark">View</a><br><br><a href="{{route('post.edit',$post->id)}}" class="btn btn-danger">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<div class="row mt-5 mb-5">
    
    <div class="col-md-12">
        <hr>
        <h3 class="text-center">Deleted Posts</h3>
        <hr>
    </div>
    
</div>

    @if ($deletedposts->count()>0)
        <div class="row">
            <div class="col-md-12">
                <table class="table" id="post-table">
                    <thead>
                        
                            <th>#</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                    
                    </thead>
                    <tbody>
                        @foreach ($deletedposts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->body}}{{strlen($post->body)>10 ? "...": ""}}</td>
                            <td>{{date('M j, Y H:i',strtotime($post->created_at))}}</td>
                            <td>{{date('M j, Y H:i',strtotime($post->updated_at))}}</td>
                            <td><a href="{{route('post.restore' ,$post->id)}}" class="btn  btn-dark">Restore</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    @endif
   

@endsection

@section('scripts')
    <script src="{{asset('datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('datatable/jquery.dataTables.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#post-table').DataTable();
        });
    </script>
@endsection


