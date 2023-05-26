<?php

namespace App\Http\Controllers;

use App\Models\BlogPostTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogPostTagController extends Controller
{
  
    public function index()
    {
        $view_data = [];
        $blog_post_tags = BlogPostTag::all();
        $view_data['blog_post_tags'] = $blog_post_tags;
        return view('blog_post_tags/index', $view_data);
    }

   
    public function create()
    {
        return view('blog_post_tags/create');

    }

   
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
        ]);
        BlogPostTag::create($request->all());
        return redirect()->route('blog_post_tags.index')->with('success', 'Tag created successfully.');
 
    }

   
    public function show(BlogPostTag $blogPostTag)
    {
        return view('blog_post_tags.show', compact('blogPostTag'));

    }

    
    public function edit(BlogPostTag $blogPostTag)
    {
        return view('blog_post_tags.edit', compact('blogPostTag'));
    }

  
    public function update(Request $request, BlogPostTag $blogPostTag)
    {
        Validator::make($request->all(), [
            'name' => 'required',
        ]);

        $blogPostTag->update($request->all());
        return redirect()->route('blog_post_tags.index')->with('success', 'Tag updated successfully.');
  
    }

   
    public function destroy(BlogPostTag $blogPostTag)
    {
        $blogPostTag->delete();
        return redirect()->route('blog_post_tags.index')
            ->with('success', 'Tag deleted successfully');
    }
}
