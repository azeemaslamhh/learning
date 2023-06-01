<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProblemList;

class ProblemListController extends Controller
{



    public function index()
    {
        $ProblemLists = ProblemList::with(['category', 'category.parent','post_type'])->get();
        return response()->json($ProblemLists);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $results = ProblemList::with(['category', 'category.parent','post_type'])->where('problem', 'like', '%'.$keyword.'%')->get();
        return response()->json($results);
    }
    public function updatebyid(Request $request, $id)
    {

        $problemlist = ProblemList::find($id);
        $problemlist->update($request->only("problem", "url", "likes", "disLikes"));
        return response()->json($problemlist);
    }
}
