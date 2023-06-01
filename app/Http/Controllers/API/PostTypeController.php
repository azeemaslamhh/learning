<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PostType;

class PostTypeController extends Controller
{

    public function index()
    {
        $postTypes = PostType::with('problem_lists')->get();
        return response()->json($postTypes);
    }
}
