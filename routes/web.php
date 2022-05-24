<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CourseController;  
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\DashboardPlanController;
use App\Http\Controllers\DashboardVideoController;
use App\Http\Controllers\DashboardCourseController;
use App\Http\Controllers\DashboardPlaylistController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\SearchController;


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
    return view('index');
});

Route::get('/belajar', [PlanController::class, 'index']);
Route::get('/ajax', [PlanController::class, 'ajax']);
Route::get('/ajax-video', [VideoController::class, 'ajaxVideo']);

Route::get('/belajar/{id}', [PlaylistController::class, 'index']);
Route::get('/belajar/{course_id}/{playlist_id}', [VideoController::class, 'index'])->name('playlist.videos');
Route::get('/belajar/{course_id}/{playlist_id}/{video_id}', [VideoController::class, 'show'])->name('video');

Route::get('/dashboard', function(){
    return view('dashboard.index');
});

Route::resource('/dashboard/plans', DashboardPlanController::class);
Route::resource('/dashboard/courses', DashboardCourseController::class);
Route::resource('/dashboard/playlists', DashboardPlaylistController::class);

Route::resource('/dashboard/videos', DashboardVideoController::class);

Route::resource('/dashboard/admins', DashboardAdminController::class);
Route::resource('/dashboard/users', DashboardUserController::class);

Route::get('/search', [SearchController::class, 'search']);

