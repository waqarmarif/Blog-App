@extends('main')
@section('title','| Contact')
@section('content')
  <div class="col-md-12">
    <h2>Contact Us</h2>
    <hr>
    <form action="">
        <div class="form-group">
            <label for="email">Email:</label>
            <input  id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="subject">Subject:</label>
            <input  id="subject" name="subject" class="form-control">
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea  id="message" name="message" class="form-control">Type Your Message here</textarea>
        </div>

        <input type="submit" class="btn btn-success" value="Send Message">
    </form>
  </div>
@endsection