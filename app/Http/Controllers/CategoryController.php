<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProblemList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $view_data = [];
        $categories = Category::whereNULL('parent_category_id')->get();
        // $categories = Category::where("parent_category_id", "=", NULL)->get();
        $view_data['categories'] = $categories;
        return view('categories/index', $view_data);
    }


    public function show(Category $category)
    {
        $problem_lists = ProblemList::where('category_id', '=', $category->id)->get();
        return view('categories.show', compact('category', 'problem_lists'));
    }
    public function create()
    {
        $categories = Category::whereNULL('parent_category_id')->get();
        return view('categories/create', compact('categories'));
    }
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
        ]);
        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }
    public function edit(Category $category)
    {
        $categories = Category::whereNULL('parent_category_id')->get();
        return view('categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        Validator::make($request->all(), [
            'name' => 'required',
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
