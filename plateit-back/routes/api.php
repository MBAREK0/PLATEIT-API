<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\commentsController;
use App\Http\Controllers\Api\LikesController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\PostesSavedController;
use App\Http\Controllers\Api\PublicationsController;
use App\Http\Controllers\Api\RestaurantDetailsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// ------------------------------  auth Routes ---------------------------------------

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('verify_user_email', [AuthController::class, 'verifyUserEmail']);
    Route::post('resend_email_verification_link', [AuthController::class, 'resendEmailVerificationLink']);
    Route::post('forgetPassword', [AuthController::class, 'forgetPassword']);
    Route::post('resetPassword', [AuthController::class, 'resetPassword']);
});

Route::middleware(['check.token'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
});

// ------------------------------  Restaurants Routes ------------------------------------

Route::middleware(['check.token','OnlyRestaurants'])->prefix('restaurant')->group(function () {

    /**
     * create or update Routes
     */
    Route::post('insert_details', [RestaurantDetailsController::class, 'insert_details']);
    //  u can use this route for update also just send the id with the request
    Route::post('save_plate', [MenuController::class,'save_plate']);

    /**
     * get Routes
     */
    Route::get('get_plate', [MenuController::class,'get_plate']);
    Route::get('menu', [MenuController::class,'menu']);
    Route::get('get_details', [RestaurantDetailsController::class, 'get_details']);

    /**
     * delete Routes
     */
    Route::delete('delete', [MenuController::class,'delete']);
    Route::delete('delete_menu', [MenuController::class,'delete_menu']);

});

// ------------------------------  publication Routes ------------------------------------

Route::middleware(['check.token'])->prefix('publication')->group(function () {

    /**
     * create or update Routes
     */
    //  u can use this route for update also just send the id with the request
    Route::post('save_post', [PublicationsController::class,'save_post']);
    Route::post('save_like', [LikesController::class,'save_like']);
    Route::post('save_comment', [commentsController::class,'save_comment']);

    Route::post('saved_post', [PostesSavedController::class,'saved_post']);


    Route::get('get_comments', [commentsController::class,'get_comments']);


    /**
     * delete Routes
     */
    Route::delete('delete', [PublicationsController::class,'delete']);
    Route::delete('delete_like', [LikesController::class,'delete']);
    Route::delete('delete_comment', [commentsController::class,'delete']);
    Route::delete('delete_saved_post', [PostesSavedController::class,'delete']);



});
