<?php

namespace App\Http\Controllers;

use App\replays;
use Illuminate\Http\Request;
use App\complaints;
class ReplaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $this->validate($request,[
            'comment'=>'required'
        ]);
        $post=new replays;
        $post->complaints_id=request('complaints_id');
        $post->cms_users_id=request('user_id');
        $post->content=request('comment');
        $post->save();
        redirect('/saga/viewcomplaints/replys/'.request('complaints_id'))->send(); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\replays  $replays
     * @return \Illuminate\Http\Response
     */
    public function show(replays $replays)
    {
         //return $id;
        $posts=[];
        $id=request('id');
        $posts['comments']=complaints::find($id)->replays()->orderBy('created_at','desc')->paginate(4);
        $posts['complain']=complaints::find($id);
        //$posts=complaints::orderBy('created_at','desc')->paginate(5);
   

    
   //Create a view. Please use `cbView` method instead of view method from laravel.
   return view('complaints.replys',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\replays  $replays
     * @return \Illuminate\Http\Response
     */
    public function edit(replays $replays)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\replays  $replays
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, replays $replays)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\replays  $replays
     * @return \Illuminate\Http\Response
     */
    public function destroy(replays $replays)
    {
        //
    }
}
