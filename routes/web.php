<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'inicio'])->name('inicio');
Route::get('/nosotros', [PageController::class, 'nosotros'])->name('nosotros');
Route::get('/servicios', [PageController::class, 'servicios'])->name('servicios');
Route::get('/flota', [PageController::class, 'flota'])->name('flota');
Route::get('/certificaciones', [PageController::class, 'certificaciones'])->name('certificaciones');
Route::get('/contacto', [PageController::class, 'contacto'])->name('contacto');

Route::post('/contacto/mensaje', [PageController::class, 'submitMensaje'])->name('contacto.mensaje');
Route::post('/contacto/postulacion', [PageController::class, 'submitPostulacion'])->name('contacto.postulacion');
