<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PostType;
use Illuminate\Http\Request;
use App\Models\ProblemList;

class ProblemListController extends Controller
{

    public function index()
    {
        $view_data = [];
        $problem_lists = ProblemList::all();
        $categories = Category::whereNULL('parent_category_id')->get();
        $view_data['problem_lists'] = $problem_lists;
        $view_data['categories'] = $categories;
        return view('problem_lists/index', $view_data);
    }

    public function search_list(Request $request)
    {
        $search = $request["search"] ?? "";
        $view_data = [];
        $problem_lists = "";
        if ($search != "") {
            $problem_lists = ProblemList::where('problem', 'LIKE', "%$search%")->orWhere('anwser', 'LIKE', "%$search%")->get();
        } else {
            $problem_lists = ProblemList::all();
        }
        $categories = Category::whereNULL('parent_category_id')->get();
        $view_data['problem_lists'] = $problem_lists;
        $view_data['categories'] = $categories;

        return view('problem_lists/index', $view_data);
    }

    public function filter_list(Request $request)
    {
        $category_id = $request["category_id"] ?? "";
        $sort_order = $request["sort_order"] ?? "";
        $order_by = $request["order_by"] ?? "";
        $problem_lists = "";
        $view_data = [];
        if ($category_id != "" && $sort_order  != "" && $order_by != "") {
            $problem_lists = ProblemList::where('category_id', "=", $category_id)->orderBy($order_by, $sort_order)->get();
        } else {
            $problem_lists = ProblemList::orderBy($order_by, $sort_order)->get();
        }
        $categories = Category::whereNULL('parent_category_id')->get();
        $view_data['problem_lists'] = $problem_lists;
        $view_data['categories'] = $categories;

        return view('problem_lists/index', $view_data);
    }


    public function show(ProblemList $problem_list)
    {
        return view('problem_lists.show', compact('problem_list'));
    }

    public function create()
    {
        $categories = Category::whereNULL('parent_category_id')->get();
        $post_types = PostType::get();

        return view('problem_lists/create', compact('categories', 'post_types'));
    }
    public function store(Request $request)
    {
        $request->merge([
            'url' => str_replace(' ', '-', $request->input('problem'))
        ]);

        ProblemList::create($request->all());

        return redirect()->route('problem_lists.index')->with('success', 'Problem List created successfully.');
    }


    public function edit(ProblemList $problem_list)
    {
        $categories = Category::whereNULL('parent_category_id')->get();
        $post_types = PostType::get();

        return view('problem_lists.edit', compact('problem_list', 'categories', 'post_types'));
    }

    public function update(Request $request, ProblemList $problem_list)
    {
        $request->merge(['url' => str_replace(' ', '-', $request->input('problem'))]);
        $problem_list->update($request->all());
        return redirect()->route('problem_lists.index')->with('success', 'Problem List updated successfully.');
    }


    public function destroy(ProblemList $problem_list)
    {
        $problem_list->delete();
        return redirect()->route('problem_lists.index')
            ->with('success', 'problem list deleted successfully');
    }
}
