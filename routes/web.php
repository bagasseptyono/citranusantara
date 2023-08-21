<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('posts', PostController::class);
Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class)->only(['store', 'create', 'edit', 'update', 'delete']);

    // user
    Route::get('/user', [UserController::class, 'index'])->name('user-index');
    Route::get('/user/edit', [UserController::class, 'userEdit'])->name('user-edit');
    Route::post('/user/edit', [UserController::class, 'userUpdate'])->name('user-update');
    Route::get('/user/mypost', [UserController::class, 'userPost'])->name('user-mypost');
    

    // comment
    Route::resource('comments', CommentController::class)->only(['store', 'update', 'destroy']);
    Route::post('reply', [CommentController::class, 'replyStore'])->name('reply.store');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'userPost'])->name('admin.index');
});




//search
Route::get('search', [SearchController::class, 'search'])->name('search');
Route::get('searchById', [SearchController::class, 'searchByIdUser'])->name('search.iduser');


Route::get('/get-provinces', function () {
    $provinces = Province::pluck('name', 'code');
    return response()->json($provinces);
});

Route::get('/get-cities/{province_code}', function ($province_id) {
    $cities = City::where('province_code', $province_id)->pluck('name', 'code');
    return response()->json($cities);
});

Route::middleware(['auth.logged'])->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
