<?php

use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/all_users', [\App\Http\Controllers\Admin\DashboardController::class, 'allUsers'])->name('allUsers');
    Route::resource('/level', LevelController::class)->except('show');
    Route::resource('/level.lesson', LessonController::class)->except('show');
    Route::resource('/level.lesson.question', QuestionController::class)->except('show');
    Route::resource('/level.lesson.question.answer', AnswerController::class)->except('show');
});

Route::name('user.')->prefix('user')->middleware(['auth', 'user'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\User\FrontendController::class, 'index'])->name('dashboard');
    Route::get('/edit_profile', [\App\Http\Controllers\User\FrontendController::class, 'editProfile'])->name('editProfile');
    Route::put('/update_profile/{userID}', [\App\Http\Controllers\User\FrontendController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/levels', [\App\Http\Controllers\User\FrontendController::class, 'levels'])->name('levels');
    Route::get('/level/{levelID}/lesson/{lessonSlug}', [\App\Http\Controllers\User\FrontendController::class, 'lessonDetail'])->name('lessonDetail');
    Route::get('/level/{levelID}/lesson/{lessonSlug}/quiz', [\App\Http\Controllers\User\FrontendController::class, 'lessonQuiz'])->name('lessonQuiz');
    Route::get('/level/{levelID}/lesson/{lessonSlug}/result/{userQuizID}/plusScore/{plusScore}', [\App\Http\Controllers\User\FrontendController::class, 'lessonResult'])->name('lessonResult');
    Route::post('/level/{levelID}/lesson/{lessonSlug}', [\App\Http\Controllers\User\UserQuizController::class, 'store'])->name('quiz.store');
    Route::get('/leaderboard', [\App\Http\Controllers\User\FrontendController::class, 'leaderboard'])->name('leaderboard');
});

// Route::artisan Call
Route::get('/artisan-call', function(){
    Artisan::call('storage:link'); //storage:link
    Artisan::call('route:clear'); //route:clear
    Artisan::call('config:clear'); //config:clear
    return 'success';
});