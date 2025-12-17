<?php

use App\Http\Controllers\GalletaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\FraseController;
use App\Http\Controllers\HistorialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GalletaController::class, 'mostrar'])->name('home');
Route::get('/galleta', [GalletaController::class, 'mostrar'])->name('galleta.mostrar');
Route::get('/galleta/mensaje', [GalletaController::class, 'obtenerMensaje'])->name('galleta.mensaje');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/historial', [HistorialController::class, 'index'])->name('historial');
});

Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/frases', [FraseController::class, 'index'])->name('frases.index');
    Route::get('/frases/create', [FraseController::class, 'create'])->name('frases.create');
    Route::post('/frases', [FraseController::class, 'store'])->name('frases.store');
    Route::get('/frases/{id}/edit', [FraseController::class, 'edit'])->name('frases.edit');
    Route::put('/frases/{id}', [FraseController::class, 'update'])->name('frases.update');
    Route::delete('/frases/{id}', [FraseController::class, 'destroy'])->name('frases.destroy');
    Route::get('/estadisticas', [FraseController::class, 'estadisticas'])->name('estadisticas');
    Route::get('/historial-global', [FraseController::class, 'historialGlobal'])->name('historial-global');
});
