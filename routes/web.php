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

Route::get('/terminos', [PageController::class, 'terminos'])->name('terminos');
Route::get('/privacidad', [PageController::class, 'privacidad'])->name('privacidad');
Route::get('/libro-de-reclamaciones', [PageController::class, 'reclamaciones'])->name('reclamos');
Route::post('/libro-de-reclamaciones', [PageController::class, 'submitReclamacion'])->name('reclamos.submit');
Route::get('/documentacion', [PageController::class, 'documentacion'])->name('documentacion');
