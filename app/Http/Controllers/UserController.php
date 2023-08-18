<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use App\User;
use App\SubjectName;
use Croppa;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth')->except('store','show','index');
        $this->middleware('auth')->only('update','edit','delete');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        $user=User::find($id);
        $user->setAttribute('img_url',Croppa::url($user->image,200,200));
        $subject_names=SubjectName::all();
        return view('users/show',compact('user','subject_names'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($id!=\Auth::user()->id){
            return redirect(action('UserController@show',$id));
        }
        $user=User::find($id);
        return view('users/edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($id!=\Auth::user()->id){
            return redirect(action('UserController@show',$id));
        }
        $file=$request->file('image');
        $image_path=$file->storeAs('images', $file->getClientOriginalName(), 'local');
        $user=User::find($id);
        $user->age=$request->age;
        $user->gender=$request->gender;
        $user->image=$image_path;
        $user->save();
        return redirect(action('UserController@show',$id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
