<?php

use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\site\SiteController;
use Illuminate\Support\Facades\Route;

Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');
Route::put('/supports/{id}', [SupportController::class, 'update'])->name('supports.update');
Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit'); 
Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create'); // Create sempre vem antes do show, para não ter problemas
Route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show');
Route::post('/supports/store', [SupportController::class, 'store'])->name('supports.store');
Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');

Route::get('/contato', [SiteController::class, 'contact']);

Route::get('/', function () {
    return view('welcome');
});
