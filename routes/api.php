<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\bloodRequestcontroller;
use App\Http\Controllers\blood_request_acceptedcontroller;

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

Route::post('/post',[PostController::class,'store']);
Route::post('/user',[usercontroller::class,'store']);
Route::post('/userAuth',[authcontroller::class,'store']);
Route::post('/bloodRequest',[bloodRequest::class,'store']);
Route::get('/user_for_blood_request',[usercontroller::class,'bloodrequest']);
Route::post('/blood_request',[bloodRequestcontroller::class,'bloodrequestsave']);
Route::post('/requestFromOthers',[bloodRequestcontroller::class,'requestFromOthers']);
Route::post('/requestAccepted',[blood_request_acceptedcontroller::class,'requestAccepted']);
Route::post('/accepted',[blood_request_acceptedcontroller::class,'accepted']);
Route::post('/acceptedforhome',[blood_request_acceptedcontroller::class,'acceptedforhome']);