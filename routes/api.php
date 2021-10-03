<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HobbiesController;
use App\Http\Controllers\UserController;
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
Route::group([
    'prefix' => 'auth',
], function () {
    Route::post("/login", [AuthController::class, "login"]);
    Route::post("/register", [AuthController::class, "register"]);

    Route::middleware(['auth:api'])->group(function () {
        Route::post("/logout", [AuthController::class, "logout"]);
    });
});


Route::middleware(['auth:api'])->group(function () {
    Route::get("/test", [UserController::class, "getUserConnections"]);
});

// Route::post("/addHobby", [HobbiesController::class, "AddHobby"]);

Route::group([
    'prefix' => 'user',
    'middleware' => 'auth:api',
], function () {
    Route::post("/addHobby", [HobbiesController::class, "addHobby"]);
    Route::post("/removeHobby/{id}", [HobbiesController::class, "removeHobby"]);

});
