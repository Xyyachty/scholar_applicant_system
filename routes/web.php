<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantController;

Route::get('/', [ApplicantController::class, 'index']);

// Applicant routes
Route::get('/students', [ApplicantController::class, 'index'])->name('applicant.index');
Route::post('/insert', [ApplicantController::class, 'store'])->name('insert');
Route::get('/student/{id}/edit', [ApplicantController::class, 'edit'])->name('applicant.edit');
Route::put('/student/{id}/update', [ApplicantController::class, 'update'])->name('applicant.update');
Route::delete('/student/{id}/delete', [ApplicantController::class, 'destroy'])->name('applicant.delete');
