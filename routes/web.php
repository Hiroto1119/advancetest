<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');
Route::get('/contact/search', [ContactController::class, 'search'])->name('contact.search');
Route::get('/contact/result', [ContactController::class, 'result'])->name('contact.result');
