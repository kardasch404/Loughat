<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\JWTAuthController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TeacherReviewController;
use App\Http\Controllers\UserController;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;


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

Route::get('/teacher-profile', function () {
    return view('teacherdashboard.teacher-profile');
});

Route::get('/teacher-password', function () {
    return view('teacherdashboard.teacher-password');
});
Route::get('/create-cours-section', function () {
    return view('teacherdashboard.create-cours-section');
});
Route::get('/create-cours-lessons', function () {
    return view('teacherdashboard.create-cours-lessons');
});
Route::get('/show-lessons', function () {
    return view('teacherdashboard.show-lessons');
});
Route::get('/teacher-transaction', function () {
    return view('teacherdashboard.teacher-transaction');
});

Route::get('/logout', function () {
    // auth()->logout();
    return redirect('/');
});
// });
Route::get('/charge', function () {
    return view('charge');
});

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

// Route::get('/transactions-list', function () {
//     return view('admindashboard.transactions-list');
// });

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
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');
Route::get('/course-search', function () {
    return view('course-search');
})->name('course-search');
Route::get('/become-teacher', function () {
    return view('become-teacher');
})->name('become-teacher');
Route::get('/teacher-register', function () {
    return view('teacher-register');
})->name('teacher-register');
Route::get('/watch', function () {
    return view('watch');
})->name('watch');
Route::get('/pending', function() {
    return view('pending');
})->name('pending');
Route::get('/about', function() {
    return view('about');
})->name('about');
Route::get('/contact', function() {
    return view('contact');
})->name('contact');
Route::get('/comming-soon', function() {
    return view('comming-soon');
})->name('comming-soon');
Route::get('/instructor-profile', function() {
    return view('instructor-profile');
})->name('instructor-profile');


// => -/Auth 
Route::post('/login', [JWTAuthController::class, 'login'])->name('login');
Route::post('/register', [JWTAuthController::class, 'register'])->name('register');
Route::post('/logout', [JWTAuthController::class, 'logout'])->name('logout');
Route::post('/teacher-register', [JWTAuthController::class, 'registerTeacher'])->name('teacher.register');

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
Route::get('/teacher-password', [UserController::class, 'showChangePasswordForm'])->name('teacher-password.showForm');
Route::put('/teacher-password/{id}', [UserController::class, 'changePassword'])->name('teacher-password.changePassword');
Route::get('/teachers', [UserController::class, 'teacherList'])->name('admin.teachers');
Route::post('/update-teacher-status/{id}', [UserController::class, 'updateTeacherStatus'])->name('update.teacher.status');

Route::get('/teacher-profile', [UserController::class, 'editTeacherInfo'])->name('teacher-profile.editTeacherInfo');
Route::put('/teacher-profile/{id}', [UserController::class, 'update'])->name('teacher-profile.update');
Route::post('/teacher-profile/{id}/store', [PortfolioController::class, 'store'])->name('teacher-profile.store');
Route::get('/teacher-profile/afficherTeacherPortfolio', [PortfolioController::class, 'afficherTeacherPortfolio'])->name('teacher-profile.afficherTeacherPortfolio');

// => -/Course$
Route::get('/create-cours', [CoursController::class, 'create'])->name('courses.create');
Route::get('/courses', [CoursController::class, 'index'])->name('courses');
Route::post('/create-cours', [CoursController::class, 'store'])->name('courses.store');
Route::get('/edit-cours/{coursId}', [CoursController::class, 'edit'])->name('courses.edit');
Route::put('/update-cours/{coursId}', [CoursController::class, 'update'])->name('courses.update');
Route::delete('/courses/{coursId}', [CoursController::class, 'delete'])->name('courses.delete');
Route::get('/course-search', [CoursController::class, 'getAllCourses'])->name('courses');
Route::get('/cours/{coursId}', [CoursController::class, 'show'])->name('cours');

// => -/Commande
Route::post('/commande', [CommandeController::class, 'store'])->name('commande');

// => -/Payment
Route::post('/checkout/payment', [PaymentController::class, 'process'])->name('payment.process');
Route::get('/checkout/payment/success/{payment}', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/checkout/{commandeId}', [PaymentController::class, 'index'])->name('checkout');


// => -/Sections
Route::post('/create-cours-section', [SectionController::class, 'store'])->name('sections.store');
Route::get('/create-cours-section', [SectionController::class, 'create'])->name('sections.create');

// => -/Lessons
Route::post('/create-cours-lessons', [LessonController::class, 'store'])->name('lessons.store');
Route::get('/create-cours-lessons', [LessonController::class, 'create'])->name('lessons.create');
Route::get('/teacher/sections/by-course/{courseId}', [SectionController::class, 'getSectionsByCourse']);
Route::get('/show-lessons/{coursId}', [LessonController::class, 'showLessonByCours'])->name('lessons.show');
Route::put('/update-lesson/{lessonId}', [LessonController::class, 'update'])->name('lesson.update');
Route::get('/edit-lesson/{lessonId}', [LessonController::class, 'edit'])->name('lesson.edit');
Route::delete('/lesson/{lessonId}', [LessonController::class, 'destroy'])->name('lesson.destroy');

Route::get('/watch/{id}', [CoursController::class, 'watchCours'])->name('watch.watchCours');
Route::get('/watch/{id}/{lessonId?}', [CoursController::class, 'watchCours'])->name('watch');

// => -/Transactions
Route::get('transactions', [CommandeController::class, 'index'])->name('teacher.transactions');
Route::get('/teacher-transaction', [CommandeController::class, 'showCommandeByteacher'])->name('teacher.teacher-transaction');

// Students Profile Routes
Route::prefix('students-profile')->withoutMiddleware()->group(function () {
    Route::get('/', [CommandeController::class, 'getAllCommandeByStudent'])->name('students-profile.index');
    Route::get('/edit', [UserController::class, 'edit'])->name('students-profile.edit');
    Route::get('/courses', [CoursController::class, 'getAllCoursesByStudent'])->name('students-profile.courses');
    Route::get('/commandes', [CommandeController::class, 'getAllCommandeByStudent'])->name('students-profile.commandes');
    Route::put('/{id}', [UserController::class, 'update'])->name('students-profile.update');
    Route::put('/{id}/password', [UserController::class, 'changePassword'])->name('students-profile.changePassword');
});

// recherche 
Route::post('/course-search', [CoursController::class, 'searchCours'])->name('course.search');
Route::get('/course-search', [CoursController::class, 'showAllCategorie'])->name('course-search.categories');;
Route::get('/course-search/filter', [CoursController::class, 'filterByCategorieAndLevel'])->name('course-search.filterByCategorieAndLevel');

// Portfolio 
Route::get('/instructor-profile/{id}', [PortfolioController::class, 'index'])->name('instructor-profile.index');

// teacher Review
Route::post('/instructor-profile/review', [TeacherReviewController::class, 'store'])->name('instructor-profile.store');
Route::delete('/review/{id}', [TeacherReviewController::class, 'delete'])->name('review.delete');

Route::get('/reviews',[TeacherReviewController::class, 'getAllReviewsByAdmin'])->name('admin.getAllReviewsByAdmin');
Route::get('/teacher-reviews', [TeacherReviewController::class, 'getAllReviewsByTeacher'])->name('getAllReviewsByTeacher');