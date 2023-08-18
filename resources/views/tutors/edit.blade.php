@extends('layouts/app')

@section('content')
@if($user->tutor)
<form method="post" action="{{action('TutorController@update',$user->id)}}">
    @csrf
    @method('PUT')
    <div class="container">
            <div class="form-group">
                <label>city</label>
                <input type="text" name="city" class="form-control">
            </div>
            <div class="form-group">
                <label>postcode</label>
                <input type="text" name="postcode" class="form-control">
            </div>
            <div class="form-group">
                <label>about</label>
                <textarea rows="10" cols="45" name="about"></textarea>
            </div>
            <div class="form-group">
                <label>about</label>
                <textarea rows="10" cols="45" name="exp"></textarea>
            </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form><br>
@else
<form method="post" action="{{action('TutorController@store')}}">
    @csrf
    <div class="container">
        <div class="form-group"> 
                <label>city</label>
                <input type="text" name="city" class="form-control">
            </div>
            <div class="form-group">
                <label>postcode</label>
                <input type="text" name="postcode" class="form-control">
            </div>
            <div class="form-group">
                <label>about</label>
                <textarea rows="10" cols="45" name="about"></textarea>
            </div>
            <div class="form-group">
                <label>about</label>
                <textarea rows="10" cols="45" name="exp"></textarea>
            </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form><br>
@endif

@endsection