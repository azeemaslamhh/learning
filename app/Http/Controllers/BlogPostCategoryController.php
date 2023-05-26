<?php

namespace App\Http\Controllers;

use App\Models\BlogPostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogPostCategoryController extends Controller
{
    
    public function index()
    {
        $view_data = [];
        $blog_post_categories = BlogPostCategory::all();
        $view_data['blog_post_categories'] = $blog_post_categories;
        return view('blog_post_categories/index', $view_data);
    }


    public function create()
    {
        return view('blog_post_categories/create');
    }

   
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
        ]);
        BlogPostCategory::create($request->all());
        return redirect()->route('blog_post_categories.index')->with('success', 'Category created successfully.');
 
    }

    
    public function show(BlogPostCategory $blogPostCategory)
    {
        return view('blog_post_categories.show', compact('blogPostCategory'));

    }

   
    public function edit(BlogPostCategory $blogPostCategory)
    {
        return view('blog_post_categories.edit', compact('blogPostCategory'));
    }

    public function update(Request $request, BlogPostCategory $blogPostCategory)
    {
        Validator::make($request->all(), [
            'name' => 'required',
        ]);

        $blogPostCategory->update($request->all());
        return redirect()->route('blog_post_categories.index')->with('success', 'Category updated successfully.');
  
    }

    public function destroy(BlogPostCategory $blogPostCategory)
    {
        $blogPostCategory->delete();
        return redirect()->route('blog_post_categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
