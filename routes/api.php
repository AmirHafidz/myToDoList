<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::as('task.')->controller(TaskController::class)->group(function(){

    Route::post('/store-task','store')->name('store');
    
    Route::get('/show-all-task/{userid}','show_all')->name('show_all');
    
    Route::get('/show-task-by-category/{user_id}/{category_id}','show_by_category')->name('show_by_category');
    
    Route::get('/edit-task/{task_id}','edit_task')->name('edit');
    
    Route::post('/update-task/{task_id}','update_task')->name('update');
    
    Route::post('/delete-task/{task_id}','delete_task')->name('delete');

    Route::get('/show-task-by-status/{user_id}/{status_id}','show_by_status')->name('show_by_status');

    Route::post('/done-status/{user_id}/{task_id}/{done_status}','done_status')->name('done_status');
    
    Route::get('/fetch_datetime_task/{task_id}','fetch_datetime')->name('fetch_datetime');

    Route::post('/delay_datetime_task','delay_datetime')->name('delay_datetime');

    Route::get('/fetch-task-by-level/{user_id}/{level_id}','show_by_level')->name('show_by_level');

    Route::get('/sort-by-task/{user_id}/{sort_id}','sort_task')->name('sort_task');
    
});

Route::as('feedback.')->controller(FeedbackController::class)->group(function(){
    
    Route::post('/send-feedback/{user_id}','store')->name('store');
    
    Route::get('/fetch-notification/{user_id}/{feedback_id}','fetch')->name('fetch');

});

