<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\ConsentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
  Route::get('dashboard', [Admin\HomeController::class, 'index'])->name('dashboard');

  Route::get('consents', [ConsentController::class, 'index'])->name('consents.index');
});