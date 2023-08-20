<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::resource('posts', PostController::class);
Route::get('/user', [UserController::class,'index'])->name('user-index');
Route::get('/user/edit', [UserController::class,'userEdit'])->name('user-edit');
Route::post('/user/edit', [UserController::class,'userUpdate'])->name('user-update');
Route::get('/user/mypost', [UserController::class,'userPost'])->name('user-mypost');


Route::get('/get-provinces', function () {
    $provinces = Province::pluck('name', 'code');
    return response()->json($provinces);
});

Route::get('/get-cities/{province_code}', function ($province_id) {
    $cities = City::where('province_code', $province_id)->pluck('name', 'code');
    return response()->json($cities);
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');