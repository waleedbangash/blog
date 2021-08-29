<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\All_blogsController;
use App\Http\Controllers\All_userController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\user\UserController;
use App\Models\Admin;
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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin'], function () {
Route::get('login',[AdminController::class,'create']);
Route::post('/submit',[AdminController::class,'store']);

Route::get('logout', function () {
    session()->forget('admin');
    return redirect('admin/login');

});
Route::group(['middleware' => ['adminauth']], function () {
    Route::view('/', 'admin');
 });

 //allblogs route
  Route::get('/all_blog',[All_blogsController::class,'index']);
  Route::get('delete/{id}',[All_blogsController::class,'destroy']);
  Route::get('status/{id}/{status}',[All_blogsController::class,'status']);
  Route::get('all_user',[All_userController::class,'index']);
  Route::get('userstatus/{id}/{status}',[All_userController::class,'status']);
});

Route::group(['prefix' => 'user'], function () {
    //user signup route

Route::get('signup',[UserController::class,'index']);
Route::post('/submit',[UserController::class,'signupstore']);
//end user signup route
//user sign in route
Route::get('login',[UserController::class,'usercreate']);
Route::post('/',[UserController::class,'userstore']);
//end of userlogin
//blog route

Route::post('blogsubmit',[BlogController::class,'store']);
Route::get('edit/{id}',[BlogController::class,'edit']);
Route::post('update/{id}',[BlogController::class,'update']);
Route::get('delete/{id}',[BlogController::class,'destroy']);


Route::get('/logout', function () {
    session()->forget('user');
    return redirect('user/login');
});

Route::group(['middleware' => ['userauth']], function () {
    Route::get('/',[UserController::class,'create']);
    Route::get('bloguser',[BlogController::class,'create']);
    Route::get('/show',[BlogController::class,'show']);


});


});





