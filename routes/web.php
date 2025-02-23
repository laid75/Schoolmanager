<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route للصفحة الرئيسية
Route::get('/', function () {
    return view('welcome');
});

// Route للوحة التحكم (Dashboard)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// مجموعة Routes تتطلب مصادقة (Authentication)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// تضمين ملف Routes الخاص بالمصادقة (Authentication)
require __DIR__.'/auth.php';
