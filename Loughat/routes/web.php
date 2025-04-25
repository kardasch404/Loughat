<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\JWTAuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
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

// Route::middleware(['auth', 'role:Teacher'])->group(function () {
Route::get('/teacher_dashboard', function () {
    return view('teacherdashboard.teacher_dashboard');
});

Route::get('/my-students', function () {
    return view('teacherdashboard.my-students');
});

Route::get('/student_course', function () {
    return view('teacherdashboard.student_course');
});
Route::get('/courses', function () {
    return view('teacherdashboard.courses');
});
Route::get('/create-cours', function () {
    return view('teacherdashboard.create-cours');
});
Route::get('/edit-cours', function () {
    return view('teacherdashboard.edit-cours');
});

Route::get('/teacher-reviews', function () {
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
Route::get('/create-cours-section', function () {
    return view('teacherdashboard.create-cours-section');
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

Route::get('/teachers', function () {
    return view('admindashboard.teacher-list');
});

Route::get('/students', function () {
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
Route::get('/course-search', function () {
    return view('course-search');
})->name('course-search');
Route::get('/course-details', function () {
    return view('course-details');
})->name('course-details');


// => -/Auth 
Route::post('/login', [JWTAuthController::class, 'login'])->name('login');
Route::post('/register', [JWTAuthController::class, 'register'])->name('register');
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


// => -/USer
Route::get('/teachers', [UserController::class, 'showTeachers'])->name('admin.teacher-list');
Route::get('/students', [UserController::class, 'showStudents'])->name('admin.students-list');
Route::get('/profile', [UserController::class, 'showAdmin'])->name('admin.profile');
Route::put('/profile/{id}/password', [UserController::class, 'changePassword'])->name('admin.profile.changePassword');
Route::put('/profile/{id}/info', [UserController::class, 'update'])->name('admin.profile.update');
Route::put('/students/{id}', [UserController::class, 'update'])->name('admin.students.update');
Route::put('/teachers/{id}', [UserController::class, 'update'])->name('admin.teachers.update');
Route::put('/teacher-change-password/{id}', [UserController::class, 'update'])->name('admin.teachers.update');

// => -/Course$
Route::get('/create-cours', [CoursController::class, 'create'])->name('courses.create');
Route::get('/courses', [CoursController::class, 'index'])->name('courses');
Route::post('/create-cours', [CoursController::class, 'store'])->name('courses.store');
Route::get('/edit-cours/{coursId}', [CoursController::class, 'edit'])->name('courses.edit');
Route::put('/update-cours/{coursId}', [CoursController::class, 'update'])->name('courses.update');
Route::delete('/courses/{coursId}', [CoursController::class, 'delete'])->name('courses.delete');

Route::get('/course-search', [CoursController::class, 'getAllCourses'])->name('courses');
Route::get('/cours/{coursId}', [CoursController::class, 'show'])->name('cours');

// {{ route('cours', $cours->id) }}
// => -/Commande$
Route::post('/commande', [CommandeController::class, 'store'])->name('commande');

// => -/Payment
Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('process.payment');
Route::get('/payment/success', function () {
    return view('payment-success');
})->name('payment.success');

Route::get('/payment/failure', function () {
    return view('payment-failure');
})->name('payment.failure');


// => -/Sections
Route::post('/create-cours-section', [SectionController::class, 'store'])->name('sections.store');
Route::get('/create-cours-section', [SectionController::class, 'create'])->name('sections.create');


