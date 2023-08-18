<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use App\Subject;
use App\SubjectName;
use Croppa;

class SearchController extends Controller
{
    public function search(){
        $subject_names=SubjectName::get();
        return view('search/index',compact('subject_names'));
    }
    public function index(Request $request)
    {   
        if(!$request->price){$request->price=0;}
        if(!$request->topic){$request->topic='';}
        $tutors=Tutor::join('users','tutors.id','=','users.tutor_id')
            ->whereHas('subject', function ($query)use ($request) {  
            $query
            ->where('subject_name_id',$request->subject_name_id)
            ->where('level',$request->level)->where('topic','like','%'.$request->topic.'%')
            ->where('price','>=',$request->price);
        })->get();
        foreach ($tutors as $key => $tutor) {
            $tutor->setAttribute('img_url',Croppa::url($tutor->image,200,200));
        }
        $subject_names=SubjectName::all();
        // dd(response()->json($tutors));
        return response()->json($tutors);
    }
}
