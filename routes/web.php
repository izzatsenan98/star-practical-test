<?php

use App\Http\Controllers\ConsentController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return redirect(route('home'));
});

Route::get('home', [PageController::class, 'home'])->name('home');
Route::get('about-us', [PageController::class, 'about'])->name('about');
Route::get('privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('terms-conditions', [PageController::class, 'terms'])->name('terms');


Route::prefix('consent')->name('consent.')->group(function () {
  Route::post('accept', [ConsentController::class, 'accept'])->name('accept');
  Route::post('reject', [ConsentController::class, 'reject'])->name('reject');
});


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
