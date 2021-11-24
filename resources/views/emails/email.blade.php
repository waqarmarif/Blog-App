@extends('main')

@section('title','Email')

@section('content')

<div class="row">
    <div class="col-md-8">
        <h2>Email Form</h2>
        <form action="{{route('email.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Message</label>
                <textarea type="text" name="message" class="form-control"></textarea>
            </div>
            <input type="submit" value="Send Email" class="btn btn-success">
        </form>
    </div>
</div>
@endsection