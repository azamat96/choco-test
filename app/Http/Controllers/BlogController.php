<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if($request->has('search')) {
            $response = Blog::where('title', 'like', '%'.$request->input('search').'%')->get();   
        } else {
            $response = Blog::all();
        }

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $b = new Blog();

        $b->fill($request->all());
        $b->author = $request->ip();
        if($b->save()) {
            return response()->json($b, 200);
        }
        return response()->json('Error', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $b = Blog::with('comments')->find($id);
        return response()->json($b, 200);
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
        $b = Blog::find($id);
        $b->fill($request->all());
        $b->author = $request->ip();
        
        if($b->save()) {
            return response()->json($b, 200);
        }
        return response()->json('Error', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b = Blog::find($id);
        $b->comments()->delete();
        if($b->delete()){
            return response()->json($b, 200);
        }
        return response()->json('Error', 200);
    }
}
