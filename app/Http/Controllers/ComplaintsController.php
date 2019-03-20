<?php

namespace App\Http\Controllers;

use App\complaints;
use Illuminate\Http\Request;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {
        $posts=complaints::orderBy('created_at','desc')->paginate(5);
   

    
   //Create a view. Please use `cbView` method instead of view method from laravel.
   return view('complaints.viewcompaints',compact('posts'));
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
     * @param  \App\complaints  $complaints
     * @return \Illuminate\Http\Response
     */
    public function show(complaints $complaints)
    {
        //return $id;
        $posts=[];
        $id=request('id');
        $posts['comments']=complaints::find($id)->comments()->orderBy('created_at','desc')->paginate(4);
        $posts['complain']=complaints::find($id);
        //$posts=complaints::orderBy('created_at','desc')->paginate(5);
   

    
   //Create a view. Please use `cbView` method instead of view method from laravel.
   return view('complaints.viewcomment',compact('posts'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\complaints  $complaints
     * @return \Illuminate\Http\Response
     */
    public function edit(complaints $complaints)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\complaints  $complaints
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, complaints $complaints)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\complaints  $complaints
     * @return \Illuminate\Http\Response
     */
    public function destroy(complaints $complaints)
    {
        //
    }
}
