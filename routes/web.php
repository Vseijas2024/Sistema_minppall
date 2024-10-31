<?php

use App\Http\Controllers\MemoController;
use App\Http\Controllers\UsuarioController;
use App\Models\Memo;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::redirect('/', 'dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', [UsuarioController::class, 'profile']);
    Route::resource('/memos', MemoController::class);
});