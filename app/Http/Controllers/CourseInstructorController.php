<?php

namespace App\Http\Controllers;

use App\Models\CourseInstructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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

        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5000',
        ]);
        $validExtenstions = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'GIF', 'bmp', 'BMP');
        $image = $request->image;
        $image_name = $image->getClientOriginalName();
        $image_extension = $image->getClientOriginalExtension();

        if (!in_array($image_extension, $validExtenstions)) {
            return redirect()->route('course_instructors.index')->with('success', 'Error in file please upload file in theses extensions jpg JPG jpeg JPEG png PNG gif GIF bmp BMP.');
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
                        return redirect()->route('course_instructors.index')->with('success', 'Error in file uploading. Create Folder "import_suppressed_files" with 777 permissions.');
                    } else {
                        $course_instructor = new CourseInstructor;
                        $course_instructor->image = $fileName;
                        $course_instructor->name = $request->name;
                        $course_instructor->detail = $request->detail;
                        $course_instructor->experience = $request->experience;
                        $course_instructor->rating = $request->rating;
                        $course_instructor->save();
                    }
                } else {
                    return redirect()->route('course_instructors.index')->with('success', 'extension_fail.');
                }
            } else {
                return redirect()->route('course_instructors.index')->with('success', 'fail.');
            }
        }


        return redirect()->route('course_instructors.index')->with('success', 'Course Instructor created successfully.');
        // Validator::make($request->all(), [
        //     'name' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5000',

        // ]);

        // $image = $request->image;
        // $image_name = $image->getClientOriginalName();
        // $image->storeAs('public/images', $image_name);
        // $course_instructor = new CourseInstructor;
        // $course_instructor->image = asset('storage/images/' . $image_name);
        // $course_instructor->name = $request->name;
        // $course_instructor->detail = $request->detail;
        // $course_instructor->experience = $request->experience;
        // $course_instructor->rating = $request->rating;
        // $course_instructor->save();
        // return redirect()->route('course_instructors.index')->with('success', 'Instructor created successfully.');
    }


    public function show(CourseInstructor $courseInstructor)
    {
        return view('course_instructors.show', compact('courseInstructor'));
    }


    public function edit(CourseInstructor $courseInstructor)
    {
        return view('course_instructors.edit', compact('courseInstructor'));
    }


    // public function update(Request $request, CourseInstructor $courseInstructor)
    // {

    //     $course_instructor = CourseInstructor::findOrFail($courseInstructor?->id);
    //     $request->validate([
    //         'name' => 'required',
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5000',
    //     ]);

    //     if ($request->hasFile('image')) {
    //         Storage::delete($course_instructor->image);
    //         $image = $request->file('image');
    //         $image_name = $image->getClientOriginalName();
    //         $image->storeAs('public/images', $image_name);
    //         $course_instructor->image = asset('storage/images/' . $image_name);
    //     }

    //     $course_instructor->name = $request->input('name');
    //     $course_instructor->detail = $request->input('detail');
    //     $course_instructor->experience = $request->input('experience');
    //     $course_instructor->rating = $request->input('rating');
    //     $course_instructor->save();
    //     return redirect()->route('course_instructors.index')->with('success', 'Instructor updated successfully.');
    // }


    public function update(Request $request,  $id)
    {

        $request->validate([
            'name' => 'required',
        ]);
        $validExtensions = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'GIF', 'bmp', 'BMP');

        $course_instructor = CourseInstructor::findOrFail($id);

        $image = $request->image;
        if ($image) {

            $image_name = $request->image->getClientOriginalName();

            $image_extension = $image->getClientOriginalExtension();

            if (!in_array($image_extension, $validExtensions)) {
                return redirect()->route('course_instructors.index')->with('success', 'Error in file. Please upload a file with one of the following extensions: jpg, jpeg, png, gif, bmp.');
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
                    if (in_array($image_extension, $validExtensions)) {
                        $fileName = time() . $image_name;
                        if (!$file->move($path, $fileName)) {
                            return redirect()->route('course_instructors.index')->with('success', 'Error in file uploading. Create Folder "import_suppressed_files" with 777 permissions.');
                        } else {

                            $course_instructor->image = $fileName;
                        }
                    } else {
                        return redirect()->route('course_instructors.index')->with('success', 'Invalid file extension. Please upload a file with one of the following extensions: jpg, jpeg, png, gif, bmp.');
                    }
                } else {
                    return redirect()->route('course_instructors.index')->with('success', 'Failed to upload the file.');
                }
            }
        }

        $course_instructor->name = $request->name;
        $course_instructor->detail = $request->detail;
        $course_instructor->experience = $request->experience;
        $course_instructor->rating = $request->rating;
        $course_instructor->save();

        return redirect()->route('course_instructors.index')->with('success', 'Course Instructor updated successfully.');
    }







    public function destroy(CourseInstructor $courseInstructor)
    {
        $courseInstructor->delete();
        return redirect()->route('course_instructors.index')
            ->with('success', 'Instructor deleted successfully');
    }
}
