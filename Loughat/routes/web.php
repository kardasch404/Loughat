<?php

use App\Http\Controllers\JWTAuthController;
use Illuminate\Support\Facades\Route;

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


Route::get('/test-style', function () {
    return asset('assets/teacher/css/style.css');
});

// Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher_dashboard', function () {
        return view('teacherdashboard.teacher_dashboard');
    });

    Route::get('/my-students', function () {
        return view('teacherdashboard.my-students');
    });

    Route::get('/student_course', function () {
        return view('teacherdashboard.student_course');
    });

    Route::get('/reviews', function () {
        return view('teacherdashboard.reviews');
    });

    Route::get('/comming_soon', function () {
        return view('teacherdashboard.comming-soon');
    });

    Route::get('/teacher-profile-settings', function () {
        return view('teacherdashboard.teacher-profile-settings');
    });

    Route::get('/teacher-change-password', function () {
        return view('teacherdashboard.teacher-change-password');
    });

    Route::get('/logout', function () {
        // auth()->logout();
        return redirect('/');
    });
// });


Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/signin', function () {
    return view('signin');
})->name('signin');


// => -/Auth 
Route::post('/register', [JWTAuthController::class, 'register'])->name('register');
Route::post('/login', [JWTAuthController::class, 'login'])->name('login');
Route::post('/logout', [JWTAuthController::class, 'logout'])->name('logout');
