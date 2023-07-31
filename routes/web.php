<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\CasesController;
use App\Http\Controllers\FAQController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/info', [InfoController::class, 'index'])->name('info.index');
Route::get('/info/create', [InfoController::class, 'create'])->name('info.create');
Route::post('/info', [InfoController::class, 'store'])->name('info.store');
Route::get('/info/edit/{id}', [InfoController::class, 'edit'])->name('info.edit');
Route::put('/info/update/{id}', [InfoController::class, 'update'])->name('info.update');
Route::delete('/info/delete/{id}', [InfoController::class, 'destroy'])->name('info.delete');
Route::post('/info/getDomain', [InfoController::class, 'getDomain'])->name('info.getDomain');
Route::post('/info/getDomainEdit', [InfoController::class, 'getDomainEdit'])->name('info.getDomainEdit');
Route::get('/get-domain/{id}', [InfoController::class, 'getDomain'])->name('info.getDomain');
Route::get('/FAQ', [FAQController::class, 'index'])->name('FAQ.index');
Route::get('/FAQ/create', [FAQController::class, 'create'])->name('FAQ.create');
Route::get('/info/getName', [FAQController::class, 'getName'])->name('FAQ.getName');
Route::post('/FAQ/getNameEdit', [FAQController::class, 'getNameEdit'])->name('FAQ.getNameEdit');
Route::post('/FAQ', [FAQController::class, 'store'])->name('FAQ.store');
Route::get('/FAQ/edit/{id}', [FAQController::class, 'edit'])->name('FAQ.edit');
Route::put('/FAQ/update/{id}', [FAQController::class, 'update'])->name('FAQ.update');
Route::delete('/FAQ/delete/{id}', [FAQController::class, 'destroy'])->name('FAQ.delete');