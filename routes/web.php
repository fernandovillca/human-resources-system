<?php

use App\Livewire\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('companias')->name('companies.')->group(function () {
        Route::get('/', Admin\Companies\Index::class)->name('index');
        Route::get('/crear', Admin\Companies\Create::class)->name('create');
    });
});

require __DIR__ . '/settings.php';
