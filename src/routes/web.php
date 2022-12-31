<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CounsellorAuthController;
use App\Http\Controllers\CounsellorController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('guest:web,counsellor')->group(function () {
    Route::prefix('users')->name('users.')->controller(UserController::class)->group(function () {
        Route::get('/', 'welcomeIndex')->name('welcome');
        Route::post('/', 'welcomePost')->name('welcome.post');
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('categories', [CategoryController::class, 'userCategoryIndex'])->name('categories');
        Route::get('categories/{category_id}/questions', [QuestionController::class, 'userQuestionIndex'])->name('questions');
        Route::post('answers', [AnswerController::class, 'saveUserAnswers'])->name('answers');
        Route::post('appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    });

    Route::prefix('users')->name('users.')->controller(CounsellorController::class)->group(function () {
        Route::get('/counsellors', 'userCounsellorIndex')->name('counsellors');
        Route::get('/counsellors/{counsellor_id}', 'appointmentIndex')->name('appointment');
    });
});

Route::prefix('admin')->name('admin.')->middleware('guest:web')->group(function () {
    Route::get('login', [AdminAuthController::class, 'index'])->name('login');
    Route::post('post-login', [AdminAuthController::class, 'postLogin'])->name('login-post');
});

Route::prefix('counsellor')->name('counsellor.')->middleware('guest:counsellor')->group(function () {
    Route::get('login', [CounsellorAuthController::class, 'index'])->name('login');
    Route::post('post-login', [CounsellorAuthController::class, 'postLogin'])->name('login-post');
});

Route::middleware('auth:web')->group(function () {
    Route::prefix('counsellors')->name('admin.counsellors.')->controller(CounsellorController::class)->group(function () {
        Route::get('/', 'adminCounsellorIndex')->name('index');
    });

    Route::prefix('api')->group(function () {
        Route::delete('/counsellors/{id}', [CounsellorController::class, 'destroy']);
    });

    Route::get('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

Route::middleware('auth:counsellor')->group(function () {
    Route::prefix('appointments')->name('appointments.')->controller(AppointmentController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::patch('/{id}', 'update')->name('update');
    });

    Route::get('counsellor/logout', [CounsellorAuthController::class, 'logout'])->name('counsellor.logout');
});
