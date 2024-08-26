<?php

use App\Http\Controllers\TodosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\IngresoRopaController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('login', [LoginController::class,'login'])->name('login');

Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('registro');
Route::post('/registro', [RegisterController::class, 'register'])->name('registro');



Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/password/reset/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->name('password.reset');

Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');



Route::get('/base', function () {
    return view('base');
})->name('base')->middleware('auth');

Route::get('/todos', function () {
    return view('todos.index');
})->middleware('auth');

Route::post('/todos', [TodosController::class,'store'])->name('todos');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/IngresoRSC', function () {
    return view('IngresoRSC');
})->name('IngresoRSC')->middleware('auth');

Route::get('/EgresoRSC', function () {
    return view('EgresoRSC');
})->name('EgresoRSC')->middleware('auth');

Route::get('registroIELE', function () {
    return view('registroIELE');
})->name('registroIELE')->middleware('auth');

Route::get('/ingresoRSC', [IngresoRopaController::class, 'showForm'])->name('IngresoRSC');
Route::post('/ingresoRSC', [IngresoRopaController::class, 'store']);
Route::get('/get-tipo-ropa-detalles', [IngresoRopaController::class, 'getTipoRopaDetalles']);
