<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\JWTAuthController;
use App\Http\Controllers\RoleController;
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

//=========== ->admin admindashboard =============//
//++++++++++++++++++++++++++++++++++++++++++++++++//


Route::get('/admin-dashboard-home', function () {
    return view('admindashboard.admin-dashboard-home');
});

Route::get('/categories', function () {
    return view('admindashboard.categories');
});

Route::get('/teacher-list', function () {
    return view('admindashboard.teacher-list');
});

Route::get('/students-list', function () {
    return view('admindashboard.students-list');
});

Route::get('/reviews', function () {
    return view('admindashboard.reviews');
});
Route::get('/roles', function () {
    return view('admindashboard.roles');
});

Route::get('/transactions-list', function () {
    return view('admindashboard.transactions-list');
});

Route::get('/profile', function () {
    return view('admindashboard.profile');
});

//=================== ->USer ======== =============//
//++++++++++++++++++++++++++++++++++++++++++++++++//

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

// => -/Categorie
Route::get('/categories',[CategorieController::class, 'index'])->name('admin.categories');
Route::post('/categories', [CategorieController::class, 'create'])->name('admin.categories.create');
Route::delete('/categories/{id}', [CategorieController::class, 'delete'])->name('admin.categories.delete');
Route::put('/categories/{id}', [CategorieController::class, 'update'])->name('admin.categories.update');

// => -/Role
Route::get('/roles',[RoleController::class, 'index'])->name('admin.roles');
Route::post('/roles', [RoleController::class, 'create'])->name('admin.roles.create');
Route::delete('/roles/{id}', [RoleController::class, 'delete'])->name('admin.roles.delete');
Route::put('/roles/{id}', [RoleController::class, 'update'])->name('admin.roles.update');


