<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use App\User;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth')->except('index');
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
        $user=User::find(\Auth::user()->id);
        $tutor=new Tutor;
        $tutor->user_id=$user->id;
        $tutor->city=$request->city;
        $tutor->postcode=$request->postcode;
        $tutor->about=$request->about;
        $tutor->exp=$request->exp;
        $tutor->save();
        $user->tutor_id=$tutor->id;
        $user->save();
        return redirect(action('UserController@show',$user->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('tutors/edit',compact('user'));
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
        $user=User::find($id);
        $user->tutor->city=$request->city;
        $user->tutor->postcode=$request->postcode;
        $user->tutor->about=$request->about;
        $user->tutor->exp=$request->exp;
        $user->tutor->save();
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
