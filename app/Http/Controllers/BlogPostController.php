<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use App\Models\BlogPostImage;
use App\Models\BlogPostTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BlogPostController extends Controller
{

    public function index()
    {
        $view_data = [];
        $blog_posts = BlogPost::with('categories', 'tags')->get();
        $view_data['blog_posts'] = $blog_posts;
        return view('blog_posts/index', $view_data);
    }


    public function create()
    {
        $blog_post_categories = BlogPostCategory::all();
        $blog_post_tags = BlogPostTag::all();

        return view('blog_posts/create', compact('blog_post_categories', 'blog_post_tags'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5000',
        ]);
        $image = $request->image;
        $image_name = $image->getClientOriginalName();
        $image->storeAs('public/images', $image_name);
        $blog_post = new BlogPost;
        $blog_post->image = asset('storage/images/' . $image_name);
        $blog_post->title = $request->title;
        $blog_post->content = $request->content;
        $blog_post->save();
        $blog_post->categories()->sync($request->input('blog_post_categories'));
        $blog_post->tags()->sync($request->input('blog_post_tags'));
        $multiple_images = $request->images;
        if ($multiple_images) {
            $images = $multiple_images;
            foreach ($images as $image) {

                $get_image_name = $image->getClientOriginalName();
                $image->storeAs('public/images', $get_image_name);
                $blog_post->images()->create([
                    'image' =>  asset('storage/images/' . $get_image_name)
                ]);
            }
        }

        return redirect()->route('blog_posts.index')->with('success', 'Blog created successfully.');

    }


    public function show(BlogPost $blogPost)
    {
        return view('blog_posts.show', compact('blogPost'));
    }


    public function edit(BlogPost $blogPost)
    {
        $blog_post_categories = BlogPostCategory::all();
        $blog_post_tags = BlogPostTag::all();
        return view('blog_posts/edit', compact('blogPost', 'blog_post_categories', 'blog_post_tags'));
    }


    public function update(Request $request, BlogPost $blogPost)
    {

        $blog_post = BlogPost::findOrFail($blogPost->id);
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5000',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($blog_post->image);
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->storeAs('public/images', $image_name);
            $blog_post->image = asset('storage/images/' . $image_name);
        }

        if ($request->hasFile('images')) {
            foreach ($blogPost?->images as $img) {
                Storage::delete($img->image);
                $img->delete();
            }
            $multiple_images = $request->images;
            if ($multiple_images) {
                $images = $multiple_images;
                foreach ($images as $image) {
                    $get_image_name = $image->getClientOriginalName();
                    $image->storeAs('public/images', $get_image_name);
                    $blog_post->images()->create([
                        'image' =>  asset('storage/images/' . $get_image_name)
                    ]);
                }
            }
        }
        $blog_post->title = $request->input('title');
        $blog_post->content = $request->input('content');
        $blog_post->save();
        $blog_post->categories()->sync($request->input('blog_post_categories'));
        $blog_post->tags()->sync($request->input('blog_post_tags'));
        return redirect()->route('blog_posts.index')->with('success', 'Blog updated successfully.');

   }


    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect()->route('blog_posts.index')
            ->with('success', 'Blog deleted successfully');
    }
}
