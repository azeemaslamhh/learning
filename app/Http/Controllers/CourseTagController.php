<?php

namespace App\Http\Controllers;

use App\Models\CourseTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseTagController extends Controller
{

    public function index()
    {
        $view_data = [];
        $course_tags = CourseTag::all();
        $view_data['course_tags'] = $course_tags;
        return view('course_tags/index', $view_data);
    }

    public function create()
    {
        return view('course_tags/create');
    }


    public function store(Request $request)
    {
        $addList = [
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $addList);
        if ($validator->fails()) {
            $view_data = [];
            $error_messages = $validator->errors()->messages();
            $view_data['error_messages'] = $error_messages;
            return redirect()->route('course_tags.create')->with($view_data);
        } else {
            CourseTag::create(array('name' => $request->name));
            return redirect()->route('course_tags.index')->with('success', 'Tag created successfully.');
        }
    }


    public function show(CourseTag $courseTag)
    {
        return view('course_tags.show', compact('courseTag'));
    }

    public function edit(CourseTag $courseTag)
    {
        return view('course_tags.edit', compact('courseTag'));
    }


    public function update(Request $request, CourseTag $courseTag)
    {
        Validator::make($request->all(), [
            'name' => 'required',
        ]);

        $courseTag->update($request->all());
        return redirect()->route('course_tags.index')->with('success', 'Tag updated successfully.');
    }


    public function destroy(CourseTag $courseTag)
    {
        $courseTag->delete();
        return redirect()->route('course_tags.index')->with('success','Tag deleted successfully');
    }
}
