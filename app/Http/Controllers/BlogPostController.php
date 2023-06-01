<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use App\Models\BlogPostImage;
use App\Models\BlogPostTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


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
        $validExtenstions = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'GIF', 'bmp', 'BMP');
        $image = $request->image;
        $image_name = $image->getClientOriginalName();
        $image_extension = $image->getClientOriginalExtension();

        if (!in_array($image_extension, $validExtenstions)) {
            print 'Error in file please upload file in theses extensions jpg JPG jpeg JPEG png PNG gif GIF bmp BMP';
        }

        $image_path = config('app.images_path');
        $images_folder = config('app.images_path') . 'images/';
        if (!File::exists($image_path)) {
            File::makeDirectory($image_path, 0777, true);
        }
        if (!File::exists($images_folder)) {
            File::makeDirectory($images_folder, 0777, true);
        }
        $image->storeAs('/storage/admins/images/', $image_name);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $path = config('app.images_path') . "images/";
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                if (in_array($image_extension, $validExtenstions)) {
                    $fileName = time() . $image_name;
                    if (!$file->move($path, $fileName)) {
                        print 'Error in file uploading. Create Folder "import_suppressed_files" with 777 permissions';
                    } else {
                        $blog_post = new BlogPost;
                        $blog_post->image =  $fileName;
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
                                $image->storeAs('/storage/admins/images/', $get_image_name);
                                $blog_post->images()->create([
                                    'image' => time() . $get_image_name
                                ]);
                            }
                        }
                    }
                } else {
                    echo 'extension_fail';
                }
            } else {
                echo 'fail';
            }
        }

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            $path = config('app.images_path') . "/images";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $path .= '/';
            foreach ($files as $file) {
                $image_extension = $file->getClientOriginalExtension();
                if (!in_array($image_extension, $validExtenstions)) {
                    print 'Error in file please upload file in theses extensions jpg JPG jpeg JPEG png PNG gif GIF bmp BMP';
                }
            }
            foreach ($files as $file) {
                if ($file->isValid()) {
                    $image_name = $file->getClientOriginalName();
                    $image_extension = $file->getClientOriginalExtension();
                    $fileName = time() . $image_name;
                    if (!$file->move($path, $fileName)) {
                        $msg = 'permissions';
                    } else {
                    }
                }
            }
        }

        return redirect()->route('blog_posts.index')->with('success', 'Blog created successfully.');

        // $request->validate([
        //     'title' => 'required',
        //     'content' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5000',
        // ]);


        // $image = $request->image;
        // $image_name = $image->getClientOriginalName();
        // $image->storeAs('public/images', $image_name);
        // $blog_post = new BlogPost;
        // $blog_post->image = asset('storage/images/' . $image_name);
        // $blog_post->title = $request->title;
        // $blog_post->content = $request->content;
        // $blog_post->save();
        // $blog_post->categories()->sync($request->input('blog_post_categories'));
        // $blog_post->tags()->sync($request->input('blog_post_tags'));
        // $multiple_images = $request->images;
        // if ($multiple_images) {
        //     $images = $multiple_images;
        //     foreach ($images as $image) {

        //         $get_image_name = $image->getClientOriginalName();
        //         $image->storeAs('public/images', $get_image_name);
        //         $blog_post->images()->create([
        //             'image' =>  asset('storage/images/' . $get_image_name)
        //         ]);
        //     }
        // }

        // return redirect()->route('blog_posts.index')->with('success', 'Blog created successfully.');

    }


    public function show(BlogPost $blogPost)
    {

        $blogPost = BlogPost::find($blogPost->id);
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

        $validExtenstions = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'GIF', 'bmp', 'BMP');

        $image = $request->image;

        if ($request->hasFile('image')) {
            Storage::delete($blog_post->image);

            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image_extension = $image->getClientOriginalExtension();
            if (!in_array($image_extension, $validExtenstions)) {
                print 'Error in file please upload file in theses extensions jpg JPG jpeg JPEG png PNG gif GIF bmp BMP';
            }
            $image_path = config('app.images_path');
            $images_folder = config('app.images_path') . 'images/';
            if (!File::exists($image_path)) {
                File::makeDirectory($image_path, 0777, true);
            }
            if (!File::exists($images_folder)) {
                File::makeDirectory($images_folder, 0777, true);
            }
            $image->storeAs('/storage/admins/images/', $image_name);
            $file = $request->file('image');
            if ($file->isValid()) {
                $path = config('app.images_path') . "images/";
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                if (in_array($image_extension, $validExtenstions)) {
                    $fileName = time() . $image_name;
                    if (!$file->move($path, $fileName)) {
                        print 'Error in file uploading. Create Folder "import_suppressed_files" with 777 permissions';
                    } else {
                        $blog_post->image = $fileName;
                    }
                } else {
                    echo 'extension_fail';
                }
            } else {
                echo 'fail';
            }
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
                    $image->storeAs('/storage/admins/images/', $get_image_name);
                    $blog_post->images()->create([
                        'image' => time() . $get_image_name
                    ]);
                }
            }
            $files = $request->file('images');
            $path = config('app.images_path') . "/images";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $path .= '/';
            foreach ($files as $file) {
                $image_extension = $file->getClientOriginalExtension();
                if (!in_array($image_extension, $validExtenstions)) {
                    print 'Error in file please upload file in theses extensions jpg JPG jpeg JPEG png PNG gif GIF bmp BMP';
                }
            }
            foreach ($files as $file) {
                if ($file->isValid()) {
                    $image_name = $file->getClientOriginalName();
                    $image_extension = $file->getClientOriginalExtension();
                    $fileName = time() . $image_name;
                    if (!$file->move($path, $fileName)) {
                        $msg = 'permissions';
                    } else {
                    }
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



    // public function update(Request $request, BlogPost $blogPost)
    // {

    //     $blog_post = BlogPost::findOrFail($blogPost->id);
    //     $request->validate([
    //         'title' => 'required',
    //         'content' => 'required',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5000',
    //     ]);
    //     $image = $request->image;
    //     $image_name = $image->getClientOriginalName();


    //     if ($request->hasFile('image')) {
    //         Storage::delete($blog_post->image);
    //         $image = $request->file('image');
    //         $image_name = $image->getClientOriginalName();
    //         $image_extension = $image->getClientOriginalExtension();
    //         $image->storeAs('public/images', $image_name);
    //         $blog_post->image = asset('storage/images/' . $image_name);
    //     }

    //     if ($request->hasFile('images')) {
    //         foreach ($blogPost?->images as $img) {
    //             Storage::delete($img->image);
    //             $img->delete();
    //         }
    //         $multiple_images = $request->images;
    //         if ($multiple_images) {
    //             $images = $multiple_images;
    //             foreach ($images as $image) {
    //                 $get_image_name = $image->getClientOriginalName();
    //                 $image->storeAs('public/images', $get_image_name);
    //                 $blog_post->images()->create([
    //                     'image' =>  asset('storage/images/' . $get_image_name)
    //                 ]);
    //             }
    //         }
    //     }
    //     $blog_post->title = $request->input('title');
    //     $blog_post->content = $request->input('content');
    //     $blog_post->save();
    //     $blog_post->categories()->sync($request->input('blog_post_categories'));
    //     $blog_post->tags()->sync($request->input('blog_post_tags'));
    //     return redirect()->route('blog_posts.index')->with('success', 'Blog updated successfully.');
    // }


    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect()->route('blog_posts.index')
            ->with('success', 'Blog deleted successfully');
    }
}
