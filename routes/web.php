<?php

use App\Models\Plan;
use App\Models\Course;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardPlanController;
use App\Http\Controllers\DashboardQuizController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardVideoController;
use App\Http\Controllers\DashboardCourseController;
use App\Http\Controllers\DashboardPlaylistController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
Route::get('/belajar/{course_id}/{playlist_id}', [VideoController::class, 'index'])->name('playlist.videos')->middleware('isSubscriber');
Route::get('/belajar/{course_id}/{playlist_id}/{video_id}', [VideoController::class, 'show'])->name('video')->middleware('isSubscriber');

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::resource('/dashboard/plans', DashboardPlanController::class);
Route::resource('/dashboard/courses', DashboardCourseController::class);
Route::resource('/dashboard/playlists', DashboardPlaylistController::class);
Route::resource('/dashboard/videos', DashboardVideoController::class);
Route::resource('/dashboard/quizzes', DashboardQuizController::class);

// ajax for quizzes create
Route::get('/playlist-fetch/{course_id}', [DashboardQuizController::class, 'fetchPlaylist']);

Route::get('/dashboard/transaksi', [DashboardTransactionController::class, 'index']);
Route::get('/dashboard/verifikasi-transaksi', [DashboardTransactionController::class, 'needverif']);

Route::put('/dashboard/verifikasi-transaksi/{trans}', [DashboardTransactionController::class, 'verify']);

Route::get('/paket-belajar', [TransactionController::class, 'showPlans']);
Route::get('/paket-belajar/history', [TransactionController::class, 'showHistory'])->middleware('auth');
Route::get('/paket-belajar/{plan_id}', [TransactionController::class, 'setUpTransaction']);

Route::post('/buat-transaksi', [TransactionController::class, 'makeTransaction']);

Route::put('/upload-pay/{trans}', [TransactionController::class, 'updatePay']);
Route::resource('/dashboard/admins', DashboardAdminController::class);
Route::resource('/dashboard/users', DashboardUserController::class);

Route::get('/search', [SearchController::class, 'search']);

Route::get('/upload-pay/{trans}/edit', [TransactionController::class, 'editPay']);

Route::get('/quiz/{play}', [QuizController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
