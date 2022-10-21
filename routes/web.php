<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

// Route::get('/{any}', function () {
//     return view('welcome');
// })->where('any', '.*');

// Route::get('/{any}', function () {
//     return view('welcome');
// })->where('any', '.*');

Route::view('/{any}', 'welcome')->where('any', '.*');

// Route::post('login', 'UserController@login');

Route::group(['prefix' => 'v1'], function () {
    Route::post('login', [UserController::class, 'login'])->name('login');
});
Route::middleware('auth:web')->group(function () {

    Route::get('self', 'UserController@self');
    Route::get('user', 'UserController@index');
});
