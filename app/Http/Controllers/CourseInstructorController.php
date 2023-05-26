<?php

namespace App\Http\Controllers;

use App\Models\CourseInstructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CourseInstructorController extends Controller
{

    public function index()
    {
        $view_data = [];
        $course_instructors = CourseInstructor::all();
        $view_data['course_instructors'] = $course_instructors;
        return view('course_instructors/index', $view_data);
    }


    public function create()
    {
        return view('course_instructors/create');
    }


    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5000',

        ]);

        $image = $request->image;
        $image_name = $image->getClientOriginalName();
        $image->storeAs('public/images', $image_name);
        $course_instructor = new CourseInstructor;
        $course_instructor->image = asset('storage/images/' . $image_name);
        $course_instructor->name = $request->name;
        $course_instructor->detail = $request->detail;
        $course_instructor->experience = $request->experience;
        $course_instructor->rating = $request->rating;
        $course_instructor->save();
        return redirect()->route('course_instructors.index')->with('success', 'Instructor created successfully.');
    }


    public function show(CourseInstructor $courseInstructor)
    {
        return view('course_instructors.show', compact('courseInstructor'));
    }


    public function edit(CourseInstructor $courseInstructor)
    {
        return view('course_instructors.edit', compact('courseInstructor'));
    }


    public function update(Request $request, CourseInstructor $courseInstructor)
    {


        $course_instructor = CourseInstructor::findOrFail($courseInstructor?->id);
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5000',
        ]);
       
        if ($request->hasFile('image')) {
            Storage::delete($course_instructor->image);
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->storeAs('public/images', $image_name);
            $course_instructor->image = asset('storage/images/' . $image_name);
        }

        $course_instructor->name = $request->input('name');
        $course_instructor->detail = $request->input('detail');
        $course_instructor->experience = $request->input('experience');
        $course_instructor->rating = $request->input('rating');
        $course_instructor->save();
        return redirect()->route('course_instructors.index')->with('success', 'Instructor updated successfully.');
    }


    public function destroy(CourseInstructor $courseInstructor)
    {
        $courseInstructor->delete();
        return redirect()->route('course_instructors.index')
            ->with('success', 'Instructor deleted successfully');
    }
}
