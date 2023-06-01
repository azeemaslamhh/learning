<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProblemListController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PostTypeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/search', [ProblemListController::class, 'search']);

Route::get('/post_types', [PostTypeController::class, 'index']);

Route::get('/problemlists', [ProblemListController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);

Route::put('/problemlist/{id}', [ProblemListController::class, 'updatebyid']);

Route::get('/posts/{posts}/comments', [CommentController::class, 'index']);
Route::post('/posts/{posts}/comments/create', [CommentController::class, 'store']);
Route::delete('/comments/{id}', [CommentController::class, 'destroy']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::put('/updateUser', [AuthController::class, 'updateUser']);









