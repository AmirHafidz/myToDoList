<?php

use App\Http\Controllers\admin\MarkAsRead;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('home.index');
})->name('home.index');

Route::prefix('user')->as('user.')->middleware('auth')->group(function(){
    Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::post('/user-add-task',[UserController::class,'user_add_task'])->name('add_task');
});

Route::get('/view-register',[AuthController::class,'view_register'])->name('user.view_register');
Route::post('/register-user',[AuthController::class,'register'])->name('user.register');
Route::post('/login',[AuthController::class,'login'])->name('user.login');

Route::post('/mark-as-read',[MarkAsRead::class,'index'])->name('notificaiton.mark_as_read');


Route::get('/add-task',[UserController::class,'add_task'])->name('dashboard.add_task');
Route::get('/try',function(){
    return view('register.index');
});

Route::get('/try', function(){
    return view('admin.index');
});

Route::get('/view-list-user',[AdminController::class,'view_list_user'])->name('admin.view_list_user');
Route::get('/list-user',[AdminController::class,'list_user'])->name('admin.list_user');