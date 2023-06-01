<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProblemList;
use App\Models\Comment;
use App\Models\User;


class CommentController extends Controller
{

    public function index()
    {
        $view_data = [];
        $problem_lists = ProblemList::all();
        $view_data['problem_lists'] = $problem_lists;
        return view('comments/index', $view_data);
    }

    public function show($post)
    {
        $view_data = [];
        $problem_list = ProblemList::find($post);
        $comments = ProblemList::with('comments')->findOrFail($post);
        $view_data['problem_list'] = $problem_list;
        $view_data['comments'] = $comments;
        return view('comments/show', $view_data);
    }


    public function create($post)
    {
        $users = User::all();
        $problem_list = ProblemList::find($post);
        return view('comments/create', compact('users', 'problem_list'));
    }
    public function store(Request $request, $post)
    {
        $ProblemLists = ProblemList::find($post);
        $ProblemLists->comments()->create($request->only("comment", "problem_list_id", "user_id"));
        return redirect()->route('problem_lists.comments.show', [$ProblemLists->id])->with('success', 'Comment created successfully.');
    }



    public function edit($problem_list_id, $comment_id)
    {
        $problem_list = ProblemList::findOrFail($problem_list_id);
        $comment = Comment::findOrFail($comment_id);
        $users = User::all();



        return view('comments/edit', compact('problem_list', 'comment', 'users'));
    }

    public function update(Request $request, ProblemList $problem_list, Comment $comment)
    {

        $comment->update($request->only("comment", "problem_list_id", "user_id"));
        return redirect()->route('problem_lists.comments.show', [$problem_list->id])->with('success', 'Comment updated successfully.');
    }


    public function destroy(Comment $comment)
    {
        $ProblemLists = ProblemList::findOrFail($comment?->problem_list_id);
        $comment->delete();
        return redirect()->route('problem_lists.comments.show', [$ProblemLists->id])
            ->with('success', 'Comment deleted successfully');
    }
}
