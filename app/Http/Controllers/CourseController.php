<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseTag;
use App\Models\CourseInstructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{

    public function index()
    {
        // categories
        //  tags
        // instructors

        $view_data = [];
        $courses = Course::all();
        // echo '<pre>';
        // print_r($courses);
        // exit;
        $view_data['courses'] = $courses;
        return view('courses/index', $view_data);
    }


    public function create()
    {
        $course_categories = CourseCategory::all();
        $course_tags = CourseTag::all();
        $course_instructors = CourseInstructor::all();
        return view('courses/create', compact('course_categories', 'course_tags', 'course_instructors'));
    }


    public function store(Request $request)
    {

        // echo '<pre>';
        // dd($request);
        // exit;

        $request->validate([

            'title' => 'required',
            // 'description' => 'required',
            // 'price' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5000',
        ]);
        $image = $request->image;
        $image_name = $image->getClientOriginalName();
        $image->storeAs('public/images', $image_name);
        $course = new Course;
        $course->image = asset('storage/images/' . $image_name);
        $course->title = $request->title;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->save();
        $course->categories()->sync($request->input('course_categories'));
        $course->tags()->sync($request->input('course_tags'));
        $course->instructors()->sync($request->input('course_instructors'));


        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }


    public function show(Course $course)
    {
        //
    }


    public function edit(Course $course)
    {
        //
    }


    public function update(Request $request, Course $course)
    {
        //
    }


    public function destroy(Course $course)
    {
        //
    }
}
