<?php

use App\Ai\Agents\ResumeAnalyzer;
use App\Http\Controllers\AIContentController;
use App\Http\Controllers\MediaDemoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeAnalyzerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/add-user', [UserController::class, 'store'])->name('users.store');
Route::get('/all-users', [UserController::class, 'index'])->name('users.index');
Route::patch('/update-user/{id}', [UserController::class, 'update'])->name('users.edit');
Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/add-user', [UserController::class, 'add'])->name('users.add');


Route::get('/resume', [ResumeAnalyzerController::class, 'index'])->name('resume.index');
Route::post('/resume-analyzer', [ResumeAnalyzerController::class, 'analyze'])->name('resume-analyzer.analyze');

Route::get('/chat', [\App\Http\Controllers\ChatController::class, 'index']);
Route::get('/chat/stream', [\App\Http\Controllers\ChatController::class, 'stream'])->name('chat.stream');

Route::get('/ai-media-demo', [MediaDemoController::class, 'index'])->name('ai.media.demo');


Route::post('/generate-ai-intro', [AIContentController::class, 'generateIntro']);
require __DIR__.'/auth.php';
