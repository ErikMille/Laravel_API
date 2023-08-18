@extends('layouts/app')
@section('content')
<div class="container justify-content-center" style="max-width:800px">
<h1>SEARCH</h1>
<form action="{{action('SearchController@index')}}" method="post">
    @csrf
  <div class="form-group">
    <label>Subject</label>
    <select name="subject_name_id" class="form-control">
        @foreach($subject_names as $subject_name)
            <option value="{{$subject_name->id}}" >{{$subject_name->name}}</option>
        @endforeach
    </select><br>
    <label>Topic</label>
        <input type="text" name="topic" class="form-control"><br>
    <label>Level</label>
    <select name="level" class="form-control">
            <option value="beginer">beginer</option>
            <option value="intermediate">intermediate</option>
            <option value="advanced">advanced</option>
    </select><br>
    <label>Price</label>
        <input type="number" name="price" class="form-control"><br>
  </div>
  <button type="submit" style="background-color:#698db3;" class="btn btn-primary">Submit</button>
</form>
</div>
<section style="margin-top:2rem">
    <div id="example" data-subjects={{$subject_names}}></div>
</section>

@endsection