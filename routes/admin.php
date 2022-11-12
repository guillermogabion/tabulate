<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::group(['prefix' => '/v1'], function () {
    Route::post('login', [UserController::class, 'login'])->name('login');
});
Route::group(['prefix' => '/v1', 'middleware' => ['auth:admin-api']], function () {

    Route::get('self', 'UserController@self');
    Route::get('user', 'UserController@index');
    Route::get('index-event', [EventController::class, 'index']);
    Route::get('/fit', 'ParticipantController@index');

    Route::post('participant', [ParticipantController::class, 'store']);
    Route::post('participant/{id}', [ParticipantController::class, 'update']);
    Route::delete('participant/{id}', [ParticipantController::class, 'destroy']);
    Route::post('search-participant', [ParticipantController::class, 'search']);
    Route::get('participants/pagination', [ParticipantController::class, 'pagination']);
    Route::get('participants/get', [ParticipantController::class, 'index']);

    Route::post('event', [EventController::class, 'store']);
    Route::post('event/{id}', [EventController::class, 'update']);
    Route::delete('event/{id}', [EventController::class, 'destroy']);
    Route::get('events/pagination', [EventController::class, 'pagination']);
    Route::post('events/search', [EventController::class, 'search']);
    Route::get('event/active/{id}', [EventController::class, 'fetchEvent']);


    // category 
    Route::get('show-category', [CategoryController::class, 'index']);
    Route::post('add-category', [CategoryController::class, 'store']);
    Route::get('category/active/{id}', [CategoryController::class, 'fetchCategory']);

    // criteria
    Route::post('add-criteria', [CriteriaController::class, 'store']);
    Route::get('fetch-criteria/active/{id}', [CriteriaController::class, 'fetchCriteria']);
});
