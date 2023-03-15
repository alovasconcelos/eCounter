<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'login']);
Route::post('/validaLogin', [LoginController::class, 'validaLogin']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/evento', [EventoController::class, 'index']);
Route::get('/evento.create', [EventoController::class, 'create']);
Route::post('/evento.save', [EventoController::class, 'save']);
Route::get('/evento.edit.{id}', [EventoController::class, 'edit']);
Route::get('/evento.delete.{id}', [EventoController::class, 'delete']);
Route::get('/evento.inc.{id}', [EventoController::class, 'inc']);
Route::get('/evento.dec.{id}', [EventoController::class, 'dec']);
Route::get('/novoUsuario', [UsuarioController::class, 'create']);
Route::post('/usuario.save', [UsuarioController::class, 'save']);

