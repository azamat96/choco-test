<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Blog;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($blogId)
    {
        $response = Blog::find($blogId)->comments()->get();

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $blogId)
    {
        $b = Blog::find($blogId);

        $c = new Comment();
        $c->fill($request->all());
        $c->author = $request->ip();

        if($b->comments()->save($c)) {
            return response()->json($c, 200);
        }
        return response()->json('Error', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($blogId, $id)
    {
        $c = Comment::find($id);
        return response()->json($c, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $blogId, $id)
    {
        $c = Comment::find($id);
        $c->fill($request->all());
        $c->author = $request->ip();
        
        if($c->save()) {
            return response()->json($c, 200);
        }
        return response()->json('Error', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($blogId, $id)
    {
        $c = Comment::find($id);
        if($c->delete()){
            return response()->json($c, 200);
        }
        return response()->json('Error', 200);
    }
}
