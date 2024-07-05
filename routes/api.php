<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminTaskController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\TaskController;
use App\Http\Controllers\User\UserAccountController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login', [AuthController::class, 'login']);
Route::post('users',[UserController::class,'store']);

Route::group(['prefix'=> 'user','middleware' => ['jwt.auth']],function () {
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::get('/tasks/{task}', [TaskController::class, 'show']);
    Route::patch('/tasks/{task}', [TaskController::class, 'update']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);

    Route::patch('users',[UserAccountController::class, 'update']);
    Route::delete('users',[UserAccountController::class, 'destroy']);

    Route::get('profiles', [UserProfileController::class, 'show']);
    Route::patch('profiles', [UserProfileController::class, 'update']);

    Route::group(['prefix'=> 'auth'],function (){
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);

    });
});

Route::group(['prefix'=> 'admin','middleware' => ['jwt.auth', 'is.admin']],function () {
    Route::get('/tasks', [AdminTaskController::class, 'index']);
    Route::post('/tasks', [AdminTaskController::class, 'store']);
    Route::get('/tasks/{task}', [AdminTaskController::class, 'show']);
    Route::patch('/tasks/{task}', [AdminTaskController::class, 'update']);
    Route::delete('/tasks/{task}', [AdminTaskController::class, 'destroy']);

    Route::get('/users', [AdminUserController::class, 'index']);
    Route::post('/users', [AdminUserController::class, 'store']);
    Route::get('/users/{user}', [AdminUserController::class, 'show']);
    Route::patch('/users/{user}', [AdminUserController::class, 'update']);
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy']);

    Route::get('profiles', [AdminProfileController::class, 'index']);
    Route::get('profiles/{profile}', [AdminProfileController::class, 'show']);
    Route::post('profiles', [AdminProfileController::class, 'store']);
    Route::patch('profiles/{profile}', [AdminProfileController::class, 'update']);
    Route::delete('profiles/{profile}', [AdminProfileController::class, 'destroy']);
});


