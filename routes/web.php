<?php

use App\Http\Controllers\BlogPostCategoryController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\BlogPostTagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseInstructorController;
use App\Http\Controllers\CourseTagController;
use App\Http\Controllers\CourseVideoController;
use App\Http\Controllers\ProblemListController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InputFieldTypeController;
use App\Http\Controllers\PostTypeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizOptionController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])
    ->name('/home')
    ->middleware('auth', 'role:admin');


// Route::get('/dbconnect', function () {
//     return view('dbconnect');
// });


Route::get('/contact', function () {
    return view('contact');
});



Auth::routes([
    'register' => false,
]);


Route::get('/home', [HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth', 'role:admin');



Route::middleware(['auth', 'role:admin'])->group(function () {


    Route::get('/getCustomFields', [UserController::class, 'index'])->name('getCustomFields');

    Route::get('problem_lists/search', [ProblemListController::class, 'search_list']);
    Route::get('problem_lists/filter', [ProblemListController::class, 'filter_list']);
    Route::get('get-users', [UserController::class, 'getUsers'])->name('get.users');

    Route::get('users/{user}/change_password', [UserController::class, 'change_password'])->name('users.change_password');
    Route::put('users/password-update', [UserController::class, 'update_change_password'])->name('users.update_change_password');


    Route::get('users/filter', [UserController::class, 'filter_list']);
    Route::get('/search', [HomeController::class, 'search_list']);
    Route::resource('/users', UserController::class);
    Route::resource('/problem_lists', ProblemListController::class);
    Route::resource('/categories', CategoryController::class);
    Route::get('comments', [CommentController::class, 'index'])->name('get.comments');

    Route::get('/problem_lists/{problem_list}/comments', [CommentController::class, 'show'])->name('problem_lists.comments.show');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('problem_list.comments.destroy');
    Route::get('/problem_list/{posts}/comment/create', [CommentController::class, 'create']);
    Route::post('/problem_list/{posts}/comment/store', [CommentController::class, 'store']);
    Route::get('/problem_lists/{problem_list}/comments/{comment}/edit', [CommentController::class, 'edit'])->name('problem_lists.comments.edit');
    Route::put('/problem_lists/{problem_list}/comments/{comment}/update', [CommentController::class, 'update'])->name('problem_lists.comments.update');
    Route::resource('/post_types', PostTypeController::class);
    Route::resource('/blog_posts', BlogPostController::class);
    Route::resource('/blog_post_categories', BlogPostCategoryController::class);
    Route::resource('/blog_post_tags', BlogPostTagController::class);
    Route::resource('/courses', CourseController::class);
    Route::resource('/course_categories', CourseCategoryController::class);
    Route::resource('/course_tags', CourseTagController::class);
    Route::resource('/course_instructors', CourseInstructorController::class);
    Route::resource('/course_videos', CourseVideoController::class);
    Route::resource('/quizzes', QuizController::class);
    Route::resource('/input_field_types', InputFieldTypeController::class);
    // Route::get('/quizzes/{quiz}/quiz_questions', [QuizQuestionController::class, 'show'])->name('quizzes.quiz_questions.show');
    // Route::get('/quizzes/{quiz}/quiz_questions/create', [QuizQuestionController::class, 'create']);
    // Route::get('/quizzes/{quiz}/quiz_questions/store', [QuizQuestionController::class, 'store'])->name('quizzes.quiz_questions.store');
    // Route::delete('/quiz_questions/{quiz_question}', [QuizQuestionController::class, 'destroy'])->name('quizzes.quiz_questions.destroy');
    // Route::resource('/quiz_questions', QuizQuestionController::class);
    Route::resource('/quiz_options', QuizOptionController::class);
    Route::get('/get-quezes', [QuizController::class, 'getQuises'])->name('get.quizes');

    // codemirror
    Route::get('/code_mirrors', [HomeController::class, 'code_mirrors']);

    Route::get('videos/{filename}', [VideoController::class, 'show'])->name('videos.show');

    // Route::get('videos/{filename}', [VideoController::class, 'show'])->middleware('video.restriction')->name('videos.show');

    Route::post('/run_script', [HomeController::class, 'run_script'])->name("run_script");
});



