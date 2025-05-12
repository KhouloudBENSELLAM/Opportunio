<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\RecruteurController;

Route::get('/joboffers', [JobOfferController::class, 'index'])->name('joboffers.index');
Route::get('/recruteurs', [RecruteurController::class, 'index'])->name('recruteurs.index');
// Route::get('/joboffers/{joboffer}/edit', [JobOfferController::class, 'edit'])->name('joboffers.edit');
// Route::put('/joboffers/{joboffer}', [JobOfferController::class, 'update'])->name('joboffers.update');

Route::get('/joboffers/{jobOffer}/edit', [JobOfferController::class, 'edit'])->name('joboffers.edit');
Route::put('/joboffers/{jobOffer}', [JobOfferController::class, 'update'])->name('joboffers.update');

Route::get('/joboffers/create', [JobOfferController::class, 'create'])->name('joboffers.create');
Route::post('/joboffer', [JobOfferController::class, 'store'])->name('joboffers.store');
Route::get('/joboffers/search', [JobOfferController::class, 'search'])->name('joboffers.search');


Route::resource('joboffers', JobOfferController::class);
