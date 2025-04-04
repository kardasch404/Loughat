<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\JWTAuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


 // =========================-> Auth <-=============================//
// ============================================================== //

Route::post('register', [JWTAuthController::class, 'register']);
Route::post('login', [JWTAuthController::class, 'login']);
Route::post('logout', [JWTAuthController::class, 'logout']);

// =========================-> Categorie <-=============================//
// ============================================================== //
Route::post('/categorie', [CategorieController::class, 'create']);