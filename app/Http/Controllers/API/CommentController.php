<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProblemList;
use App\Models\Comment;

class CommentController extends Controller
{

    /**
     * Display a listing of the resource..
     * @param  int  $post
     * @return \Illuminate\Http\Response
     */
    public function index($post)
    {

        $quotes = ProblemList::with('comments')->find($post);
        return response()->json($quotes);

    }


    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $post
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(Request $request, $post)
    {
        $ProblemLists = ProblemList::find($post);
        $ProblemLists->comments()->create($request->only("comment", "problem_list_id", "user_id"));
     
        return response()->json("Comment is Added");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();
        return response()->json(["data" => ["success" => true]]);
    }



}