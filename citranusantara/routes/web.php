<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;

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
});

Route::resource('posts', PostController::class);



Route::get('/get-provinces', function () {
    $provinces = Province::pluck('name', 'code');
    return response()->json($provinces);
});

Route::get('/get-cities/{province_code}', function ($province_id) {
    $cities = City::where('province_code', $province_id)->pluck('name', 'code');
    return response()->json($cities);
});