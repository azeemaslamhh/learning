<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseAndCourseCategory;
use App\Models\CourseAndCourseInstructor;
use App\Models\CourseAndCourseTag;
use App\Models\CourseCategory;
use App\Models\CourseTag;
use App\Models\CourseInstructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use DB;

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

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
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
                        return redirect()->route('courses.index')->with('success', 'Error in file uploading. Create Folder "import_suppressed_files" with 777 permissions.');
                    } else {

                        $courseObj = new Course();
                        $data = array(
                            'image' => $fileName,
                            'title' => $request->title,
                            'description' => $request->description,
                            'price' => $request->price,
                        );
                        $courseObj->fill($data);
                        $course_id = $courseObj->save();

                        $course_categories = $request->input('course_categories');
                        $course_tags = $request->input('course_tags');
                        $course_instructors = $request->input('course_instructors');

                        if (count($course_categories) > 0) {

                            //DB::table("course_and_course_categories")->where('course_id',$course_id)->delete();
                            foreach ($course_categories as $cat) {

                                $courseCat = array(
                                    'course_id' => $course_id,
                                    'course_category_id' => $cat
                                );
                                $objCourseAndCourseCategory = new CourseAndCourseCategory();
                                $objCourseAndCourseCategory->fill($courseCat);
                                $objCourseAndCourseCategory->save();
                            }
                        }
                        if (count($course_tags) > 0) {

                            //DB::table("course_and_course_tags")->where('course_id',$course_id)->delete();
                            foreach ($course_tags as $cat) {

                                $courseTag = array(
                                    'course_id' => $course_id,
                                    'course_tag_id' => $cat
                                );
                                $objCourseAndCourseTag = new CourseAndCourseTag();
                                $objCourseAndCourseTag->fill($courseTag);
                                $objCourseAndCourseTag->save();
                            }
                        }
                        if (count($course_instructors) > 0) {

                            //DB::table("course_and_course_instructors")->where('course_id',$course_id)->delete();
                            foreach ($course_instructors as $cat) {

                                $courseInst = array(
                                    'course_id' => $course_id,
                                    'course_tag_id' => $cat
                                );
                                $objCourseAndCourseInstructor = new CourseAndCourseInstructor();
                                $objCourseAndCourseInstructor->fill($courseInst);
                                $objCourseAndCourseInstructor->save();
                            }
                        }
                    }
                } else {
                    return redirect()->route('courses.index')->with('success', 'extension_fail.');
                }
            } else {
                return redirect()->route('courses.index')->with('success', 'fail.');
            }
        }

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');

        // echo '<pre>';
        // dd($request);
        // exit;

        // $request->validate([

        //     'title' => 'required',
        //     // 'description' => 'required',
        //     // 'price' => 'required',
        //     // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5000',
        // ]);
        // $image = $request->image;
        // $image_name = $image->getClientOriginalName();
        // $image->storeAs('public/images', $image_name);
        // $course = new Course;
        // $course->image = asset('storage/images/' . $image_name);
        // $course->title = $request->title;
        // $course->description = $request->description;
        // $course->price = $request->price;
        // $course->save();
        // $course->categories()->sync($request->input('course_categories'));
        // $course->tags()->sync($request->input('course_tags'));
        // $course->instructors()->sync($request->input('course_instructors'));


        // return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }


    public function show(Course $course)
    {
        return view('courses.show', compact('course'));

    }


    public function edit(Course $course)
    {
        $course_categories = CourseCategory::all();
        $course_tags = CourseTag::all();
        $course_instructors = CourseInstructor::all();
        return view('courses.edit', compact('course','course_categories', 'course_tags', 'course_instructors'));
    }


    public function update(Request $request, Course $course)
    {
        //
    }


    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')
            ->with('success', 'course deleted successfully');
    }
}
