<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Controllers\HomeController::class);
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');
