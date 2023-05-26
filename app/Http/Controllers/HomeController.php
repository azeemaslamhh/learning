<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use App\Models\BlogPostTag;
use App\Models\Category;
use App\Models\ProblemList;
use App\Models\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $problem_lists_count = ProblemList::count();
        $categories_count = Category::whereNULL('parent_category_id')->get()->count();
        $users_count =  User::count();

        $blogs_count = BlogPost::count();
        $blog_tags_count = BlogPostTag::count();
        $blog_categories_count =  BlogPostCategory::count();

        return view('home', compact(
            'problem_lists_count',
            'categories_count',
            'users_count',
            'blogs_count',
            'blog_tags_count',
            'blog_categories_count'
        ));
    }



    public function code_mirrors()
    {
        return view('code_mirrors/index');
    }

    public function search_list(Request $request)
    {
        $search = $request["search"] ?? "";
        $view_data = [];
        if ($search != "") {
            $problem_lists = ProblemList::where('problem', 'LIKE', "%$search%")->orWhere('anwser', 'LIKE', "%$search%")->get();
            $categories = Category::where('name', 'LIKE', "%$search%")->get();
            $users = User::where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->get();
        } else {
            $problem_lists = "";
            $categories = "";
            $users = "";
        }
        $view_data['problem_lists'] = $problem_lists;
        $view_data['categories'] = $categories;
        $view_data['users'] = $users;
        return view('search', $view_data);
    }


    public function run_script(Request $request)
    {
        // $data = $request->editor;
        $data = $request->input('textFieldValue');
        $folderPath = 'code_mirrors_php_files/'; // Replace this with the actual folder path
        $file = time() . ".php";
        $fileName = $folderPath . "test" . $file;
        file_put_contents($fileName, $data);
        try {
            $fileContents = file_get_contents($fileName);
            $getEvaluate = eval('?>' . $fileContents);
            echo $getEvaluate;
            // echo file_get_contents('public/code_mirrors_php_files/' . $fileName);
            // // echo file_get_contents('http://localhost:8001/public/code_mirrors_php_files/' . $fileName);
            @unlink($fileName);
        } catch (Exception $e) {
        }
    }
}
