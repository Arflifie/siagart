<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', fn () => view('auth.login'))->name('login');
Route::get('/register', fn () => view('auth.register')) -> name('register');
Route::post('/login', [Authcontroller::class, 'login']);
Route::post('/register', [Authcontroller::class, 'register']);
Route::post('/logout', [Authcontroller::class, 'logout'])->name('logout');


Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

Route::get('users/{user}', [UserController::class, 'show']);

Route::get('/report', [ReportController::class, 'create'])->name('report.create');
Route::post('/report',[ReportController::class, 'store'])->name('report.store');

