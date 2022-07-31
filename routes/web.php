<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\commentsControler;
use App\Http\Controllers\ForntendController;
use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('backend.home.index');
// });
//ForntendController Start
Route::get('/', [ForntendController::class, 'show']);
Route::get('/singlepost/{id}', [ForntendController::class, 'singlepost']);
Route::get('/aboutus', [ForntendController::class, 'aboutus']);
Route::get('/contactus', [ForntendController::class, 'contactus']);
Route::get('/category/post/{id}', [ForntendController::class, 'categoryPost']);


//ForntendController End
//FrondendcommentsControler Start


Route::get('/singlepost', [commentsControler::class, 'commentStore']);



//FrondendcommentsControler end


Route::get('/admin/login', [AdminController::class, 'showAdminLoginForm']);
Route::post('/admin/login', [AdminController::class, 'login']);
Route::group(['middleware' => 'admin'], function () {
    //loginController Start
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/logout', [AdminController::class, 'adminlogout']);
    //loginController End

    //CategoryController Start
    Route::get('/add/category', [CategoryController::class, 'addCategoryForm']);
    Route::get('/manage/category', [CategoryController::class, 'manageCategory']);
    Route::post('/category/store', [CategoryController::class, 'categoryStore']);
    Route::get('/edit/category/{id}', [CategoryController::class, 'editCategory']);
    Route::get('/delete/category/{id}', [CategoryController::class, 'deleteCategory']);
    Route::post('/category/update/{id}', [CategoryController::class, 'updateCategory']);
    //CategoryController End


    //postController Start
    Route::get('/add/post', [PostController::class, 'addPostForm']);
    Route::get('/manage/post', [PostController::class, 'managePost']);
    Route::post('/post/store', [PostController::class, 'postStore']);
    Route::get('/edit/post/{id}', [PostController::class, 'editPost']);
    Route::get('/delete/post/{id}', [PostController::class, 'deletePost']);
    Route::post('/post/update/{id}', [PostController::class, 'updatePost']);
    //postController End



    //commentsControler Start


    Route::get('/manage/coment', [commentsControler::class, 'manageComment']);
    Route::get('/comment/delete/{id}', [commentsControler::class, 'deleteComment']);
    //commentsControler End



});