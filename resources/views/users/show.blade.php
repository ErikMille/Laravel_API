@extends('layouts/app')
@section('content')

<div id="user" data-user="{{$user}}" data-tutor="{{$user->tutor?$user->tutor:''}}" data-subjects="{{$user->tutor?$user->tutor->subject:''}}" data-names="{{$subject_names}}" data-edit="{{(Auth::user()&&Auth::user()->id==$user->id)?true:false}}"></div>

<?php 
    // dd($user->tutor->subject);
    // if(($user)&&($user->tutor)){dd($user->tutor);}else{dd($user);}
?>
@endsection