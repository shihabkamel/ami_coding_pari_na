<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\helloController;

Route::get('/', [helloController::class,'index'])->name('home');

Route::get('/section2', [helloController::class,'section2'])->name('section2')->middleware('auth');

Route::post('/section2_search', [helloController::class,'section2_search'])->name('section2_search');

Route::get('/section3', [helloController::class,'section3'])->name('section3')->middleware('auth');

Route::get('/get-input-values', [helloController::class,'getInputValues'])->name('getInputValues');

Route::post('/submit-input', [helloController::class,'submitInput'])->name('submit.input');

Route::get('/show-response', [helloController::class,'showResponse'])->name('show.response');

Route::get('/login', [helloController::class,'login'])->name('login');

Route::post('/login-submit', [helloController::class, 'login_submit'])->name('login_submit');

Route::get('/logout',[helloController::class,'logout'])->name('logout');

Route::get('/register', [helloController::class,'register'])->name('register');

Route::post('/register_submit', [helloController::class,'register_submit'])->name('register_submit');

Route::get('/registration/verify/{token}/{email}', [helloController::class,'registration_verify']);

Route::get('/forget_password', [helloController::class,'forget_password'])->name('forget_password');

Route::post('/forget_password_submission',[helloController::class,'forget_password_submission'])->name('forget_password_submission');

Route::get('/reset-password/{token}/{email}', [helloController::class,'reset_password'])->name('reset_password');

Route::post('/reset_password_submit', [helloController::class,'reset_password_submit'])->name('reset_password_submit');