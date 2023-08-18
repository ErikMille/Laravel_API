@extends('layouts/app')
@section('content')
<style>
   .subj{   background-color:#99bde3;
            margin:0.25rem;
            padding:0.5rem;
            border-radius:3px;}
</style>
<form method="post" action="{{action('UserController@update',$user->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container">
            <div class="form-group">
                <label>Date of birth</label>
                <input type="date" name="age" class="form-control" value="{{$user->age}}">
            </div>
            <div class="form-group">
                <label>gender</label>
                <input type="text" name="gender" class="form-control" value="{{$user->gender}}">
            </div>
            <div class="form-group">
                <label>image</label>
                <input type="file" name="image" class="form-control">
            </div>
    <button type="submit" class="btn btn-primary" style="background-color:#698db3;">Submit</button>
    </div>
</form><br>




@if($user->tutor)
<form method="post" action="{{action('TutorController@update',$user->id)}}">
    @csrf
    @method('PUT')
    <div class="container">
            <div class="form-group">
                <label>city</label>
                <input type="text" name="city" class="form-control" value="{{$user->tutor->city}}">
            </div>
            <div class="form-group">
                <label>postcode</label>
                <input type="text" name="postcode" class="form-control" value="{{$user->tutor->postcode}}">
            </div>
            <div class="form-group">
                <label>About</label><br/>
                <textarea rows="10" cols="60" name="about">{{$user->tutor->about}}</textarea>
            </div>
            <div class="form-group">
                <label>Experience</label><br>
                <textarea rows="10" cols="60" name="exp">{{$user->tutor->exp}}</textarea>
            </div>

            <span >Subjects:</span>
            @foreach($user->tutor->subject as $subject)
                <span class="subj">{{$subject->subject_name->name}}</span>
            @endforeach
            <br><br>
    <button type="submit" class="btn btn-primary" style="background-color:#698db3;">Submit</button>
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
    <button type="submit" class="btn btn-primary" style="background-color:#698db3;">Submit</button>
    </div>
</form><br>
@endif

@endsection
