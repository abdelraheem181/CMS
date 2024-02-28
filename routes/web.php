<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController as ControllersRoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('layouts.main');
});*/
Route::get('/' , [PostController::class , 'index']);
Route::resource('/post' , PostController::class);
Route::post('/search' , [PostController::class , 'search'])->name('search');
Route::get('category/{id}/{slug}' , [PostController::class , 'getCategory'])->name('category');

Route::resource('/comment' , CommentController::class);
Route::post('/reply/store' , [CommentController::class , 'replyStore'])->name('reply.add');

//Notifications
Route::post('/notification' , [NotificationController::class , 'index'])->name('notification');

//Users Posts
Route::get('user/{id}' , [UserController::class , 'postUser'])->name('profile');
//Users Comments
Route::get('user/{id}/comments' , [UserController::class , 'commentUser'])->name('comment.user');

// ----------------------------------- Admin  ---------------------------------------
Route::group(['prefix' => 'admin' , 'middleware' => 'Admin'] , function(){
         //----------------------------dashboard
        Route::get('/dashboard' , [DashboardController::class , 'find'])->name('admin.dashboard');
        //------------------------------category
        Route::resource('/category' , CategoryController::class);
        //------------------------------Posts
        Route::resource('/posts' , 'App\Http\Controllers\admin\PostController');
        //------------------------------Roles
        Route::resource('/role' , RoleController::class);
          //------------------------Permission
        Route::get('/permission' , [PermissionController::class , 'index'])->name('permissions');
        Route::post('/permission' , [PermissionController::class , 'store'])->name('permissions');
        //------------------------------Users
        Route::resource('/user' , UserController::class);
        //-------------------------------Pages
        Route::resource('/page' , PageController::class);
});

Route::get('permission/byRole' , [RoleController::class , 'getRole'])->name('permission_byRole')->middleware('Admin');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
