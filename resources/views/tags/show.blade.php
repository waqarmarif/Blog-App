@extends('main')

@section('title' ,$tag->name)

@section('content')

    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Tags</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $tag->posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>@foreach ($post->tags as $tag)
                                    <span class="badge badge-primary">{{$tag->name}}</span>
                                @endforeach
                            </td>
                            <td><a href="{{route('post.show',$post->id)}}">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection