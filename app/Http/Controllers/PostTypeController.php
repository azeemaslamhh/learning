<?php

namespace App\Http\Controllers;

use App\Models\PostType;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class PostTypeController extends Controller
{

    public function index()
    {
        $view_data = [];
        $post_types = PostType::get();
        $view_data['post_types'] = $post_types;
        return view('post_types/index', $view_data);
    }


    public function create()
    {
        return view('post_types/create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5000',
        ]);
        $image = $request->image;
        $image_name = $image->getClientOriginalName();
        $image->storeAs('public/images', $image_name);
        $post_types = new PostType;
        // $post_types->image = $image_name;
        $post_types->image = asset('storage/images/'. $image_name);
        $post_types->name = $request->name;
        $post_types->save();
        return redirect()->route('post_types.index')->with('success', 'Type created successfully.');
    }


    public function show(PostType $postType)
    {
        return view('post_types.show', compact('postType'));
    }



    public function edit(PostType $postType)
    {
        return view('post_types.edit', compact('postType'));
    }


    public function update(Request $request, PostType $postType)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5000',
        ]);
        $input = $request->all();
        $image = $request->image;
        if ($image = $request->file('image')) {
            $image_name = $image->getClientOriginalName();
            $image->storeAs('public/images', $image_name);
            $input['image'] = asset('storage/images/'. $image_name);
            // $input['image'] = $image_name;
        } else {
            unset($input['image']);
        }
        $postType->update($input);
        return redirect()->route('post_types.index')
            ->with('success', 'Type updated successfully');
    }


    public function destroy(PostType $postType)
    {
        $postType->delete();
        return redirect()->route('post_types.index')
            ->with('success', 'Type deleted successfully');
    }
}
