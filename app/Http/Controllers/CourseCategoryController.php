<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseCategoryController extends Controller
{

    public function index()
    {
        $view_data = [];
        $course_categories = CourseCategory::all();
        $view_data['course_categories'] = $course_categories;
        return view('course_categories/index', $view_data);
    }


    public function create()
    {
        return view('course_categories/create');
    }


    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
        ]);
        CourseCategory::create($request->all());
        return redirect()->route('course_categories.index')->with('success', 'Category created successfully.');
    }


    public function show(CourseCategory $courseCategory)
    {
        return view('course_categories.show', compact('courseCategory'));
    }


    public function edit(CourseCategory $courseCategory)
    {
        return view('course_categories.edit', compact('courseCategory'));
    }


    public function update(Request $request, CourseCategory $courseCategory)
    {
        Validator::make($request->all(), [
            'name' => 'required',
        ]);

        $courseCategory->update($request->all());
        return redirect()->route('course_categories.index')->with('success', 'Category updated successfully.');
    }


    public function destroy(CourseCategory $courseCategory)
    {
        $courseCategory->delete();
        return redirect()->route('course_categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
