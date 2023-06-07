<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CourseVideoController extends Controller
{

    public function index()
    {
        $view_data = [];
        $course_videos = CourseVideo::all();
        $view_data['course_videos'] = $course_videos;
        return view('course_videos/index', $view_data);
    }


    public function create()
    {
        $courses = Course::all();
        return view('course_videos/create', compact('courses'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'video_thumbnail' => 'required',
            'video_description' => 'required',
            'video_name' => 'required',
        ]);
        $validExtenstions = array('mp4', 'avi', 'mkv', 'mov', 'wmv', 'flv', 'mpeg', '3gp', 'webm', 'ogg',);
        // $validExtenstions = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'GIF', 'bmp', 'BMP');
        $video = $request->video_name;
        $video_name = $video->getClientOriginalName();
        $video_extension = $video->getClientOriginalExtension();
        if (!in_array($video_extension, $validExtenstions)) {
            print 'Error in file please upload file in theses extensions jpg JPG jpeg JPEG png PNG gif GIF bmp BMP';
        }
        $video_path = config('app.images_path');
        $videos_folder = config('app.images_path') . 'videos/';
        if (!File::exists($video_path)) {
            File::makeDirectory($video_path, 0777, true);
        }
        if (!File::exists($videos_folder)) {
            File::makeDirectory($videos_folder, 0777, true);
        }
        $video->storeAs('/storage/admins/videos/', $video_name);

        if ($request->hasFile('video_name')) {
            $file = $request->file('video_name');
            if ($file->isValid()) {
                $path = config('app.images_path') . "videos/";
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                if (in_array($video_extension, $validExtenstions)) {
                    $fileName = time() . $video_name;
                    if (!$file->move($path, $fileName)) {
                        print 'Error in file uploading. Create Folder "import_suppressed_files" with 777 permissions';
                    } else {
                        $course_video = new CourseVideo;
                        $course_video->video_name =  $fileName;
                        $course_video->video_thumbnail = $request->video_thumbnail;
                        $course_video->video_description = $request->video_description;
                        $course_video->course_id = $request->course_id;
                        $course_video->save();
                    }
                }
            } else {
                echo 'extension_fail';
            }
        } else {
            echo 'fail';
        }

        return redirect()->route('course_videos.index')->with('success', 'Course Video created successfully.');
    }


    public function show(CourseVideo $courseVideo)
    {
        $courseVideo = CourseVideo::find($courseVideo->id);
        return view('course_videos.show', compact('courseVideo'));
    }


    public function edit(CourseVideo $courseVideo)
    {
        $courses = Course::all();
        return view('course_videos.edit', compact('courseVideo', 'courses'));
    }

    public function update(Request $request, CourseVideo $courseVideo)
    {
        $request->validate([
            'video_thumbnail' => 'required',
            'video_description' => 'required',
            'video_name' => 'required',
        ]);

        $validExtenstions = array('mp4', 'avi', 'mkv', 'mov', 'wmv', 'flv', 'mpeg', '3gp', 'webm', 'ogg');
        // $validExtenstions = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'GIF', 'bmp', 'BMP');

        $course_video = CourseVideo::findOrFail($courseVideo->id);

        if ($request->hasFile('video_name')) {
            $video = $request->file('video_name');
            $video_name = $video->getClientOriginalName();
            $video_extension = $video->getClientOriginalExtension();

            if (!in_array($video_extension, $validExtenstions)) {
                return back()->withErrors('Error in file. Please upload a file with one of the following extensions: ' . implode(', ', $validExtenstions));
            }

            $video_path = config('app.images_path');
            $videos_folder = config('app.images_path') . 'videos/';

            if (!File::exists($video_path)) {
                File::makeDirectory($video_path, 0777, true);
            }

            if (!File::exists($videos_folder)) {
                File::makeDirectory($videos_folder, 0777, true);
            }

            $video->storeAs('/storage/admins/videos/', $video_name);

            $path = config('app.images_path') . "videos/";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            if (in_array($video_extension, $validExtenstions)) {
                $fileName = time() . $video_name;
                if (!$video->move($path, $fileName)) {
                    return back()->withErrors('Error in file uploading. Create Folder "import_suppressed_files" with 777 permissions');
                }

                // Update the course video details
                $course_video->video_name =  $fileName;
                $course_video->video_thumbnail = $request->video_thumbnail;
                $course_video->video_description = $request->video_description;
                $course_video->course_id = $request->course_id;
                $course_video->save();
            }
        } else {
            return back()->withErrors('No file selected');
        }

        return redirect()->route('course_videos.index')->with('success', 'Course Video updated successfully.');
    }


    public function destroy(CourseVideo $courseVideo)
    {
        $courseVideo->delete();
        return redirect()->route('course_videos.index')
            ->with('success', 'Course Video deleted successfully');
    }
}
