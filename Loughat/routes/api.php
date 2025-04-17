<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\JWTAuthController;
use App\Http\Controllers\UserController;
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


 // =========================-> Auth <-=============================//
// ============================================================== //
Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [JWTAuthController::class, 'register']);
    Route::post('login', [JWTAuthController::class, 'login']);
    
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::post('logout', [JWTAuthController::class, 'logout']);
    });
});

// =========================-> Categorie <-=============================//
// ============================================================== //
Route::post('/categorie', [CategorieController::class, 'create']);
Route::put('/categorie/{id}', [CategorieController::class, 'update']); 
Route::delete('/categorie/{id}', [CategorieController::class, 'delete']);

// =========================-> Users <-=============================//
// ============================================================== //
Route::get('/getAllusersWithRole', [UserController::class, 'getAllusersWithRole']);

// =========================-> cours <-=============================//
// ============================================================== //
Route::post('/create/{categorieId}', [CoursController::class, 'create']);
Route::put('/update/{coursId}/{categorieId}', [CoursController::class, 'update']);
Route::delete('/delete/{coursId}', [CoursController::class, 'delete']);
